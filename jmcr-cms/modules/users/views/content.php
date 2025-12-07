<?php

  /** Generating Access List */

  /** slideshow dropdown */
$accessGroupView = 'Sorry, but you can not change your own access group';

if ($userId != USER_ID) {

  $sqlAccessGroup = "SELECT `access_id` AS ind, 
      `access_name` AS label
    FROM `cms_accessgroups`";

  $accessGroupView = '<select name="access_id" id="access_id" 
    style="width:250px">
      '.createItemList($sqlAccessGroup, $userAccessId).'
    </select>';

}

$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td width="180">
        <label for="user_fname">First Name</label>
      </td>
      <td>
        <input type="text" name="user_fname" id="user_fname" value="'.$userFirstName.'" style="width:250px;" />
      </td>
    </tr>
    <tr>
      <td width="180">
        <label for="user_lname">Last Name</label>
      </td>
      <td>
        <input type="text" name="user_lname" id="user_lname" value="'.$userLastName.'" style="width:250px;" />
      </td>
    </tr>
    <tr>
      <td width="180">
        <label for="user_email">Email</label>
      </td>
      <td>
        <input name="user_email" type="text" id="user_email" value="'.$userEmail.'" style="width:250px;" />
      </td>
    </tr>
    <tr>
      <td width="180">
        <label for="user_pass">Password</label>
      </td>
      <td>
        <input name="user_pass" type="password" id="user_pass"
         value="********" style="width:250px;" onClick="this.value=\'\';"/>
      </td>
    </tr>
    <tr>
      <td width="180">
        <label for="access_id">Access Group</label>
      </td>
      <td>'.$accessGroupView.'</td>
    </tr>
  </table>';

?>