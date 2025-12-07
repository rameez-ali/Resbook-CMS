<?php

$tabSettingsContent = '
  <table width="100%" border="0" cellspacing="0" cellpadding="6">    
    <tr>
      <td width="180">
        <label for="name">CMS Name:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The name of your '.$moduleLabel.' as it appears in the CMS."></span>
      </td>
      <td>
        <input type="text" name="name" id="name" value="'.$itemName.'"style="width:300px;"/></td>
    </tr>
    <tr>
      <td>
        <label for="menu_label">Name:</label>
        <span data-toggle="tooltip" data-placement="right" 
         data-title="The name of your '.$moduleLabel.' as it appears in your website navigation."></span>
      </td>
      <td>
        <input type="text" name="menu_label" id="menu_label" value="'.$itemMenuLabel.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="amount">Amount:</label>
      </td>
      <td>
        <input type="text" name="amount" id="amount" value="'.$itemAmount.'" style="width:100px;" />        
      </td>
    </tr>
    <tr>
      <td><label for="currency_code">Currency Code:</label></td>
      <td>
        <input type="text" name="currency_code" id="currency_code" value="'.$itemCurrencyCode.'" style="width:100px;"
        maxlength="20"/>
      </td>
    </tr>
    <tr>
    <td><label for="photo_path">Image:</label></td>
    <td>
        <input name="photo_path" type="text" value="'.$itemPhotoPath.'" 
         style="width:300px;" id="photo_path" readonly autocomplete="off">
        <input name="thumb_photo_path" type="hidden" value="'.$itemPhotoThumbPath.'" 
         id="thumb_photo_path" readonly autocomplete="off">
        <input type="button" value="browse" onclick="openCKFileBrowser(\'photo_path\')"> 
        <input type="button" value="clear" onclick="clearValue(\'photo_path\')"><br>
    </td>
  </tr>
    <tr>      
      <td>
        <label for="valid_for">Valid For:</label>
      </td>
      <td><input type="text" name="valid_for" id="valid_for" value="'.$itemValidFor.'" style="width:100px;" />
      <br><span class="text-muted"><small>Number represent months<em></em></small></span>
      </td>      
    </tr>
    <tr>
      <td valign="top"><label for="short_description">Short Description:</label></td>
      <td>
        <textarea name="short_description" id="short_description" style="width:550px;min-height:80px;resize:none;" 
         class="check-max" maxlength="80">'.$itemDescription.'</textarea>
        <br><span class="text-muted"><small>Max 80 characters (including spaces) <em></em></small></span>
      </td>
    </tr>

  </table>';