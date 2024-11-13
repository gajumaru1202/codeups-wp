// この中であればWordpressでも「$」が使用可能になる
jQuery(function ($) {
  // ハンバーガーメニューのクリックイベント
  $(".js-hamburger").click(function () {
    $(this).toggleClass("is-active");
    $(".js-drawer").toggleClass("is-active");
    $("body").toggleClass("is-scroll");

    if ($(this).hasClass("is-active")) {
      $(this).attr("aria-expanded", "true");
      $(this).attr("aria-label", "メニューを閉じる");
    } else {
      $(this).attr("aria-expanded", "false");
      $(this).attr("aria-label", "メニューを開く");
    }
  });

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

  $(".js-drawer a[href]").on("click", function () {
    $(".js-hamburger").removeClass("is-active");
    $(".js-drawer").removeClass("is-active");
    $("body").removeClass("is-scroll");
  });

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
  const $header = $(".js-header");
  const mvHeight = $(".js-mv").outerHeight();

  $(window).on("scroll", function () {
    if ($(window).scrollTop() > mvHeight) {
      $header.addClass("scrolled");
    } else {
      $header.removeClass("scrolled");
    }
  });
});

$(document).ready(function () {
  setTimeout(function () {
    $(".js-mv-title").addClass("fade-out");
  }, 1000);

  // ローディング画像をフェードインして表示
  setTimeout(function () {
    $(".js-loading-image").addClass("show");
  }, 1500);

  setTimeout(function () {
    $(".js-mv-title").removeClass("fade-out").addClass("change-color");
    $(".js-mv-slider").css("opacity", "1");
    $(".js-loading-image").addClass("slide-out");
  }, 3000);

  setTimeout(function () {
    new Swiper(".js-mv-slider", {
      loop: true,
      effect: "slide",
      direction: "vertical",
      speed: 3000,
      allowTouchMove: false,
      autoplay: {
        delay: 3000,
      },
    });
  }, 3500);

  setTimeout(function () {
    $(".js-loading-image").css("display", "none");
  }, 4000);
});

// キャンペーンセクション
$(document).ready(function () {
  const swiper = new Swiper(".js-campaign-slider", {
    slidesPerView: "auto",
    loop: true,
    speed: 6000,
    spaceBetween: 24,

    breakpoints: {
      768: {
        spaceBetween: 39,
        loop: true,
        autoplay: false,
        allowTouchMove: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        speed: 300,
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

box.each(function () {
  $(this).append('<div class="color"></div>');
  var color = $(this).find($(".color")),
    image = $(this).find("img");
  var counter = 0;

  image.css("opacity", "0");
  color.css("width", "0%");

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
