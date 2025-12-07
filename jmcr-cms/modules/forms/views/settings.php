<?php

$tabSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="130">
        <label for="form_name">Name:</label>
      </td>
      <td>
        <input type="text" name="form_name" id="form_name" value="'.$itemName.'"style="width:300px;">
      </td>
    </tr>
    <tr>
      <td width="130">
        <label for="email_subject">Email Subject:</label>
      </td>
      <td>
        <input type="text" name="email_subject" id="email_subject" value="'.$itemEmailSubject.'"style="width:300px;"/>
      </td>
    </tr>
    <tr>
      <td width="130">
        <label for="email_address">Email Address:</label>
      </td>
      <td>
        <input type="text" name="email_address" id="email_address" value="'.$itemEmailAddress.'"style="width:300px;"/>
      </td>
    </tr>
    <tr>
      <td width="130" valign="top">
        <label for="success_message">Success Message:</label>
      </td>
      <td>
        <textarea type="text" name="success_message" id="success_message" style="width:100%;height:150px;resize:none;">'.$itemSuccessMessage.'</textarea>
      </td>
    </tr>
    <tr>
      <td width="130" valign="top">
          <label for="terms_and_conditions">Terms & Conditions:</label>
      </td>
      <td>
          <textarea name="terms_and_conditions" id="terms_and_conditions"  class="content-editor">'.$itemTermsCondition.'</textarea>
      </td>
    </tr>
  </table>';

?>