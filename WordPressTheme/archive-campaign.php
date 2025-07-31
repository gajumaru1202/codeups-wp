<?php get_header(); ?>
<main>
  <!-- キャンペーンmv -->
  <section class="campaign-mv">
    <?php get_template_part('template-parts/common/mv'); ?>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('template-parts/common/breadcrumb'); ?>

  <!-- キャンペーンリストセクション -->
  <section class="campaign-list sub-campaign subpage-layout">
    <div class="campaign-list__inner inner">
      <?php get_template_part('template-parts/campaign/tabs'); ?>

      <!-- カード表示 -->
      <div class="campaign-list__card-wrap campaign-list-cards">
        <?php get_template_part('template-parts/campaign/loop-card'); ?>
      </div>

      <!-- ページネーション -->
      <div class="campaign-list__pagination">
        <?php get_template_part('template-parts/common/paginations'); ?>
      </div>
    </div>
  </section>

  <!-- コンタクトセクション -->
  <?php get_template_part('template-parts/common/section-contact'); ?>

  <!-- ページトップボタン -->
  <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>