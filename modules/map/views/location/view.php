<?php

/** Generate view for InfoBox */
$mapInfoHeading  = (empty($gmHeading)) ? $companyName : $gmHeading;
$mapInfoCaption  = (empty($gmDescription)) ? $contactAddress : $gmDescription;

$gmInfoBoxHeading = (empty($mapInfoHeading)) ? '' : '<h3 class="infobox__heading">'.$mapInfoHeading.'</h3>';
$gmInfoBoxCaption = (empty($mapInfoCaption)) ? '' : '<p class="infobox__caption">'.nl2br((string) $mapInfoCaption).'</p>';

$gmInfoBoxContent = '';

if (!empty($mapInfoHeading) || !empty($gmInfoBoxCaption) ) {
  
  $gmInfoBoxContent = '<div class="infobox">
      <div class="infobox__content">
        '.$gmInfoBoxHeading.'
        '.$gmInfoBoxCaption.'
      </div>
    </div>

    ';
}

/** Generate view for Map */
  
$mapContent = '<section class="section map-section">
    <div class="container">	        			
      <div class="row">
        <div class="col-12">
          <div class="map" id="map-canvas" class="map__canvas">
            <!--<div class="map__trigger" 
              style="background-image: url('.Helper::getFullUrl($mapPhotoPath).')" title="'.$mapInfoHeading.'"
              data-category="Map" data-action="View Map Link" data-name="'.$mapButtonText.'">
              <span class="map__trigger-text btn btn--ghost-white">'.$mapButtonText.'</span>
            </div> -->
            <p class="map__preloader" style="display: none;">Loading...</p>
          </div>
        </div>
      </div>
    </div>
  </section>';


/** Get Map Styles */
if($mapColor == 'G'){
  $gmMapStyles = json_decode(file_get_contents(MODULES_DIR_PATH.'/map/assets/mapstylegrayscale/mapstyle.json'), true, 512, JSON_THROW_ON_ERROR);
} else {
  $gmMapStyles = json_decode(file_get_contents(MODULES_DIR_PATH.'/map/assets/mapstylecolor/mapstyle.json'), true, 512, JSON_THROW_ON_ERROR);
}


/** Define map script vars */

$jsVars['map']['lat']                  = $gmLatitude;
$jsVars['map']['lng']                  = $gmLongitude;
$jsVars['map']['markerLat']            = $gmMarkerLatitude;
$jsVars['map']['markerLng']            = $gmMarkerLongitude;
$jsVars['map']['zoom']                 = $gmZoomLevel;
$jsVars['map']['infoboxContent']       = $gmInfoBoxContent;
$jsVars['map']['graphics']             = Helper::getFullUrl(MODULES_DIR.'/map/assets/graphics/');
$jsVars['map']['styles']               = $gmMapStyles;
$jsVars['globals']['googleMapsApiUri'] = 'https://maps.googleapis.com/maps/api/js?key='.$googlemapAPIKey;
$jsVars['globals']['extMapJsFullPath'] = Helper::getFullUrl(ASSETS_DIR.'/js/scripts/min/map-exts.js');

?>