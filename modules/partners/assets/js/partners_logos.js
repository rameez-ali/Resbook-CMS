(function(w, d, $){

  initSlickSlider('.partner-logo', {
    lazyLoad: 'progressive',
    autoplay: true,
    slidesToShow: 2,
    autoplaySpeed: 2000,
    mobileFirst:true,
    prevArrow: '<a href="#" class="partner-logo__nav partner-logo__nav--prev" aria-label="Go to previous partner"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
    nextArrow: '<a href="#" class="partner-logo__nav partner-logo__nav--next" aria-label="Go to next partner"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
    responsive: [
      {
        breakpoint: 481,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 5,
        }
      },      
    ]
  });
  
})(window, document, jQuery);