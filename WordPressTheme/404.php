<?php get_header(); ?>
<main>
    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- 404セクション -->
    <section class="error sub-error">
        <div class="error__inner inner">
            <h1 class="error__heading">404</h1>
            <div class="error__content">
                <p class="error__text">
                    申し訳ありません。<br />
                    お探しのページが見つかりません。
                </p>
                <div class="error__button">
                    <a href="<?php echo esc_url(home_url("/")) ?>" class="button button--error">
                        <span class="button__bg-white button__bg-white--error"></span>
                        <p class="button__link button__link--error">Page TOP</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>