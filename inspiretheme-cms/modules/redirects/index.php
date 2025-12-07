<?php
/**
 * Manage Redirects
 *
 * @category   Module
 * @package    NetZone Base CMS 3.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 1.0
 */

function initMain()
{

  $jsVars = [];
  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $itemRank, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $listType;
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $template           = (empty($template)) ? '' : $template;
  $extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
  $extraStyles        = (empty($extraStyles)) ? '' : $extraStyles;
  $moduleMainHeading  = 'Redirects';
  $modMsgLabel        = 'Redirect';

  $action        = requestVar('view') ?: requestVar('action');
  $itemSelect    = requestVar('item_select');
  $itemRank      = requestVar('item_rank');

  /** CHECK if ACTIVE or TRASH LISTING based on action and set addtional params */
  $isActgiveListing   = $action != 'trash';

  /** check if item restore has been initiated */
  $initRestore   = requestVar('action') === 'restore';

  /** Get the form action and do something */
  switch ($action) {
    case 'publish':
      require_once __DIR__ . '/publish.php';
      publishItem();
    break;
    case 'hide':
      $message = ModuleAction::hide($itemSelect,'redirect');
      break;

    case 'delete':
      $message = ModuleAction::delete($itemSelect,'redirect');
      $message = 'Selected redirects have been deleted.';
      break;

    case 'new':
    case 'edit':
      require_once __DIR__ . '/edit.php';
      editItem();
      break;

    case 'save':
      require_once __DIR__ . '/save.php';
      saveItem();
      break;

    case 'import':
      require_once __DIR__ . '/import.php';
      importItems();
      break;

  }
  
  /** Include list file and generate page table */
  require_once __DIR__ . '/list.php';

  $listType    = (empty($listType)) ? FLAG_ACTIVE : $listType;
  $activePages = generateTable();

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  $moduleActionsButtons =  '<li>
      <button type="button" class="btn btn-default" onclick="submitForm(\'new\',1)">
        <i class="glyphicon glyphicon-plus-sign"></i> New
      </button>
    </li>
    <li>
      <button type="button" class="btn btn-default" onclick="submitForm(\'publish\')">
        <i class="glyphicon glyphicon-eye-open"></i> Publish
      </button>
    </li>
    <li>
      <button type="button" class="btn btn-default" onclick="submitForm(\'hide\')">
        <i class="glyphicon glyphicon-eye-close"></i> Hide
      </button>
    </li>
    <li>
      <button type="button" class="btn btn-default" onclick="submitForm(\'delete\')">
        <i class="glyphicon glyphicon-remove"></i> Delete
      </button>
    </li>
    <li>
      <button type="button" class="btn btn-default" onclick="submitForm(\'import\')">
        <i class="glyphicon glyphicon-import"></i> Import Redirects
      </button>
    </li>
    <li class="pull-right">
      <button type="button" value="update" class="btn btn-default" id="btn-download-csv-file">
        <i class="glyphicon glyphicon-download"></i> Download Sample CSV File
      </button>
    </li>';

  /** Setup module actions  */
  $moduleActions = '<ul class="page-action">'.$moduleActionsButtons.'</ul>';

  $modBasePath     = ADMIN_BASE_PATH.'/'.MODULES_DIR.'/'.$do;
  $modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;
  
  $jsVars['modBasePath'] = $modBasePath;

  /** load slideshow script & style */
  $extraScripts .= '<script src="'.$modBaseDirPath.'/assets/js/redirects.js?v='.time().'"></script>';
  $extraStyles  .= '<link href="'.$modBaseDirPath.'/assets/css/redirects.css?v='.time().'" rel="stylesheet">';

  /** Module content view  */
  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'"
     method="post" style="margin:0px;" name="pageList" id="pageList">
      <table width="100%" class="bordered">
        <thead>
          <tr>
            <th width="20">
              <label class="custom-check">
                <input type="checkbox" name="all" id="checkall">
                <span></span>
              </label>
            </th>
            <th align="left">Old URL</th>
            <th width="100">Status</th>
          </tr>
        </thead>
        <tbody>
          '.$activePages.'
        </tbody>
      </table>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'" id="do">
    </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>