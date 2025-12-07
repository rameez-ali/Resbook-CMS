<?php

/** Edit Redirect data */

function initMain()
{

  $moduleContent = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $isValidSession, $moduleSubHeading, $moduleMainHeading;

  $disableMenu = FLAG_NO; 
  $template = '';
  $extraScripts = '';
  $moduleMainHeading = 'Sitemap';

  /** Module actions */
  $moduleActions = '';

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  $sitemapDate = fetchValue("SELECT `set_sitemapupdated`
    FROM general_settings
    WHERE `id` = '1'
    LIMIT 1");
  
  $sitemapDate = Helper::getDateTimeStr($sitemapDate);
  /** Content tab content */
  $tabDetailsContent = '<p class="action-msg"></p>
  <table style="width:100%">
    <tr>
      <td valign="top">
        Date of last sitemap submission:
        <span id="sitemap-date"><strong>'.$sitemapDate.'</strong></span>
      </td>
      <td valign="top">
        <a class="btn btn-default generate-sitemap" href="#" id="sitemap-btn">
          <i class="fa fa-sitemap"></i> Generate Sitemap
        </a>
      </td>
    </tr>
  </table>';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Details']  = $tabDetailsContent;

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  $moduleContent = '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" 
     name="pageList" enctype="multipart/form-data">
      <div id="tabs">
        <ul>'.$tabList.'</ul>
        <div style="padding:10px;">'.$tabContent.'</div>
      </div>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
      <input type="hidden" name="id" value="'.$id.'">
  </form>';

  $extraScripts .= '<script src="'.ADMIN_BASE_URL.'/js/sitemap.js"></script>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}
