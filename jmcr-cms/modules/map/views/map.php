<?php

$isProductionMode = (PRODUCTION_MODE === true) ? FLAG_YES : FLAG_NO;
$extraScripts           = (empty($extraScripts)) ? '' : $extraScripts;
$accountLabel = ($isProductionMode === FLAG_YES) ? 'Live' : 'Test' ;
$template           = (empty($template)) ? '' : $template;
$gmAPIKey = DB::fetchValue("SELECT `api_key`
  FROM `googlemap_account`
  WHERE `is_production_mode` = '{$isProductionMode}'
  LIMIT 1");

if(!empty($gmAPIKey )) {
  $tabMapContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="130"><label for="map_heading">Marker Title</label></td>
      <td>
        <input type="text" style="width:350px;" id="map_heading" name="map_heading" value="'.$gmHeading.'">
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="map_description">Marker Description</label>
      </td>
      <td>
        <textarea name="map_description" id="map_description" style="width:350px;min-height:100px;" maxlength="250" 
         class="check-max">'
         .$gmDescription.'</textarea>
         <br><span class="text-muted"><small>Max 250 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
    <tr>
      <td><label for="map_address">Find Location</label></td>
      <td>
        <input type="text" style="width:350px;" id="map_address" name="map_address" value="'.$gmAddress.'">
        <button type="button" id="get-map-address">Search</button>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div id="gmap-canvas" data-map-trigger="#ui-id-1">
          <h3 style="font-size:18px;color:#000;padding:10px;font-weight:700;margin:0;">Loading map...</h3>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="hidden" id="map_latitude" name="map_latitude" value="'.$gmLatitude.'">
        <input type="hidden" id="map_longitude" name="map_longitude" value="'.$gmLongitude.'">
        <input type="hidden" id="map_zoom_level" name="map_zoom_level" value="'.$gmZoomLevel.'">
        <input type="hidden" id="map_marker_latitude" name="map_marker_latitude" value="'.$gmMarkerLatitude.'">
        <input type="hidden" id="map_marker_longitude" name="map_marker_longitude" value="'.$gmMarkerLongitude.'">
      </td>
    </tr>
  </table>';

  $extraScripts .= '<script src="https://maps.google.com/maps/api/js?key='.$gmAPIKey.'"></script>';
  $extraScripts .= '<script src="'.ADMIN_BASE_URL.'/js/general-map.js?v=1"></script>';
  $jsVars['mapStyle'] = '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"simplified"}]},
    {"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#fcfcfc"}]},
    {"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#fcfcfc"}]},
    {"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#dddddd"}]},
    {"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#dddddd"}]},
    {"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#eeeeee"}]},
    {"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},
    {"featureType":"water","elementType":"geometry","stylers":[{"saturation":"53"}]},
    {"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":"-42"},{"saturation":"17"}]},
    {"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":"61"}]}]'; 

} else {
  $tabMapContent = '<p class="text-danger">Please configure Google Map '.$accountLabel.' Api Key.</p>';
}


?>