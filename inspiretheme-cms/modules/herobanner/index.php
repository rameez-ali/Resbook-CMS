<?php

/**
 * Manage Hero Banner
 *
 * @category   Module
 * @package    NetZone Base CMS 3.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 2.0
 */

function initMain() 
{
  $resultPageContent = null;
  global $do, $id, $message, $itemSelect, $moduleMainHeading, $moduleSubHeading, $modMsgLabel;
  
  /** Remove warning message PHP 8.0 */
  error_reporting(E_ERROR | E_PARSE);

  $template           = (empty($template)) ? '' : $template;
  $moduleMainHeading  = 'Hero Banner';
  $modMsgLabel        = 'Hero Banner';

  $itemSelect = requestVar('item_select');
  $action     = requestVar('action');

  if (!in_array($action, ['new', 'edit', 'save'])) {
    unset($_SESSION['hero_slides']);
    $_SESSION['hero_slides'] = [];
  }
  
  switch ($action) {
    case 'new':
    case 'edit':
      require_once __DIR__ . '/edit.php';
      $return = editItem();
      break;
      
    case 'save':
      require_once __DIR__ . '/save.php';
      $return = saveItem();
      break;

    case 'delete':
      require_once __DIR__ . '/delete.php';
      $return = deleteItem();
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

  $activeRecords = "";
  $moduleContent = "";

  $sql = "SELECT `id`, 
    `name`, 
    `active_type` 
    FROM `hero_banner` 
    WHERE 1
    ORDER BY `name`";

  $result = DB::fetchAll($sql);

  if (!empty($result)) {

    foreach ($result as $row) {

      $id         = $row['id'];
      $name       = $row['name'];
      $activeType = $row['active_type'];

      switch ($activeType) {
        case HERO_BANNER_TYPE_IMAGE:
          $activeTypeLabel = 'Image';
          break;
        case HERO_BANNER_TYPE_VIDEO:
          $activeTypeLabel = 'Video';
          break;
        case HERO_BANNER_TYPE_SLIDER:
          $activeTypeLabel = 'Slideshow';
          break;
      }

      $name = $name ?: 'Untitled';

      $activeRecords .= '
        <tr>
          <td width="20" align="center">
            <label class="custom-check">
              <input type="checkbox" name="item_select[]" class ="checkall" 
                value="'.$id.'"><span></span>
            </label>
          </td>
          <td>
            <a href="'.ADMIN_BASE_URL.DS.'index.php?do='.$do
              .'&action=edit&id='.$id.'">
              '.$name.'
            </a>
          </td>
          <td width="100" valign="middle">
            <span class="label label-success">'.$activeTypeLabel.'</span>
          </td>
        </tr>';
    }

  } else {

    $moduleLabel = strtolower(str_replace(' | Trash','',$moduleMainHeading));

    $activeRecords .= '<tr>
      <td colspan="2" align="center" class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  if ($message != "") {

    $moduleContent .= '<div class="alert alert-warning page">
      <i class="glyphicon glyphicon-info-sign"></i>
      <strong>'.$message.'</strong>
    </div>';
  }

  $moduleActions = '<ul class="page-action">
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'new\',1)">
            <i class="glyphicon glyphicon-picture"></i> New
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default" 
          onclick="submitForm(\'delete\')">
            <i class="glyphicon glyphicon-remove"></i> Delete
        </button>
      </li>
    </ul>';

  $moduleContent .= '<form  action="'.ADMIN_BASE_URL.'/index.php" 
        method="post" style="margin:0px;" name="pageList">
      <table width="100%" class="bordered">
        <thead>
          <tr>
              <th width="20">
                <label class="custom-check">
                  <input type="checkbox" name="all" id="checkall"><span></span>
                </label>
              </td>
              <th>Name</td>
              <th width="100">
                Active Type
              </th>
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
