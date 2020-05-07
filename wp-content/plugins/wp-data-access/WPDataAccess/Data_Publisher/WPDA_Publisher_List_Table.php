<?php

/**
 * Suppress "error - 0 - No summary was found for this file" on phpdoc generation
 */

namespace WPDataAccess\Data_Publisher {

	use WPDataAccess\Data_Dictionary\WPDA_Dictionary_Exist;
	use WPDataAccess\List_Table\WPDA_List_Table;
	use WPDataAccess\Plugin_Table_Models\WPDA_Publisher_Model;
	use WPDataAccess\Utilities\WPDA_Message_Box;

	/**
	 * Class WPDA_Publisher_List_Table extends WPDA_List_Table
	 *
	 * List table to support Data Publications.
	 *
	 * @author  Peter Schulz
	 * @since   2.0.15
	 */
	class WPDA_Publisher_List_Table extends WPDA_List_Table {

		public function __construct( $args = [] ) {
			$args['column_headers'] = self::column_headers_labels();
			$args['title']          = __( 'Data Publisher', 'wp-data-access' );
			$args['subtitle']       = '';

			parent::__construct( $args );
		}

		/**
		 * Overwrite method column_default
		 *
		 * Column pub_responsive should return 'Flat' or 'Responsive'.
		 */
		public function column_default( $item, $column_name ) {
			if ( 'pub_responsive' === $column_name ) {
				if ( 'Yes' === $item[ $column_name ] ) {
					return 'Responsive';
				} else {
					return 'Flat';
				}
			}

			if ( 'pub_table_options_searching' === $column_name ||
			     'pub_table_options_ordering' === $column_name ||
			     'pub_table_options_paging' === $column_name
			) {
				if ( 'on' === $item[ $column_name ] ) {
					return 'Yes';
				} else {
					return 'No';
				}
			}

			return parent::column_default( $item, $column_name );
		}

		/**
		 * Overwrites method column_default_add_action
		 *
		 * Add a link to show the shortcode of a publication.
		 *
		 * @param array  $item
		 * @param string $column_name
		 * @param array  $actions
		 */
		public function column_default_add_action( $item, $column_name, &$actions ) {
			parent::column_default_add_action( $item, $column_name, $actions );

			// Add copy publication to actions
			$wp_nonce_action = "wpda-copy-{$this->table_name}";
			$wp_nonce        = esc_attr( wp_create_nonce( $wp_nonce_action ) );
			$form_id   = '_' . ( self::$list_number - 1 );
			$copy_form =
				"<form" .
				" id='copy_form$form_id'" .
				" action='?page=" . esc_attr( $this->page ) . "&table_name=" . esc_attr( $this->table_name ) . "'" .
				" method='post'>" .
				$this->get_key_input_fields( $item ) .
				"<input type='hidden' name='action' value='copy' />" .
				"<input type='hidden' name='_wpnonce' value='$wp_nonce'>" .
				$this->page_number_item .
				"</form>"
			?>

			<script type='text/javascript'>
				jQuery("#wpda_invisible_container").append("<?php echo $copy_form; ?>");
			</script>

			<?php
			$copy_warning    = __( "Copy table options set?\\n\\'Cancel\\' to stop, \\'OK\\' to copy.", 'wp-data-access' );
			$actions['copy'] = sprintf(
				'<a href="javascript:void(0)" 
									title="%s"
                                    class="edit"  
                                    onclick="if (confirm(\'%s\')) jQuery(\'#%s\').submit()">
                                    %s
                                </a>
                                ',
				__( 'New publication name = old publication name + _ + n', 'wp-data-access' ),
				$copy_warning,
				"copy_form$form_id",
				__( 'Copy', 'wp-data-access' )
			);

			if ( 'rdb:' !== substr( $item['pub_schema_name'], 0, 4) ) {
				// Check if database exists. If database is not found, a test link is not provided. This might happen
				// when a user transfers a publication from one repository to another.
				if ( WPDA_Dictionary_Exist::schema_exists( $item['pub_schema_name'] ) ) {
					// Show publication directly from Data Publisher main page
					if ( 'pub_id' === $column_name ) {
						WPDA_Publisher_Form::show_publication( $item['pub_id'], $item['pub_table_name'] );
					}
					$actions['test'] = sprintf(
						'<a href="javascript:void(0)"
									title="%s"
                                    class="view"
                                    onclick="jQuery(\'#data_publisher_test_container_%s\').toggle()">
                                    %s
                                </a>
                                ',
						__( 'Test shortcode in popup', 'wp-data-access' ),
						$item['pub_id'],
						__( 'Test', 'wp-data-access' )
					);
				} else {
					$actions['test'] = sprintf(
						'<a href="javascript:void(0)"
									title="%s"
                                    class="delete">
                                    %s
                                </a>
                                ',
						__( 'ERROR: Database not found!', 'wp-data-access' ),
						__( 'Test', 'wp-data-access' )
					);
				}
			} else {
				$actions['test'] = sprintf(
					'<a href="javascript:void(0)"
									title="%s"
                                    class="view">
                                    %s
                                </a>
                                ',
					__( 'Shortcode test not available for remote database connections', 'wp-data-access' ),
					__( 'Test', 'wp-data-access' )
				);
			}

			// Show publication shortcode directly from Data Publisher main page
			$actions['shortcode'] = sprintf(
				'<a href="javascript:void(0)" 
									title="%s"
                                    class="view"  
                                    onclick=\'prompt("%s", "[wpdataaccess pub_id=\"%s\"]")\'>
                                    %s
                                </a>
                                ',
				__( 'Show/copy shortcode in popup', 'wp-data-access' ),
				__( 'Publication Shortcode', 'wp-data-access' ),
				$item['pub_id'],
				__( 'Shortcode', 'wp-data-access' )
			);
		}

		public function process_bulk_action() {
			if ( 'copy' === $this->current_action() ) {
				$wp_nonce_action = "wpda-copy-{$this->table_name}";
				$wp_nonce        = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : ''; // input var okay.
				if ( ! wp_verify_nonce( $wp_nonce, $wp_nonce_action ) ) {
					die( __( 'ERROR: Not authorized', 'wp-data-access' ) );
				}

				if ( isset( $_REQUEST['pub_id'] ) ) {
					$pub_id = sanitize_text_field( wp_unslash( $_REQUEST['pub_id'] ) ); // input var okay.
				}

				$unique_pu_name = $this->get_unique_pub_name( $pub_id );

				global $wpdb;
				$query =
					$wpdb->prepare( "
							SELECT *
							  FROM {$this->table_name}
							 WHERE pub_id = %d
						",
						[
							$pub_id,
						]
					);

				$pub_raw = $wpdb->get_results( $query, 'ARRAY_A' );
				if ( $wpdb->num_rows > 0 ) {
					$pub_raw[0]['pub_name'] = $unique_pu_name;
					unset( $pub_raw[0]['pub_id'] );
					$rows_inserted = $wpdb->insert(
						$this->table_name,
						$pub_raw[0]
					);
					switch ( $rows_inserted ) {
						case 0:
							$msg = new WPDA_Message_Box(
								[
									'message_text'           => __( 'Could not copy publication [source not found]', 'wp-data-access' ),
									'message_type'           => 'error',
									'message_is_dismissible' => false,
								]
							);
							$msg->box();
							break;
						case 1:
							$msg = new WPDA_Message_Box(
								[
									'message_text' => __( 'Publication copied', 'wp-data-access' ),
								]
							);
							$msg->box();
							break;
						default:
							$msg = new WPDA_Message_Box(
								[
									'message_text'           => __( 'Could not copy publication [too many rows]', 'wp-data-access' ),
									'message_type'           => 'error',
									'message_is_dismissible' => false,
								]
							);
							$msg->box();
					}
				}
			} else {
				parent::process_bulk_action();
			}
		}

		protected function get_unique_pub_name( $pub_id ) {
			global $wpdb;

			$db_pub_name = $wpdb->get_results(
				$wpdb->prepare(
					'select pub_name from ' . WPDA_Publisher_Model::get_base_table_name() . ' where pub_id = %d',
					[
						$pub_id
					]
				)
				, 'ARRAY_A'
			);
			if ( $wpdb->num_rows !== 1 ) {
				wp_die( __( 'ERROR: Publication not found', 'wp-data-access' ) );
			}
			$pub_name = $db_pub_name[0]['pub_name'];

			$i     = 2;
			$query = "select 'x' from " . WPDA_Publisher_Model::get_base_table_name() .
			         ' where pub_name = %s';

			$unique_pub_name = "{$pub_name}_$i";
			$wpdb->get_results( $wpdb->prepare( $query, [ $unique_pub_name ] ) );
			while ( $wpdb->num_rows > 0 ) {
				// Search untill a free options set is found
				$i ++;
				$unique_pub_name = "{$pub_name}_$i";
				$wpdb->get_results( $wpdb->prepare( $query, [ $unique_pub_name ] ) );
			}

			return $unique_pub_name;
		}

		public static function column_headers_labels() {
			return [
				'pub_id'                      => __( 'Pub ID', 'wp-data-access' ),
				'pub_name'                    => __( 'Name', 'wp-data-access' ),
				'pub_schema_name'             => __( 'Database', 'wp-data-access' ),
				'pub_table_name'              => __( 'Table Name', 'wp-data-access' ),
				'pub_column_names'            => __( 'Column Names', 'wp-data-access' ),
				'pub_responsive'              => __( 'Output', 'wp-data-access' ),
				'pub_table_options_searching' => __( 'Searching?', 'wp-data-access' ),
				'pub_table_options_ordering'  => __( 'Ordering?', 'wp-data-access' ),
				'pub_table_options_paging'    => __( 'Paging?', 'wp-data-access' ),
				'pub_table_options_advanced'  => __( 'Advanced Options?', 'wp-data-access' ),
				'pub_default_where'           => __( 'Default Where', 'wp-data-access' ),
				'pub_default_orderby'         => __( 'Default Order By', 'wp-data-access' ),
				'pub_format'                  => __( 'Format', 'wp-data-access' ),
				'pub_responsive_popup_title'  => __( 'Popup Title', 'wp-data-access' ),
				'pub_responsive_cols'         => __( 'Responsive Cols', 'wp-data-access' ),
				'pub_responsive_type'         => __( 'Responsive Type', 'wp-data-access' ),
				'pub_responsive_icon'         => __( 'Responsive Icon?', 'wp-data-access' ),
			];
		}

	}

}