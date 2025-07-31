<ul class="voice-list__label-wrap labels">
    <li class="labels__list <?php if (is_post_type_archive('voice')) echo 'is-active'; ?>">
        <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>" class="labels__item">ALL</a>
    </li>

    <?php
    $terms = get_terms('voice_category');
    if ($terms && !is_wp_error($terms)) :
        foreach ($terms as $term) :
    ?>
            <li class="labels__list <?php if (is_tax('voice_category', $term->slug)) echo 'is-active'; ?>">
                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="labels__item"><?php echo esc_html($term->name); ?></a>
            </li>
    <?php endforeach;
    endif; ?>
</ul>