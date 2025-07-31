<?php if (function_exists('bcn_display')) : ?>
    <?php
    $is_404 = is_404();
    $breadcrumb_class = 'breadcrumb';
    $breadcrumb_class .= $is_404 ? ' breadcrumb--error' : ' layout-breadcrumb';
    ?>
    <div class="<?php echo $breadcrumb_class; ?>" vocab="http://schema.org/" typeof="BreadcrumbList">
        <div class="breadcrumb__inner inner">
            <div class="breadcrumb__list">
                <?php if ($is_404) : ?>
                    <p class="breadcrumb__item breadcrumb__item--error">TOP</p>
                    <span class="breadcrumb__separator breadcrumb__separator--error"></span>
                    <p class="breadcrumb__item breadcrumb__item--error">404</p>
                <?php else : ?>
                    <?php bcn_display(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>