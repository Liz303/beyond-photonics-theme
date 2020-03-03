var MobileNavigation = {
  init: function($) {
    var self = this;

    // Define vars
    self.$mobileNavButton = $("#mobile-nav .hamburger");
    self.$mobileNavDrawer = $("#mobile-nav-drawer");
    self.$mobileNavItems = $("#mobile-nav-drawer .nav-items li");

    self.$mobileNavButton.on("click", function() {
      if (self.$mobileNavButton.hasClass("open")) {
        self.$mobileNavButton.removeClass("open");
        self.$mobileNavDrawer.removeClass("open");
      } else {
        self.$mobileNavButton.addClass("open");
        self.$mobileNavDrawer.addClass("open");
      }
    });

    self.$mobileNavItems.on("click", function(e) {
      e.preventDefault();
      $(window).off("scroll");
      self.$navItems.removeClass("active");
      $(this).addClass("active");

      self.$mobileNavButton.removeClass("open");
      self.$mobileNavDrawer.removeClass("open");
      var target = $($(this).find("a")).attr("href");
      var $target = $(target);
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: $target.offset().top + 2
          },
          500,
          "swing",
          function() {
            window.location.hash = target;
            $(window).on("scroll", self.onScroll);
          }
        );
    });
  }
};

jQuery(document).ready(function($) {
  MobileNavigation.init($);

  $("#lightslider").lightSlider({
    cssEasing: "ease", //'cubic-bezier(0.25, 0, 0.25, 1)',//
    easing: "linear", //'for jquery animation',////
    speed: 400, //ms'
    auto: false,
    keyPress: true,
    controls: true,
    slideMargin: 15,
    pager: false
  });
  // debugger;
  $(".flexslider").flexslider({
    animationLoop: false,
    slideshow: false,
    speed: 400,
    prevText: "", //String: Set the text for the "previous" directionNav item
    nextText: ""
  });
  // $(".page-image-slider").lightSlider({
  //   // adaptiveHeight: true,
  //   gallery: false,
  //   cssEasing: "ease", //'cubic-bezier(0.25, 0, 0.25, 1)',//
  //   easing: "linear", //'for jquery animation',////
  //   item: 1,
  //   loop: false,
  //   slideMargin: 15,
  //   keyPress: true,
  //   controls: true,
  //   onSliderLoad: function(el) {
  //     var maxHeight = 0,
  //       container = $(el),
  //       children = container.children();
  //
  //     children.each(function() {
  //       var childHeight = $(this).height();
  //       // console.log("height ", $(this).height());
  //       if (childHeight > maxHeight) {
  //         maxHeight = childHeight;
  //       }
  //     });
  //
  //     container.height(maxHeight);
  //     container.css({ height: `${maxHeight}px` });
  //   }
  // });

  $(".news-slider").lightSlider({
    cssEasing: "ease", //'cubic-bezier(0.25, 0, 0.25, 1)',//
    easing: "linear", //'for jquery animation',////
    speed: 400, //ms'
    auto: false,
    item: 3,
    keyPress: true,
    controls: true,
    slideMargin: 20,
    pager: false
  });

  if ($(window).width() > 939) {
    $("#nav .subnav").each(function() {
      var parentwidth =
        $(this)
          .parents()
          .eq(0)
          .width() / 2;
      var width = $(this).width() / 2;
      var left = -(width - parentwidth) + "px";
      $(this).css("left", left);
    });
  }

  $(".read-more").on("click", function() {
    var content = $(this).siblings(".abbreviated");
    if (content.hasClass("open")) {
      content.removeClass("open");
      $(this)
        .children(".close-text")
        .addClass("hidden");
      $(this)
        .children(".open-text")
        .removeClass("hidden");
    } else {
      $(".read-more").each(function() {
        var alt_content = $(this).siblings(".abbreviated");
        if (alt_content.hasClass("open")) {
          alt_content.removeClass("open");
          $(this)
            .children(".close-text")
            .addClass("hidden");
          $(this)
            .children(".open-text")
            .removeClass("hidden");
        }
      });
      content.addClass("open");
      $(this)
        .children(".open-text")
        .addClass("hidden");
      $(this)
        .children(".close-text")
        .removeClass("hidden");
    }
  });
});
