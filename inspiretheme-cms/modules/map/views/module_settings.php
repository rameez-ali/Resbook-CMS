<?php

/* View for Map Color Selection */
$arrColorMap = ['G' => 'Grayscale', 'C' => 'Colour'];
$mapColorView = FormHelper::createRadioOptions($arrColorMap, 'mod_colormap', $gmsColorMap, 'radio-inline' );


$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <!-- <tr>
      <td width="150">
        <label for="mod_button_text">Button Label:</label>
      </td>
      <td>
        <input type="text" name="mod_button_text" id="mod_button_text" value="'.$gmsButtonText.'" style="width:300px;"
         maxlength="50"/>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="mod_cover_photo_path">Map Cover Image:</label>
      </td>
      <td>
        <input type="text" name="mod_cover_photo_path" id="mod_cover_photo_path" readonly 
         value="'.$gmscoverPhotoPath.'" style="width:300px;" autocomplete="off">
        <input type="button" value="browse" 
         onclick="openCKFileBrowser(\'mod_cover_photo_path\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'mod_cover_photo_path\')"><br>
         <p class="form-field-note">
          (Recommend size: 1920x600 px and format: jpg) 
        </p>
      </td>
    </tr> -->
    <tr>
      <td>
        <label for="mod_colormap">Map Color:</label>
      </td>
      <td>'.$mapColorView.'</td>
    </tr>
    <tr>
</table>';
?>