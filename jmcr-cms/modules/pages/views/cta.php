<?php

/** Page Module - Features Tab */

$tabPageCTAContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td colspan="2">
      <h2 class="form-section-heading">CTA Bunner</h2>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="170">
      <label for="cta_heading">Title</label>
    </td>      
    <td>
      <input type="text" name="cta_heading" id="cta_heading"
      value="'.$pageCTAHeading.'" style="width:550px;" />
    </td>
  </tr>
  <tr>
    <td valign="top">
      <label for="cta_bunner_description">Description:</label>
    </td>
    <td>
      <textarea name="CTABunner[description]" id="cta_bunner_description"
              style="width:550px;height:80px;resize: none;" maxlength="250" class="check-max">'.$ctaBunnerDescription.'
      </textarea>
      <br>
      <span class="text-muted">
        <small>Max 250 characters (including spaces)
          <em></em>
        </small>
      </span>
    </td>
  </tr>
  <tr>
    <td>
      <label for="cta_btn1">Primary Button Internal Link</label>
    </td>      
    <td>
      <input type="text" name="cta_btn1" id="cta_btn1"
      value="'.$pageCTABtn1.'" style="width:250px;" />
    </td>
  </tr>
  <tr>
    <td width="160">
      <label for="cta_bunner_primary_external_url">Primary Button External Link:</label>
    </td>
    <td>
      <input type="text" name="cta_bunner_primary_external_url" id="cta_bunner_primary_external_url" value="'.$ctaBunnerPrimaryExternalUrl.'" style="width:250px;" />
    </td>
  </tr>
  <tr>
    <td>
      <label for="cta_btn1_url">CTA Url 1:</label>
    </td>      
    <td>
      <input type="text" name="cta_btn1_url" id="cta_btn1_url"
      value="'.$pageCTAUrl1.'" style="width:350px;" />
    </td>
  </tr>

  <tr>
    <td>
      <label for="cta_btn2">CTA Button 2:</label>
    </td>      
    <td>
      <input type="text" name="cta_btn2" id="cta_btn2"
      value="'.$pageCTABtn2.'" style="width:250px;" />
    </td>
  </tr>
  <tr>
    <td>
      <label for="cta_btn2_url">CTA Url 2:</label>
    </td>      
    <td>
      <input type="text" name="cta_btn2_url" id="cta_btn2_url"
      value="'.$pageCTAUrl2.'" style="width:350px;" />
    </td>
  </tr>
</table>';