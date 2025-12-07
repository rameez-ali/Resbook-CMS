(function(w, d, $){

  if ($('.blog-showcase').length) {

    initSlickCarousel('.blog-showcase', {
      lazyLoad: 'ondemand',
      dots: false,
      arrows: true,
      autoplay: true,
      centerMode: false,
      slidesToShow: 1,    
      adaptiveHeight: false,
      mobileFirst: true,
      prevArrow: '<a href="#" class="showcase__nav showcase__nav--prev"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
      nextArrow: '<a href="#" class="showcase__nav showcase__nav--next"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg>></a>',
      responsive: [
        {
            breakpoint: 768,
            settings: {slidesToShow: 2}
        }, {
            breakpoint: 1024,
            settings: {slidesToShow: 3}
        }
      ]
    });
  
  }

})(window, document, jQuery);