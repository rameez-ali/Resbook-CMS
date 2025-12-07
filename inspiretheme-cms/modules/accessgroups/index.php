<?php
/**
 * Manage website user access groups
 *
 * @category   Module
 * @package    NetZone Base CMS 2.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */
function initMain(){

  $resultPageContent = null;
  /** Remove warning message PHP 8.0 */
  error_reporting(E_ERROR | E_PARSE);
  
  global $do, $id, $message, $accessId, $moduleMainHeading;
  $template           = (empty($template)) ? '' : $template;
  $action      = requestVar('action');
  $accessId    = requestVar('access_id');

  $moduleMainHeading = 'User Groups';
  
  if ($action === 'save') {
      require_once __DIR__ . '/save.php';
      $return = saveItem();
  }

  $c = 0;
  $activeRecords = "";
  $moduleContent = "";
  $sql = "SELECT  `access_id`,
      `access_name`,
      `access_users`,
      `access_userpasswords`,
      `access_useraccesslevel`,
      `access_accessgroups`,
      `access_cmssettings`,
      `access_settings`
    FROM cms_accessgroups
    ORDER BY access_name";

  $result = runQuery($sql);
  
  while($row = mysqli_fetch_assoc($result)) {
     
    $accessId           = $row['access_id'];
    $accessName         = $row['access_name'];
    $accessUsers        = $row['access_users'];
    $accessPasswords    = $row['access_userpasswords'];
    $accessUserAccess   = $row['access_useraccesslevel'];
    $accessAccessGroups = $row['access_accessgroups'];
    $accessSettings     = $row['access_settings'];
    
    $activeRecords .= '<tr>
        <td>'.$accessName.' 
          <input type="hidden" name="access_id[]" value="'.$accessId.'" />
        </td>
        <td title="Users" align="center" style="text-align:center;">
          <input type="checkbox" name="users_'.$accessId.'" id="switch-users-'.$accessId.'" 
            value="'.FLAG_YES.'" class="switch"
            '.(($accessUsers === FLAG_YES) ? ' checked="checked"' : '').'/>
            <label for="switch-users-'.$accessId.'" class="switch-label"></label>
        </td>
        <td title="Change Passwords" align="center" style="text-align:center;">
          <input type="checkbox" name="userpasswords_'.$accessId.'" id="switch-userpasswords-'.$accessId.'" 
            value="'.FLAG_YES.'" class="switch"
            '.(($accessPasswords === FLAG_YES) ? ' checked="checked"' : '').'/>
          <label for="switch-userpasswords-'.$accessId.'" class="switch-label"></label>
        </td>
        <td title="User Access Groups" align="center" style="text-align:center;">
          <input type="checkbox" name="useraccess_'.$accessId.'" id="switch-useraccess-'.$accessId.'" 
            value="'.FLAG_YES.'" class="switch"
            '.(($accessUserAccess === FLAG_YES) ? ' checked="checked"' : '').'/>
          <label for="switch-useraccess-'.$accessId.'" class="switch-label"></label>
        </td>
        <td title="Access Groups" align="center" style="text-align:center;">
          <input type="checkbox" name="accessgroups_'.$accessId.'" id="switch-accessgroups-'.$accessId.'" 
            value="'.FLAG_YES.'" class="switch"
            '.(($accessAccessGroups === FLAG_YES) ? ' checked="checked"' : '').'/>
          <label for="switch-accessgroups-'.$accessId.'" class="switch-label"></label>
        </td>
        <td title="Settings" align="center" style="text-align:center;">
          <input type="checkbox" name="settings_'.$accessId.'" id="switch-settings-'.$accessId.'" 
            value="'.FLAG_YES.'" class="switch"
            '.(($accessSettings === FLAG_YES) ? ' checked="checked"' : '').'/>
          <label for="switch-settings-'.$accessId.'" class="switch-label"></label>
        </td>
      </tr>';
  }
  
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
        <button type="button" class="btn btn-default" id="pg-save"
          onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Save
        </button>
      </li>
    </ul>';
          
  $moduleContent .= '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" style="margin:0px;" name="pageList">
      <table width="100%" class="bordered">
          <thead>
            <tr style="height:40px;">                                
              <th width="200" align="center">&nbsp;ACCESS GROUP</th>
              <th width="150" align="center">Users</th>
              <th width="150" align="center">Change Passwords</th>
              <th width="150" align="center">User Access Groups</th>
              <th width="150" align="center">Access Groups</th>
              <th width="150" align="center">Settings</th>
            </tr>
          </thead>
          <tbody>
            '.$activeRecords.'
          </tbody>
      </table>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="accessgroups">
  </form>';

  require "resultPage.php";
  echo $resultPageContent;
  exit();
}




?>
