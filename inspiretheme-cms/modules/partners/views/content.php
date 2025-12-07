<?php

$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="130"><label for="name">Name:</label></td>
      <td>
        <input type="text" name="name" id="name" value="'.$itemName.'" style="width:300px;" maxlength="100"/>
      </td>
    </tr>
    <tr>
      <td width="130"><label for="menu_label">Title:</label></td>
      <td>
        <input type="text" name="menu_label" id="menu_label" value="'.$itemMenuLabel.'" style="width:300px;" 
         maxlength="100"/>
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="logo_path">Logo Path:</label></td>
      <td>
          <input name="logo_path" type="text" value="'.$itemLogoPath.'" 
           style="width:300px;" id="logo_path" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openCKFileBrowser(\'logo_path\')"> 
          <input type="button" value="clear" onclick="clearValue(\'logo_path\')"><br>
          <p class="form-field-note">
            Recommended logo size: 95px high and 60-150px wide in .png format. 
          </p>
      </td>
    </tr>
    <tr>
      <td width="130"><label for="alt_text">Alt Text:</label></td>
      <td>
        <input type="text" name="alt_text" id="alt_text" value="'.$itemAltText.'"style="width:300px;" maxlength="100"/>
      </td>
    </tr>
    <tr>
      <td width="130"><label for="url">URL:</label></td>
      <td>
        <input type="text" name="url" id="url" value="'.$itemUrl.'"style="width:300px;"/>
      </td>
    </tr>
  </table>';