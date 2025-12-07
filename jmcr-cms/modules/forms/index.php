<?php
/**
 * Manage Forms
 *
 */

function initMain()
{

  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $itemRank, $moduleMainHeading, $moduleSubHeading;

  $moduleMainHeading  = 'Forms';
  $moduleContent      = (empty($moduleContent)) ? '' : $moduleContent;
  $template           = (empty($template)) ? '' : $template; 
  $action        = requestVar('view') ?: requestVar('action');
  $itemSelect    = requestVar('item_select');
  $itemRank      = requestVar('item_rank');
    
  /** Get the form action and do something */
  switch ($action) {
    case 'publish':
      require_once __DIR__ . '/publish.php';
      $return = publishItems();
      break;

    case 'hide':
      require_once __DIR__ . '/hide.php';
      $return = hideItems();
      break;

    case 'new':
      require_once __DIR__ . '/new.php';
      $return = newItem();
      break;

    case 'delete':
      require_once __DIR__ . '/delete.php';
      $return = deleteItems();
      break;

    case 'edit':
      require_once __DIR__ . '/edit.php';
      $return = editItem();
      break;

    case 'save':
      require_once __DIR__ . '/save.php';
      $return = saveItem();
      break;

    case 'trash':
      require_once __DIR__ . '/viewtrash.php';
      $return = viewTrash();
      break;

    case 'export':
      require_once __DIR__ . '/export.php';
      $return = exportItems();
      break;

  }

  /** Include list file and generate page table */
  require_once __DIR__ . '/list.php';

  $listType    = FLAG_ACTIVE;
  
  $activeRecords = generateTable();

  /** Show message */
  if (!empty($message)) {

  $moduleContent .= '<div class="alert alert-warning page">
      <i class="glyphicon glyphicon-info-sign"></i>
      <strong>'.$message.'</strong>
    </div>';

  }

  /** Setup module actions  */
  $moduleActions = '<ul class="page-action">
      <li class="pull-right">
        <a href="'.ADMIN_BASE_URL.'/?do='.$do
         .'&view=trash" class="btn btn-default">
            <i class="glyphicon glyphicon-trash"></i> View trash
        </a>
      </li>
      <li>
        <button type="button" class="btn btn-default"
        onclick="submitForm(\'new\',1)">
          <i class="glyphicon glyphicon-plus-sign"></i> New
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
         onclick="submitForm(\'delete\')">
          <i class="glyphicon glyphicon-trash"></i> Move to trash
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
         onclick="submitForm(\'publish\')">
          <i class="glyphicon glyphicon-eye-open"></i> Publish
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
         onclick="submitForm(\'hide\')">
          <i class="glyphicon glyphicon-eye-close"></i> Hide
        </button>
      </li>
    </ul>';

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
            <th align="left">Form</th>  
            <th align="left">Created On</th>  
            <th align="left">Updated On</th>  
            <th width="100" align="left" align="center">Status</th>
          </tr>
        </thead>
        <tbody>
          '.$activeRecords.'
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