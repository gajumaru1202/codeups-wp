<?php get_header(); ?>
<main>
  <!-- アバウトmv -->
  <section class="about-mv">
    <?php get_template_part('template-parts/common/mv'); ?>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('template-parts/common/breadcrumb'); ?>

  <!-- アバウトボディセクション -->
  <section
    class="about-body sub-about subpage-layout subpage-layout--about">
    <div class="about-body__inner inner">
      <div
        class="about-body__contents about-contents about-contents--details">
        <div
          class="about-contents__visual-wrap about-contents__visual-wrap--details">
          <div class="about-contents__visual-scenery pc-only">
            <img
              src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/about1-pc.jpg")); ?>"
              alt="青空と瓦屋根のシーサー" />
          </div>
          <div
            class="about-contents__visual-underwater about-contents__visual-underwater--details">
            <picture>
              <source
                media="(min-width: 768px)"
                srcset="<?php echo esc_url(get_theme_file_uri("./assets/images/common/about2-pc.jpg")); ?>" />
              <img
                src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/about2-sp.jpg")); ?>"
                alt="青い海の中を泳ぐ黄色い魚" />
            </picture>
          </div>
        </div>
        <div class="about-contents__body about-contents__body--details">
          <h3 class="about-contents__title about-contents__title--details">
            Dive into <br />the Ocean
          </h3>
          <div
            class="about-contents__info-wrapper about-contents__info-wrapper--details">
            <p class="about-contents__text about-contents__text--details">
              <?php
              $about_text = get_field('about_text');
              if ($about_text) {
                echo nl2br(wp_kses_post($about_text));
              } else {
                echo 'アバウトの本文を管理画面から入力してください。';
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- アバウトギャラリーセクション -->
  <section class="about-gallery sub-about-gallery">
    <div class="about-gallery__inner inner">
      <div class="about-gallery__heading">
        <div class="section-heading">
          <h2 class="section-heading__main">Gallery</h2>
          <p class="section-heading__sub">フォト</p>
        </div>
      </div>

      <ul class="about-gallery__contents">
        <?php
        $gallery_items = SCF::get('gallery');
        if (!empty($gallery_items)) :
          foreach ($gallery_items as $item) :
            $pc_image_id = $item['pc_image'];
            $sp_image_id = $item['sp_image'];

            $pc_image = wp_get_attachment_image_src($pc_image_id, 'full');
            $sp_image = wp_get_attachment_image_src($sp_image_id, 'full');

            $alt_text = get_post_meta($sp_image_id, '_wp_attachment_image_alt', true);

            if (empty($alt_text)) {
              $alt_text = get_the_title($sp_image_id);
            }
        ?>
            <li class="about-gallery__list">
              <a href="#" class="about-gallery__item js-modal-open">
                <picture>
                  <source
                    media="(min-width: 768px)"
                    srcset="<?php echo esc_url($pc_image[0]); ?>" />
                  <img
                    src="<?php echo esc_url($sp_image[0]); ?>"
                    alt="<?php echo esc_attr($alt_text); ?>" />
                </picture>
              </a>
            </li>
        <?php endforeach;
        endif; ?>
      </ul>



      <div class="about-gallery__modal modal js-modal"></div>
    </div>
  </section>

  <!-- コンタクトセクション -->
  <?php get_template_part('template-parts/common/section-contact'); ?>

  <!-- ページトップボタン -->
  <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>