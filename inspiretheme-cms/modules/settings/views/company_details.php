<?php
$tabCompanyDetailsContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="4">
    <tr>
      <td width="150">
        <label for="company_name">Company name</label>
      </td>
      <td>
        <input name="company_name" id="company_name" type="text"
         value="'.$gsCompanyName.'" style="width:350px;" '.$readOnly.' /></td>
    </tr>
    <tr>
      <td>
        <label for="phone_number">Phone Number</label>
      </td>
      <td>
        <input name="phone_number" id="phone_number" type="text"
         value="'.$gsPhoneNumber.'" style="width:150px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="free_phone_number">Free Phone Number</label>
      </td>
      <td>
        <input name="free_phone_number" id="free_phone_number" type="text"
         value="'.$gsFreePhoneNumber.'" style="width:150px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="fax_number">Fax Number</label>
      </td>
      <td>
        <input name="fax_number" id="fax_number" type="text"
         value="'.$gsFaxNumber.'" style="width:150px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="start_year">Copyright Year</label>
      </td>
      <td>
        <input name="start_year" id="start_year" type="text" 
         value="'.date("Y").'" style="width:150px;" readonly/>
      </td>
    </tr>
<!--<tr>
      <td>
        <label for="resbook_id">Resbook ID</label>
      </td>
      <td>
        <input name="resbook_id" id="resbook_id" type="text" 
         value="'.$gsResbookID.'" style="width:150px;"/>
      </td>
    </tr>
    <tr>
      <td>
        <label for="is_resbook_calendar">Resbook Calendar</label>
      </td>
      <td>
        <input name="is_resbook_calendar" type="checkbox" id="is_resbook_calendar" value="'.FLAG_YES.'" 
        '.(($gsIsResbookCalendar === FLAG_YES) ? ' checked="checked"' : '').'/>
      </td>
    </tr> -->
    
    <tr>
      <td>
        <label for="booking_url">Booking URL</label>
      </td>
      <td>
        <input name="booking_url" id="booking_url" type="text" 
         value="'.$gsBookingUrl.'" style="width:350px;"  /><br/>
         <small>Only used on Book Now button if no RS Widget</small>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="email_address">Email(s)</label> 
      </td>
      <td>
        <textarea name="email_address" style="width:350px;min-height:100px;">'
         .$gsEmailAddress.'</textarea>
        <br/>
        <small>Separate multiple email addresses with a semicolon ( ; )</small>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="address">Address</label>
      </td>
      <td>
        <textarea name="address" style="width:350px;min-height:100px;">'
         .$gsAddress.'</textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="hidden" name="id" value="'.$id.'">
      </td>
    </tr>
  </table>';
  $tabFooterContactContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="4">
    <tr>
    <td colspan="2">
      <h2 class="form-section-heading">Footer Contact Settings</h2>
    </td>
    </tr> 
    <tr>
      <td width="220"><label for="fcontact_heading">Heading:</label></td>
      <td>
        <input type="text" name="fcontact_heading" id="fcontact_heading" value="'.$fcontactHeading.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td valign="top"><label for="fcontact_short_description">Short Description:</label></td>
      <td>
        <textarea name="fcontact_short_description" id="fcontact_short_description" style="width:300px;height:100px;" maxlength="150" class="check-max" >'
        .$fcontactDescription.'</textarea>
        <br><span class="text-muted"><small>Max 150 characters (including spaces) <em></em></small></span>
      </td>
    </tr> 
    <tr>
      <td width="220"><label for="fcontact_btntext">Button Text:</label></td>
      <td>
        <input type="text" name="fcontact_btntext" id="fcontact_btntext" value="'.$fcontactBtnText.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="fcontact_btnurl">Button URL:</label>
      </td>
      <td>
        <input name="fcontact_btnurl" id="fcontact_btnurl" type="text" 
         value="'.$fcontactBtnUrl.'" style="width:350px;"  /><br/>         
      </td>
    </tr>     
  </table>';
?>