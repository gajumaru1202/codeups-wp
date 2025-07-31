<div class="voice-cards voice-cards--details">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="voice-cards__item">
                <div class="voice-card">
                    <div class="voice-card__info">
                        <div class="voice-card__profile">
                            <div class="voice-card__meta">
                                <p class="voice-card__age"><?php the_field('voice_age'); ?></p>

                                <!-- カテゴリ表示（タクソノミー） -->
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

                            <p class="voice-card__title voice-card__title--details">
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
                        <p class="voice-card__text voice-card__text--details">
                            <?php echo nl2br(get_field('voice_text')); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>投稿が見つかりませんでした。</p>
    <?php endif; ?>
</div>