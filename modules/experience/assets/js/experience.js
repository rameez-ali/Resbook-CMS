(function(w, d, $){

  $(window).on('load resize',function(){

    matchElmHeight('.experience-showcase .card .card__content-inner');
    matchElmHeight('.experience .card .card__content-inner');
    
    var cardCtaHgt = $('.card__cta').height();
    var windowWidth  = $(window).width();
    var cardHolder   = $('.experience .card');
   
    if((cardCtaHgt > 56) && (windowWidth < 1660 && windowWidth > 736)){
  
      var elementHeights = $('.experience .card').map(function() {
        return $(this).height();
      }).get();
     
      var maxHeight = Math.max.apply(null, elementHeights);
      
      cardHolder.css('height', maxHeight);

    } else {
      cardHolder.css('height','');
    }

  }).trigger('resize');

  //initShuffle('.experience', '.card', '.filters__btn', 'filters__btn--active');

  if ($('.experience-showcase').length) {

    initSlickCarousel('.experience-showcase', {
      lazyLoad: 'ondemand',
      dots: false,
      arrows: true,
      autoplay: true,
      centerMode: false,
      slidesToShow: 1,    
      adaptiveHeight: false,
      mobileFirst: true,
      prevArrow: '<a href="#" class="showcase__nav showcase__nav--prev"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
      nextArrow: '<a href="#" class="showcase__nav showcase__nav--next"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
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


  w.initAccordion = function(elm){
    var itemElm = $(elm),
        itemBodyElm = '.experience__body',
        itemLink = '.experience__link',
        iconRotated = 'rotated',
        icon = '.experience__link-icon';

        if(itemElm.length) {
          // Check if accommodation__link-icon exists in the document.
          var hasIcon = $(icon).length > 0;
  
          // If the accommodation__link-icon exists, initialize the accordion behavior.
          if(hasIcon) {
              if ($(window).width() > 1024) {
                  itemElm.find(itemBodyElm).show();
                  itemElm.find(icon).addClass(iconCollapse);
                  itemElm.addClass('active');
              } else {
                  itemElm.find(itemBodyElm).hide();
                  itemElm.find(icon).addClass(iconExpand);
              }
              itemElm.on('click', itemLink , function(e){
                  e.preventDefault();
                  var self      = $(this),
                      parentElm = self.parents(elm),
                      targetElm = self.attr('href');
                  var isOpen = parentElm.hasClass('active');
                  if(isOpen) {
                      parentElm.removeClass('active');
                      $(targetElm).slideUp();
                      self.find('i').removeClass(iconCollapse).addClass(iconExpand);
                  } else {
                      itemElm.removeClass('active');
                      parentElm.addClass('active');
                      $(targetElm).slideDown();
                      $(itemBodyElm).not(targetElm).slideUp();
                      self.find('i').removeClass(iconExpand).addClass(iconCollapse);
                  }
              });
          } else {
              // If the accommodation__link-icon does not exist, simply show the content without hiding.
              itemElm.find(itemBodyElm).show();
          }
      }
}


  initAccordion('.experience-accordion');

})(window, document, jQuery);