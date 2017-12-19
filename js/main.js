var Slider = {
  init: function($, winWidth) {
    var self = $(this);

    self.$arrows = $('.arrows');
    $('.arrows').on('click', function() {
      var arrow = $(this);
      var slider = arrow.parents('.slider-container');
      var imageContainer = slider.children('.images');
      var images = imageContainer.children('.slider-item');
      var numberOfImages = images.length;
			var sliderWidth = winWidth < 1600 ? winWidth - 60 : 1600 - 60;
			var visibleImagesInSlider = sliderWidth / ($(images[0]).width() + 15);
      var left = 0;
      var leftPos;
			var firstVisible;
			var indexOfActive;

			if ($(slider).find('.slider-item.first').length === 0) {
				$(images[0]).addClass('first');
			}
			firstVisible = $(slider).find('.slider-item.first');
			indexOfActive = $(firstVisible).data('key');




      // ARROW LEFT
      if (arrow.data('key') === 'left' ) {
        if (indexOfActive === 0) { return;
        } else { indexOfNew = indexOfActive - 1; }

      // ARROW RIGHT
      } else {
        if ((indexOfActive + 1) === numberOfImages) { return;
        } else { indexOfNew = indexOfActive + 1; }
      }

      if (indexOfNew === 0) { left = 0;
      } else {
        for ( var i=0; i < indexOfNew; i ++ ) {
          left = left + $(images[i]).width() + 15;
        }
      }

      $(images[indexOfActive]).removeClass('first');
      $(images[indexOfNew]).addClass('first');
      leftPos = -left + "px";
      $(imageContainer).css('left', leftPos);
    });
  }
};

// jQuery(document).ready(function($) {
// 	var winWidth = $(window).width();
//   $("#lightSlider").lightSlider();
// });

jQuery(document).ready(function($) {
  $('#lightslider').lightSlider({
    cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
    easing: 'linear', //'for jquery animation',////
    speed: 400, //ms'
    auto: false,
    keyPress: true,
    controls: true,
    slideMargin: 15,
    pager: false
  });

  $('.page-image-slider').lightSlider({
     gallery: false,
     cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
     easing: 'linear', //'for jquery animation',////
     item: 1,
     loop: true,
     slideMargin: 15,
     keyPress: true,
     controls: true
  });

  $('.news-slider').lightSlider({
    cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
    easing: 'linear', //'for jquery animation',////
    speed: 400, //ms'
    auto: false,
    item: 3,
    keyPress: true,
    controls: true,
    slideMargin: 15,
    pager: false
  });

 });
