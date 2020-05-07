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





//フォーム送信時にチケット作成をおこなう
function wpcf7_insert_post()
{
	//送信情報を取得
	$submission = WPCF7_Submission::get_instance();
	if ($submission) {
		$formdata = $submission->get_posted_data();
		$new_post = array(
			'post_type' => 'post',
			'post_title' => 'インドDOMA',
			'post_status' => 'publish', //下書きは、draft
			'post_content' => '[xyz-ips snippet="PostStatus"]' . '<h5>ご注文者さま登録ネーム</h5>' . $formdata['your-name'] . '<br>' . '<h5>もちかえる時間</h5>' . $formdata['your_time'] . '<br>' . '<h5>もちかえる個数</h5>' . $formdata['your_count']  . '<h5>チケット発行日時</h5>	' . date_default_timezone_set('Asia/Tokyo') . date("Y/m/d H:i:s") . '<br>' . '[contact-form-7 id="184" title="受け取り確認"]',
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


// 投稿したチケットのタイトルを取得
// function wpcf7_get_post_data($tag)
// {
// 	if (!is_array($tag)) return $tag;
// 	$post_id = (isset($_GET['post_id']) && $_GET['post_id']) ? $_GET['post_id'] : false;
// 	if ($post_id) {
// 		if ($tag['name'] == 'post-title') {
// 			$title = get_the_title($post_id);
// 			$tag['values'] = array($title);
// 		}
// 	}
// 	return $tag;
// }
// add_filter('wpcf7_form_tag', 'wpcf7_get_post_data', 11);



// チケットに有効期限を設定
// function post_expire_schedule($id)
// {
// 	// 投稿が見つからない場合は処理を終了します。
// 	$post = get_post($id);
// 	if (!$post) return;
// 	// 投稿が固定ページなど投稿以外の場合は処理を終了します。
// 	if ('post' != $post->post_name) return;

// 	// すでに予定の設定があれば除去します。
// 	$timestamp = wp_next_scheduled('post_expire', array($id));
// 	if (false !== $timestamp) {
// 		wp_clear_scheduled_hook('post_expire', array($id));
// 	}

// 	// 公開状態でない場合(すでに非公開など)は処理を終了します。
// 	if ('publish' != $post->post_status) return;

// 	// 公開日時の5分後に非公開にします。
// 	// ※ サンプル用です。実際には+30 days(30日)など長くするか、カスタムフィールドで公開期限欄を設けるなどします。
// 	// ※ 設定する日時はUTC(世界標準時)です。日本時間(JST)からは-9時間したものをセットしてください。
// 	$time = get_post_time('U', true, $id);
// 	$expire = strtotime('+1 minutes', $time);
// 	wp_schedule_single_event($expire, 'post_expire', array($id));
// }
// add_action('save_post', 'post_expire_schedule');
// /**
//  * 投稿を非公開にします。
//  */
// function post_expire($id)
// {
// 	// 本文の<iframe>タグなどが除去されてしまう(WP-Cronはユーザーなしで実行される)ため除去されないようにします。
// 	kses_remove_filters();
// 	// 非公開に変更
// 	wp_update_post(array('ID' => $id, 'post_status' => 'private'));
// }
// add_action('post_expire', 'post_expire');
