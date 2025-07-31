<?php
// --------------------
// テーマの初期設定
// --------------------
function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // RSSフィードを有効化
    add_theme_support('title-tag'); // <title>タグを自動出力
    add_theme_support('html5', array( // HTML5マークアップに対応
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');


// --------------------
// CSSとJavaScriptの読み込み
// --------------------
function my_script_init()
{
    // WordPressに含まれる古いjQueryを読み込まない
    wp_deregister_script('jquery');

    // jQuery CDN
    wp_enqueue_script(
        'jquery',
        '//code.jquery.com/jquery-3.6.1.min.js',
        array(),
        '3.6.1',
        true
    );

    // Swiper CSS & JS（CDN）
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css',
        array(),
        '10.0.0'
    );
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js',
        array(),
        '10.0.0',
        true
    );

    // InView.js
    wp_enqueue_script(
        'inview-js',
        'https://cdn.jsdelivr.net/npm/jquery-inview@1.1.2/jquery.inview.min.js',
        array('jquery'),
        '1.1.2',
        true
    );

    // メインのCSS（自作）
    wp_enqueue_style(
        'style-css',
        get_template_directory_uri() . '/assets/css/style.css',
        array('swiper-css'),
        '1.0.1'
    );

    // メインのJS（自作）
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/script.js',
        array('jquery', 'swiper-js', 'inview-js'),
        '1.0.1',
        true
    );

    // Google Fonts（個別に分けて読み込み）
    wp_enqueue_style(
        'font-gotu',
        'https://fonts.googleapis.com/css2?family=Gotu&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'font-noto-sans-jp',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'font-noto-serif',
        'https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'font-lato',
        'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'my_script_init');


// --------------------
// Google Fonts 用 preconnect を <head> に追加
// --------------------
function add_preconnect_links()
{
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'add_preconnect_links');


// カスタム投稿の表示件数の設定
function change_campaign_archive_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('campaign')) {
        $query->set('posts_per_page', 4);
    }
    if (is_tax('campaign_category')) {
        $query->set('posts_per_page', 4);
    }
    if (is_post_type_archive('voice')) {
        $query->set('posts_per_page', 6);
    }
    if (is_tax('voice_category')) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'change_campaign_archive_posts_per_page');


// キャンペーンのタクソノミー設定
function register_campaign_post_type()
{
    register_post_type('campaign', [
        'labels' => [
            'name' => 'キャンペーン',
            'singular_name' => 'キャンペーン'
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'campaign'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => ['campaign_category'],
    ]);
}
add_action('init', 'register_campaign_post_type');

function register_campaign_taxonomy()
{
    register_taxonomy(
        'campaign_category',
        'campaign',
        [
            'label' => 'キャンペーンカテゴリー',
            'hierarchical' => true,
            'rewrite' => ['slug' => 'campaign_category'],
            'public' => true,
        ]
    );
}
add_action('init', 'register_campaign_taxonomy');

// ボイスのタクソノミー設定
function register_voice_post_type()
{
    register_post_type('voice', [
        'labels' => [
            'name' => 'ボイス',
            'singular_name' => 'ボイス'
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'voice'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => ['voice_category'],
    ]);
}
add_action('init', 'register_voice_post_type');

function register_voice_taxonomy()
{
    register_taxonomy(
        'voice_category',
        'voice',
        [
            'label' => 'ボイスカテゴリー',
            'hierarchical' => true,
            'rewrite' => ['slug' => 'voice_category'],
            'public' => true,
        ]
    );
}
add_action('init', 'register_voice_taxonomy');

// 投稿→ブログに名称変更
function change_post_menu_label()
{
    global $menu;
    global $submenu;

    // メニュー名の変更
    $menu[5][0] = 'ブログ';

    // サブメニュー名の変更
    $submenu['edit.php'][5][0] = 'ブログ一覧';
    $submenu['edit.php'][10][0] = '新規追加';
}

function change_post_object_label()
{
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'ブログ';
    $labels->singular_name = 'ブログ';
    $labels->add_new = '新規追加';
    $labels->add_new_item = 'ブログを追加';
    $labels->edit_item = 'ブログを編集';
    $labels->new_item = '新しいブログ';
    $labels->view_item = 'ブログを表示';
    $labels->search_items = 'ブログを検索';
    $labels->not_found = 'ブログが見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱内にブログが見つかりませんでした';
}

add_action('admin_menu', 'change_post_menu_label');
add_action('init', 'change_post_object_label');

// カスタムパンくずリストの設定
function custom_breadcrumb_trail($trail)
{
    // 投稿一覧ページの場合
    if (is_home()) {
        $trail->trail[count($trail->trail) - 1]->set_title('ブログ一覧');
    }

    return $trail;
}
add_filter('bcn_after_fill', 'custom_breadcrumb_trail');


// Contact Form 7 の自動 <p>・<br> 挿入を無効化
add_filter('wpcf7_autop_or_not', '__return_false');
