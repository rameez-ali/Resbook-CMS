<?php

/** Edit Location Map Data */
function editItem() 
{

  $moduleContent = null;
  $gmId = null;
  $resultPageContent = null;
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $modMsgLabel, $action;

  $disableMenu = FLAG_YES; 

  $sql = "SELECT `id`,
      `map_heading`,
      `map_description`,      
      `map_address`,
      `map_latitude`,
      `map_longitude`,      
      `map_marker_latitude`,
      `map_marker_longitude`,
      `map_zoom_level`
    FROM `googlemap_location`
    WHERE `id` = '1'
    LIMIT 1";

  $itemData = DB::fetchRow($sql);
  if (!empty($itemData)) {

    /** define vars */

    $gmId              = $itemData['id'];
    $gmHeading         = $itemData['map_heading'];
    $gmDescription     = $itemData['map_description'];
    $gmAddress         = $itemData['map_address'];
    $gmLatitude        = $itemData['map_latitude'];
    $gmLongitude       = $itemData['map_longitude'];
    $gmMarkerLatitude  = $itemData['map_marker_latitude'];
    $gmMarkerLongitude = $itemData['map_marker_longitude'];
    $gmZoomLevel       = $itemData['map_zoom_level'];

  }

  $moduleSubHeading = 'Editing Location Map: ';


  /** Module actions */
  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" id="pg-save"
          onclick="submitForm(\'save-location\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
      <li>
        <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
          <i class="glyphicon glyphicon-arrow-left"></i> Cancel
        </a>
      </li>
    </ul>';

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  /** Map tab content */
  require_once MOD_VIEWS_DIR.DS.'map.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Map Details']  = $tabMapContent;

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
      <input type="hidden" name="id" value="'.$gmId.'">
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>
