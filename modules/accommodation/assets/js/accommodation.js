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

  // Fix for preserving Bootstrap column classes after Shuffle.js initializes
  // This ensures Villa cards stay full width and other cards show 3 per row
  function preserveBootstrapColumns() {
    var $accomItems = $('.accommodation-wrapper .accom-items, .accommodation-wrapper .card');
    
    if ($accomItems.length) {
      $accomItems.each(function() {
        var $item = $(this);
        // Check if it's a Villa (has col-12 but NOT col-lg-4)
        var hasCol12 = $item.hasClass('col-12');
        var hasColLg4 = $item.hasClass('col-lg-4');
        var isVilla = hasCol12 && !hasColLg4;
        var windowWidth = $(window).width();
        
        // Force remove any inline styles that might interfere
        if (!isVilla && hasColLg4) {
          // For non-Villa cards (has col-lg-4), apply Bootstrap grid
          if (windowWidth >= 992) {
            // Large screens: 3 columns (33.33%)
            $item.css({
              'width': '33.333333%',
              'max-width': '33.333333%',
              'flex': '0 0 33.333333%',
              'position': 'relative',
              'left': 'auto',
              'top': 'auto'
            });
          } else if (windowWidth >= 768) {
            // Medium screens: 2 columns (50%)
            $item.css({
              'width': '50%',
              'max-width': '50%',
              'flex': '0 0 50%',
              'position': 'relative',
              'left': 'auto',
              'top': 'auto'
            });
          } else {
            // Small screens: 1 column (100%)
            $item.css({
              'width': '100%',
              'max-width': '100%',
              'flex': '0 0 100%',
              'position': 'relative',
              'left': 'auto',
              'top': 'auto'
            });
          }
        } else if (isVilla) {
          // Villa cards: always full width
          $item.css({
            'width': '100%',
            'max-width': '100%',
            'flex': '0 0 100%',
            'position': 'relative',
            'left': 'auto',
            'top': 'auto'
          });
        }
      });
    }
  }

  // Run immediately and multiple times to catch all scenarios
  $(document).ready(function() {
    preserveBootstrapColumns();
    
    // Run multiple times to catch Shuffle and other initializations
    setTimeout(function() {
      preserveBootstrapColumns();
    }, 100);
    
    setTimeout(function() {
      preserveBootstrapColumns();
    }, 500);
    
    setTimeout(function() {
      preserveBootstrapColumns();
    }, 1000);
  });

  // Run on window resize
  $(window).on('resize', function() {
    preserveBootstrapColumns();
  });
  
  // Also run after any DOM mutations (for dynamic content)
  if (window.MutationObserver) {
    var observer = new MutationObserver(function(mutations) {
      preserveBootstrapColumns();
    });
    
    $(document).ready(function() {
      var targetNode = document.querySelector('.accommodation-wrapper');
      if (targetNode) {
        observer.observe(targetNode, {
          childList: true,
          subtree: true,
          attributes: true,
          attributeFilter: ['style', 'class']
        });
      }
    });
  }

})(window, document, jQuery);
