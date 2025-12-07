<?php

$step = 0;
$impPageView = '<select name="mod_imp_page" id="mod_imp_page" 
  style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $vImpPage).'
 </select>';

$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td colspan="2">
        <h2 class="form-section-heading">Featured Accommodations</h2>
      </td>
    </tr>     
    <tr>
      <td width="200"> 
        <label for="mod_email">Admin Email:</label>
      </td>
      <td>
        <input type="text" name="mod_email" id="mod_email" value="'.$vEmail.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="200"> 
        <label for="mod_voucher_subject">Subject on Voucher Mail:</label>
      </td>
      <td>
        <input type="text" name="mod_voucher_subject" id="mod_voucher_subject" value="'.$voucherSubject.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td width="200"> 
        <label for="mod_client_subject">Subject on Client Mail:</label>
      </td>
      <td>
        <input type="text" name="mod_client_subject" id="mod_client_subject" value="'.$clientSubject.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="mod_message">Success Message:</label>
      </td>
      <td>
        <textarea name="mod_message" id="mod_message" style="width:300px;height:100px;" maxlength="150" class="check-max" >'
        .$vMessage.'</textarea>
        <br><span class="text-muted"><small>Max 150 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="mod_fail_message">Fail Message:</label>
      </td>
      <td>
        <textarea name="mod_fail_message" id="mod_fail_message" style="width:300px;height:100px;" maxlength="150" class="check-max" >'
        .$vFailMessage.'</textarea>
        <br><span class="text-muted"><small>Max 150 characters (including spaces) <em></em></small></span>
      </td>
    </tr>
    <tr>
      <td width="200">
        <label for="mod_imp_page">Destination Page:</label>
      </td>
      <td>'.$impPageView.'</td>
    </tr>
    <tr>
      <td width="200"> 
        <label for="surcharge_text">Surcharge Text:</label>
      </td>
      <td>
        <input type="text" name="surcharge_text" id="surcharge_text" value="'.$surchargeText.'" style="width:300px;" />
      </td>
    </tr>  
</table>';

$tabModuleTerms = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td>
      
        <textarea name="mod_terms" id="mod_terms" class="content-editor">'.$vTerms.'</textarea>
        
      </td>
    </tr>
</table>';


$tabModuleAmt = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
<tr>
  <td>
  <label for="mod_imp_page">Enter a Gift Amount:</label>
    <textarea name="mod_amount" id="mod_amount" style="width: 100%; height: 150px;" maxlength="25" class="check-max" >'.$vAmt.'</textarea>
    <p>Please enter gift voucher custom amounts, seperated by a comma e.g. 10,20,30</p> 
    <span class="text-muted"><small>Max 25 characters (including spaces) <em></em></small></span>
  </td>
</tr>

<tr>      
    <td>
    <label for="valid_for">Valid For:</label>
      <span data-toggle="tooltip" data-placement="right" 
         data-title="This validation period applies to all custom value amounts."></span><br>
    <input type="text" name="valid_for" id="valid_for" value="'.$vValidFor.'" style="width:100px;" />
    <br><span class="text-muted"><small>Number represent months<em></em></small></span>
    </td>      
  </tr>
</table>';

?>