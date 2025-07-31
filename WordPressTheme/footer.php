<?php
$is_404 = is_404();

$footer_class = 'footer';
$footer_class .= $is_404 ? ' sub-footer sub-footer--error' : ' top-footer';
?>
<footer class="<?php echo esc_attr($footer_class); ?>">
  <div class="footer__inner inner">
    <div class="footer__logo-wrap">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
        <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/CodeUps-logo.png")); ?>" alt="CodeUps" />
      </a>
      <div class="footer__sns-logo">
        <a href="#" target="_blank" rel="noopener noreferrer">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/facebook.png")); ?>" alt="facebook" />
        </a>
        <a href="#" target="_blank" rel="noopener noreferrer">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/common/instagram.png")); ?>" alt="instagram" />
        </a>
      </div>
    </div>

    <div class="footer__menu menu">
      <div class="menu__inner">
        <div class="menu__items">
          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">キャンペーン</a>
              </div>
              <div class="menu__link-sub">
                <?php
                $license     = get_term_by('slug', 'license', 'campaign_category');
                $fun  = get_term_by('slug', 'fun', 'campaign_category');
                $experience       = get_term_by('slug', 'experience', 'campaign_category');
                ?>

                <?php if ($license) : ?>
                  <a href="<?php echo esc_url(get_term_link($license)); ?>">ライセンス取得</a>
                <?php endif; ?>

                <?php if ($fun) : ?>
                  <a href="<?php echo esc_url(get_term_link($fun)); ?>">ファンダイビング</a>
                <?php endif; ?>

                <?php if ($experience) : ?>
                  <a href="<?php echo esc_url(get_term_link($experience)); ?>">体験ダイビング</a>
                <?php endif; ?>
              </div>
            </div>
          </div>


          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(home_url("/about-us")) ?>">私たちについて</a>
              </div>
            </div>
          </div>

          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
              </div>

              <div class="menu__link-sub">
                <a href="<?php echo esc_url(home_url('/information?tab=license')); ?>">ライセンス講習</a>
                <a href="<?php echo esc_url(home_url('/information?tab=fun')); ?>">ファンダイビング</a>
                <a href="<?php echo esc_url(home_url('/information?tab=experience')); ?>">体験ダイビング</a>
              </div>
            </div>
          </div>


          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
              </div>
            </div>
          </div>

          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">お客様の声</a>
              </div>
              <div class="menu__link-sub">
                <?php
                $license     = get_term_by('slug', 'license', 'voice_category');
                $fun  = get_term_by('slug', 'fun', 'voice_category');
                $experience       = get_term_by('slug', 'experience', 'voice_category');
                ?>

                <?php if ($license) : ?>
                  <a href="<?php echo esc_url(get_term_link($license)); ?>">ライセンス取得</a>
                <?php endif; ?>

                <?php if ($fun) : ?>
                  <a href="<?php echo esc_url(get_term_link($fun)); ?>">ファンダイビング</a>
                <?php endif; ?>

                <?php if ($experience) : ?>
                  <a href="<?php echo esc_url(get_term_link($experience)); ?>">体験ダイビング</a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>
              </div>
            </div>
          </div>

          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
              </div>
            </div>
          </div>

          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main menu__link-main--lineheight">
                <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="sp-only" />ポリシー</a>
              </div>
            </div>
          </div>

          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
              </div>
            </div>
          </div>

          <div class="menu__item">
            <div class="menu__link-wrap">
              <div class="menu__link-main">
                <a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer__copyright">
      <small>Copyright © 2021 - <?php echo wp_date("Y"); ?> CodeUps LLC. All Rights Reserved.</small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>