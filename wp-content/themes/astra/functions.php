<?php

/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define('ASTRA_THEME_VERSION', '2.4.3');
define('ASTRA_THEME_SETTINGS', 'astra-settings');
define('ASTRA_THEME_DIR', trailingslashit(get_template_directory()));
define('ASTRA_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));


/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to latest version.
 */
define('ASTRA_EXT_MIN_VER', '2.4.0');

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-update.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-pb-compatibility.php';


/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if (is_admin()) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';
/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

if (is_admin()) {

	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/notices/class-astra-notices.php';

	/**
	 * Metabox additions.
	 */
	require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
}

// BSF Analytics library.
require_once ASTRA_THEME_DIR . 'admin/bsf-analytics/class-bsf-analytics.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';


/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';


/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-filesystem.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if (version_compare(PHP_VERSION, '5.4', '>=')) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymus functions.
if (version_compare(PHP_VERSION, '5.3', '>=')) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';




// [sc_form_post]を作成
function form_post()
{
	if (isset($_POST)) {
		$form_post = $_POST;
		print_r($form_post);
	}
}
add_shortcode('sc_form_post', 'form_post');



//フォーム送信時にチケット作成をおこなう
function wpcf7_insert_post()
{
	//送信情報を取得
	$submission = WPCF7_Submission::get_instance();
	if ($submission) {
		$formdata = $submission->get_posted_data();
		$timeStamp = $submission->get_meta('timestamp');
		// $time = date('Ymd_Gi', $timeStamp);


		$new_post = array(
			'post_type' => 'post',
			'post_title' => $formdata['post_title'] . 'インドDOMA' . '-' . $timeStamp = date('Y-m-d_g:i', $timeStamp),
			'post_status' => 'publish', //下書きは、draft
			'post_content' =>	'[xyz-ips snippet="PostStatus"]' .
				'<h5>ご注文者さま登録ネーム</h5>' .
				$formdata['your-name'] .

				'<h5>もちかえる時間</h5>' .
				$formdata['your_time'] .

				'<h5>もちかえる個数</h5>' .
				$formdata['your_count']  .

				'<h5>チケット発行日時</h5>	' .
				date_default_timezone_set('Asia/Tokyo') .
				date("Y/m/d H:i:s") .

				'[contact-form-7 id="184" title="受け取り確認"]'
			// the_title(1) .
			// '<button onclick="location.href=`danmitsu.html`; return false;">おまえにちぇっくい～～ん2</button>' .

			// 			'<form method="post" action="./hoge/fuga.php">
			//   <p>
			//     <label for="item1">名前</label>
			//     <input name="name" id="item1">
			//   </p>
			//   <p>
			//     <label for="item2">年齢</label>
			//     <input name="old" id="item2">
			//   </p>
			//   <p>
			//     <label for="item3">住所</label>
			//     <input name="address" id="item3">
			//   </p>
			//   <p>
			//     <input type="submit" value=" 送　信 ">
			//     <input type="reset" value="リセット">
			//   </p>
			// </form>' .
			// 			'<form method="post" action="/page-b">' . '
			// 名前：' . '<input type="text" name="name">' . '
			// アドレス：' . '<input type="email" name="email">' . '
			// <input type="submit" value="送信">' . '
			// </form>' .
			// '[sc_form_post]' .
			// 				'[xyz-ips snippet="phpTEST"]' .
			// 				'<form action="functions.php" method="post">
			//     <button type="submit" name="add">登録</button>
			//     <button type="submit" name="update">更新</button>
			//     <button type="submit" name="remove">削除</button>
			// </form>' .


			// '<button class="push">押して</button>' .
			// '[xyz-ips snippet="vardumpPOST"]',
			// 'post_content' => '[xyz-ips snippet="PostStatus"]' . '<h5>ご注文者さま登録ネーム</h5>' . $formdata['your-name'] . '<br>' . '<h5>もちかえる時間</h5>' . $formdata['your_time'] . '<br>' . '<h5>もちかえる個数</h5>' . $formdata['your_count']  . '<h5>チケット発行日時</h5>	' . date_default_timezone_set('Asia/Tokyo') . date("Y/m/d H:i:s") . '<br>' . '[contact-form-7 id="184" title="受け取り確認"]',
		);
		//チケット作成
		$post_id = wp_insert_post($new_post);
		//作成に成功した場合
		if (!is_wp_error($post_id)) {
			//カスタムフィールド？のデータも登録する
			add_post_meta($post_id, 'your_field', $formdata['your_field']);
		}
	}
}

add_action('wpcf7_mail_sent', 'wpcf7_insert_post', 10, 1);


// add_action( 'template_redirect', 'my_post_format_redirect', 1);
// function my_post_format_redirect() {
//     if ( is_archive() ) {
//         if ( strpos( get_query_var( 'post_type' ), 'post_format' ) !== false ) {
//             wp_safe_redirect( home_url(/domadoma/) );
//             exit;
//         }
//     }
// });





function my_expire_event($post_id)
{
	if (
		get_post_meta($post_id, 'close_time', true) != ''
		&& date_i18n('Y-m-d H:i') < get_post_meta($post_id, 'close_time', true)
	) {
		// 設定されていて未来の日付ならスケジュールをセット
		$time_stamp = strtotime(get_post_meta($post_id, 'close_time', true) . ' JST');
		wp_schedule_single_event($time_stamp, 'my_new_event', array($post_id));
	}
}

add_action('save_post', 'my_expire_event');

// スケジュールされる動作を記述
function my_update_post($post_id)
{
	wp_update_post(array(
		'ID' => post_id,
		'post_category' =>  array('ここに残したいカテゴリのIDを入れる')
	));
}
add_action('my_new_event', 'my_update_post');
