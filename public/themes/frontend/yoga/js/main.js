$(function () {
  var siteSticky = function () {
    $(".js-sticky-header").sticky({ topSpacing: 0 });
  };
  siteSticky();

  var siteMenuClone = function () {
    $(".js-clone-nav").each(function () {
      var $this = $(this);
      $this
        .clone()
        .attr("class", "site-nav-wrap")
        .appendTo(".site-mobile-menu-body");
    });

    setTimeout(function () {
      var counter = 0;
      $(".site-mobile-menu .has-children").each(function () {
        var $this = $(this);

        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find(".arrow-collapse").attr({
          "data-toggle": "collapse",
          "data-target": "#collapseItem" + counter,
        });

        $this.find("> ul").attr({
          class: "collapse",
          id: "collapseItem" + counter,
        });

        counter++;
      });
    }, 1000);

    $("body").on("click", ".arrow-collapse", function (e) {
      var $this = $(this);
      if ($this.closest("li").find(".collapse").hasClass("show")) {
        $this.removeClass("active");
      } else {
        $this.addClass("active");
      }
      e.preventDefault();
    });

    $(window).resize(function () {
      var $this = $(this),
        w = $this.width();

      if (w > 768) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
        }
      }
    });

    $("body").on("click", ".js-menu-toggle", function (e) {
      var $this = $(this);
      e.preventDefault();

      if ($("body").hasClass("offcanvas-menu")) {
        $("body").removeClass("offcanvas-menu");
        $this.removeClass("active");
      } else {
        $("body").addClass("offcanvas-menu");
        $this.addClass("active");
      }
    });

    // click outisde offcanvas
    $(document).mouseup(function (e) {
      var container = $(".site-mobile-menu");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($("body").hasClass("offcanvas-menu")) {
          $("body").removeClass("offcanvas-menu");
        }
      }
    });
  };
  siteMenuClone();

  $(".image-link").magnificPopup({
    type: "iframe",
    src: $(this).attr("href"),
  });

  $(".form-control").on("change", function () {
    if ($(this).val() != "") {
      $(this).parents(".form-group").addClass("done");
    } else {
      $(this).parents(".form-group").removeClass("done");
    }
  });
  $(".box_items .slick_items").on("mouseover", function () {
    $(this).addClass("slick-center");
  });
  $(".box_items .slick_items").on("mouseout", function () {
    $(this).removeClass("slick-center");
  });

  $(".carousel").carousel({
    interval: false,
  });

  $(".slick_content").slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  $(".slider-single").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    useTransform: true,
    asNavFor: ".slider-nav",
  });
  $(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-single",
    dots: false,
    focusOnSelect: true,
    centerMode: true,
    centerPadding: "0",
  });

  $(window).scroll(function (event) {
    $(".data_iframe").each(function () {
      if (!$(this).hasClass("value_frame")) {
        $(this).addClass("value_frame").html($(this).attr("data"));
      }
    });

    if (!$(".slick_lists").hasClass("lazyslick")) {
      $(".slick_lists").slick({
        arrows: true,
        adaptiveHeight: true,
        centerMode: true,
        centerPadding: "0",
        slidesToShow: 3,
        responsive: [
          {
            breakpoint: 960,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: "0",
              slidesToShow: 1,
              autoplay: true,
              autoplaySpeed: 3000,
            },
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: "0",
              slidesToShow: 1,
              autoplay: false,
              autoplaySpeed: 3000,
            },
          },
        ],
      });
      $(".slick_lists").addClass('lazyslick');
    }
  });
});
