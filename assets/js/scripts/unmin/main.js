/*! new-base-cms 2023-11-13 01:11 */
(function(w, d, $){

  var REQUEST_URL = '/requests/service';

  w.initFilterShow = function(parentSelector, selector, trigger, options) {
    $(trigger).on('click', function() {
      if ($(parentSelector).hasClass(options)) {
        $(parentSelector).removeClass(options);
        $(trigger).html('All<i class="fa fa-angle-down"></i>');
      } else {
        $(parentSelector).addClass(options);
        $(selector).on('click', function(){
          $(trigger).html($(this).html()+'<i class="fa fa-angle-down"></i>');
          $(parentSelector).removeClass(options);
        })
      }
    });
  };

   /**
   * This function use Vue.js to create a framework
   * https://vuejs.org/v2/guide/
   *
   * @param string selector Selector of a element to initialize Vue Elements
   *
   * @param object options Object of the framework

   * @return void
   */
  w.initVue = function(selector, options) {

    if (selector && $(selector).length) {
      options.el = selector;
      new Vue(options);
    }

  };

  /**
   * This function to simplify the ajax post request
   *
   * @param object props Object call of the request

   * @return void
   */
  w.initPost = function(props) {

    if (Object.keys(props).length > 0 && props.constructor === Object) {

      var baseUrl = '',
          params = {},
          action = {},
          context = this,
          error = {error: function(){}};

      if (props.hasOwnProperty("base") && props.base.length) {
        baseUrl = window.location.origin + '/request/' + props.base;
      }

      if (props.hasOwnProperty("params")) {
        params = props.params;
        action = {
          action: props.action
        };
        params = $.extend(true, params, action);
      } else {
        action = {
          action: props.action
        };
        params = action;
      }

      if (props.hasOwnProperty("context")) {
        context = props.context;
      }

      if (props.hasOwnProperty("error")) {
        error = props.error;
      }

      $.ajax({
        url: baseUrl,
        context: context,
        method: 'POST',
        data: params,
        success: props.success,
        error: error
      });

    }

  };

  w.initSlickCarousel = function(selector, options) {

    if (!selector) {
      selector = '.carousel';
    }

    var defaultOptions = {
      dots: false,
      arrows: true,
      autoplay: false,
      infinite: true,
      speed: 500,
      prevArrow: '<a href="#" class="carousel__nav carousel__nav--prev">'+
      '<i class="fa fa-angle-left"></i>'+
      '</a>',
      nextArrow: '<a href="#" class="carousel__nav carousel__nav--next">'+
      '<i class="fa fa-angle-right"></i>'+
      '</a>'

    };

    options = $.extend(true, defaultOptions, options);

    var slider = $(selector).slick(options);

    return slider;

  };

  function togglePrimaryNav() {

    var toggleBtnSel        = '.mobile__btn',
        toggleBtnActiveCls  = 'mobile__btn--active',
        targetActiveCls     = 'header__nav--active',
        currentHashValue    = window.location.hash,
        menuActiveBlock     = 'menu-active',
        menuTriggerElmBlock = 'sub-nav-trigger',
        menuElmSel          = '.header__nav-link, .header__nav-sub-menu-link';

    var toggleMenuBlock = function () {

      var menuItems = $(menuElmSel);

      if ($(window).width() < 992) {
        $(menuElmSel).addClass(menuTriggerElmBlock);
      } else if($(menuElmSel).hasClass(menuTriggerElmBlock)) {
        $('.'+menuTriggerElmBlock).removeClass(menuTriggerElmBlock);
      }

    };

    toggleMenuBlock();

    $(window).on('resize', function(){
      toggleMenuBlock();
    });

    $(d).on('click', toggleBtnSel, function(e){
      e.preventDefault();

      var self      = $(this),
          targetSel = self.attr('href'),
          hashVal   = '';

      if (!self.hasClass(toggleBtnActiveCls)) {

        $('body').addClass('no-scroll');
        self.addClass(toggleBtnActiveCls);
        $(targetSel).addClass(targetActiveCls);

        hashVal = targetSel;

      } else {

        $('body').removeClass('no-scroll');
        self.removeClass(toggleBtnActiveCls);
        $(targetSel).removeClass(targetActiveCls);
      }


    }).on('click', '.'+menuTriggerElmBlock, function(e) {
      e.preventDefault();

      var self = $(this);

      if (self.parents('li').hasClass('menu-active')) {
        self.parents('li').removeClass(menuActiveBlock);
      } else {
        self.parents('li').addClass(menuActiveBlock);
      }

    }).on('click', '.header__nav-sub-menu-back', function(e){
      e.preventDefault();
      var self = $(this);

      self.closest('.'+menuActiveBlock).removeClass(menuActiveBlock);
    });

  }

  w.initSwipeBox = function(selector, options) {

    if (typeof selector !== 'string') {
      console.error('selector is required for initSwipeBox');
      return false;
    }

    var defaults = {
      selector: selector,
      afterOpen: function(){
        var $selectorClose = $("#swipebox-close");
        var clickAction = "touchend click";

        $selectorClose.unbind(clickAction);

        $selectorClose.bind(clickAction, function(event){
          event.preventDefault();
          event.stopPropagation();

          $.swipebox.close();
        });
      }
    };

    options = $.extend(true, defaults, options);

    $(selector).swipebox(options);

  };

  w.initSlickSlider = function(selector, options) {

    if (!selector) {
      selector = '.gallery-slider';
    }

    var defaultOptions = {
      dots: false,
      arrows: true,
      autoplay: false,
      infinite: true,
      speed: 500,
      prevArrow: '<a href="#" class="gallery-slider__nav gallery-slider__nav--prev"><i class="fa fa-angle-left"></i></a>',
      nextArrow: '<a href="#" class="gallery-slider__nav gallery-slider__nav--next"><i class="fa fa-angle-right"></i></a>'
    };

    options = $.extend(true, defaultOptions, options);

    var slider = $(selector).slick(options);

    return slider;

  };

  w.initShuffle = function( selector, itemSelector, trigger, activeClass){
    var jElm = $(selector),
    ths = this;

    if(jElm.length)
    {
      jElm.shuffle({
          group:'all',
          itemSelector: itemSelector,
          speed:450,
          delimeter: ','
      });

      $(trigger).on('click', function(e) {

        e.preventDefault();

        jElm.shuffle('shuffle', $(this).attr('data-group') );

        $(trigger).removeClass(activeClass);
        $(this).addClass(activeClass);

        if($(itemSelector).hasClass('swipebox')){
          initSwipeBox('.shuffle-item.filtered');
        }

      });

    }
  };

  w.toggleFilters = function (selector, options) {

    var jElm = $(selector);

    if (jElm.length) {

      var defaultOptions = {
        activeClass : 'filters--open',
        showFilterLabel: '<i class="fas fa-plus"></i> Show Filters',
        hideFilterLabel: '<i class="fas fa-times"></i> Hide Filters'
      };

      options = $.extend(true, defaultOptions, options);

      $(document).on('click', selector , function(e) {
          e.preventDefault();

          var self        = $(this),
              filtersSel  = self.attr('href'),
              filters     = $(filtersSel),
              isOpened    = filters.hasClass(options.activeClass);

          if( !isOpened ) {
              filters.addClass(options.activeClass);
              jElm.html(options.hideFilterLabel);
          } else {
              filters.removeClass(options.activeClass);
              jElm.html(options.showFilterLabel);
          }
      });
    }
  }

  w.initElmHeight = function(selector){
    if($(selector).length){
      var width = $(selector).width();
      $(selector).css('height', width);
    }
  }

  w.matchElmHeight = function(elm) {
    var jElm = (typeof elm == 'string') ? $(elm) : elm;

    if( jElm )
    {
        jElm.css('height','auto');

        var height = 0;

        jElm.each(function(i, el) {
            var jEl = $(el),
            elHeight = jEl.height();

            if( elHeight > height ) height = elHeight;
        });

        jElm.css('height', height);
    }
  };

  w.matchChildHeight = function(options) {

    var defaultOptions = {
      parentSel : '' ,
      childSel : '',
      breakPoint: ''
    };

    options = $.extend(true, defaultOptions, options);

    var parentElm = (typeof options.parentSel == 'string') ? $(options.parentSel) : options.parentSel;

    if( parentElm ) {

      var windowWidth = $(window).width();

      if (options.breakPoint && windowWidth < options.breakPoint) {

        $(options.childSel).css('height','auto');

      } else {

        parentElm.each(function() {

          var self     = $(this),
              childElm = self.find(options.childSel);

          childElm.css('height','auto');

          var height = 0;

          childElm.each(function(i, el) {

            var jEl = $(el),
              elHeight = jEl.height();

              if( elHeight > height ) height = elHeight;
          });

          childElm.css('height', height);

        });

      }
    }
  };

  w.initHeader = function(elem) {

    if ($('.home').length <= 0) {

      $('.header').addClass('fixed');

    } else {

      $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if ($(window).width() > 1200) {
          if (scroll >= 125) {
            $(elem).addClass('fixed');
          } else {
            $(elem).removeClass('fixed');
          }
        }

      });

    }

  };

  w.app = {};

  w.app.init = function() {

    togglePrimaryNav();

    initHeader('.header');

    initNewsletterSignup('.form--newsletter');

    initSlickCarousel('.carousel');

    initSwipeBox('.swipebox');

    initFilterShow('#filters__wrapper', '.filters__btn', '.filter__show-btn', 'filters--active');
   
    var mapCanvas = 'map-canvas',
      mapCanvasElm = $('#'+mapCanvas);

    if (mapCanvasElm.length) {    
      
      initGoogleMap('map-canvas', jsVars.map);

    }

    if($('.voucher__form').length) {

      $('.email-group').hide();
      $('.post-group').hide();

      $('input[name="deliver-type"]').change(function() {
        if (this.value == 'Email') {
              $('.email-group').show();
              $('.post-group').hide();
        }
        else if (this.value == 'Post') {
            $('.post-group').show();
            $('.email-group').hide();
        }
      });

      $( "#voucher-type" ).change(function () {
        $( "#voucher-type option:selected" ).each(function() {

          var voucherPrice = $(this).val();
          var value = $(this).data('value');

          if(voucherPrice != '') {

            $('#voucher-cust-amount').val(voucherPrice);
            $('#voucher-title').val(value);
            $('#voucher-cust-amount').attr('readonly','readonly');
            $('#voucher-title').attr('readonly','readonly');

          } else{
            $('#voucher-cust-amount').val('');
            $('#voucher-title').val('');
            $('#voucher-cust-amount').removeAttr('readonly');
            $('#voucher-title').removeAttr('readonly');
          }
        })
      });

    }

    $( document ).ready(function() {
      var deliveryOption = $('form input[name="deliver-type"]:checked').val();
      if (deliveryOption == 'Email') {
          $('.email-group').show();
          $('.post-group').hide();
      }
      else if (deliveryOption == 'Post') {
          $('.post-group').show();
          $('.email-group').hide();
      }
    });

    //Investigate: BEP API error instead of Book now button improvement ID 872457929
    $(document).ready(function() {
      // Check if the widget is loaded
      if ($('.CheckInPersonWidget').length > 0) {
          // Observe changes in the widget using a MutationObserver
          var observer = new MutationObserver(function(mutationsList) {
              // Check if the error message element exists in the widget
              if ($('.CheckInPersonWidget .text-danger').length > 0) {
                  // Replace the widget with a disabled button and a tooltip
                  $('.CheckInPersonWidget').replaceWith('<a href="#" class="btn btn__book btn--primary disabled" data-toggle="tooltip" data-placement="top" title="Something went wrong. Please try again">Book<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/></svg></a>');
                  // Initialize the tooltip
                  $('[data-toggle="tooltip"]').tooltip();
                  // Disconnect the observer once the modification is made
                  observer.disconnect();
              }
              // Check if the buttons exist in the widget
              var bookDirectBtn = $('.CheckInPersonWidget .toggle-check-availability');
              var closeBtn = $('.CheckInPersonWidget .close-btn');

              if (bookDirectBtn.length > 0) {
                var svgNS = "http://www.w3.org/2000/svg";   // Define SVG namespace

                var svg = document.createElementNS(svgNS, "svg");   // Create SVG element
                svg.setAttributeNS(null, "width", "17.88");
                svg.setAttributeNS(null, "height", "11.88");
                svg.setAttributeNS(null, "viewBox", "0 0 29.117 29.117");
                svg.setAttributeNS(null, "class", "book-btn-arrow");
            
                var path = document.createElementNS(svgNS, "path");  // Create path element
                path.setAttributeNS(null, "id", "arrow_forward_FILL0_wght400_GRAD0_opsz48");
                path.setAttributeNS(null, "d", "M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z");
                path.setAttributeNS(null, "transform", "translate(-160 -256)");
                path.setAttributeNS(null, "fill", "#fff");
            
                svg.appendChild(path);  // Add path to SVG
            
                // $(window).width() <= 768) {
                bookDirectBtn.empty().append('book ', svg);  // Add SVG to button
                // }
                // Disconnect the observer once the modification is made
                observer.disconnect();
              }

              if (closeBtn.length > 0) {
                  // Check if the viewport width is less than or equal to 768px
                  if ($(window).width() <= 768) {
                      // Add the "Close Booking" text to the close button
                      closeBtn.prepend('<span class="closenbk-btn">Close Booking</span>');
                  }
                  // Disconnect the observer once the modification is made
                  observer.disconnect();
              }
              // Remove readonly attribute from increment input on mobile view
              // if (window.matchMedia('(max-width: 768px)').matches) {
              //     $('.count-increment .increment-input').prop('readonly', false);
              // }
          });

          // Start observing the widget
          observer.observe($('.CheckInPersonWidget')[0], { childList: true, subtree: true });
      } else {
          // Handle the case when the widget is not present
          $('.book-btn').html('<a href="#" class="btn btn__book btn--primary disabled" data-toggle="tooltip" data-placement="top" title="Something went wrong. Please try again">Book</a>');
          $('[data-toggle="tooltip"]').tooltip();
      }

      // Initialize tooltips for existing buttons
      $('[data-toggle="tooltip"]').tooltip();
    });

    // $(document).ready(function(){
    //   $('.inspireButtonPrimary a').each(function() {
    //     $(this).append('<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon"> <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/></svg>');
    //   });
    // });
    // $(document).ready(function(){
    //   $('.inspireButtonSecondary a').each(function() {
    //     $(this).append('<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#11BBB4"/></svg>');
    //   });
    // });

    // INITIALIZE HOSTEL PAGE GALLERY
    initSlickCarousel('.gallery', {
      slidesToShow: 4,
      prevArrow: '',
      nextArrow: ''
    })
  };

})(window, document, jQuery);;(function(w, d, $){

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
;(function(w, d, $){

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

})(window, document, jQuery);;(function(w, d, $){

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

})(window, document, jQuery);;(function(w, d, $){
 
  w.initAccordion = function(elm){

    var itemElm       = $(elm),
        itemBodyElm   = '.faq__body',
        itemLink      = '.faq__link',

        iconExpand    = 'arrow-down',
        iconCollapse  = 'arrow-up',
        defaultState  = (typeof jsVars.faq !== "undefined")? jsVars.faq.defaultState: '';

    if(itemElm.length) {
      itemElm.find(itemBodyElm).hide();

      if(defaultState == true) {
        $(elm+':eq(0)').find(itemBodyElm).show();    
        $(elm+':eq(0)').addClass('active');
        $(elm+'.active').find(itemLink).addClass('active');
        $(elm+'.active').find('i').removeClass(iconExpand).addClass(iconCollapse);
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
          itemElm.find(itemLink).removeClass('active');
    
          parentElm.addClass('active');

          $(targetElm).slideDown();

          $(itemBodyElm).not(targetElm).slideUp();

          itemElm.find('i').removeClass(iconCollapse).addClass(iconExpand);     
          self.find('i').removeClass(iconExpand).addClass(iconCollapse);
        }

      });
    }
  }

  initAccordion('.faq-accordion .faq');

})(window, document, jQuery);;(function(w, d, $){
 
  w.changeCompBtnState =  function( ) {

    var tcEl    = $('#tc');
    var agEl    = $('#age-limit');
    var hasTcEl = (tcEl.length == 1);
    var hasAgEl = (agEl.length == 1);
    var compBtn = $('#form-submit-btn');
    var enableBtn = false;

    compBtn.addClass('disabled').attr('disabled', 'disabled');

    if( hasTcEl && hasAgEl && tcEl.is(':checked') && agEl.is(':checked') ) {

        enableBtn = true;

    } else if( hasTcEl && !hasAgEl && tcEl.is(':checked') ) {

        enableBtn = true;

    } else if( !hasTcEl && hasAgEl && agEl.is(':checked') ) {

        enableBtn = true;

    }

    if( enableBtn ) {
        compBtn.removeClass('disabled').removeAttr('disabled');
    }
  }

  w.initDateControl = function(field, opts) {

    fieldElm = $('.'+field);

    if(fieldElm.length) {

        fieldElm.each(function(index) {

            var filedId = $(this).attr('id'),
                field   = document.getElementById( filedId );

            $(field).attr({autocomplete: 'off', readonly: true});

            new Pikaday({
                field: field,
                format: 'DD/MM/YYYY',
                minDate: new Date()
            });

        });
    }
  };

  initDateControl('date-control');

  $('.trigger-tc-modal').on('click', function(e){
    e.preventDefault();

    $('#tc-modal').modal('show');

  });

  $('#tc, #age-limit').on('change', changeCompBtnState);

  $('.accept-tc').on('click', function(e){
      e.preventDefault();
      $('#tc').attr({disabled: false, checked: true})
      changeCompBtnState();
  })

})(window, document, jQuery);;(function(w, d, $){

 var prevArrowCls = 'showcase-gallery__carousel-nav showcase-gallery__carousel-nav--prev',
     nextArrowCls = 'showcase-gallery__carousel-nav showcase-gallery__carousel-nav--next';

 initSlickCarousel('.showcase-gallery__carousel', {
    lazyLoad: 'ondemand',
    autoplay: true,
    centerMode: false,
    slidesToShow: 1,
    autoplaySpeed: 2000,
    mobileFirst:true,
    dots: false,
    arrows: true,
    prevArrow: '<a href="#" class="'+prevArrowCls+'"><i class="fas fa-angle-left"></i></a>',
    nextArrow: '<a href="#" class="'+nextArrowCls+'"><i class="fas fa-angle-right"></i></a>',
    responsive: [
        {
            breakpoint: 767,
            settings: {slidesToShow: 2}
        }, {
            breakpoint: 1024,
            settings: {slidesToShow: 4}
        }
    ]
});

  initShuffle('.gallery-shuffle', '.gallery-item', '.filters__btn', 'filters__btn--active');

})(window, document, jQuery);;(function(w, d, $){

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
})(window, document, jQuery);;(function(w, d, $){

  w.initHeroBannerVideoPopup = function(elm){
    var jElm = $(elm);

    if ( jElm.length ) {
      jElm.on('click', function(e){
        
        e.preventDefault();

        var self = $(this),
        popup = $(self.data('hero-popup'));

        popup.toggleClass('open');
        $('body').addClass('no-scroll');

        var iframe = popup.find('iframe');

        if ( iframe.length ) {
          
          iframe.attr('src', iframe.data('src'));

        }

      });


      $('body').on('click', '.hero-video-popup .hero-video-popup-close', function(e){
     
        e.preventDefault();
        
        var self = $(this),
        popup = $(self.attr('href'));
    
        popup.removeClass('open');
        $('body').removeClass('no-scroll');

        var iframe = popup.find('iframe'); 
        
        if ( iframe.length ) {
              iframe.attr('src', '');
        }
          
      });

    }

  }
  
  w.onYouTubeIframeAPIReady = function () {

    var elm         = $('.banner__video').get(0),
        parentElm   = $('.banner'),
        id          = elm.getAttribute("data-id"),
        frameWidth  = parentElm.width(),
        frameHeight = parentElm.height(),
        newFrameWidth,
        newFrameHeight;

    parentElm.css('overflow', 'hidden');
    
    var player = new YT.Player(elm, {
        videoId: id,
        width: frameWidth,
        height: frameHeight,
        playerVars: {
          start: 0,
          autoplay: false,
          controls: false,
          rel: 0,
          showinfo: false,
          modestbranding: true,
          loop: true,
          fs: false,
          cc_load_policy: true,
          iv_load_policy: 3,
          autohide: false,
          playlist: id
        },
        events: {
          onReady: function(e) {
            e.target.mute();
            e.target.playVideo();

            // Make video element full screen

            newFrameWidth = frameHeight*1.77;

            if (newFrameWidth < frameWidth) {

              newFrameWidth   = frameWidth;
              newFrameHeight = ( frameWidth*0.565 );

            } else { 

              newFrameHeight = frameHeight;
            }

            $('.banner__video').css({
              'height': newFrameHeight,
              'width': newFrameWidth
            });
          }
        }
    });

  }

  function appendYouTubeAPI() {

    var jElm    = $('.banner__video'),
        videoId = jElm.data('id');

    if (jElm.length == 1 && videoId) {

      var apiUrl = 'https://www.youtube.com/iframe_api?callback=onYouTubeIframeAPIReady';

      var tag     = document.createElement('script');
          tag.src = apiUrl;

      $('head').append(tag);

    };
  }

  appendYouTubeAPI();

  initHeroBannerVideoPopup('[data-hero-popup]');


})(window, document, jQuery);;(function(w, d, $){

  var highlightItemLength = $( ".section-highlight .highlight__item" ).length;
  var highlight = $('.section-highlight .highlight');
  var windowWidth = $(window).width();

  if ((highlightItemLength === 3) && (windowWidth < 1660 && windowWidth > 1024)) {
    highlight.addClass('highlight__2-images');
  }

  if ((highlightItemLength === 2) && (windowWidth > 1659)) {
    highlight.addClass('highlight__1-images');
  }
  $(window).on('load resize',function(){
    matchElmHeight('.highlight_tile .card .card__content-inner');

  }).trigger('resize');
  $(document).ready(function() {
    if ($('.highlight-featured-box .featured-button').length) {
        $('.highlight-featured-box').addClass('has-featured-button');
    }
  });

  matchChildHeight({
    parentSel : '.highlight_tile' , 
    childSel : '.card .card__inner .card__content .card__content-inner',
    breakPoint: 768});

  initSlickCarousel('.highlight_tile', {
    lazyLoad: 'ondemand',
    dots: false,
    arrows: true,
    autoplay: true,
    centerMode: false,
    slidesToShow: 1,
    adaptiveHeight: false,
    mobileFirst: true,
   prevArrow: '<a href="#" class="showcase__nav showcase__nav--prev" aria-label="Go to previous highlight tile"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
   nextArrow: '<a href="#" class="showcase__nav showcase__nav--next" aria-label="Go to next highlight tile"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
   responsive: [
    {
      breakpoint: 768,
      settings: {slidesToShow: 2}
  },
   {
      breakpoint: 1024,
      settings: {slidesToShow: 3}
  }
   ]
 });

   // Initialization for featured highlight
   initSlickCarousel('.highlight_featured', {
    lazyLoad: 'ondemand',
    dots: false,
    arrows: true,
    autoplay: true,
    centerMode: false,
    slidesToShow: 1,
    adaptiveHeight: false,
    mobileFirst: true,
    prevArrow: '<a href="#" class="featured-nav featured-nav--prev" aria-label="Go to previous highlight"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
    nextArrow: '<a href="#" class="featured-nav featured-nav--next" aria-label="Go to next highlight"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
  });

})(window, document, jQuery);;(function(w, d, $){
	"use strict";

	var IG_REQUEST_URL = 'request/instagram';

	w.InstagramCarousel = function() {
	
		var igItemsView = '';

		$.post( IG_REQUEST_URL, 'action=fetch-igfeed',
		 function(response) {

			if(response.isValid) {
				var igItems = response.items;
				if( igItems.length ) {
					_.each(igItems, function( item ){
						var igMediaType			 		= item.media_type,
								igMediaImage				= (igMediaType == 'VIDEO') ? item.thumbnail_url : item.media_url,
								igMediaUrl 	 				= item.media_url,
								postCaption   			= item.caption;
						igItemsView += '<a href="'+igMediaUrl+'" rel="ugc" '+
								'class="instagram__link instagram__link--cover swipebox" data-category="Instagram" title="'+postCaption+'"'+
								'data-action="Image Link" data-name="Instagram Photo">'+
								'<img class="instagram__img" data-lazy="'+ igMediaImage +'" alt="'+postCaption+'">'+
								'</a>';
					});
					$('#instagram-carousel').slick('slickAdd', igItemsView);
				}
			}			
		}, 'json');
	};

		
	if($('#instagram-carousel').length) {
		/** get instagram photos */
		$(window).on('load', function() {

			$('#instagram-carousel').slick({
				// lazyLoad: 'progressive',
				centerMode: false,
				slidesToShow: 3,
				adaptiveHeight:false,
				mobileFirst:true,
				prevArrow: '<a href="#" class="instagram__nav instagram__nav--prev"><svg id="arrow-left-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l1.911-1.956-11.237-11.237h23.885v-2.73H165.232l11.237-11.237L174.559,256,160,270.559Z" transform="translate(-160 -256)"/></svg></a>',
				nextArrow: '<a href="#" class="instagram__nav instagram__nav--next"><svg id="arrow-right-grey" xmlns="http://www.w3.org/2000/svg" width="29.117" height="29.117" viewBox="0 0 29.117 29.117" class="review-arrow"><path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)"/></svg></a>',
				responsive: [						
					{
						breakpoint: 520,
						settings: {
						slidesToShow: 2,
						}
					},
					{
						breakpoint: 768,
						settings: {
						slidesToShow: 3,
						}
					},								
					{
						breakpoint: 1023,
						settings: {
							slidesToShow: 4,
						}
					},
					{
						breakpoint: 1400,
						settings: {
							slidesToShow: 5,
						}
					},
					{
						breakpoint: 1600,
						settings: {
							slidesToShow: 6,
						}
					},
				]
			});
			InstagramCarousel();
		});
	}

}(window, document, jQuery));(function(w, d){
	"use strict";

	var IG_REQUEST_URL = 'request/instagram',
			IG_ITEM_LIMIT  = 6;

 w.InstagramGrid = function() {

	var igItemsView = '';

		$.post( IG_REQUEST_URL, 'action=fetch-igfeed',
		function(response) {

			if(response.isValid) {
				var igItems = response.items;
				if( igItems.length ) {
					_.each(igItems, function( item , index){

						if (index < IG_ITEM_LIMIT) {
							var igMediaType			 		= item.media_type,
							igMediaImage				= (igMediaType == 'VIDEO') ? item.thumbnail_url : item.media_url,
							igMediaUrl 	 				= item.media_url,
							postCaption   			= item.caption;

						igItemsView += '<a href="'+igMediaUrl+'" rel="ugc" '+
								'class="instagram__link instagram__link--cover swipebox" data-category="Instagram" title="'+postCaption+'"'+
								'data-action="Image Link" data-name="Instagram Photo">'+
								'<img class="instagram__img" src="'+ igMediaImage +'" alt="'+postCaption+'">'+
								'</a>';
						}					
					});
					$('#instagram-grid').html(igItemsView);
				}
			}			
		}, 'json');
	};

	if($('#instagram-grid').length) {
		/** get instagram photos */
		InstagramGrid();
	}

}(window, document));(function(w, d, $){
  
  // DEFINE GLOBAL FUNCTIONS, VARIABLES & CONSTANTS
  
  var map;
  
  /**
  * This function uses Google maps v3 API to show map
  *
  * @param string canvasId, ID selector (without #) of a element on which 
  *                         map will be loaded
  *
  * @param object options, object of map settings
  *
  * @return void
  */
  function showMap(canvasId, options) {

    var canvas = document.getElementById(canvasId);

    if (!canvas || !options) {
      console.warn('missing parameters for google maps');
      return false;
    }
    
    if (canvas) {
      
      var lat       = parseFloat(options.lat),
          lng       = parseFloat(options.lng),
          markerLat = parseFloat(options.markerLat),
          markerLng = parseFloat(options.markerLng),
          zoom      = parseInt(options.zoom)
          mapStyles = options.styles;
      
      if (!zoom) {
        zoom = 15;
      }
      
      var mapCenter = new google.maps.LatLng(lat, lng);
      var mapMarkerLatLng = new google.maps.LatLng(markerLat, markerLng);
      
      var mapOptions = {
        zoom: zoom,
        center: mapCenter, 
        scrollwheel: false,
        draggable:true,
        mapTypeControl: false,
        styles: mapStyles
      };

      map = new google.maps.Map(canvas, mapOptions);

      marker = new google.maps.Marker({
        position: mapMarkerLatLng,
        map: map,
        icon: options.graphics+"map-marker.png",
        title: options.title
      });

      if(options.infoboxContent != '') {
        
        var leftOffset = ($(window).width() < 580 ) ? -120 : -175;

        var infoBoxOptions = {
            content: options.infoboxContent,
            disableAutoPan: false,
            maxWidth: 260,
            pixelOffset: new google.maps.Size(leftOffset, 20),
            zIndex: null,
            closeBoxURL: options.graphics+"icon-close.png",
            infoBoxClearance: new google.maps.Size(1, 1),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false,
            closeBoxMargin: "0px;position: absolute; right: 0px; top: 0px; z-index: 3;"
        };      
        
        var infoBox = new InfoBox(infoBoxOptions);

        google.maps.event.addListener(marker, "click", function () {

          infoBox.open(map, this);

        });       

      }   
    
    }
    
  }
  
  
  w.initGoogleMap = function(canvasId, options) {
    
    //$(d).on('click', '.map__trigger', function(e){
      //e.preventDefault();
      $.getScript(jsVars.globals.googleMapsApiUri, function(){
        $.getScript(jsVars.globals.extMapJsFullPath, function(){
          $('.map__trigger').remove();
          $('.map__preloader').show();

          setTimeout(function(){
            showMap(canvasId, options);
          }, 500);
        });
      })
    //});
    
  };

  var mapCanvas = 'map-canvas',
      mapCanvasElm = $('#'+mapCanvas);

  if (mapCanvasElm.length) {    
    
    initGoogleMap(mapCanvas, jsVars.map);

  }
  
})(window, document, jQuery);;(function(w, d, $){

  var MC_REQUEST_URL = 'request/newsletter';
  
  w.initNewsletterSignup = function(selector) {

    var jElm = $(selector);

    if (jElm.length) {

      var msgHodler = jElm.find('.newsletter__msg');
      msgHodler.hide();

      var triggerBtn = jElm.find('#newsletter-btn');

      if (triggerBtn.length) {

        triggerBtn.on('click', function(e){            
        
          e.preventDefault();

          var emailAddress =  $.trim(jElm.find('#newsletter-email').val()),
              msg = '',
              msgType = 'newsletter__warning';

          if (emailAddress) {
            
            var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
            if( emailRegex.test(emailAddress) ) {
              
              $.post(MC_REQUEST_URL, 'action=sign-up&email='+emailAddress, function(response) {
                
                if (response.msg) {
                  
                  msgHodler.removeAttr('class').addClass('newsletter__msg '+response.type).html(response.msg).show();
                
                }

                if (response.isValid) {
                  setTimeout(function(){
                    msgHodler.removeClass(response.type).html('');
                    jElm.find('#newsletter-email').val('');

                  }, 5000);
                }

                return false;

              }, 'json');
            }
            else {
                msg = 'Invalid email address provided.';
            }
          }
          else {
              msg = 'Your email address is required.';

          }

          if (msg) {
              msgHodler.removeAttr('class').addClass('newsletter__msg '+msgType).html(msg).show();
          }

        });
      }
    }
  };  

  initNewsletterSignup('.newsletter');

  $('#newsletter-email').click(function(){
    $("#newsletter-email").css("opacity", "1");
});

})(window, document, jQuery);;(function(w, d, $){

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
  
})(window, document, jQuery);;(function(w, d, $){

  $(window).on('load resize',function(){
      
    matchChildHeight({
      parentSel : '.quicklinks' , 
      childSel : '.ql__card .ql__card__inner .ql__card__content .ql__card__content-inner',
      breakPoint: 768});

    matchChildHeight({
      parentSel : '.quicklinks' , 
      childSel : '.ql__card .ql__card__inner',
      breakPoint: 768});

     
    matchElmHeight('.quicklinks .ql__icon .ql__icon__text');

    matchChildHeight({
      parentSel : '.ql-icon-wrapper' , 
      childSel : '.ql__icon .ql__icon__inner .ql__icon__content .ql__icon__heading',
      breakPoint: 768});

    matchChildHeight({
      parentSel : '.ql-icon-wrapper' , 
      childSel : '.ql_tile .ql_tile_inner .ql_tile_content .ql_tile_desc',
      breakPoint: 768});
    
      

  }).trigger('resize');

})(window, document, jQuery);;(function(w, d, $){

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
;$(document).ready(function() {
  // $("#basic-form").validate();

  if($('.show-cart tr').length > 0) {
          
    $('.no-vc-msg').hide();
    $('.total-cart-wrapper').show();
    $('.btn-buy-now').removeClass('btn-disable');
  } else {

    $('.no-vc-msg').show();
    $('.total-cart-wrapper').hide();
    $('.btn-buy-now').addClass('btn-disable');
    

  }

});

function ManualAmount() {

   var gamtval = $('#gift-amount').val();
   var gtitelval = $('#voucher-title').val();

    if( gamtval === '') {

        //alert('Add Voucher Amount');

    } else if ( gtitelval === '') {

       // alert('Add Voucher Name');
       
    } else {
        var rndInt =  Math.floor((Math.random() * 115490) + 1);
        var vcName = $('#voucher-title').val();
        var vcAmt = $('#gift-amount').val();
        
      
        $(".mnl-amt .btn-add-cart").attr('data-name', 'vc-'+rndInt).attr('data-title',vcName).attr('data-price',vcAmt);
        $('.btn-add-cart').removeClass('btn-disable');
    }
} 

    $(".choose-voucher-item a").click(function () {
		//$(this).siblings().removeClass("active");
        $(this).parent().siblings().find("a").removeClass("active");
		$(this).toggleClass("active");
	});

    $(".ch-vh").click(function () {
		$(".voucher-list").toggle();
		$(".manual-voucher-list").hide();
	});

    $(".ch-amt").click(function () {
		$(".voucher-list").hide();
		$(".manual-voucher-list").toggle();
	});

    $(document.body).on('click', '.select-amt-block a' ,function(){
   // $(".select-amt-block a").click(function () {
		$(this).siblings().removeClass("active");
		$(this).toggleClass("active");
		$("#gift-amount").val($(this).children('span').text()).prop('disabled', true);
		$('.clr-box').show();

        ManualAmount();
	});

	$(".clr-box a").click(function () {

        $('.select-amt-block a').removeClass("active");
        $("#gift-amount").val('').prop('disabled', false);
        $(this).parent().hide();
        $(".mnl-amt .btn-add-cart").attr('data-name','').attr('data-title','').attr('data-price','');
        $('.btn-add-cart').addClass('btn-disable');
        
	});


	$(".vc-btn-close").click(function () {
		$(".vc-cart-slider").removeClass("vc-cart-show");
	});

	//$(".clear-cart-item").click(function () {
	$(document.body).on('click', '.clear-cart-item' ,function(){
		$(this).closest('.vc-cart-item').remove();
	});

	$(".btn-add-cart").click(function (e) {
	//$(document.body).on('click', '.btn-add-cart' ,function(e){
            
       $(".vc-cart-slider").addClass('vc-cart-show');			
			$('.no-vc-msg').hide();
      $('.total-cart-wrapper').show();
      $('.btn-buy-now').removeClass('btn-disable');
      $(".voucher-detail-modal").modal('hide');

	});

  $(".btn-cart-view").click(function (e) {
    //$(document.body).on('click', '.btn-add-cart' ,function(e){
              
         $(".vc-cart-slider").toggleClass('vc-cart-show');

         if($('.show-cart tr').length > 0) {
          
          $('.no-vc-msg').hide();
          $('.total-cart-wrapper').show();
          $('.btn-buy-now').removeClass('btn-disable');
        } else {
      
          $('.no-vc-msg').show();
          $('.total-cart-wrapper').hide();
          $('.btn-buy-now').addClass('btn-disable');
          
      
        }
   
    });

    

	$(".btn-buy-now").click(function () {
        
        $("#voucherList1").hide();
        $(".vc-cart-slider").removeClass("vc-cart-show");
        $("#voucherList2").show();
        var voucherPrice = $('.vc-sidebar .total-cart').text();
        $(".vc-total-amt").text(voucherPrice);
        //$('#voucher-cust-amount').val(voucherPrice);
	});

  $(".back-to-vc").click(function () {
		$("#voucherList1").show();
		$("#voucherList2").hide();
      
	});

  


    $(document).ready(function(){

        $( "#voucher-title" ).keypress(function() {
            ManualAmount(); 
        });

        $( "#gift-amount" ).keypress(function() {
            ManualAmount(); 
        });

        $("#gift-amount").keypress(function(event) {
          if ( event.which == 45 || event.which == 189 ) {
            event.preventDefault();
           }
        });        

        $("#voucher-title").focusout(function(){
            ManualAmount(); 
        });

        $("#gift-amount").focusout(function(){
            ManualAmount();
        });

    
        
        $(".select-amt-block").html(function(_, html) {
            return  html.replace(/(,)/g, '</span></a><a>$<span>')
        });
        

     

    // Form Validation Start        
        $("#vc-privacy").click(function(e) {

              var first_name = $('#first-name').val();
              var last_name = $('#last-name').val();
              var emailv = $('#email-address').val();
              var b_phone = $('#phone-number').val();
              var v_client = $('#name').val();
              var v_name = $('#voucher_name').val();
              var v_message = $('#message').val();
              var d_email = $('#delivery-email').val();
              var d_adress = $('#delivery-address').val();
            
              $(".error").remove();
          
              if (first_name.length < 1) {
                $('#first-name').parent().after('<p class="error text-danger">This field is required</p>');
              }else {
                
                var regEx = /^[a-zA-Z\_]+$/;
                var validFname = regEx.test(first_name);                
                if(!validFname){
                  $('#first-name').parent().after('<p class="error text-danger">Enter valid First Name</p>');
                } 
              }
              if (last_name.length < 1) {
                $('#last-name').parent().after('<p class="error text-danger">This field is required</p>');
              }else {
                
                var regEx = /^[a-zA-Z\_]+$/;
                var validLname = regEx.test(last_name);                
                if(!validLname){
                  $('#last-name').parent().after('<p class="error text-danger">Enter valid Last Name</p>');
                } 
              }
              if (b_phone.length < 1) {
                $('#phone-number').parent().after('<p class="error text-danger">This field is required</p>');
              }else {                
                if(b_phone < 999999){
                  $('#phone-number').parent().after('<p class="error text-danger">Enter a  Valid phone number</p>');
                }                  
              }
              if (v_client.length < 1) {
                $('#name').parent().after('<p class="error text-danger">This field is required</p>');
              }
              if (v_name.length < 1) {
                $('#voucher_name').parent().after('<p class="error text-danger">This field is required</p>');
              }
              if (v_message.length < 1) {
                $('#message').parent().after('<p class="error text-danger">This field is required</p>');
              }
            
              if (emailv.length < 1) {
                $('#email-address').parent().after('<p class="error text-danger">This field is required</p>');
              } else {
                var regEx =  /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                var validEmail = regEx.test(emailv);
                if (!validEmail) {
                  $('#email-address').parent().after('<p class="error text-danger">Enter a valid email</p>');
                }
              }



              if (d_adress.length == '' && d_email.length == '') {

                $('.deliverTypeCls').parent().after('<p class="error text-danger">This field is required</p>');
                
              } else if(d_email.length > 1){

                  var regEx =  /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                  var validEmail = regEx.test(d_email);
                  if (!validEmail) {
                    $('.deliverTypeCls').parent().after('<p class="error text-danger">Enter a valid email</p>');
                  }
              
              }  else if (d_adress.length < 1) {
                $('.deliverTypeCls').parent().after('<p class="error text-danger">This field is required</p>');
              }

             
          
            
              if ($(".error").length){
               
                $('.btn--form').addClass('btn-disable');
                $("#vc-privacy").prop('checked', false);

              } else {

                  if ($(this).is(":checked")) {
                      $('.btn--form').removeClass('btn-disable');
                  } else {
                      $('.btn--form').addClass('btn-disable');
                  }

              }
          
      

        });

        // Form Validation End

        if($("#success-clearcart").length == 1) {
          shoppingCart.clearCart();
          $('.no-vc-msg').show();
          $('.btn-buy-now').addClass('btn-disable');
          displayCart();
        }
    });
   
    


    



    // ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];
    
    // Constructor
    function Item(name, price, count, title) {
      this.name = name;
      this.price = price;
      this.count = count;
      this.title = title;
    }
    
    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }
    
      // Load cart
    function loadCart() {
      cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
      loadCart();
      $('.total-cart-wrapper').show();
      $('.btn-buy-now').removeClass('btn-disable');
    }
    
  
    // =============================
  // Public methods and propeties
  // =============================
  var obj = {};
  
  // Add to cart
  obj.addItemToCart = function(name, price, count, title) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(name, price, count, title);
    cart.push(item);

    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(name, count) {
    for(var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();
  
  
  // *****************************************
  // Triggers / Events
  // ***************************************** 
  // Add item

 
 
  
  //$('.btn-add-cart').click(function(event) {
  //  $(".btn-add-cart").on('click',function(event) {
  $(document).on('click', '.btn-add-cart', function(event){

    if($('.show-cart tr').length > 0) {
      
      $('.total-cart-wrapper').show();
      $('.no-vc-msg').hide();
      $('.btn-buy-now').removeClass('btn-disable');

      if($('.full-cart-msg').length === 0) {
        $( "#carttable" ).after( "<p class='full-cart-msg text-danger'>Your cart is full. Only one voucher can be purchased at a time.</p>" );
      }
     // alert('Your cart is full. Only one voucher can be purchased at a time.');
    }else{
      
      event.preventDefault();
      var name = $(this).attr('data-name');
      var price = Number($(this).attr('data-price'));
      var title = $(this).attr('data-title');
     // console.log(name);
      shoppingCart.addItemToCart(name, price, 1, title);
      displayCart();

    }
    
     
      
      
  });
    
  
  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    $('.full-cart-msg').remove();
    $('.total-cart-wrapper').hide();
    $('.no-vc-msg').show();
    $('.btn-buy-now').addClass('btn-disable');
    displayCart();
  });

  if($("#success-clearcart").length == 1) {
    shoppingCart.clearCart();
    $('.full-cart-msg').remove();
    $('.total-cart-wrapper').hide();
    $('.no-vc-msg').show();
    $('.btn-buy-now').addClass('btn-disable');
    displayCart();
  }
  
  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
      output += "<tr>"
        + "<td class='pl-0'>" + cartArray[i].title + "<input type='hidden' name='vci-title-"+[i]+"' value='"+ cartArray[i].title +"' /><br><a class='delete-item' data-name=" + cartArray[i].name + ">Remove</a></td>" 
       // + "<td>(" + cartArray[i].price + ")</td>"
 
       
    //  + "<td>" + cartArray[i].total + "</td>" 
    //    + " = " 
        + "<td class='text-right pr-0'>" + cartArray[i].total + "<input type='hidden' name='vci-price-"+[i]+"' value='"+ cartArray[i].total +"' />"
       // + "<div class='input-group'><a class='minus-item input-group-addon' data-name=" + cartArray[i].name + ">-</a><input type='hidden' name='vci-qty-"+[i]+"' value='"+ cartArray[i].count +"' /><span data-name='" + cartArray[i].name + "'>" + cartArray[i].count + "</span><a class='plus-item  input-group-addon' data-name=" + cartArray[i].name + ">+</a></div>"
        +"</td>" 
        +  "</tr>";
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('#voucher-cust-amount').val(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
  }
  
  
  // Delete item button

  $('.show-cart').on("click", ".delete-item", function(event) {
    var name = $(this).data('name');
    $('.full-cart-msg').remove();
    shoppingCart.removeItemFromCartAll(name);
    $('.total-cart-wrapper').hide();
    $('.no-vc-msg').show();
    $('.btn-buy-now').addClass('btn-disable');
    displayCart();
  })


// -1
$('.show-cart').on("click", ".minus-item", function(event) {
  var name = $(this).data('name');
  shoppingCart.removeItemFromCart(name);
  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.addItemToCart(name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
   var name = $(this).data('name');
   var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
});

displayCart();




	  