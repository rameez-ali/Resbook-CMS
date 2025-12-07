<?php
/**
 * Manage Galleries
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
  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $itemRank,
    $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $listType, $modKey, $modName;

  /** Remove warning message PHP 8.0 */
  error_reporting(E_ERROR | E_PARSE);
  
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $template           = (empty($template)) ? '' : $template;
  $modActionURLParam  = (empty($modActionURLParam)) ? '' : $modActionURLParam;
  $moduleMainHeading  = 'Photo Gallery';
  $modMsgLabel        = 'Photo Gallery';

  /** Identify module for Settings */
  $modName            = 'Gallery';
  $modKey             = 'gallery_id';

  $action        = requestVar('view') ?: requestVar('action');
  $itemSelect    = requestVar('item_select');
  $itemRank      = requestVar('item_rank');

  /** Get the form action and do something */
  switch ($action) {
    
    case 'delete':
      require_once __DIR__ . '/delete.php';
      $return = deleteItem();
      break;

    case 'saverank':
      $message = ModuleAction::saveRank($itemRank,'gallery');
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

    case 'settings':
      require_once __DIR__ . '/settings.php';
      editSettings();
      break;
    
    case 'save-settings':
      require_once __DIR__ . '/save_settings.php';
      saveSettings();
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

   /** Setup module action buttons based on active / trash listing */


  $moduleActionsButtons =  '<li>
        <button type="button" class="btn btn-default" onclick="submitForm(\'new\',1)">
          <i class="glyphicon glyphicon-plus-sign"></i> New
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" onclick="submitForm(\'saverank\', 1)">
          <i class="glyphicon glyphicon-sort-by-order"></i> Save Rank
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'delete\')">
            <i class="glyphicon glyphicon-remove"></i> Delete
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" onclick="submitForm(\'settings\')">
          <i class="glyphicon glyphicon-cog"></i> Settings
        </button>
      </li>';

  /** Setup module actions  */
  $moduleActions = '<ul class="page-action">'.$moduleActionsButtons.'</ul>';

  /** Module content view  */
  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.$modActionURLParam.'"
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
            <th align="left">Gallery</th>
            <th width="200">Show on Gallery Page</th>
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