<?php
/** Template Codes tab view */
$tabTemplateCodes = '<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td colspan="2">
        <strong>This is an advanced section where you can add custom code to every page on your website.</strong>
      </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td valign="top" width="190">
        <label for="js_code_head_close">Head Code:</label>
        <span data-toggle="tooltip" data-placement="right" data-title="Enter code that will be added before the
         closing &lt;/head> tag on every page on your website."></span>
      </td>
      <td valign="top">
        <textarea name="js_code_head_close" id="js_code_head_close"
        style="width:600px; height:150px;resize:none;">'.$seoJsCodeHeadClose.'</textarea>
        <br/>
        <span class="text-muted">
          <small>This code will be added before the closing <b>&lt;/head></b> tag on every page on your website.</small>
        </span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="js_code_body_open">Opening Body Code:</label>
        <span data-toggle="tooltip" data-placement="right" data-title="Enter code that will be added after the
         opening &lt;body> tag on every page on your website."></span>
      </td>
      <td valign="top">
        <textarea name="js_code_body_open"  id="js_code_body_open"
        style="width:600px; height:150px;resize:none;">'.$seoJsCodeBodyOpen.'</textarea>
        <br/>
        <span class="text-muted">
          <small>This code will be added after the opening <b>&lt;body></b> tag on every page on your website.</small>
        </span>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="js_code_body_close">Closing Body Code:</label>
        <span data-toggle="tooltip" data-placement="right" data-title="Enter code that will be added before the
         closing &lt;/body> tag on every page on your website."></span>
      </td>
      <td valign="top">
        <textarea name="js_code_body_close"  id="js_code_body_close"
        style="width:600px; height:150px;resize:none;">'.$seoJsCodeBodyClose.'</textarea>
        <br/>
        <span class="text-muted">
          <small>This code will be added before the closing <b>&lt;/body></b> tag on every page on your website.</small>
        </span>
      </td>
    </tr>
  </table>';