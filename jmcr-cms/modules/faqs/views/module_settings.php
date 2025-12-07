<?php

$step = 0;
$impPageView = '<select name="mod_imp_page" id="mod_imp_page" 
  style="width:300px">
   <option value="">Please Select Page</option>
   '.DBHelper::createImpPageList(null, $fsImpPage).'
 </select>';

$arrType = ['L' => 'Standard List', 'A' => 'Collapsible List'];
$typeView = FormHelper::createRadioOptions($arrType, 'mod_type', $fsType, 'radio-inline' );

/* View for Default State */
$arrState = ['E' => 'Expand', 'C' => 'Collapsible'];
$stateView = FormHelper::createRadioOptions($arrState, 'mod_default_state', $fsDefaultState, 'radio-inline' );

/* View for Expand Icon */
$arrExpandIcon = ['fa-angle-down' => 'Down Angle', 'fa-plus' => 'Plus', 'fa-angle-double-down'=>'Double Down Angle', 'fa-arrow-down'=>'Down Arrow', 'fa-arrow-circle-down'=>'Down Arrow Circle'];

$expandIconView = FormHelper::createRadioOptions($arrExpandIcon, 'mod_icon_expand', $fsIconExpand, 'radio-inline' );

/* View for Collapse Icon */
$arrCollapseIcon = ['fa-angle-up' => 'Up Angle', 'fa-minus' => 'Minus', 'fa-angle-double-up'=>'Double Up Angle', 'fa-arrow-up'=>'Up Arrow', 'fa-arrow-circle-up'=>'Up Arrow Circle'];
  
$collapseIconView = FormHelper::createRadioOptions($arrCollapseIcon, 'mod_icon_collapse', $fsIconCollapse, 'radio-inline' );

$tabModuleSettingsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="8"> 
    <tr>
        <td colspan="2">
         
          <h2 class="form-section-heading">FAQ Layout Settings</h2>
      </td>
    </tr>     
    <tr>
      <td>
        <label for="mod_type">List Type:</label>
      </td>
      <td>'.$typeView.'</td>
    </tr>
    <tr>
      <td>
        <label for="mod_default_state">Collapsible Panel Default State:</label>
      </td>
      <td>'.$stateView.'</td>
    </tr>
    <tr>
      <td>
        <label for="mod_icon_expand">Expand Icon:</label>
      </td>
      <td>'.$expandIconView.'</td>
    </tr>
    <tr>
      <td>
        <label for="mod_icon_collapse">Collapse Icon:</label>
      </td>
      <td>'.$collapseIconView.'</td>
    </tr>


</table>';

?>