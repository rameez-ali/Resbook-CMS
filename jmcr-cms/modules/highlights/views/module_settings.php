<?php

$hPageId = '<select name="mod_pageid" id="mod_pageid" style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $hPageId).'
 </select>';
 
$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 

    <tr>
      <td width="150">
        <label for="mod_heading">Heading:</label>
      </td>
      <td>
        <input type="text" name="mod_heading" id="mod_heading" value="'.$hHeading.'" style="width:300px;"
         maxlength="50"/>
      </td>
    </tr>
    <tr>
    <td width="150">
      <label for="mod_pageid">Page Id:</label>
    </td>
    <td>'.$hPageId.'</td>
  </tr>
  <tr>
  <td width="150">
    <label for="mod_url">Url:</label>
  </td>
  <td>
    <input type="text" name="mod_url" id="mod_url" value="'.$hUrl.'" style="width:300px;"
     maxlength="50"/>
  </td>
</tr>
<tr>
<td width="150">
  <label for="mod_buttontext">Button Text:</label>
</td>
<td>
  <input type="text" name="mod_buttontext" id="mod_buttontext" value="'.$hButtonText.'" style="width:300px;"
   maxlength="50"/>
</td>
</tr>
</table>';
?>