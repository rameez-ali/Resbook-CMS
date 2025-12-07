<?php

$step = 0;
$impPageView = '<select name="mod_imp_page" id="mod_imp_page" 
  style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $aImpPage).'
 </select>';

$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td colspan="2">
        <h2 class="form-section-heading">Featured Accommodation Category</h2>
      </td>
    </tr>     
    <tr>
      <td width="200">
        <label for="mod_heading">Heading:</label>
      </td>
      <td>
        <input type="text" name="mod_heading" id="mod_heading" value="'.$aHeading.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="mod_button_text">Short Description:</label>
      </td>
      <td>
        <textarea name="mod_description" id="mod_description" style="width:300px;height:100px;" maxlength="150" class="check-max" >'
        .$aDescription.'</textarea>
        <br><span class="text-muted"><small>Max 150 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
    <tr>
      <td>
        <label for="mod_button_text">Destination Page:</label>
      </td>
      <td>
        <input type="text" name="mod_button_text" id="mod_button_text" value="'.$aButtonText.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="200">
        <label for="mod_imp_page">Button Url:</label>
      </td>
      <td>'.$impPageView.'</td>
    </tr> 
    
    
</table>';

$tabModuleFilterSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    
    <tr>
      <td width="200">
        <label for="mod_allaccomfiltertext">All Accommodation Filter Text:</label>
      </td>
      <td>
        <input type="text" name="mod_allaccomfiltertext" id="mod_allaccomfiltertext" value="'.$aallaccomfiltertext.'" style="width:300px;" />
      </td>
    </tr>
</table>';
?>