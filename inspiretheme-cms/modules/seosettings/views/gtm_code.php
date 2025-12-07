<?php
/** Google Tab Manager Codes tab view */
$tabGtmCodes = '<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td colspan="2">
        <strong>
          This is an advanced section where you can add the code to install Google Tag Manager on your website.
        </strong>
      </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td valign="top" width="190">
        <label for="gtm_code_head_close">GTM Head Code:</label>
        <span data-toggle="tooltip" data-placement="right"
         data-title="Enter the GTM code that will be added before the closing &lt;/head> 
          tag on every page on your website">
        </span>
      </td>
      <td valign="top">
        <textarea name="gtm_code_head_close" id="gtm_code_head_close"
         style="width:600px; height:150px;resize:none;">'.$seoGtmCodeHeadClose.'</textarea>
        <br>
        <span class="text-muted">
          <small>This code will be added before the closing <b>&lt;/head></b> tag on every page on your website.</small>
        </span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="gtm_code_body_open">GTM Body Code: </label>
        <span data-toggle="tooltip" data-placement="right"
         data-title="Enter the GTM code that will be added after the opening &lt;body>
          tag on every page on your website.">
        </span>
      </td>
      <td valign="top">
        <textarea name="gtm_code_body_open"  id="gtm_code_body_open"
         style="width:600px; height:100px;resize:none;">'.$seoGtmCodeBodyOpen.'</textarea>
         <br>
         <span class="text-muted">
          <small>This code will be added after the opening <b>&lt;body></b> tag on every page on your website.</small>
         </span>
      </td>
    </tr>
  </table>';