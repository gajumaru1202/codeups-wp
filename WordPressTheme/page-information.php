<?php get_header(); ?>
<main>
    <!-- インフォメーションmv -->
    <section class="information-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- インフォメーションコンテンツ -->
    <div class="information-content sub-information subpage-layout subpage-layout--information">
        <div class="information-content__inner inner">
            <div class="information-content__tab information-tab">
                <div class="information-tab__list">
                    <button class="information-tab__button js-tab-button is-active">
                        ライセンス<br class="sp-only" />講習
                    </button>
                    <button class="information-tab__button js-tab-button">
                        ファン<br class="sp-only" />ダイビング
                    </button>
                    <button class="information-tab__button js-tab-button">
                        体験<br class="sp-only" />ダイビング
                    </button>
                </div>

                <div class="information-tab__contents">
                    <!-- ライセンス講習 -->
                    <div class="information-tab__content js-tab-content is-active">
                        <div class="information-tab__text-wrap">
                            <p class="information-tab__title">ライセンス講習</p>
                            <p class="information-tab__description">
                                <?php echo nl2br(get_field('license_description')); ?>
                            </p>
                        </div>
                        <div class="information-tab__image">
                            <?php
                            $license_img_pc = get_field('license_image_pc');
                            $license_img_sp = get_field('license_image_sp');
                            ?>
                            <?php if ($license_img_pc && $license_img_sp): ?>
                                <picture>
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($license_img_pc['sizes']['large']); ?>">
                                    <img src="<?php echo esc_url($license_img_sp['sizes']['medium']); ?>" alt="<?php echo esc_attr($license_img_sp['alt']); ?>">
                                </picture>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- ファンダイビング -->
                    <div class="information-tab__content js-tab-content">
                        <div class="information-tab__text-wrap">
                            <p class="information-tab__title">ファンダイビング</p>
                            <p class="information-tab__description">
                                <?php echo nl2br(get_field('fun_description')); ?>
                            </p>
                        </div>
                        <div class="information-tab__image">
                            <?php
                            $fun_img_pc = get_field('fun_image_pc');
                            $fun_img_sp = get_field('fun_image_sp');
                            ?>
                            <?php if ($fun_img_pc && $fun_img_sp): ?>
                                <picture>
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($fun_img_pc['sizes']['large']); ?>">
                                    <img src="<?php echo esc_url($fun_img_sp['sizes']['medium']); ?>" alt="<?php echo esc_attr($fun_img_sp['alt']); ?>">
                                </picture>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- 体験ダイビング -->
                    <div class="information-tab__content js-tab-content">
                        <div class="information-tab__text-wrap">
                            <p class="information-tab__title">体験ダイビング</p>
                            <p class="information-tab__description">
                                <?php echo nl2br(get_field('trial_description')); ?>
                            </p>
                        </div>
                        <div class="information-tab__image">
                            <?php
                            $trial_img_pc = get_field('trial_image_pc');
                            $trial_img_sp = get_field('trial_image_sp');
                            ?>
                            <?php if ($trial_img_pc && $trial_img_sp): ?>
                                <picture>
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($trial_img_pc['sizes']['large']); ?>">
                                    <img src="<?php echo esc_url($trial_img_sp['sizes']['medium']); ?>" alt="<?php echo esc_attr($trial_img_sp['alt']); ?>">
                                </picture>
                            <?php endif; ?>
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