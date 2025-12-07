<?php
/**
 * Manage Contact Enquiries Module
 *
 * @category   Module
 * @package    NetZone Base CMS 3.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    3.0
 * @since      File available since Release 3.0
 */

function initMain()
{
  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $itemRank, 
    $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $listType, $modKey, $modName;
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $template           = (empty($template)) ? '' : $template;
  $moduleMainHeading  = 'Footer Contact';
  $modMsgLabel        = 'Footer Contact';

  /** Identify module for Settings */
  $modName            = 'Contact';   
  $modKey             = 'enquiry_id';  

  $action        = requestVar('view') ?: requestVar('action');
  $itemSelect    = requestVar('item_select');
  $itemRank      = requestVar('item_rank');

  /** CHECK if ACTIVE or TRASH LISTING based on action and set addtional params */
  $isActgiveListing   = $action != 'trash';
  $modActionURLParam  = (empty($isActgiveListing)) ? '&view=trash' : '';
  $moduleMainHeading .= (empty($isActgiveListing)) ? ' | Trash' : '';

  /** check if item restore has been initiated */
  $initRestore   = requestVar('action') === 'restore';

  /** Get the form action and do something */
  switch ($action) {
    case 'edit':
      require_once __DIR__ . '/edit.php';
      editItem();
      break;
   
    case 'delete':
      $message = ModuleAction::delete($itemSelect,'enquiry');
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

  $moduleActionsButtons =  '
  <li>
    <button type="button" class="btn btn-default" onclick="submitForm(\'delete\')">
      <i class="glyphicon glyphicon-trash"></i> Delete
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
    <!--  <table width="100%" class="bordered">
        <thead>
          <tr>
            <th width="20">
              <label class="custom-check">
                <input type="checkbox" name="all" id="checkall"><span></span>
              </label>
            </th>
            <th width="70">Enquiry ID</th>
            <th  width="200">Person Name</th>
            <th  width="200">Person Email</th>
            <th  width="150">Enquiry Date</th>
          </tr>
        </thead>
        <tbody>
          '.$activePages.'
        </tbody>
      </table>  -->
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'" id="do">
    </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();

}

?>