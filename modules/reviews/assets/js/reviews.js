(function(w, d, $){

  var reviewCarousel = $('.review__carousel');
  if (reviewCarousel.length > 0 && typeof initSlickCarousel === 'function') {
    initSlickCarousel(reviewCarousel, {
      dots: jsVars.reviews.dots,
      arrows: jsVars.reviews.arrows,
      autoplay: jsVars.reviews.autoplay,
      centerMode: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplaySpeed: jsVars.reviews.speed,    
      adaptiveHeight: true,
      mobileFirst: true,
      prevArrow: '<a href="#" class="review__nav review__nav--prev" aria-label="Go to previous review"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
      nextArrow: '<a href="#" class="review__nav review__nav--next" aria-label="Go to next review"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }

  $(window).on('load resize',function(){
    matchChildHeight({
      parentSel : '.review__carousel' , 
      childSel : '.review__wrapper'
    });
    // Reinitialize the Slick Carousel on window resize
    if (reviewCarousel.hasClass('slick-initialized')) {
      reviewCarousel.slick('resize');
    }
  }).trigger('resize');
})(window, document, jQuery);
