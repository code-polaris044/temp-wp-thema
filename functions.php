<?php

// --------------------------------
// ページタイトル出力
// --------------------------------

function portfolio_theme_setup()
{
	add_theme_support('title-tag');
}

add_action('after_setup_theme', 'portfolio_theme_setup');

// --------------------------------
// metaタグ非常設定
// --------------------------------

// wp バージョン情報削除
remove_action('wp_head', 'wp_generator');

// meta name='robots' content='max-image-preview:large' を非表示にする
remove_filter('wp_robots', 'wp_robots_max_image_preview_large');

// meta name="generator" を非表示にする
remove_action('wp_head', 'wp_generator');

// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');

// wlwmanifestを非表示にする
remove_action('wp_head', 'wlwmanifest_link');

// 絵文字用JS・CSSを非表示にする
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// dns-prefetchを非表示にする
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
	if ('dns-prefetch' === $relation_type) {
		return array_diff(wp_dependencies_unique_hosts(), $hints);
	}
	return $hints;
}

//rel="next" rel="prev" を非表示にする
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// WordPress提供のjquery.jsを読み込まない
function no_jQuery_frontend()
{
	if (!is_admin()) {
		wp_deregister_script('jquery');
	}
}
add_action('wp_enqueue_scripts', 'no_jQuery_frontend');

// --------------------------------
// JS・CSSファイルを読み込む
// --------------------------------

// できたら設定
function body_hook()
{
	echo '<!--Google Analytics,Cookie配置予定-->';
}

add_action('wp_body_open', 'body_hook');

function add_files()
{
	// fontawesome
	wp_enqueue_script('fontawesomeJs', '//kit.fontawesome.com/ebc2ff5fc3.js', array(), null, true);

	// ftailwind
	wp_enqueue_style('tailwindcss', '//unpkg.com/tailwindcss@^2/dist/tailwind.min.css', array(), 20230626, false);

	// ajaxzip3
	wp_enqueue_script('fajaxzip3', '//ajaxzip3.github.io/ajaxzip3.js', array(), null, false);

	// scrollreveal
	wp_enqueue_script('scrollreveal', '//unpkg.com/scrollreveal', array(), null, true);

	// popperjs
	wp_enqueue_script('popperjs', '//unpkg.com/@popperjs/core@2', array(), null, true);

	// tippy.js
	wp_enqueue_script('tippyjs', '//unpkg.com/tippy.js@6', array(), null, true);

	// splidejs
	wp_enqueue_script('splidejs', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js', array(), null, true);

	// splidecss
	wp_enqueue_style('splidecss', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css', array(), null, false);
	wp_enqueue_script('splideAuto', '//cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js', array(), null, false);

	// サイト共通のCSSの読み込み
	wp_enqueue_style('main', get_template_directory_uri() . '/dist/css/style.css', array(), '20230629', false);

	// サイト共通JS
	wp_enqueue_script('script', get_template_directory_uri() . '/dist/js/index.js', array(), '20230630', true);
}
add_action('wp_enqueue_scripts', 'add_files');

// --------------------------------
// ブロックエディタにテーマ内のcssを反映
// --------------------------------
add_action('after_setup_theme', 'nxw_setup_theme');
function nxw_setup_theme()
{
	add_theme_support('wp-block-styles');
}

// ------------------------------
// メニューウィジット追加
// ------------------------------
function my_theme_widgets_init()
{
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'main-sidebar',
	));
}
add_action('widgets_init', 'my_theme_widgets_init');

// ------------------------------
// siteurl
// ------------------------------
add_shortcode('surl', 'shortcode_surl');
function shortcode_surl()
{
	return site_url();
}
// ------------------------------
// ショートコード設定
// ------------------------------
function siteurl_shortcode()
{
	return site_url();
}
add_shortcode('siteurl', 'siteurl_shortcode');
function themeurl_shortcode()
{
	return get_bloginfo('template_url');
}
add_shortcode('themeurl', 'themeurl_shortcode');

// ------------------------------
// アイキャッチ画像を有効にする。
// ------------------------------
add_theme_support('post-thumbnails');

// ------------------------------
// the_archive_title 余計な文字を削除
// ------------------------------
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_date()) {
		$title = get_the_time('Y年n月');
	} elseif (is_search()) {
		$title = '検索結果：' . esc_html(get_search_query(false));
	} elseif (is_404()) {
		$title = '「404」ページが見つかりません';
	} else {
	}
	return $title;
});

// カテゴリーとタグのmeta descriptionからpタグを除去
remove_filter('term_description', 'wpautop');

// ------------------------------
// 記事IDを投稿画面に表示させる
// ------------------------------
function add_posts_columns_postid($columns)
{
	$columns['postid'] = 'ID';
	return $columns;
}
function add_posts_columns_postid_row($column_name, $post_id)
{
	if ('postid' == $column_name) {
		echo $post_id;
	}
}
add_filter('manage_posts_columns', 'add_posts_columns_postid');
add_action('manage_posts_custom_column', 'add_posts_columns_postid_row', 10, 2);

// ------------------------------
//サイト内検索で日本語の種類を区別しない 
// ------------------------------
function change_search_char($where, $obj)
{
	if ($obj->is_search) {
		$where = str_replace(".post_title", ".post_title COLLATE utf8_unicode_ci", $where);
		$where = str_replace(".post_content", ".post_content COLLATE utf8_unicode_ci", $where);
	}
	return $where;
}
add_filter('posts_where', 'change_search_char', 10, 2);


// ------------------------------
//メニュー説明
// ------------------------------
function edit_menu_link($atts, $item)
{
	// メニュー項目が「説明」を持っている場合
	if (!empty($item->description)) {
		// リンクにdata-desc属性を追加する
		$atts['data-desc'] = $item->description;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'edit_menu_link', 10, 2);

// ------------------------------
// カスタム投稿のパーマリンク設定
// ------------------------------
//パーマリンクからタクソノミー名を削除
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy)
{
	return str_replace('/' . $taxonomy . '/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set', 11, 3);

//リライトルールの追加	
//★それぞれownersblogはカスタム投稿タイプ名、ownersblog-catはカスタムタクソノミー名を挿入

//↓カスタム投稿タイプの一覧ページ
add_rewrite_rule('works/page/([0-9]+)/?$', 'index.php?post_type=works&paged=$matches[1]', 'top');

//↓親タームに属する記事ページ
add_rewrite_rule('works/([^/]+)/([0-9]+)/?$', 'index.php?post_type=works&p=$matches[2]', 'top');

//↓親ターム一覧ページ
add_rewrite_rule('works/([^/]+)/?$', 'index.php?shop_cat=$matches[1]', 'top');
add_rewrite_rule('works/([^/]+)/page/([0-9]+)/?$', 'index.php?shop_cat=$matches[1]&paged=$matches[2]', 'top');

//↓子ターム一覧ページ
add_rewrite_rule('works/([^/]+)/([^/]+)/?$', 'index.php?shop_cat=$matches[2]', 'top');
add_rewrite_rule('works/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?shop_cat=$matches[1]&paged=$matches[2]', 'top');


// タクソノミー未選択公開時にデフォルトで特定のタームを選択させる

function add_defaulttaxonomy($post_ID)
{
	global $wpdb;
	//カスタム分類のタームを取得
	$curTerm = wp_get_object_terms($post_ID, 'shop_cat'); //★カスタムタクソノミー名
	//ターム指定数が未設定の時に特定のタームを指定
	if (0 == count($curTerm)) {
		$defaultTerm = array(1); //★選択させたいタームID
		wp_set_object_terms($post_ID, $defaultTerm, 'shop_cat'); //★カスタムタクソノミー名
	}
}
//カスタム投稿
add_action('publish_works', 'add_defaulttaxonomy'); //★publish_カスタム投稿タイプ名


// ------------------------------
// カスタム投稿のパーマリンク設定
// ------------------------------
add_action(
	'pre_get_posts',
	function ($query) {
		if (is_admin() && !$query->is_main_query()) {
			return;
		}
		if (is_tax('shop_cat')) {
			$query->set('posts_per_page', 9);
			return;
		}
	}
);

function change_posts_per_page($query)
{
	if (is_admin() || !$query->is_main_query())
		return;
	if ($query->is_post_type_archive('gallery')) { //カスタム投稿タイプを指定
		$query->set('posts_per_page', 9); //表示件数を指定
	}
}
add_action('pre_get_posts', 'change_posts_per_page');

/* ---------- カスタム投稿のサムネイル有効 ---------- */

add_theme_support('post-thumbnails');

/* ---------- 「投稿」の表記変更 ---------- */
function Change_menulabel()
{
	global $menu;
	global $submenu;
	$name = '新着情報';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name . '一覧';
	$submenu['edit.php'][10][0] = '新規' . $name . '投稿';
}
function Change_objectlabel()
{
	global $wp_post_types;
	$name = '新着情報';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name . 'の新規追加';
	$labels->edit_item = $name . 'の編集';
	$labels->new_item = '新規' . $name;
	$labels->view_item = $name . 'を表示';
	$labels->search_items = $name . 'を検索';
	$labels->not_found = $name . 'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=img_arrangement', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=img_bouquet', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=img_bridal', 'acf_set_featured_image', 10, 3);
add_filter('acf/update_value/name=img_other', 'acf_set_featured_image', 10, 3);


// topページの投稿数
add_action('pre_get_posts', 'my_pre_get_posts_number');
function my_pre_get_posts_number($query)
{
	if (is_admin() || !$query->is_main_query()) return;
	if ($query->is_home()) {
		$query->set('posts_per_page', 5); //5件 
	}
}

// モバイル端末のアーカイブの投稿数変更
function mobile_archive_posts_per_page($query)
{
	if (wp_is_mobile() && $query->is_archive() && $query->is_main_query()) {
		$query->set('posts_per_page', 6); // 6件表示
	}
}
add_action('pre_get_posts', 'mobile_archive_posts_per_page');
