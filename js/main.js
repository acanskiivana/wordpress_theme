(function ($) {
  $(document).ready(function () {
    // Team quote
    // Open quote text on click
    $(document).click(function () {
      $(".team__quote-text").css("opacity", 0).hide();
    });

    $(".team__quote-text").click(function (e) {
      e.stopPropagation();
    });

    var quote_btn = $(".team__quote");
    var quote_wrap = $(".team__quote-wrap");
    if (quote_wrap.lenght != 0) {
      quote_wrap.on("click mouseover", ".team__quote", function (e) {
        e.stopPropagation();
        console.log("aaaa");
        var team_quote_text = $(this)
          .closest(".team__quote-wrap")
          .find(".team__quote-text");
        team_quote_text.css("opacity", 0).hide();
        team_quote_text
          .animate(
            {
              opacity: 1,
            },
            400
          )
          .show();
      });

      $(".team__quote-text, .team").on("mouseleave", function () {
        $(".team__quote-text").css("opacity", 0).hide();
      });
    }

    var map_pin = $(".map-pin");
    if (map_pin.lenght != 0) {
      map_pin.on("mouseover", ".map-pin-hover", function (e) {
        e.stopPropagation();
        var map_pin_hover = $(this).closest(".map-pin");
        map_pin_hover.removeClass("map-pin--active");
        map_pin_hover.toggleClass("map-pin--active");
      });

      $(".map-pin-hover").on("mouseleave", function () {
        $(".map-pin").removeClass("map-pin--active");
      });
    }

    // Navigation
    $(".header").on("click", ".burger", function () {
      $header = $(this).closest(".header");
      $header.toggleClass("disable-scroll");
      $header.find(".header-nav").slideToggle();
      $(this).toggleClass("burger--active");
    });

    // Navigation hide/show header on scroll
    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $("header").outerHeight();

    $(window).scroll(function (event) {
      didScroll = true;
    });

    setInterval(function () {
      if (didScroll) {
        hasScrolled();
        didScroll = false;
      }
    }, 250);

    function hasScrolled() {
      var st = $(this).scrollTop();

      // Make sure they scroll more than delta
      if (Math.abs(lastScrollTop - st) <= delta) return;

      // If they scrolled down and are past the navbar, add class .nav-up.
      // This is necessary so you never see what is "behind" the navbar.
      if (st > lastScrollTop && st > navbarHeight) {
        // Scroll Down
        $("header").addClass("header--hide");
      } else {
        // Scroll Up
        if (st + $(window).height() < $(document).height()) {
          $("header").removeClass("header--hide");
          $("header").addClass("header--background");
        }
      }

      lastScrollTop = st;
    }

    // Slick slider
    $(".slick-slider-center")
      .slick({
        centerMode: true,
        centerPadding: "28vw",
        slidesToShow: 1,
        responsive: [
          {
            breakpoint: 1930,
            settings: {
              centerMode: true,
              centerPadding: "25vw",
              slidesToShow: 1,
            },
          },

          {
            breakpoint: 1600,
            settings: {
              centerMode: true,
              centerPadding: "22vw",
              slidesToShow: 1,
            },
          },
          {
            breakpoint: 1460,
            settings: {
              centerMode: true,
              centerPadding: "20vw",
              slidesToShow: 1,
            },
          },
          {
            breakpoint: 1200,
            settings: {
              centerMode: true,
              centerPadding: "18vw",
              slidesToShow: 1,
            },
          },
          {
            breakpoint: 990,
            settings: {
              centerMode: true,
              centerPadding: "18rem",
              slidesToShow: 1,
            },
          },

          {
            breakpoint: 768,
            settings: {
              centerMode: false,
              slidesToShow: 1,
            },
          },
        ],
      })
      .on("beforeChange", (event, slick, currentSlide, nextSlide) => {
        if (currentSlide !== nextSlide) {
          document
            .querySelectorAll(".slick-center + .slick-cloned")
            .forEach((next) => {
              // timeout required or Slick will overwrite the classes
              setTimeout(() =>
                next.classList.add("slick-current", "slick-center")
              );
            });
        }
      });

    $(".slick-scroll").slick({
      speed: 6000,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 0,
      cssEase: "linear",
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
    });

    $slick_slider = $(".slick-mobile");
    settings_slider = {
      dots: false,
      arrows: true,
      // more settings
    };

    slick_on_mobile($slick_slider, settings_slider);

    // slick on mobile
    function slick_on_mobile(slider, settings) {
      $(window).on("load resize", function () {
        if ($(window).width() > 767) {
          if (slider.hasClass("slick-initialized")) {
            slider.slick("unslick");
          }
          return;
        }
        if (!slider.hasClass("slick-initialized")) {
          return slider.slick(settings);
        }
      });
    }

    // Aos animation
    AOS.init({
      offset: jQuery(window).innerHeight() * 0.2, // offset (in px) from the original trigger point
      delay: 100,
      duration: 600, // values from 0 to 3000, with step 50ms
      easing: "ease-in-quad", // default easing for AOS animations
    });

    // Fix aos animation with lazy load images
    document
      .querySelectorAll("img")
      .forEach((img) => img.addEventListener("load", () => AOS.refresh()));

    // Number counter
    var a = 0;
    $(window).scroll(function () {
      if ($("#counter").length != 0) {
        var oTop = $("#counter").offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
          $(".counter-value").each(function () {
            var $this = $(this),
              countTo = $this.attr("data-count");
            $({
              countNum: 0,
            }).animate(
              {
                countNum: countTo,
              },
              {
                duration: 2000,
                easing: "swing",
                step: function () {
                  $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                  $this.text(this.countNum);
                  //alert('finished');
                },
              }
            );
          });
          a = 1;
        }
      }
    });

    // Load more button
    // $('.team-section').on('click', '.load-more', function () {
    //     $(this).closest('.team-section').find('.team').addClass('team-show');
    //     $(this).hide();
    // });

    // Select2
    $("select").select2();

    // Add placeholder to the contact form - country dropdown
    $(".dropdown-placeholder-country").select2({
      placeholder: "Country*",
    });

    // Add placeholder to the contact form - Protfolio size dropdown
    $(".dropdown-placeholder-portfoliosize").select2({
      placeholder: "Portfolio Size (MW)",
    });

    // hide search box in select filter dropdown
    $(".select-filter").select2({
      minimumResultsForSearch: -1,
    });

    // Ajax load more plugin
    // Filter category posts
    // Animation flag
    var alm_is_animating = false;

    // Set initial active item
    if ($(".alm-filter-nav").length) {
      document
        .querySelector(".alm-filter-nav li:first-child")
        .classList.add("active"); // Set initial active state
    }

    // Click Event
    function filterClick() {
      // Get parent `<li/>`
      var parent = this.parentNode;
      if (parent.classList.contains("active") && !alm_is_animating) {
        // Exit if active
        return false;
      }

      alm_is_animating = true; // Animation flag

      var active = document.querySelector(".alm-filter-nav li.active"); // Get `.active` element
      if (active) {
        active.classList.remove("active");
      }

      parent.classList.add("active"); // Add active class

      // Set filters
      var transition = "fade";
      var speed = 250;
      var data = this.dataset;

      // Call core Ajax Load More `filter` function
      ajaxloadmore.filter(transition, speed, data);
    }

    // Event Handlers
    var filter_buttons = document.querySelectorAll(".alm-filter-nav li a");
    if (filter_buttons) {
      [].forEach.call(filter_buttons, function (button) {
        button.addEventListener("click", filterClick);
      });
    }

    // Callback
    window.almFilterComplete = function () {
      alm_is_animating = false; // Clear animation flag
    };

    // added clear button on input text field
    const $inp = $(".news__filter input.search-field"),
      $cle = $(".news__filter .search-wrap .clear-btn");

    $inp.on("input", function () {
      $cle.toggle(!!this.value);
    });

    $cle.on("touchstart click", function (e) {
      e.preventDefault();
      $inp.val("").trigger("input").focus();
    });

    $(".video-section__overlay").click(function () {
      if (!$(this).hasClass("play")) {
        $(this).addClass("play");
      }
      $(".video-section__video").animate({ opacity: 1 }, 300);
      $(".video-section__video")[0].play();
    });
  });
})(jQuery);
