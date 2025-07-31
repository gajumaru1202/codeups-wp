<?php get_header(); ?>
<main>
    <!-- よくある質問mv -->
    <section class="faq-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- faqセクション -->
    <div class="faq sub-faq subpage-layout">
        <div class="faq__inner inner">
            <div class="faq__accordion">
                <div class="faq-accordion js-accordion">
                    <div class="faq-accordion__container">
                        <?php
                        $post_id = get_the_ID();

                        $faq_list = SCF::get('faq_list', $post_id);

                        if (!empty($faq_list)) :
                            foreach ($faq_list as $faq) :
                                $question = isset($faq['question']) ? esc_html($faq['question']) : '';
                                $answer = isset($faq['answer']) ? wp_kses_post($faq['answer']) : '';

                                if (empty($question) && empty($answer)) continue;
                        ?>
                                <div class="faq-accordion__item faq-accordion-item js-accordion__item">
                                    <button class="faq-accordion-item__question js-accordion__question">
                                        <span class="faq-accordion-item__question-text">
                                            <?php echo $question; ?>
                                        </span>
                                    </button>
                                    <div class="faq-accordion-item__answer js-accordion__answer">
                                        <p class="faq-accordion-item__answer-text">
                                            <?php echo $answer; ?>
                                        </p>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        else :
                            echo '<p>よくある質問はまだ登録されていません。</p>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- コンタクトセクション -->
    <?php get_template_part('template-parts/common/section-contact'); ?>

    <!-- ページトップボタン -->
    <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>