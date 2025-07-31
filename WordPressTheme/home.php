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

            <!-- サイドバー -->
            <?php get_template_part('template-parts/blog/sidebar'); ?>
        </div>
    </section>

    <!-- コンタクトセクション -->
    <?php get_template_part('template-parts/common/section-contact'); ?>

    <!-- ページトップボタン -->
    <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>