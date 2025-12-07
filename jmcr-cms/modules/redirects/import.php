<?php

/** Import csv redirects */

function importItems()
{
  $moduleContent = null;
  $jsVars = [];
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel;
  $extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
  $extraStyles        = (empty($extraStyles)) ? '' : $extraStyles;
  $template           = (empty($template)) ? '' : $template;
  $disableMenu = FLAG_YES;

  $moduleSubHeading = 'Import Redirect CSV File';

  /** Module actions */
  $moduleActions = '<ul class="page-action">
    <li>
      <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
        <i class="glyphicon glyphicon-arrow-left"></i> Cancel
      </a>
    </li>
    <li class="pull-right">
      <button type="button" value="update" class="btn btn-default" id="btn-download-csv-file">
        <i class="glyphicon glyphicon-download"></i> Download Sample CSV File
      </button>
    </li>
  </ul>';

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'import.php';

  $modBasePath     = ADMIN_BASE_PATH.'/'.MODULES_DIR.'/'.$do;
  $modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;
  
  $jsVars['modBasePath'] = $modBasePath;

  /** load slideshow script & style */
  $extraScripts .= '<script src="'.$modBaseDirPath.'/assets/js/redirects.js?v='.time().'"></script>';
  $extraStyles  .= '<link href="'.$modBaseDirPath.'/assets/css/redirects.css?v='.time().'" rel="stylesheet">';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Import Redirects']  = $tabImportContent;

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
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>
