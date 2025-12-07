<?php

$flgProductionMode = (PRODUCTION_MODE === true) ? FLAG_YES : FLAG_NO;

/** Identify module for Settings */
$modName     = 'Google Map';

$mapSettings = ModuleSettings::fetchSettings($modName);

if (!empty($mapSettings)) {

  /** define vars */
  $mapButtonText = $mapSettings['button_text'];
  $mapPhotoPath  = $mapSettings['cover_photo_path'];
  $mapColor      = $mapSettings['colormap'];

}


$googlemapAPIKey = DB::fetchValue("SELECT `api_key`
  FROM `googlemap_account`
  WHERE `is_production_mode` = '{$flgProductionMode}'
  LIMIT 1");

if (!empty($googlemapAPIKey)) {

  $sqlGoogleMapLocation = "SELECT `map_heading`,
      `map_description`,      
      `map_address`,
      `map_latitude`,
      `map_longitude`,      
      `map_marker_latitude`,
      `map_marker_longitude`,
      `map_zoom_level`
    FROM `googlemap_location`
    WHERE `id` = '1'
    LIMIT 1";

  $locationData = DB::fetchRow($sqlGoogleMapLocation);

  if (!empty($locationData)) {

    /** define vars */

    $gmHeading         = $locationData['map_heading'];
    $gmDescription     = $locationData['map_description'];
    $gmAddress         = $locationData['map_address'];
    $gmLatitude        = $locationData['map_latitude'];
    $gmLongitude       = $locationData['map_longitude'];
    $gmMarkerLatitude  = $locationData['map_marker_latitude'];
    $gmMarkerLongitude = $locationData['map_marker_longitude'];
    $gmZoomLevel       = $locationData['map_zoom_level'];
    
  }

}