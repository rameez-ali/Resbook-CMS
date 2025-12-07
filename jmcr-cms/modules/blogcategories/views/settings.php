<?php

$tabSettingsContent = '
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="180">
        <label for="page_url">URL</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The URL is automatically created based on your CMS name.
          If you need to edit this URL, please ensure that you use lowercase letters
           and separate words using hyphens (-) instead of spaces. "></span>
      </td>
      <td>
        <input name="url" type="text" id="page_url" value="'.$itemUrl.'" data-cvalue="'.$itemUrl.'"
         data-type="mod" style="width:250px;" class="item-url" />
        <span id="page_url_msg" style="margin-left:10px;" class="text-danger"></span>
      </td>
    </tr>
    <tr>
      <td width="180">
        <label for="name">CMS Name:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The name of your '.$moduleLabel.' as it appears in the CMS."></span>
      </td>
      <td>
        <input type="text" name="name" id="name" value="'.$itemName.'"style="width:250px;"/></td>
    </tr>
    <tr>
      <td>
        <label for="menu_label">Navigation Name:</label>
        <span data-toggle="tooltip" data-placement="right" 
        data-title="The name of your '.$moduleLabel.' as it appears in your website navigation."></span>
      </td>
      <td>
        <input type="text" name="menu_label" id="menu_label" value="'.$itemMenuLabel.'" style="width:250px;" />
      </td>
    </tr>
  </table>';

