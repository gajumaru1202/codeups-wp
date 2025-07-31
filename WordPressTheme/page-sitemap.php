<?php get_header(); ?>
<main>
    <!-- サイトマップmv -->
    <section class="sitemap-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- サイトマップセクション -->
    <div class="sitemap sub-sitemap subpage-layout">
        <div class="sitemap__inner inner">
            <div class="sitemap__menu">
                <div class="menu">
                    <div class="menu__inner">
                        <div class="menu__items menu__items--sitemap">
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">キャンペーン</a>
                                    </div>
                                    <div class="menu__link-sub menu__link-sub--sitemap">
                                        <?php
                                        $license     = get_term_by('slug', 'license', 'campaign_category');
                                        $fun  = get_term_by('slug', 'fun', 'campaign_category');
                                        $experience       = get_term_by('slug', 'experience', 'campaign_category');
                                        ?>

                                        <?php if ($license) : ?>
                                            <a href="<?php echo esc_url(get_term_link($license)); ?>">ライセンス取得</a>
                                        <?php endif; ?>

                                        <?php if ($fun) : ?>
                                            <a href="<?php echo esc_url(get_term_link($fun)); ?>">ファンダイビング</a>
                                        <?php endif; ?>

                                        <?php if ($experience) : ?>
                                            <a href="<?php echo esc_url(get_term_link($experience)); ?>">体験ダイビング</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(home_url("/about-us")) ?>">私たちについて</a>
                                    </div>
                                </div>
                            </div>

                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
                                    </div>
                                    <div class="menu__link-sub menu__link-sub--sitemap">
                                        <a href="<?php echo esc_url(home_url('/information?tab=license')); ?>">ライセンス講習</a>
                                        <a href="<?php echo esc_url(home_url('/information?tab=fun')); ?>">ファンダイビング</a>
                                        <a href="<?php echo esc_url(home_url('/information?tab=experience')); ?>">体験ダイビング</a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">お客様の声</a>
                                    </div>
                                    <div class="menu__link-sub">
                                        <?php
                                        $license     = get_term_by('slug', 'license', 'voice_category');
                                        $fun  = get_term_by('slug', 'fun', 'voice_category');
                                        $experience       = get_term_by('slug', 'experience', 'voice_category');
                                        ?>

                                        <?php if ($license) : ?>
                                            <a href="<?php echo esc_url(get_term_link($license)); ?>">ライセンス取得</a>
                                        <?php endif; ?>

                                        <?php if ($fun) : ?>
                                            <a href="<?php echo esc_url(get_term_link($fun)); ?>">ファンダイビング</a>
                                        <?php endif; ?>

                                        <?php if ($experience) : ?>
                                            <a href="<?php echo esc_url(get_term_link($experience)); ?>">体験ダイビング</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div
                                        class="menu__link-main menu__link-main--black menu__link-main--lineheight">
                                        <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="sp-only" />ポリシー</a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu__item">
                                <div class="menu__link-wrap menu__link-wrap--black">
                                    <div class="menu__link-main menu__link-main--black">
                                        <a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- コンタクトセクション -->
    <?php get_template_part('template-parts/common/section-contact'); ?>

    <!-- ページトップボタン -->
    <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>