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
        <h2 class="form-section-heading">Featured Accommodations</h2>
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
        <label for="mod_button_text">Button Label:</label>
      </td>
      <td>
        <input type="text" name="mod_button_text" id="mod_button_text" value="'.$aButtonText.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="200">
        <label for="mod_imp_page">Destination Page:</label>
      </td>
      <td>'.$impPageView.'</td>
    </tr>  
</table>';

$tabAccommodationSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
  <tr>
      <td colspan="2">
        <h2 class="form-section-heading">Explore Other Accommodations on Detail Page</h2>
      </td>
    </tr>  
  <tr>
    <td width="200">
      <label for="mod_accommodation_heading">Heading:</label>
    </td>
    <td>
      <input type="text" name="mod_accommodation_heading" id="mod_accommodation_heading" value="'.$aAccommodationsHeading.'" style="width:300px;" />
    </td>
  </tr>
  <tr>
    <td><label for="mod_show_moreaccom">Show more accommodation:</label></td>
    <td>
        <input name="mod_show_moreaccom" type="checkbox" id="mod_show_moreaccom" value="'.FLAG_YES.'" 
         '.(($aShowMoreAccom === FLAG_YES) ? ' checked="checked"' : '').'/>
    </td>
  </tr>
</table>';
$tabAccommodationBookCtaContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
  <tr>
      <td colspan="2">
        <h2 class="accom-bookcta-heading">Accommodation Book CTA Heading</h2>
      </td>
    </tr>  
  <tr>
    <td width="200">
      <label for="mod_accom_bookctaheading">Heading:</label>
    </td>
    <td>
      <input type="text" name="mod_accom_bookctaheading" id="mod_accom_bookctaheading" value="'.$aAccomBookCtaHeading.'" style="width:300px;" />
    </td>
  </tr>
  <tr>
    <td><label for="mod_enquiry_btntxt">Enquiry Button Text:</label></td>
    <td>
      <input type="text" name="mod_enquiry_btntxt" id="mod_enquiry_btntxt" value="'.$aEnquiryBtnTxt.'" style="width:300px;"/>
    </td>
  </tr>
  <tr>
    <td><label for="mod_enquiry_btnurl">Enquiry Button URL:</label></td>
    <td>
      <input type="text" name="mod_enquiry_btnurl" id="mod_enquiry_btnurl" value="'.$aEnquiryBtnUrl.'" style="width:300px;"/>
    </td>
  </tr>
</table>';
?>