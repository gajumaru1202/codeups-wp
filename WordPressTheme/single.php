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
        <div class="blog-contents__inner blog-contents__inner--single inner">
            <div class="blog-contents__featured blog-contents__featured--single">
                <div class="blog-contents__details blog-contents-details">
                    <!-- 日付 -->
                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="blog-contents-details__date">
                        <?php echo get_the_date('Y.m/d'); ?>
                    </time>

                    <!-- タイトル -->
                    <h1 class="blog-contents-details__title"><?php the_field('blog_title'); ?></h1>

                    <!-- メイン画像 -->
                    <div class="blog-contents-details__image">
                        <?php
                        $main_image_id = get_field('blog_image_1');
                        if ($main_image_id) :
                            echo wp_get_attachment_image($main_image_id, 'large', false, [
                                'alt' => get_post_meta($main_image_id, '_wp_attachment_image_alt', true),
                                'class' => ''
                            ]);
                        else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg" alt="No image" />
                        <?php endif; ?>
                    </div>

                    <!-- 本文エリア -->
                    <div class="blog-contents-details__article">
                        <!-- 本文冒頭 -->
                        <?php if ($main_text = get_field('blog_text_main')) : ?>
                            <p><?php echo nl2br(esc_html($main_text)); ?></p>
                        <?php endif; ?>

                        <!-- サブ画像 -->
                        <?php
                        $image2_id = get_field('blog_image_2');
                        if ($image2_id) :
                            echo wp_get_attachment_image($image2_id, 'large', false, [
                                'alt' => get_post_meta($image2_id, '_wp_attachment_image_alt', true),
                                'class' => ''
                            ]);
                        endif;
                        ?>

                        <!-- 中間テキスト -->
                        <?php if ($middle_text = get_field('blog_text_middle')) : ?>
                            <p><?php echo nl2br(esc_html($middle_text)); ?></p>
                        <?php endif; ?>

                        <!-- リスト -->
                        <?php
                        $list_text = get_field('blog_list');
                        if ($list_text) :
                            $list_items = explode("\n", trim($list_text));
                        ?>
                            <ul>
                                <?php foreach ($list_items as $item) : ?>
                                    <li><?php echo esc_html($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <!-- 末尾テキスト -->
                        <?php if ($bottom_text = get_field('blog_text_bottom')) : ?>
                            <p><?php echo nl2br(esc_html($bottom_text)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ページネーション -->
                <div class="blog-contents__pagination blog-contents__pagination--single">
                    <div class="pagination">
                        <ul class="pagination__list pagination__list--single">

                            <li class="pagination__item">
                                <?php previous_post_link(
                                    '%link',
                                    '<span class="pagination__link pagination__link--back" aria-label="前の記事へ"></span>'
                                ); ?>
                            </li>

                            <li class="pagination__item">
                                <?php next_post_link(
                                    '%link',
                                    '<span class="pagination__link pagination__link--next" aria-label="次の記事へ"></span>'
                                ); ?>
                            </li>

                        </ul>
                    </div>
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