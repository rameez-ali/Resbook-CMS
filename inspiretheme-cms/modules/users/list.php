<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType;
  $tableRow           = (empty($tableRow)) ? '' : $tableRow;
  $sqlExtra = ($listType == FLAG_DELETED) ? "r.`status` = '".FLAG_DELETED."'" : "r.`status` != '".FLAG_DELETED."'";

  $sqlUsers = "SELECT u.`user_id`,
      u.`user_fname`,
      u.`user_lname`,
      IFNULL(CONCAT(u.`user_fname`, IF(u.`user_lname` IS NULL, '', CONCAT(' ', u.`user_lname`))), u.`user_fname`) AS full_name, 
      u.`user_email`,
      DATE_FORMAT(u.`last_login_date`, '%d %b %Y %r') AS last_login,      
      ag.`access_name` AS user_rights
    FROM `cms_users` AS `u`
    LEFT JOIN `cms_accessgroups` AS `ag` 
      ON `ag`.`access_id` = `u`.`access_id`
    ORDER BY u.`user_lname`";

  $arrUsers = fetchAll($sqlUsers);

  if(!empty($arrUsers)) {
    
    foreach ($arrUsers as $user) {

      $userId            = $user['user_id'];
      $userFirstName     = $user['user_fname'];
      $userLastName      = $user['user_lname'];
      $userFullName      = $user['full_name'];
      $userEmail         = $user['user_email'];
      $userLastLoginDate = $user['last_login'];
      $userRights        = $user['user_rights'];
  
      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$userId.'"><span></span>
        </label>';
    
      $tableRow .= '<tr>
          <td width="20" align="center">'.$itemSelect.'</td>
          <td>
            <a href="'.ADMIN_BASE_URL.'/?do='.$do
            .'&action=edit&id='.$userId.'" 
            title="Edit the user">'.$userFullName.'</a>
          </td>
          <td >'.$userEmail.'</td>
          <td align="center">'.$userRights.'</td>
          <td align="center">'.$userLastLoginDate.'</td>
        </tr>';
    }

  } else {

    $tableRow .= '<tr>
      <td colspan="5" align="center" class="no-data">No reviews available.</td>
    </tr>';

  }

  return $tableRow;
}
?>