<?php

$step = 0;
$impPageView = '<select name="mod_imp_page" id="mod_imp_page" 
  style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $rsImpPage).'
 </select>';

$arrOrderBy = ['A' => 'Random', 'D' => 'Posted Date', 'R' => 'Rank'];
$orderByView = FormHelper::createRadioOptions($arrOrderBy, 'mod_order_by', $rsOrderBy, 'radio-inline' );

/* View for Navigation */
$arrNavigation = ['A' => 'Arrows', 'D' => 'Dots'];
$navigationView = FormHelper::createRadioOptions($arrNavigation, 'mod_navigation', $rsNavigation, 'radio-inline' );

/* View for Autopay */
$arrAutopay = ['Y' => 'Yes', 'N' => 'No'];
$autopayView = FormHelper::createRadioOptions($arrAutopay, 'mod_autoplay', $rsAutoplay, 'radio-inline' );

$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
      <td colspan="2">
        <h2 class="form-section-heading">Footer Reviews Settings </h2>
      </td>
    </tr>
    <tr>
      <td width="150">
        <label for="mod_heading">Heading:</label>
      </td>
      <td>
        <input type="text" name="mod_heading" id="mod_heading" value="'.$rsHeading.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="mod_button_text">Button Label:</label>
      </td>
      <td>
        <input type="text" name="mod_button_text" id="mod_button_text" value="'.$rsButtonText.'" style="width:300px;" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="mod_imp_page">Destination Page:</label>
      </td>
      <td>'.$impPageView.'</td>
    </tr>     
    <tr>
      <td>
        <label for="mod_background_photo">Background Image:</label>
      </td>
      <td>
        <input type="text" name="mod_background_photo" id="mod_background_photo" readonly 
         value="'.$rsBackgroundPhoto.'" style="width:300px;" autocomplete="off">
        <input type="button" value="browse" 
         onclick="openCKFileBrowser(\'mod_background_photo\')"> 
        <input type="button" value="clear" 
         onclick="clearValue(\'mod_background_photo\')"><br>
      </td>
    </tr>
    <tr>
      <td>
        <label for="mod_order_by">Order By:</label>
      </td>
      <td>'.$orderByView.'</td>
    </tr>
    <tr>
      <td>
        <label for="mod_count">No of Items to Display:</label>
      </td>
      <td>
        <input type="number" name="mod_count" id="mod_count" value="'.$rsCount.'" style="width:60px;" min="1" max="10" />
      </td>
    </tr>
    <tr>
      <td>
        <label for="mod_speed">Rotation Speed</label>
      </td>
      <td>
        <input type="number" name="mod_speed" id="mod_speed" value="'.$rsSpeed.'" style="width:60px;" min="1" max="10" />
        <strong>&nbsp;seconds</strong>
      </td>
    </tr>
    <tr>
      <td>
        <label for="mod_navigation">Navigation:</label>
      </td>
      <td>'.$navigationView.'</td>
    </tr>
    <tr>
      <td>
        <label for="mod_autoplay">Auto Play:</label>
      </td>
      <td>'.$autopayView.'</td>
    </tr>
</table>';
?>