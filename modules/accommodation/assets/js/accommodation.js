(function(w, d, $){

  $(window).on('load resize',function(){
    matchElmHeight('.accommodation-showcase .card .card__content-inner');

    matchChildHeight({
      parentSel : '.accommodation-wrapper' , 
      childSel : '.card .card__inner .card__content .card__content-inner',
      breakPoint: 768});

    matchElmHeight('.accommodation-showcase .card .card__cta');  
    matchElmHeight('.accommodation-wrapper .card__inner .card__cta');    

  }).trigger('resize');

  var prevArrowCls = 'showcase__nav showcase__nav--prev',
      nextArrowCls = 'showcase__nav showcase__nav--next';
 
  initSlickCarousel('.accommodation-showcase', {
    lazyLoad: 'ondemand',
   autoplay: true,
   centerMode: false,
   slidesToShow: 1,
   autoplaySpeed: 5000,
   mobileFirst:true,
   dots: false,
   arrows: true,
   prevArrow: '<a href="#" class="'+prevArrowCls+'" aria-label="Go to previous accommodation"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
   nextArrow: '<a href="#" class="'+nextArrowCls+'" aria-label="Go to next accommodation"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
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
 

   w.initAccordion = function(elm){
    var itemElm       = $(elm),
        itemBodyElm   = '.accommodation__body',
        itemLink      = '.accommodation__link',
        iconExpand    = 'arrow-down',
        iconCollapse  = 'arrow-up',
        icon          = '.accommodation__link-icon';

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

initAccordion('.accommodation-accordion');
initShuffle('.accom-shuffle', '.accom-items', '.filters__btn', 'filters__btn--active');

})(window, document, jQuery);
