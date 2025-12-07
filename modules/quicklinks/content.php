<?php

/**
 * Get All quicklinks for this page
 */

$arrQuickLinksContent = QuicklinkHelper::fetchPageQuicklinksContent($pageQlModuleKey, $pageQlItemId);

$quicklinkSectionHeading = $arrQuickLinksContent['heading'];
$quicklinkSectionText    = $arrQuickLinksContent['description'];
$quicklinkSectionStyle   = $arrQuickLinksContent['quicklink_style_id'];
$arrQuicklinks           = $arrQuickLinksContent['quicklinks'];

/** GENERATE Section Heading View */

$qlSectionHeaderView  = '';
$qlSectionHeadingView = ''; 
$qlSectionTextView    = ''; 

/** Section Heading View */
if (!empty($quicklinkSectionHeading)) {
  $qlSectionHeadingView = '<h2 class="section__heading pt-3 pb-4 pb-md-0">'.$quicklinkSectionHeading.'</h2>';
}else{
  $qlSectionHeadingView ='';
}

/** Section Text View */
if (!empty($quicklinkSectionText)) {
  $qlSectionTextView = '<p class="section__text text-center">'.$quicklinkSectionText.'</p>';
} else{
  $qlSectionTextView ='';
}

/** Section Header View */
if (!empty($qlSectionHeadingView) || !empty($qlSectionTextView)) {

  $qlSectionHeaderView   = '<div class="container container--fw">
      <div class="row justify-content-center">
        <div class="col-12 section__header-wrapper mb-0">
          '.$qlSectionHeadingView.'
          '.$qlSectionTextView.'
        </div>
      </div>
    </div>';
}