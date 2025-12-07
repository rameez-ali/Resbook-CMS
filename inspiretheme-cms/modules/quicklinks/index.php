<?php
/**
 * Manage Quicklinks
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
  $initRestore = null;
  $resultPageContent = null;
  /** Remove warning message PHP 8.0 */
  error_reporting(E_ERROR | E_PARSE);
  global $do, $id, $message, $itemSelect, $itemRank, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $listType;

  $moduleMainHeading  = 'Quicklinks';
  $modMsgLabel        = 'Quicklink';
  $template           = '';
  $moduleContent      = '';

  if(isset($_POST['view']) || isset($_GET['view'])) {
    $action     = requestVar('view');
  } elseif (isset($_POST['action']) || isset($_GET['action'])) {
    $action     = requestVar('action');
  } else {
    $action     = '';
  }
  //$action        = (requestVar('view')) ? requestVar('view') : requestVar('action');
  //$itemSelect    = requestVar('item_select');
  //$itemRank      = requestVar('item_rank');
  if(isset($_POST['item_select']) || isset($_GET['item_select'])) {
    $itemSelect    = requestVar('item_select');
  }
  if(isset($_POST['item_rank']) || isset($_GET['item_rank'])) {
    $itemRank      = requestVar('item_rank');
  }

  /** CHECK if ACTIVE or TRASH LISTING based on action and set addtional params */
  $isActgiveListing   = $action != 'trash';
  $modActionURLParam  = (empty($isActgiveListing)) ? '&view=trash' : '';
  $moduleMainHeading .= (empty($isActgiveListing)) ? ' | Trash' : '';

  /** check if item restore has been initiated */
  if(isset($_POST['action']) || isset($_GET['action'])) {
    $initRestore   = requestVar('action') === 'restore';
  }
  /** Get the form action and do something */
  switch ($action) {
    case 'publish':
      $message = ModuleAction::publish($itemSelect,'quicklinks');
      break;

    case 'hide':
      $message = ModuleAction::hide($itemSelect,'quicklinks');
      break;

    case 'delete':
      $message = ModuleAction::delete($itemSelect,'quicklinks');
      break;

    case 'saverank':
      $message = ModuleAction::saveRank($itemRank,'quicklinks');
      break;

    case 'trash': 
      $listType = FLAG_DELETED;
      $message = ($initRestore) ? ModuleAction::restore($itemSelect,'quicklinks') : '';      
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

  $moduleActionsButtons =  '';

  if((empty($isActgiveListing))) {

    $moduleActionsButtons =  '<li>
        <button type="button" class="btn btn-default"
          onclick="submitForm(\'restore\',1)">
          <i class="fa fa-history"></i> Restore
        </button>
      </li>
      <li>
        <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
          <i class="glyphicon glyphicon-arrow-left"></i> Back
        </a>
      </li>';

  } else {

    $moduleActionsButtons =  '<li class="pull-right">
          <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&view=trash" class="btn btn-default">
              <i class="glyphicon glyphicon-trash"></i> View trash
          </a>
        </li>
        <li>
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
          <button type="button" class="btn btn-default" onclick="submitForm(\'delete\')">
            <i class="glyphicon glyphicon-trash"></i> Move to trash
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
        </li>';

  }

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
            <th align="left">Title</th>
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