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
      </td>
    </tr>
    <tr>
      <td width="130">
        <label for="header">Header:</label>
      </td>
      <td>
        <input type="text" name="header" id="header" value="'.$itemHeader.'"style="width:300px;"/>
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="icon_path">Image:</label></td>
      <td>
          <input name="image_path" type="text" value="'.$itemImagePath.'" 
           style="width:300px;" id="image_path" readonly autocomplete="off">
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
      <td width="150">
        <label for="button_text">Button Text</label>
      </td>
      <td>
        <input type="text" name="button_text" id="button_text" value="'.$itemButtonText.'" style="width:300px;"
        maxlength="50"/>
        <br><span class="text-muted"><small>By default "Discover More"</small></span>
      </td>
    </tr>
    
    <tr>
    <td valign="top">
      <label for="description">Description:</label>
    </td>
    <td>
      <textarea name="description" id="description" style="width:550px;height:100px;" 
        maxlength="500" class="check-max">'.$itemDescription.'</textarea>
      <br><span class="text-muted"><small>Max 500 characters (including spaces) <em></em></small></span>
    </td>
  </tr>
  </table>';

?>