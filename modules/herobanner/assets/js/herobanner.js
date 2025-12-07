(function(w, d, $){

  /**
   * A selector will be an anchor tag and will provide the href value which will be the id of the content
   *
   * @param string selector Selector of a element which is the anchor tag href value
   *
   * @return void
   */
  w.initScrollToSection = function(selector) {

    $(selector).click(function(e) {
      e.preventDefault();

      var elemId    = $(this).attr('href'),
          offset    = $(elemId).offset().top,
          newOffset = parseInt(offset) - 120;

        $('html, body').animate({
            scrollTop: newOffset
        }, 1500); 
    });
  };


  var carouselOptions = {
    lazyLoad: 'ondemand',
    autoplay: true,
    centerMode: false,
    slidesToShow: 1,
    autoplaySpeed: parseInt(jsVars.slideshow.speed),
    adaptiveHeight: false,
    fade: true,
    mobileFirst: true,
    prevArrow: '<a href="#" class="banner-nav banner-nav--prev"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
    nextArrow: '<a href="#" class="banner-nav banner-nav--next"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
  };

  // check if the page is the homepage
  if ($('.banner').hasClass('slider-banner')) {
    carouselOptions.dots = true;
    carouselOptions.arrows = false;
    carouselOptions.dotsClass = 'slick-dots';
  } else {
    carouselOptions.dots = false;
    carouselOptions.arrows = false;
  }

  if($('.banner').hasClass('slider-banner')) {
    initSlickCarousel('.slideshow-home', carouselOptions);
    initSlickCarousel('.slideshow-page', carouselOptions);
  }

  initScrollToSection('.banner__scroll-link');

  var headerheight = $('#header').outerHeight();

  // set top margin in all cases
  $('.banner').css('margin-top', headerheight + 'px');

  // check if the page is the homepage
  if($('.banner').hasClass('banner--fs')){
    var viewportheight = $(window).height();
    // subtract the margin-top from the height
    $('.banner').css('height', viewportheight - headerheight + 'px');
  }
})(window, document, jQuery);