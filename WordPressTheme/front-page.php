<?php get_header(); ?>
<main>
  <!-- mv -->
  <section class="top-mv mv js-mv">
    <div class="mv__inner">
      <div class="mv__title-wrap mv-title js-mv-title">
        <h1 class="mv-title__main">diving</h1>
        <span class="mv-title__sub">into the ocean</span>
      </div>

      <div class="mv__loading mv-loading js-loading-image">
        <div class="mv-loading__image-wrap">
          <div class="mv-loading__image-left">
            <?php
            $loading_left_pc_id = get_field('loading_image_left_pc');
            $loading_left_sp_id = get_field('loading_image_left_sp');
            $image_pc = wp_get_attachment_image_src($loading_left_pc_id, 'full');
            $image_sp = wp_get_attachment_image_src($loading_left_sp_id, 'full');
            $alt = get_post_meta($loading_left_pc_id, '_wp_attachment_image_alt', true);
            ?>
            <picture>
              <source media="(min-width: 768px)" srcset="<?php echo esc_url($image_pc[0]); ?>" />
              <img src="<?php echo esc_url($image_sp[0]); ?>" alt="<?php echo esc_attr($alt); ?>" />
            </picture>
          </div>

          <div class="mv-loading__image-right">
            <?php
            $loading_right_pc_id = get_field('loading_image_right_pc');
            $loading_right_sp_id = get_field('loading_image_right_sp');
            $image_pc = wp_get_attachment_image_src($loading_right_pc_id, 'full');
            $image_sp = wp_get_attachment_image_src($loading_right_sp_id, 'full');
            $alt = get_post_meta($loading_right_pc_id, '_wp_attachment_image_alt', true);
            ?>
            <picture>
              <source media="(min-width: 768px)" srcset="<?php echo esc_url($image_pc[0]); ?>" />
              <img src="<?php echo esc_url($image_sp[0]); ?>" alt="<?php echo esc_attr($alt); ?>" />
            </picture>
          </div>
        </div>

        <div class="mv-loading__title mv-title js-loading-title">
          <span class="mv-title__main">diving</span>
          <span class="mv-title__sub">into the ocean</span>
        </div>
      </div>

      <div class="mv__slider swiper js-mv-slider">
        <div class="mv__swiper-wrapper swiper-wrapper">
          <?php for ($i = 1; $i <= 4; $i++): ?>
            <?php
            $image_pc_id = get_field('mv_slide' . $i . '_pc');
            $image_sp_id = get_field('mv_slide' . $i . '_sp');
            $image_pc = wp_get_attachment_image_src($image_pc_id, 'full');
            $image_sp = wp_get_attachment_image_src($image_sp_id, 'full');
            $alt = get_post_meta($image_pc_id, '_wp_attachment_image_alt', true);
            ?>
            <?php if ($image_pc && $image_sp): ?>
              <div class="mv__swiper-slide swiper-slide">
                <picture>
                  <source media="(min-width: 500px)" srcset="<?php echo esc_url($image_pc[0]); ?>" />
                  <img src="<?php echo esc_url($image_sp[0]); ?>" alt="<?php echo esc_attr($alt); ?>" />
                </picture>
              </div>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  </section>


  <!-- キャンペーンセクション -->
  <section class="campaign top-campaign">
    <div class="campaign__inner inner">
      <div class="campaign__heading">
        <div class="section-heading">
          <h2 class="section-heading__main">Campaign</h2>
          <p class="section-heading__sub">キャンペーン</p>
        </div>
      </div>
      <div class="campaign__cards campaign-cards">
        <div class="campaign-cards__slider swiper js-campaign-slider">
          <div class="campaign-cards__swiper-wrapper swiper-wrapper">

            <?php
            $args = array(
              'post_type'      => 'campaign',
              'posts_per_page' => 8,
              'orderby'        => 'date',
              'order'          => 'DESC'
            );
            $campaign_query = new WP_Query($args);
            if ($campaign_query->have_posts()) :
              while ($campaign_query->have_posts()) :
                $campaign_query->the_post();
            ?>
                <div class="campaign-cards__swiper-slide swiper-slide">
                  <div class="campaign-cards__item">
                    <div class="campaign-card">
                      <div class="campaign-card__image">
                        <?php
                        $image = get_field('campaign_image');
                        if ($image) echo wp_get_attachment_image($image, 'medium');
                        ?>
                      </div>
                      <div class="campaign-card__content">
                        <div class="campaign-card__badge">
                          <div class="campaign-card__badge-label">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'campaign_category');
                            if ($terms && !is_wp_error($terms)) {
                              echo '<span>' . esc_html($terms[0]->name) . '</span>';
                            }
                            ?>
                          </div>
                          <p class="campaign-card__badge-title">
                            <?php the_field('campaign_title'); ?>
                          </p>
                        </div>
                        <p class="campaign-card__description">
                          全部コミコミ(お一人様)
                        </p>
                        <div class="campaign-card__price">
                          <span class="campaign-card__price-original">¥<?php the_field('campaign_price_old'); ?></span>
                          <span class="campaign-card__price-discounted">¥<?php the_field('campaign_price_new'); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
              endwhile;
              wp_reset_postdata();
            else :
              echo '<p>キャンペーン情報は現在ありません。</p>';
            endif;
            ?>
          </div>
        </div>
        <div class="campaign-cards__swiper-button-prev swiper-button-prev"></div>
        <div class="campaign-cards__swiper-button-next swiper-button-next"></div>
      </div>
      <div class="campaign__button">
        <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">
          <span class="button__bg-white"></span>
          <p class="button__link">View more</p>
        </a>
      </div>
    </div>
  </section>

  <!-- アバウトセクション -->
  <?php
  $about_page = get_page_by_path('about-us');
  $about_text = '';

  if ($about_page) {
    $about_text = get_field('about_text', $about_page->ID);
  }
  ?>
  <section class="about top-about">
    <div class="about__inner inner">
      <div class="about__heading">
        <div class="section-heading">
          <h2 class="section-heading__main">About us</h2>
          <p class="section-heading__sub">私たちについて</p>
        </div>
      </div>
      <div class="about__contents about-contents">
        <div class="about-contents__visual-wrap">
          <div class="about-contents__visual-scenery">
            <picture>
              <source
                media="(min-width: 768px)"
                srcset="<?php echo esc_url(get_theme_file_uri("./assets/images/common/about1-pc.jpg")); ?>" />
              <img
                src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/about1-sp.jpg")); ?>"
                alt="青空と瓦屋根のシーサー" />
            </picture>
          </div>
          <div class="about-contents__visual-underwater">
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
        <div class="about-contents__body">
          <h3 class="about-contents__title">Dive into <br />the Ocean</h3>
          <div class="about-contents__info-wrapper">
            <p class="about-contents__text">
              <?php
              if ($about_text) {
                echo nl2br(wp_kses_post($about_text));
              } else {
                echo 'アバウトページの本文がまだ入力されていません。';
              }
              ?>
            </p>

            <div class="about-contents__button">
              <a href="<?php echo esc_url(home_url("/about-us")) ?>" class="button">
                <span class="button__bg-white"></span>
                <p class="button__link">View more</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- インフォメーションセクション -->
  <section class="information top-information">
    <div class="information__inner inner">
      <div class="information__heading">
        <div class="section-heading">
          <h2 class="section-heading__main">Information</h2>
          <p class="section-heading__sub">ダイビング情報</p>
        </div>
      </div>
      <div class="information__content">
        <div class="information__color-box color-box js-color-box">
          <div class="information__image">
            <img
              src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/information.jpg")); ?>"
              alt="珊瑚礁で黄色い熱帯魚が泳いでいる様子" />
          </div>
        </div>
        <div class="information__body">
          <p class="information__body-title">ライセンス講習</p>
          <p class="information__body-text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__button">
            <a href="<?php echo esc_url(home_url("/information")) ?>" class="button">
              <span class="button__bg-white"></span>
              <p class="button__link">View more</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ブログセクション -->
  <section class="blog top-blog">
    <div class="blog__inner inner">
      <div class="blog__heading">
        <div class="section-heading">
          <h2 class="section-heading__main section-heading__main--white">Blog</h2>
          <p class="section-heading__sub section-heading__sub--white">ブログ</p>
        </div>
      </div>

      <div class="blog__cards blog-cards">
        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
        );
        $blog_query = new WP_Query($args);

        if ($blog_query->have_posts()) :
          while ($blog_query->have_posts()) :
            $blog_query->the_post();
        ?>
            <div class="blog-cards__item">
              <a href="<?php the_permalink(); ?>" class="blog-card">
                <div class="blog-card__image">
                  <?php
                  $image = get_field('blog_image_1');
                  if ($image) :
                    echo wp_get_attachment_image($image, 'medium', false, [
                      'alt' => get_post_meta($image, '_wp_attachment_image_alt', true)
                    ]);
                  else :
                  ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/noimage.jpg" alt="No image" />
                  <?php endif; ?>
                </div>

                <div class="blog-card__body">
                  <div class="blog-card__meta">
                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="blog-card__date">
                      <?php echo get_the_date('Y.m/d'); ?>
                    </time>
                    <span class="blog-card__title">
                      <?php the_field('blog_title'); ?>
                    </span>
                  </div>
                  <p class="blog-card__text">
                    <?php
                    $text = get_field('blog_text_main');
                    echo wp_trim_words($text, 90, '…');
                    ?>
                  </p>
                </div>
              </a>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>

      <div class="blog__button">
        <a href="<?php echo esc_url(home_url("/blog")); ?>" class="button">
          <span class="button__bg-white"></span>
          <p class="button__link">View more</p>
        </a>
      </div>
    </div>
  </section>


  <!-- ボイスセクション -->
  <section class="voice top-voice">
    <div class="voice__inner inner">
      <div class="voice__heading">
        <div class="section-heading">
          <h2 class="section-heading__main">Voice</h2>
          <p class="section-heading__sub">お客様の声</p>
        </div>
      </div>
      <div class="voice__cards voice-cards">
        <?php
        $args = array(
          'post_type'      => 'voice',
          'posts_per_page' => 2,
          'orderby'        => 'date',
          'order'          => 'DESC'
        );
        $voice_query = new WP_Query($args);
        if ($voice_query->have_posts()) :
          while ($voice_query->have_posts()) :
            $voice_query->the_post();
        ?>
            <div class="voice-cards__item">
              <div class="voice-card">
                <div class="voice-card__info">
                  <div class="voice-card__profile">
                    <div class="voice-card__meta">
                      <p class="voice-card__age"><?php the_field('voice_age'); ?></p>
                      <?php
                      $terms = get_the_terms(get_the_ID(), 'voice_category');
                      if ($terms && !is_wp_error($terms)) :
                        echo '<div class="voice-card__label">';
                        foreach ($terms as $term) {
                          echo '<span>' . esc_html($term->name) . '</span>';
                        }
                        echo '</div>';
                      endif;
                      ?>
                    </div>
                    <p class="voice-card__title">
                      <?php the_field('voice_title'); ?>
                    </p>
                  </div>
                  <div class="voice-card__color-box color-box js-color-box">
                    <div class="voice-card__image">
                      <?php
                      $image_id = get_field('voice_image');
                      if ($image_id) {
                        echo wp_get_attachment_image($image_id, 'medium');
                      } else {
                        echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/common/noimage.jpg" alt="No image">';
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="voice-card__message">
                  <p class="voice-card__text">
                    <?php echo nl2br(get_field('voice_text')); ?>
                  </p>
                </div>
              </div>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
          echo '<p>お客様の声はまだありません。</p>';
        endif;
        ?>
      </div>

      <div class="voice__button">
        <a href="<?php echo esc_url(home_url("/voice")) ?>" class="button">
          <span class="button__bg-white"></span>
          <p class="button__link">View more</p>
        </a>
      </div>
    </div>
  </section>

  <!-- プライスセクション -->
  <section class="price top-price">
    <div class="price__inner inner">
      <div class="price__heading">
        <div class="section-heading">
          <h2 class="section-heading__main">Price</h2>
          <p class="section-heading__sub">料金一覧</p>
        </div>
      </div>

      <div class="price__content">
        <div class="price__color-box color-box js-color-box">
          <div class="price__image">
            <picture>
              <source
                media="(min-width: 500px)"
                srcset="<?php echo esc_url(get_theme_file_uri("./assets/images/common/price-pc.jpg")); ?>" />
              <img
                src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/price-sp.jpg")); ?>"
                alt="赤い魚の群れが泳いでいる様子" />
            </picture>
          </div>
        </div>

        <div class="price__list price-list">
          <?php
          $price_page = get_page_by_path('price');
          if ($price_page) {
            $price_data = SCF::get('price_list', $price_page->ID);

            if (!empty($price_data)) :
              $grouped_data = [];

              foreach ($price_data as $item) {
                $category = $item['category_title'];
                if (!isset($grouped_data[$category])) {
                  $grouped_data[$category] = [];
                }
                $grouped_data[$category][] = $item;
              }

              foreach ($grouped_data as $category_title => $courses) :
          ?>
                <div class="price-list__category">
                  <p class="price-list__category-title"><?php echo esc_html($category_title); ?></p>
                  <ul class="price-list__items">
                    <?php foreach ($courses as $course) : ?>
                      <li class="price-list__item">
                        <span class="price-list__item-name">
                          <span class="pc-only"><?php echo esc_html(str_replace("\n", ' ', $course['course_name'])); ?></span>
                          <span class="sp-only"><?php echo nl2br(esc_html($course['course_name'])); ?></span>
                        </span>
                        <span class="price-list__item-price"><?php echo esc_html($course['course_price']); ?></span>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
          <?php
              endforeach;
            endif;
          }
          ?>
        </div>
      </div>

      <div class="price__button">
        <a href="<?php echo esc_url(home_url('/price')); ?>" class="button">
          <span class="button__bg-white"></span>
          <p class="button__link">View more</p>
        </a>
      </div>
    </div>
  </section>

  <!-- コンタクトセクション -->
  <?php get_template_part('template-parts/common/section-contact'); ?>

  <!-- ページトップボタン -->
  <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>