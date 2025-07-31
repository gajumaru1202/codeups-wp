<?php get_header(); ?>
<main>
    <!-- コンタクトmv -->
    <section class="contact-mv">
        <?php get_template_part('template-parts/common/mv'); ?>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('template-parts/common/breadcrumb'); ?>

    <!-- コンプリートセクション -->
    <div class="contact-complete sub-contact-complete subpage-layout">
        <div class="contact-complete__inner inner">
            <div class="contact-complete__contents">
                <span class="contact-complete__title">お問い合わせ内容を送信完了しました。</span>
                <p class="contact-complete__description">
                    このたびは、お問い合わせ頂き<br
                        class="sp-only" />誠にありがとうございます。<br />
                    お送り頂きました内容を確認の上、<br
                        class="sp-only" />3営業日以内に折り返しご連絡させて頂きます。<br />
                    また、ご記入頂いたメールアドレスへ、<br
                        class="sp-only" />自動返信の確認メールをお送りしております。
                </p>
            </div>
        </div>
    </div>

    <!-- ページトップボタン -->
    <div class="page-top-button js-page-top"></div>
</main>
<?php get_footer(); ?>