<?php

$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td width="200">
        <label for="mod_heading">Heading:</label>
      </td>
      <td>
        <input type="text" name="mod_heading" id="mod_heading" value="'.$nlHeading.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="mod_description">Short Description:</label>
      </td>
      <td>
        <textarea name="mod_description" id="mod_description" style="width:300px;height:100px;" maxlength="150" class="check-max" >'
        .$nlDescription.'</textarea>
        <br><span class="text-muted"><small>Max 150 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
</table>';

?>