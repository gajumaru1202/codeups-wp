// この中であればWordpressでも「$」が使用可能になる
jQuery(function ($) {
  // ハンバーガーメニューのクリックイベント
  $(".js-hamburger").click(function () {
    $(this).toggleClass("is-active");
    $(".js-drawer").toggleClass("is-active");
    $("body").toggleClass("is-scroll");

    // ARIA属性の更新
    if ($(this).hasClass("is-active")) {
      $(this).attr("aria-expanded", "true");
      $(this).attr("aria-label", "メニューを閉じる");
    } else {
      $(this).attr("aria-expanded", "false");
      $(this).attr("aria-label", "メニューを開く");
    }
  });

  // キーボードでのアクセス対応（Enterキーとスペースキーでトグル可能）
  $(".js-hamburger").keydown(function (e) {
    if (
      e.key === "Enter" ||
      e.key === " " ||
      e.keyCode === 13 ||
      e.keyCode === 32
    ) {
      e.preventDefault();
      $(this).click();
    }
  });

  // ドロワーナビのリンクをクリックで閉じる
  $(".js-drawer a[href]").on("click", function () {
    $(".js-hamburger").removeClass("is-active");
    $(".js-drawer").removeClass("is-active");
    $("body").removeClass("is-scroll");
  });

  // ウィンドウサイズの変更時にハンバーガー状態をリセット
  $(window).on("resize", function () {
    if (window.matchMedia("(min-width: 768px)").matches) {
      $(".js-hamburger").removeClass("is-active");
      $(".js-drawer").removeClass("is-active");
      $("body").removeClass("is-scroll");
    }
  });
});

// ヘッダー色変える
$(document).ready(function () {
  const $header = $(".js-header"); // ヘッダー要素を取得
  const mvHeight = $(".js-mv").outerHeight(); // メインビジュアルの高さを取得

  $(window).on("scroll", function () {
    if ($(window).scrollTop() > mvHeight) {
      $header.addClass("scrolled"); // 指定位置を過ぎたらクラスを付与
    } else {
      $header.removeClass("scrolled"); // 指定位置を過ぎていなければクラスを削除
    }
  });
});

$(document).ready(function () {
  // タイトルをフェードアウトし、ローディングアニメーションを開始
  setTimeout(function () {
    $(".mv__title-wrap").addClass("fade-out"); // タイトルを非表示
  }, 1000);

  // ローディング画像をフェードインして表示
  setTimeout(function () {
    $(".mv__loading-image").addClass("show"); // ローディング画像をフェードイン
  }, 1500);

  // ローディングアニメーションが完了した後にタイトルとSwiperコンテナを表示
  setTimeout(function () {
    $(".mv__title-wrap").removeClass("fade-out").addClass("change-color"); // タイトルを白文字で再表示
    $(".mv__slider").css("opacity", "1"); // Swiperコンテナをフェードイン
    $(".mv__loading-image").addClass("slide-out"); // 疑似要素を上にスライドアウト
  }, 3000);

  // Swiperの初期化を実行
  setTimeout(function () {
    new Swiper(".mv__slider", {
      loop: true,
      effect: "fade",
      speed: 3000,
      allowTouchMove: false,
      autoplay: {
        delay: 3000,
      },
    });
  }, 3500);

  // 疑似要素が完全に画面外に移動したら非表示に
  setTimeout(function () {
    $(".mv__loading-image").css("display", "none");
  }, 4000);
});

// キャンペーンセクション
$(document).ready(function () {
  const swiper = new Swiper(".campaign__slider", {
    slidesPerView: "auto",
    loop: true,
    speed: 6000,
    spaceBetween: 24,

    breakpoints: {
      768: {
        spaceBetween: 40,
        loop: true, // 無限ループを無効化
        autoplay: false, // 自動再生を無効化
        allowTouchMove: true, // マウスドラッグによるスライドを許可
        navigation: {
          // ナビゲーションボタンを有効化
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        speed: 300, // スライド切り替え速度
        slidesPerGroup: 1,
      },
    },

    autoplay: {
      delay: 0,
      disableOnInteraction: false,
    },
    loopedSlides: 8,
    allowTouchMove: false,
  });
});

// ページトップへ戻るボタン
$(function () {
  const pageTop = $(".js-page-top");
  pageTop.hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 20) {
      pageTop.fadeIn();
    } else {
      pageTop.fadeOut();
    }
  });
  pageTop.click(function () {
    $("body, html").animate(
      {
        scrollTop: 0,
      },
      300
    );
    return false;
  });
});

// 背景アニメーション
var box = $(".js-color-box"),
  speed = 700;

//.colorboxの付いた全ての要素に対して下記の処理を行う
box.each(function () {
  $(this).append('<div class="color"></div>');
  var color = $(this).find($(".color")),
    image = $(this).find("img");
  var counter = 0;

  image.css("opacity", "0");
  color.css("width", "0%");
  //inviewを使って背景色が画面に現れたら処理をする
  color.on("inview", function () {
    if (counter == 0) {
      $(this)
        .delay(200)
        .animate({ width: "100%" }, speed, function () {
          image.css("opacity", "1");
          $(this).css({ left: "0", right: "auto" });
          $(this).animate({ width: "0%" }, speed);
        });
      counter = 1;
    }
  });
});
