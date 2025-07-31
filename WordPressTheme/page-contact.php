<?php get_header(); ?>
<main>
    <!-- コンタクトmv -->
    <section class="contact-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- コンタクトフォーム -->
    <div class="contact-confirm sub-contact-confirm subpage-layout">
        <div class="contact-confirm__inner inner">
            <div class="contact-confirm__form">
                <?php echo do_shortcode('[contact-form-7 id="312" title="問い合わせフォーム"]'); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>