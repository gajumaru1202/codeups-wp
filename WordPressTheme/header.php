<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php if (is_404()) : ?>
    <meta http-equiv="refresh" content=" 3; url=<?php echo esc_url(home_url("")); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header js-header">
    <div class="header__inner">
      <a href="<?php echo esc_url(home_url("/")) ?>" class="header__name">
        <img src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/CodeUps-logo.png")); ?>" alt="CodeUps" />
      </a>
      <nav class="header__nav pc-only">
        <ul class="header__items">
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="header__link">
              <span class="header__link-main">Campaign</span>
              <p class="header__link-sub">キャンペーン</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/about-us")) ?>" class="header__link">
              <span class="header__link-main">About us</span>
              <p class="header__link-sub">私たちについて</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/information")) ?>" class="header__link">
              <span class="header__link-main">Information</span>
              <p class="header__link-sub">ダイビング情報</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/blog")) ?>" class="header__link">
              <span class="header__link-main">Blog</span>
              <p class="header__link-sub">ブログ</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/voice")) ?>" class="header__link">
              <span class="header__link-main">Voice</span>
              <p class="header__link-sub">お客様の声</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/price")) ?>" class="header__link">
              <span class="header__link-main">Price</span>
              <p class="header__link-sub">料金一覧</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/faq")) ?>" class="header__link">
              <span class="header__link-main">FAQ</span>
              <p class="header__link-sub">よくある質問</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/contact")) ?>" class="header__link">
              <span class="header__link-main">Contact</span>
              <p class="header__link-sub">お問合せ</p>
            </a>
          </li>
        </ul>
      </nav>

      <a
        href="javascript:void(0);"
        class="header__hamburger hamburger js-hamburger"
        role="button"
        aria-expanded="false"
        aria-label="メニューを開く"
        tabindex="0">
        <span class="hamburger__item"></span>
        <span class="hamburger__item"></span>
        <span class="hamburger__item"></span>
      </a>

      <div class="header__drawer drawer js-drawer">
        <div class="drawer__inner inner">
          <div class="drawer__menu menu">
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
        </div>
      </div>
    </div>
  </header>