(function(w, d, $){

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


})(window, document, jQuery);