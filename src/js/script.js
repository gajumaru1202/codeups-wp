// この中であればWordpressでも「$」が使用可能になる
jQuery(function ($) {
  // ハンバーガーメニューのクリックイベント
  $(".js-hamburger").click(function () {
    $(this).toggleClass("is-active");
    $(".js-drawer").toggleClass("is-active");
    $(".js-header").toggleClass("is-active");
    $("body").toggleClass("is-scroll");

    if ($(this).hasClass("is-active")) {
      $(this).attr("aria-expanded", "true");
      $(this).attr("aria-label", "メニューを閉じる");
      lockFocus([".js-hamburger", ".js-drawer"]);
    } else {
      $(this).attr("aria-expanded", "false");
      $(this).attr("aria-label", "メニューを開く");
      unlockFocus();
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
    $(".js-header").removeClass("is-active");
    $("body").removeClass("is-scroll");
    unlockFocus();
  });

  $(window).on("resize", function () {
    if (window.matchMedia("(min-width: 768px)").matches) {
      $(".js-hamburger").removeClass("is-active");
      $(".js-drawer").removeClass("is-active");
      $(".js-header").removeClass("is-active");
      $("body").removeClass("is-scroll");
      unlockFocus();
    }
  });

  // ESCキーでドロワーを閉じる
  $(document).on("keydown", function (e) {
    if (e.key === "Escape" || e.keyCode === 27) {
      if ($(".js-drawer").hasClass("is-active")) {
        $(".js-hamburger").removeClass("is-active");
        $(".js-drawer").removeClass("is-active");
        $(".js-header").removeClass("is-active");
        $("body").removeClass("is-scroll");
        unlockFocus();
      }
    }
  });

  // Tabキーでのフォーカス制御
  let lastFocusedElement;
  function lockFocus(selectors) {
    const focusableElements = [];
    selectors.forEach((selector) => {
      const container = document.querySelector(selector);
      if (container) {
        // フォーカス可能要素を取得
        focusableElements.push(
          ...container.querySelectorAll(
            'a, button, input, [tabindex]:not([tabindex="-1"])'
          )
        );
      }
    });

    // ハンバーガーボタンもフォーカス可能リストに含める
    const hamburger = document.querySelector(".js-hamburger");
    if (hamburger) {
      focusableElements.unshift(hamburger); // 最初に追加
    }

    const firstFocusable = focusableElements[0];
    const lastFocusable = focusableElements[focusableElements.length - 1];

    lastFocusedElement = document.activeElement;

    function handleFocusTrap(e) {
      if (e.key === "Tab" || e.keyCode === 9) {
        if (e.shiftKey && document.activeElement === firstFocusable) {
          e.preventDefault();
          lastFocusable.focus();
        } else if (!e.shiftKey && document.activeElement === lastFocusable) {
          e.preventDefault();
          firstFocusable.focus();
        }
      }
    }

    document.addEventListener("keydown", handleFocusTrap);

    // 初期フォーカスを設定
    if (firstFocusable) firstFocusable.focus();

    // フォーカス解除を定義
    document._unlockFocus = () => {
      document.removeEventListener("keydown", handleFocusTrap);
      if (lastFocusedElement) {
        lastFocusedElement.focus();
      }
    };
  }

  function unlockFocus() {
    if (document._unlockFocus) {
      document._unlockFocus();
    }
  }
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

// メインビジュアル
$(document).ready(function () {
  $("body").addClass("no-scroll");

  setTimeout(function () {
    $(".js-mv-title").addClass("fade-out");
  }, 250);

  setTimeout(function () {
    $(".js-loading-image").addClass("show");
  }, 450);

  setTimeout(function () {
    $(".js-loading-title").addClass("show");
  }, 3000);

  setTimeout(function () {
    $(".js-mv-title").removeClass("fade-out").addClass("change-color");
  }, 3000);

  setTimeout(function () {
    $(".js-mv-slider").addClass("show");
  }, 3000);

  setTimeout(function () {
    $(".js-loading-image").addClass("fade-out");
  }, 5000);

  $("body").addClass("no-scroll");

  setTimeout(function () {
    $("body").removeClass("no-scroll");
  }, 3000);

  setTimeout(function () {
    new Swiper(".js-mv-slider", {
      loop: true,
      effect: "fade",
      speed: 3500,
      allowTouchMove: false,
      autoplay: {
        delay: 3500,
      },
    });
  }, 7000);
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

// モーダル
$(document).ready(function () {
  $(".js-modal-open").on("click", function (e) {
    e.preventDefault();

    const imgSrc = $(this).find("img").attr("src");
    const imgAlt = $(this).find("img").attr("alt");

    const imgElement = $("<img>", {
      src: imgSrc,
      alt: imgAlt,
      class: "modal__image",
    });
    $(".js-modal").append(imgElement);

    $(".js-modal").fadeIn();
    $("body").addClass("no-scroll");
  });

  $(".js-modal").on("click", function () {
    closeModal();
  });

  $(document).on("keydown", function (e) {
    if (e.key === "Escape" || e.keyCode === 27) {
      closeModal();
    }
  });

  function closeModal() {
    $(".js-modal").fadeOut(function () {
      $(this).empty();
    });
    $("body").removeClass("no-scroll");
  }
});

// タブ切り替え
$(function () {
  const tabButton = $(".js-tab-button"),
    tabContent = $(".js-tab-content");
  tabButton.on("click", function () {
    let index = tabButton.index(this);

    tabButton.removeClass("is-active");
    $(this).addClass("is-active");
    tabContent.removeClass("is-active");
    tabContent.eq(index).addClass("is-active");
  });
});

// トグルリスト
$(document).ready(function () {
  const $initialTargetList = $("#2023");
  $initialTargetList
    .addClass("is-visible")
    .css("max-height", $initialTargetList.prop("scrollHeight") + "px");

  $(".archive__main-toggle").on("click", function () {
    const targetId = $(this).data("target");
    const $targetList = $("#" + targetId);

    if ($targetList.length) {
      if ($targetList.hasClass("is-visible")) {
        // 閉じる処理
        $targetList.removeClass("is-visible").css("max-height", 0);
        $(this).removeClass("is-expanded");
      } else {
        // 開く処理
        $targetList
          .addClass("is-visible")
          .css("max-height", $targetList.prop("scrollHeight") + "px");
        $(this).addClass("is-expanded");
      }
    }
  });
});
