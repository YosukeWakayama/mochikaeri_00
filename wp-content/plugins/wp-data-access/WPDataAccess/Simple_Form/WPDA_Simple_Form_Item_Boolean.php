<?php

namespace WPDataAccess\Simple_Form {

	class WPDA_Simple_Form_Item_Boolean extends WPDA_Simple_Form_Item {

		protected $checkbox_label = '';
		/**
		 * WPDA_Simple_Form_Item_Boolean constructor.
		 *
		 * @param array $args
		 */
		public function __construct( $args = [] ) {
			parent::__construct( $args );

			$this->checkbox_label = $this->get_item_label();
			$this->set_label( '' );
			$this->set_item_hide_icon( true );
		}

		/**
		 * Overwrite method
		 */
		protected function show_item() {
			$checked = '1'===$this->item_value ? 'checked' : '';
			?>
			<label>
				<input type="checkbox"
				       name="<?php echo esc_attr( $this->item_name ); ?>"
				       value="1"
					   <?php echo $checked; ?>
				/>
				<?php echo esc_attr( $this->checkbox_label ); ?>
			</label>
			<?php
		}

	}

}