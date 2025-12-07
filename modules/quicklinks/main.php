<?php

$quicklinksView = '';

if (!empty($pageQlModuleKey) && !empty($pageQlItemId)) {
 
  require_once __DIR__.DS.'content.php';
    
  if ($quicklinkSectionStyle == 1) {
        
    require __DIR__ . '/views/default.php';
  
  } elseif($quicklinkSectionStyle == 2) {
  
    require __DIR__ . '/views/cover.php';
  
  } elseif($quicklinkSectionStyle == 3) {
  
    require __DIR__ . '/views/icon.php';
  
  } else {

    require __DIR__ . '/views/tile.php';
    
  }
}