<?php
/** Adwords Code tab view */
$tabAdwordsCode = '<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td colspan="2">
        <strong>This is an advanced section where you can add the code to install Google Ads 
          conversion tracking on your website.</strong>
      </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td valign="top" width="190">
        <label for="adwords_code">Google Ad Code:</label>
        <span data-toggle="tooltip" data-placement="right"
         data-title="Enter code to install conversion tracking on your website."></span>
      </td>
      <td valign="top">
        <textarea name="adwords_code"  id="adwords_code" 
         style="width:600px; height:200px;resize:none;">'.$seoAdwordsCode.'</textarea>
        <br/>
        <span class="text-muted">
          <small>This code will be added before the closing <b>&lt;/head></b> tag on every page on your website.</small>
        </span>
      </td>
    </tr>
  </table>';