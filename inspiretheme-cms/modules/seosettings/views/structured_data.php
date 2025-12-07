<?php

/** Structured Data tab view */
$tabStructuredData = '<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
    <td colspan="2">
      <strong>This is an advanced section where you can add structured data to your website to help search engines
       understand your content.</strong>
    </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td valign="top" width="190">
        <label for="structure_data_markup">Schema Markup:</label>
        <span data-toggle="tooltip" data-placement="right"
          data-title="Enter schema markup code to help search engines understand the content on your website."></span>
      </td>
      <td valign="top">
        <textarea name="structure_data_markup"  id="structure_data_markup"
          style="width:600px; height:250px;resize:none;">'.$seoStructureDataMarkup.'</textarea>
        <br/>
        <span class="text-muted">
        <small>This code will be added before the closing <b>&lt;/head></b> tag on every page on your website.</small>
        </span>
      </td>
    </tr>
  </table>';