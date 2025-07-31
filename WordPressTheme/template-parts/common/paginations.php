<div class="pagination">
    <ul class="pagination__list">
        <?php
        global $wp_query;
        $current = max(1, get_query_var('paged'));
        $total = $wp_query->max_num_pages;

        // 前へリンク
        if ($current > 1) {
            echo '<li class="pagination__item">';
            echo '<a href="' . esc_url(get_pagenum_link($current - 1)) . '" class="pagination__link pagination__link--back"></a>';
            echo '</li>';
        }

        for ($i = 1; $i <= $total; $i++) {
            // 6ページ目までは全て表示
            if ($total <= 6 || $i <= 6 || $i == $total || abs($i - $current) <= 1) {
                $active = ($i == $current) ? ' is-active' : '';
                echo '<li class="pagination__item' . $active . '">';
                echo '<a href="' . esc_url(get_pagenum_link($i)) . '" class="pagination__link' . $active . '">' . $i . '</a>';
                echo '</li>';
            } elseif ($i == 7 && $total > 7) {
                // 7ページ目に...を表示（1回だけ）
                echo '<li class="pagination__item pagination__item--dot">...</li>';
            }
        }

        // 次へリンク
        if ($current < $total) {
            echo '<li class="pagination__item">';
            echo '<a href="' . esc_url(get_pagenum_link($current + 1)) . '" class="pagination__link pagination__link--next"></a>';
            echo '</li>';
        }
        ?>
    </ul>
</div>