<?php

require_once __DIR__.DS.'config.php';
require_once __DIR__.DS.'views/partials/content.php';

$pageFaqContent = '';

$sqlFaq = "SELECT `id`,
    `question`,
    `answer`
  FROM `faq`
  WHERE `status` = '".FLAG_ACTIVE."'
  ORDER BY `rank` ASC";

$arrFaqs = DB::fetchAll($sqlFaq);
  
  if ($fsType == 'L') {

    /** standard list view */
    
    require_once __DIR__ . '/views/list/view.php';
  
  } elseif ($fsType == 'A') {

    /** accordion list view */

    require_once __DIR__ . '/views/accordion/view.php';

  }

?>