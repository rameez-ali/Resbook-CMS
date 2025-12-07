<?php

/** View for general pages widget */

$generalPagesWidgetView = '';

$newPage = fetchRow("SELECT pmd.`name`,
    pmd.`date_updated`
  FROM `general_pages` gp
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = gp.`page_meta_data_id`)
  WHERE pmd.`status` != '".FLAG_DELETED."'
  ORDER BY pmd.`date_updated` DESC
  LIMIT 1");

$oldPage = fetchRow("SELECT pmd.`name`,
    pmd.`date_updated`
  FROM `general_pages` gp
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = gp.`page_meta_data_id`)
  WHERE pmd.`status` != '".FLAG_DELETED."'
  ORDER BY pmd.`date_updated` ASC
  LIMIT 1");

$newDate = Helper::getDateTimeStr($newPage['date_updated']);
$oldDate = Helper::getDateTimeStr($oldPage['date_updated']);

$generalPagesWidgetView = '<div class="col-xs-6 col-md-4">
    <div class="dashboard-item">
      <header class="dheader">
        <span class="icon-holder">
          <span class="circle"></span>
          <i class="glyphicon glyphicon-file"></i>
        </span>
        <h1>General pages</h1>
        <div class="clear"></div>
      </header>
      <div class="row">
        <div class="col-xs-12 ditem-body">
          <h2>Recently updated page</h2>
          <p><strong>'.$newPage['name'].':</strong> 
            '.$newDate.'
          </p>
          <h2>Oldest page on website</h2>
          <p><strong>'.$oldPage['name'].':</strong> 
            '.$oldDate.'
          </p>
        </div>
      </div>
    </div>
  </div>';

?>