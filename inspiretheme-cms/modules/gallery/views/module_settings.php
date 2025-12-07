<?php

$step = 0;
$impPageView = '<select name="mod_imp_page" id="mod_imp_page" 
  style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $gImpPage).'
 </select>';

$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td width="200">
        <label for="mod_imp_page">Destination Page:</label>
      </td>
      <td>'.$impPageView.'</td>
    </tr>  
</table>';

?>