<?php
// ページごとにタイトルと画像を条件で設定
if (is_post_type_archive('campaign') || is_tax('campaign_category')) {
    $mv_title = 'Campaign';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/campaign-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/campaign-mv-sp.jpg');
    $mv_alt = '青い海に２匹の黄色い熱帯魚が泳いでいる様子';
} elseif (is_post_type_archive('voice') || is_tax('voice_category') || (is_singular('voice'))) {
    $mv_title = 'Voice';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/voice-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/voice-mv-sp.jpg');
    $mv_alt = '5人のダイバーがエメラルドグリーンの海の上に浮いている様子';
} elseif (is_page('about-us')) {
    $mv_title = 'About us';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/about-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/about-mv-sp.jpg');
    $mv_alt = 'シーサーの写真';
} elseif (is_page('information')) {
    $mv_title = 'Information';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/information-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/information-mv-sp.jpg');
    $mv_alt = '岩場の近くダイビングをしていて、周りに多数の魚が泳いでいる様子';
} elseif (is_home() || is_post_type_archive('blog') || is_archive() || (is_singular('post'))) {
    $mv_title = 'Blog';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/blog-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/blog-mv-sp.jpg');
    $mv_alt = '光が差し込む青い海に魚の群れが泳いでいる様子';
} elseif (is_page('price')) {
    $mv_title = 'Price';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/price-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/price-mv-sp.jpg');
    $mv_alt = '海面からダイバーのシュノーケルが見えている写真';
} elseif (is_page('faq')) {
    $mv_title = 'FAQ';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/faq-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/faq-mv-sp.jpg');
    $mv_alt = '白い砂浜と透き通った青い海があるビーチで複数人が遊んでいる写真';
} elseif (is_page(array('contact', 'thanks'))) {
    $mv_title = 'Contact';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/contact-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/contact-mv-sp.jpg');
    $mv_alt = '緑色の海に白い漣が映っている様子';
} elseif (is_page('sitemap')) {
    $mv_title = 'Site MAP';
    $mv_image_pc = get_theme_file_uri('/assets/images/common/site-mv-pc.jpg');
    $mv_image_sp = get_theme_file_uri('/assets/images/common/site-mv-sp.jpg');
    $mv_alt = '複数の熱帯魚が珊瑚の周りを泳いでいる様子';
}
?>


<section class="page-mv js-mv">
    <div class="page-mv__inner">
        <div class="page-mv__title">
            <h1 class="page-mv__main-title"><?php echo esc_html($mv_title); ?></h1>
        </div>
        <div class="page-mv__image">
            <picture>
                <source media="(min-width: 768px)" srcset="<?php echo esc_url($mv_image_pc); ?>" />
                <img src="<?php echo esc_url($mv_image_sp); ?>" alt="<?php echo esc_attr($mv_alt); ?>" />
            </picture>
        </div>
    </div>
</section>