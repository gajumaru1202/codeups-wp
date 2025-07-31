<?php get_header(); ?>

<main>

    <?php
    $page_data = [
        'privacypolicy'     => 'プライバシーポリシー',
        'terms-of-service'  => '利用規約',
    ];

    $current_slug = get_post_field('post_name', get_post());

    if (array_key_exists($current_slug, $page_data)) :
        $page_title = $page_data[$current_slug];
        $page_heading = $page_title;
        $page_en_title = ($current_slug === 'privacypolicy') ? 'Privacy Policy' : 'Terms of Service';
    ?>

        <!-- ▼ MVセクション -->
        <section class="<?php echo esc_attr($current_slug); ?>-mv page-mv js-mv">
            <div class="page-mv__inner">
                <div class="page-mv__title">
                    <h1 class="page-mv__main-title"><?php echo esc_html($page_en_title); ?></h1>
                </div>
                <div class="page-mv__image">
                    <picture>
                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri('./assets/images/common/site-mv-pc.jpg')); ?>" />
                        <img src="<?php echo esc_url(get_theme_file_uri('./assets/images/common/site-mv-sp.jpg')); ?>" alt="海面からダイバーのシュノーケルが見えている写真" />
                    </picture>
                </div>
            </div>
        </section>

        <!-- ▼ パンくずリスト -->
        <?php get_template_part('template-parts/common/breadcrumb'); ?>

        <!-- ▼ policy セクション（本文） -->
        <section class="policy sub-policy subpage-layout">
            <div class="policy__inner inner">
                <div class="policy__heading">
                    <h2><?php echo esc_html($page_heading); ?></h2>
                </div>
                <div class="policy__contents">
                    <div class="policy-contents">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <!-- ▼ 共通：コンタクトセクション -->
    <?php get_template_part('template-parts/common/section-contact'); ?>

    <!-- ▼ ページトップボタン -->
    <div class="page-top-button js-page-top"></div>

</main>

<?php get_footer(); ?>