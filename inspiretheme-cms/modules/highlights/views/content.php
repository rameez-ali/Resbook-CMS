<?php
$itemPageId = '<select name="page_id" id="page_id" style="width:300px">
<option value="">Please Select Page</option>
'.DBHelper::createImpPageList(null, $itemPageId).'
</select>';

$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="130">
        <label for="name">Title:</label>
      </td>
      <td>
        <input type="text" name="name" id="name" value="'.$itemName.'"style="width:300px;"/>
        <br><span class="text-muted"><small>Max 100 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="icon_path">Image:</label></td>
      <td>
          <input name="image_path" type="text" value="'.$itemImagePath.'" 
           style="width:300px;" id="image_path" readonly autocomplete="off">
           <input name="thumb_image_path" type="hidden" value="'.$itemImageThumbPath.'" 
           id="thumb_image_path" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openCKFileBrowser(\'image_path\')"> 
          <input type="button" value="clear" onclick="clearValue(\'image_path\')"><br>
      </td>
    </tr>
    <tr>
      <td width="130">
        <label for="image_alt_txt">Image Alt Text:</label>
      </td>
      <td>
        <input type="text" name="image_alt_txt" id="image_alt_txt" value="'.$itemAltText.'"style="width:300px;"/>
      </td>
    </tr>
    <tr>
    <td width="150">
      <label for="page_id">Page Id:</label>
    </td>
    <td>'.$itemPageId.'</td>
    </tr>
    <tr>
      <td width="150">
        <label for="url">Url:</label>
      </td>
      <td>
        <input type="text" name="url" id="url" value="'.$itemUrl.'" style="width:300px;"
        maxlength="50"/>
      </td>
    </tr>
    
    <tr>
    <td valign="top">
      <label for="short_description">Short Description:</label>
    </td>
    <td>
      <textarea name="short_description" id="short_description" style="width:550px;height:100px;" 
        maxlength="150" class="check-max">'.$itemDescription.'</textarea>
      <br><span class="text-muted"><small>Max 150 characters (including spaces) <em></em></small></span>
    </td>
  </tr>
  </table>';

?>