<?php get_header(); ?>
<main>
    <!-- プライスmv -->
    <section class="price-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- プライスリストセクション -->
    <?php
    $price_data = SCF::get('price_list');

    if (!empty($price_data)) :
        $grouped_data = [];
        foreach ($price_data as $item) {
            $category = $item['category_title'];
            if (!isset($grouped_data[$category])) {
                $grouped_data[$category] = [];
            }
            $grouped_data[$category][] = $item;
        }
    ?>
        <div class="price-list sub-price subpage-layout">
            <div class="price-list__inner inner">
                <div class="price-list__table-wrap price-list-tables">
                    <?php foreach ($grouped_data as $category_title => $courses) : ?>
                        <div class="price-list-tables__item">
                            <div class="price-table">
                                <div class="price-table__header">
                                    <span class="price-table__title"><?php echo esc_html($category_title); ?></span>
                                    <div class="price-table__header-logo">
                                        <img
                                            src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/information-tab-logo1.svg")); ?>"
                                            alt="鯨のロゴ" />
                                    </div>
                                </div>
                                <table class="price-table__list">
                                    <?php foreach ($courses as $course) : ?>
                                        <tr class="price-table__row">
                                            <td class="price-table__name">
                                                <span class="pc-only"><?php echo esc_html(str_replace("\n", ' ', $course['course_name'])); ?></span>
                                                <span class="sp-only"><?php echo nl2br(esc_html($course['course_name'])); ?></span>
                                            </td>
                                            <td class="price-table__price">
                                                <?php echo esc_html($course['course_price']); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- コンタクトセクション -->
    <?php get_template_part('template-parts/common/section-contact'); ?>

    <!-- ページトップボタン -->
    <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>