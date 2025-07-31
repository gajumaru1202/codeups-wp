<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="campaign-list-cards__item">
            <div class="campaign-card">
                <div class="campaign-card__image">
                    <?php
                    $image = get_field('campaign_image');
                    if ($image) echo wp_get_attachment_image($image, 'medium');
                    ?>
                </div>
                <div class="campaign-card__content campaign-card__content--details">
                    <div class="campaign-card__badge campaign-card__badge--details">
                        <div class="campaign-card__badge-label campaign-card__badge-label--details">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'campaign_category');
                            if ($terms && !is_wp_error($terms)) {
                                echo '<span>' . esc_html($terms[0]->name) . '</span>';
                            }
                            ?>
                        </div>
                        <p class="campaign-card__badge-title campaign-card__badge-title--details">
                            <?php the_field('campaign_title'); ?>
                        </p>
                    </div>
                    <p class="campaign-card__description campaign-card__description--details">
                        全部コミコミ(お一人様)
                    </p>
                    <div class="campaign-card__price campaign-card__price--details">
                        <span class="campaign-card__price-original">¥<?php the_field('campaign_price_old'); ?></span>
                        <span class="campaign-card__price-discounted">¥<?php the_field('campaign_price_new'); ?></span>
                    </div>
                    <p class="campaign-card__details-text pc-only"><?php the_field('campaign_text'); ?></p>
                    <div class="campaign-card__details-meta pc-only">
                        <div class="campaign-card__date-wrap">
                            <time class="campaign-card__date"><?php the_field('campaign_period_from'); ?></time>
                            <time class="campaign-card__date"><?php the_field('campaign_period_to'); ?></time>
                        </div>
                        <p class="campaign-card__details-message">ご予約・お問い合わせはコチラ</p>
                        <div class="campaign-card__details-button">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button">
                                <span class="button__bg-white"></span>
                                <p class="button__link">Contact us</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;
else : ?>
    <p>投稿が見つかりませんでした。</p>
<?php endif; ?>