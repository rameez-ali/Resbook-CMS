<?php

function initMain()
{
  $resultPageContent = null;
  global $message, $isValidSession, $itemSelected, $moduleMainHeading, $do;
  $template           = (empty($template)) ? '' : $template;
  $id           = requestVar('user_id');
  $itemSelected = requestVar('item_select');
  $action       = requestVar('action');

  $moduleMainHeading = "CMS Users";

  switch ($action) {
    case 'edit':
      require_once 'edit.php';
      $return = editItem();
      break;

    case 'new':
      require_once 'new.php';
      $return = newItem();
      break;

    case 'save':
      require_once 'save.php';
      $return = saveItem();
      break;

    case 'delete':
      require_once 'delete.php';
      $return = deleteItem();
      break;
  }

  $activeRecords = "";
  $moduleContent = "";

  /** Include list file and generate page table */
  require_once 'list.php';

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
      <li>
        <button type="button" class="btn btn-default"
          onclick="submitForm(\'new\',1)">
          <i class="glyphicon glyphicon-plus-sign"></i> New
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'delete\')">
          <i class="glyphicon glyphicon-trash"></i> Delete
        </button>
      </li>
    </ul>';

  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/?do='.$do.'"
     method="post" style="margin:0px;" name="pageList" id="pageList">
      <table width="100%" class="bordered">
        <thead>
          <tr>
            <th width="30" align="center">
              <label class="custom-check">
                <input type="checkbox" name="all" id="checkall">
                <span></span>
              </label>
            </th>
            <th>User</th>
            <th width="200">Email Address</th>
            <th width="200">Access Group</th>
            <th width="200">Last Login Date</th>
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

