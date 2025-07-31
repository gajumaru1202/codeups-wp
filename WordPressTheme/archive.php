<?php get_header(); ?>
<main>
    <!-- ブログmv -->
    <section class="blog-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- ブログコンテンツ -->
    <section class="blog-contents sub-blog subpage-layout">
        <div class="blog-contents__inner inner">
            <div class="blog-contents__featured">
                <div class="blog-contents__cards">
                    <div class="blog-cards blog-cards--details">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
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
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No image" />
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
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p>記事がまだありません。</p>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- ページネーション -->
                <div class="blog-contents__pagination">
                    <?php get_template_part('template-parts/common/paginations'); ?>
                </div>
            </div>

            <div class="blog-contents__sidebar-wrap sidebar">
                <!-- ブログ人気記事 -->
                <div class="sidebar__item">
                    <div class="sidebar__title">
                        <h2 class="sidebar-title">人気記事</h2>
                    </div>
                    <div class="sidebar__contents">
                        <div class="sidebar__blog-cards sidebar-blog-cards">
                            <?php
                            $popular_posts = new WP_Query([
                                'post_type'      => 'post',
                                'posts_per_page' => 3,
                                'orderby'        => 'date',
                                'order'          => 'DESC'
                            ]);
                            ?>
                            <?php if ($popular_posts->have_posts()) : ?>
                                <?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
                                    <div class="sidebar-blog-cards__item">
                                        <a href="<?php the_permalink(); ?>" class="sidebar-blog-card">
                                            <div class="sidebar-blog-card__image">
                                                <?php
                                                $img = get_field('blog_image_1');
                                                if ($img) :
                                                    echo wp_get_attachment_image($img, 'medium');
                                                endif;
                                                ?>
                                            </div>
                                            <div class="sidebar-blog-card__info">
                                                <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="sidebar-blog-card__date">
                                                    <?php echo get_the_date('Y.m/d'); ?>
                                                </time>
                                                <span class="sidebar-blog-card__title"><?php the_field('blog_title'); ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- 口コミ最新記事 -->
                <div class="sidebar__item">
                    <div class="sidebar__title">
                        <h2 class="sidebar-title">口コミ</h2>
                    </div>
                    <div class="sidebar__contents">
                        <div class="sidebar__voice-cards sidebar-voice-cards">
                            <?php
                            $voice_query = new WP_Query([
                                'post_type'      => 'voice',
                                'posts_per_page' => 1
                            ]);
                            ?>
                            <?php if ($voice_query->have_posts()) : ?>
                                <?php while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
                                    <div class="sidebar-voice-cards__item">
                                        <div class="sidebar-voice-card">
                                            <div class="sidebar-voice-card__image">
                                                <?php
                                                $image = get_field('voice_image');
                                                if ($image) :
                                                    echo wp_get_attachment_image($image, 'medium');
                                                else :
                                                ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No image">
                                                <?php endif; ?>

                                            </div>
                                            <div class="sidebar-voice-card__content">
                                                <span class="sidebar-voice-card__age"><?php the_field('voice_age'); ?></span>
                                                <p class="sidebar-voice-card__title"><?php the_title(); ?></p>
                                                <div class="sidebar-voice-card__button">
                                                    <a href="<?php echo esc_url(home_url("/voice")) ?>" class="button">
                                                        <span class="button__bg-white"></span>
                                                        <p class="button__link">View more</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- キャンペーン最新記事 -->
                <div class="sidebar__item">
                    <div class="sidebar__title">
                        <h2 class="sidebar-title">キャンペーン</h2>
                    </div>
                    <div class="sidebar__contents">
                        <div class="sidebar__campaign-cards sidebar-campaign-cards">
                            <?php
                            $campaign_query = new WP_Query([
                                'post_type'      => 'campaign',
                                'posts_per_page' => 2
                            ]);
                            ?>
                            <?php if ($campaign_query->have_posts()) : ?>
                                <?php while ($campaign_query->have_posts()) : $campaign_query->the_post(); ?>
                                    <div class="sidebar-campaign-cards__item">
                                        <div class="campaign-card">
                                            <div class="campaign-card__image campaign-card__image--sidebar">
                                                <?php
                                                $image_id = get_field('campaign_image');
                                                if ($image_id) {
                                                    echo wp_get_attachment_image($image_id, 'medium');
                                                } else {
                                                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/common/noimage.jpg" alt="No image">';
                                                }
                                                ?>
                                            </div>
                                            <div class="campaign-card__content campaign-card__content--sidebar">
                                                <div class="campaign-card__badge campaign-card__badge--sidebar">
                                                    <p class="campaign-card__badge-title campaign-card__badge-title--sidebar">
                                                        <?php the_title(); ?>
                                                    </p>
                                                </div>
                                                <p class="campaign-card__description campaign-card__description--sidebar">
                                                    全部コミコミ(お一人様)
                                                </p>
                                                <div class="campaign-card__price campaign-card__price--sidebar">
                                                    <span class="campaign-card__price-original campaign-card__price-original--sidebar">
                                                        ¥<?php the_field('campaign_price_old'); ?>
                                                    </span>
                                                    <span class="campaign-card__price-discounted campaign-card__price-discounted--sidebar">
                                                        ¥<?php the_field('campaign_price_new'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="sidebar__campaign-button">
                            <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">
                                <span class="button__bg-white"></span>
                                <p class="button__link">View more</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- アーカイブ -->
                <div class="sidebar__item">
                    <div class="sidebar__title">
                        <h2 class="sidebar-title">アーカイブ</h2>
                    </div>
                    <div class="sidebar__contents">
                        <div class="sidebar__archive">
                            <div class="archive">
                                <ul class="archive__list">
                                    <?php
                                    global $wpdb;
                                    $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type='post' AND post_status='publish' ORDER BY post_date DESC");
                                    foreach ($years as $year) :
                                    ?>
                                        <li class="archive__item">
                                            <button class="archive__main-toggle" data-target="<?php echo esc_attr($year); ?>">
                                                <?php echo esc_html($year); ?>
                                            </button>
                                            <ul class="archive__toggle-list" id="<?php echo esc_attr($year); ?>">
                                                <?php
                                                for ($month = 1; $month <= 12; $month++) :
                                                    $query = new WP_Query([
                                                        'post_type' => 'post',
                                                        'posts_per_page' => 1,
                                                        'date_query' => [
                                                            [
                                                                'year' => $year,
                                                                'month' => $month,
                                                            ],
                                                        ],
                                                    ]);
                                                    if ($query->have_posts()) :
                                                        $month_link = get_month_link($year, $month);
                                                ?>
                                                        <li class="archive__subitem">
                                                            <a href="<?php echo esc_url($month_link); ?>" class="archive__sub-toggle">
                                                                <?php echo $month . '月'; ?>
                                                            </a>
                                                        </li>
                                                <?php endif;
                                                    wp_reset_postdata();
                                                endfor;
                                                ?>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- コンタクトセクション -->
    <?php get_template_part('template-parts/common/section-contact'); ?>

    <!-- ページトップボタン -->
    <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>