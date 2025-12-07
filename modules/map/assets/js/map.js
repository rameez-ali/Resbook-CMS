(function(w, d, $){
  
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
  
})(window, document, jQuery);