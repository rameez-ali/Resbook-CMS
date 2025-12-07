<?php

require_once __DIR__.DS.'config.php';

if ($mainPageId == $impPageExperiences->id) {

  if (empty($segment1)) {
    
    require_once __DIR__ . '/views/list/view.php';

  } else {

    require_once __DIR__ . '/views/single/view.php';
    
  }

} else {

  require_once __DIR__ . '/views/featured/view.php';

}