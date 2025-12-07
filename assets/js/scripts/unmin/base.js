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

})(window, document, jQuery);