<?php

$step = 0;
$impPageView = '<select name="mod_imp_page" id="mod_imp_page" 
  style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $ceImpPage).'
 </select>';

$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td colspan="2">
        <h2 class="form-section-heading">Footer Contact Settings</h2>
      </td>
    </tr> 
    <tr>
      <td width="220"><label for="mod_heading">Heading:</label></td>
      <td>
        <input type="text" name="mod_heading" id="mod_heading" value="'.$ceHeading.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="mod_short_description">Short Description:</label></td>
      <td>
        <textarea name="mod_description" id="mod_description" style="width:300px;height:100px;" maxlength="150" class="check-max" >'
        .$ceDescription.'</textarea>
        <br><span class="text-muted"><small>Max 150 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
    <tr>
    <td>
      <label for="mod_imp_page">Destination Page:</label>
    </td>
    <td>'.$impPageView.'</td>
  </tr>
    <tr>
      <td colspan="2">
      <hr class="content-hr">
        <h2 class="form-section-heading">Contact Page Settings</h2>
      </td>
    </tr> 
    <tr>
      <td><label for="mod_contact_email">Enquiry Email Address:</label></td>
      <td>
        <input type="text" name="mod_contact_email" id="mod_contact_email" value="'.$ceContactEmail.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="mod_form_heading">Contact Form Heading:</label>
      </td>
      <td>
        <input type="text" name="mod_form_heading" id="mod_form_heading" value="'.$ceFormHeading.'" style="width:300px;" />
      </td>
    </tr>   
</table>';

?>