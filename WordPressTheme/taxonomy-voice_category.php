<?php get_header(); ?>
<main>
    <!-- ボイスmv -->
    <section class="voice-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- ボイスリストセクション -->
    <div class="voice-list sub-voice subpage-layout">
        <div class="voice-list__inner inner">
            <?php get_template_part('template-parts/voice/tabs'); ?>

            <!-- 投稿ループ -->
            <div class="voice-list__cards">
                <?php get_template_part('template-parts/voice/loop-card'); ?>
            </div>
            <!-- ページネーション -->
            <div class="voice-list__pagination">
                <?php get_template_part('template-parts/common/paginations'); ?>
            </div>
        </div>
    </div>

    <!-- コンタクトセクション -->
    <?php get_template_part('template-parts/common/section-contact'); ?>

    <!-- ページトップボタン -->
    <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>