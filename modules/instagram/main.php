<?php

require_once __DIR__.DS.'config.php';

if ($instagramClientId && $instagramAccessToken && $instagramUsername) {
  require_once __DIR__ . '/views/carousel/view.php'; 
  // require_once 'views/grid/view.php'; 
}

?>