<?php

require_once __DIR__.DS.'config.php';

if ($mainPageId == $impPageAccommodation->id && empty($segment1)) {

  require_once __DIR__ . '/views/list/view.php';

} elseif ($mainPageId != $impPageAccommodation->id && $mainPageId != $impPageHome->id && empty($segment1)){

    require_once __DIR__ . '/views/preselectedlist/view.php';

} elseif ($mainPageId == $impPageAccommodation->id && (!empty($segment1))) {

  if(!empty($segment1) && empty($segment2) && empty($segment3)) {
    // Hide CTA banner, customer reviews, and partner sections on accommodation detail pages
    $templateTags['page_cta'] = '';
    $templateTags['footer_review'] = '';
    $templateTags['partner_view'] = '';
    require_once 'views/single/view.php';

  } else {
      
    Helper::redirect($impPage404->abs_full_url);

  }
}else {

  if($mainPageId == $impPageHome->id){
    require_once __DIR__ . '/views/featured/view.php';  
  } else {
    require_once __DIR__ . '/views/list/view.php';
  }
}