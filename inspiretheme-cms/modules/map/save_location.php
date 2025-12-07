<?php

/** Save map location settings */

function saveLocation (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading;

  $arrItemData = [];

  $arrItemData['map_heading']          = validateInput('map_heading');
  $arrItemData['map_description']      = validateInput('map_description');
  $arrItemData['map_address']          = validateInput('map_address');
  $arrItemData['map_latitude']         = validateInput('map_latitude', FILTER_VALIDATE_FLOAT);
  $arrItemData['map_longitude']        = validateInput('map_longitude', FILTER_VALIDATE_FLOAT);
  $arrItemData['map_marker_latitude']  = validateInput('map_marker_latitude', FILTER_VALIDATE_FLOAT);
  $arrItemData['map_marker_longitude'] = validateInput('map_marker_longitude', FILTER_VALIDATE_FLOAT);
  $arrItemData['map_zoom_level']       = validateInput('map_zoom_level', FILTER_VALIDATE_INT);
  
  /** Update existing item data */
   
  DB::updateRow($arrItemData, 'googlemap_location', "WHERE id = '{$id}' LIMIT 1");
    
  $message = "Map location have been saved";

}

?>