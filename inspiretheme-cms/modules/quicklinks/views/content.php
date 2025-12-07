<?php

$ddPageView = '<select name="page_id" id="page_id" 
  style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $itemPageId).'
 </select>';

$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="130">
        <label for="name">CMS Name:</label>
        <span data-toggle="tooltip" data-placement="right"
         data-title="The name of your '.$moduleLabel.' as it appears in the CMS."></span>
      </td>
      <td>
        <input type="text" name="name" id="name" value="'.$itemName.'" style="width:300px;" maxlength="100"
         placeholder="Give your '.$moduleLabel.' a name"/>
      </td>
    </tr>
    <tr>
      <td width="130"><label for="heading">Title:</label></td>
      <td>
        <input type="text" name="heading" id="heading" value="'.$itemHeading.'" style="width:300px;" 
         maxlength="100" placeholder="Add a title to your '.$moduleLabel.'"/>
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
        <label for="photo_alt_text">Image Alt Text:</label>
      </td>
      <td>
        <input type="text" name="photo_alt_text" id="photo_alt_text" value="'.$itemPhotoAltText.'" style="width:300px;"
         placeholder="Add alt text to your '.$moduleLabel.' image"/>
      </td>
    </tr>
    <tr>
      <td>
        <label for="page_id">Destination Page:</label>
      </td>
      <td>'.$ddPageView.'</td>
    </tr>  
    <tr>
      <td width="130">
        <label for="url">External URL:</label>
        <span data-toggle="tooltip" data-placement="right" data-title="Add external URL for quicklink.">
        </span>
      </td>
      <td>
        <input type="text" name="url" id="url" value="'.$itemUrl.'"style="width:300px;"
         placeholder="Add external URL to your '.$moduleLabel.'"/>
      </td>
    </tr>
    <tr>
      <td>
        <label for="button_text">Button Text:</label>
      </td>
      <td>
        <input type="text" name="button_text" id="button_text" value="'.$itemButtonText.'" style="width:300px;"
         placeholder="Add text to your '.$moduleLabel.' button" maxlength="20"/>
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="description">Description:</label></td>
      <td>
        <textarea name="description" id="description" style="width:550px;min-height:80px;resize:none;" 
         class="check-max" maxlength="200">'.$itemDescription.'</textarea>
        <br><span class="text-muted"><small>Max 200 characters (including spaces) <em></em></small></span>
      </td>
    </tr>   
  </table>';
?>