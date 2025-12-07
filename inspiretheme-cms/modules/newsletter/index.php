<?php
/**
 * Manage Instagram Account Details
 *
 * @category   Module
 * @package    NetZone Base CMS 3.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 3.0
 */

function initMain()
{

  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $itemRank, $moduleMainHeading, $moduleSubHeading, $listType, $modName;
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $template           = (empty($template)) ? '' : $template;
  $moduleMainHeading  = 'MailChimp API Details';

  /** Identify module for Settings */
  $modName            = 'Newsletter';

  $action        = requestVar('view') ?: requestVar('action');
  
  /** Get the form action and do something */
  switch ($action) {

    case 'save':
      require_once __DIR__ . '/save.php';
      saveItem();
      break;
    
    case 'settings':
      require_once __DIR__ . '/settings.php';
      editSettings();
      break;

    case 'save-settings':
      require_once __DIR__ . '/save_settings.php';
      saveSettings();
      break;
    }
  
  /** Module actions */
  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" id="pg-save"
          onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" onclick="submitForm(\'settings\')">
          <i class="glyphicon glyphicon-cog"></i> Settings
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

  require_once MOD_VIEWS_DIR.DS.'api_details.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['API Details']  = $tabApiDetailsContent;

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  /** Module content view  */
  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" 
      name="pageList" enctype="multipart/form-data">
        <div id="tabs">
          <ul>'.$tabList.'</ul>
          <div style="padding:10px;">'.$tabContent.'</div>
        </div>
        <input type="hidden" name="action" value="" id="action">
        <input type="hidden" name="do" value="'.$do.'">
        <input type="hidden" name="id" value="'.$id.'">
    </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>