<?php

require_once __DIR__.DS.'config.php';

if (!empty($gmLatitude) 
  && !empty($gmLongitude) 
  && !empty($gmMarkerLatitude)  
  && !empty($gmMarkerLongitude) 
  && !empty($gmZoomLevel) 
  ) {

  require_once __DIR__ . '/views/location/view.php';
  
  $templateTags['mod_view'] .= $mapContent;
}



?>