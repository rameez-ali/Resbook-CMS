<?php

$tabRSWidgetContent = '<table width="100%" border="0" 
   cellspacing="0" cellpadding="4">
   
    <tr>
      <td valign="top">
        <label for="rb_cp_widget">Check in person widget code</label> 
      </td>
      <td>
        <textarea name="rb_cp_widget" style="width:350px;min-height:100px;">'
         .$gsCPWidget.'</textarea>
         <br/>
         <small>Book Online - Button will be added in header</small>
         
      </td>
    </tr>

    <tr>
      <td valign="top">
        <label for="rb_ci_widget">Check in widget</label>
      </td>
      <td>
        <textarea name="rb_ci_widget" style="width:350px;min-height:100px;">'
         .$gsChInWidget.'</textarea>

         
      </td>
    </tr>


    <tr>
    <td valign="top">
      <label for="rb_pm_widget">Property Manager Calendar Widget</label>
    </td>
    <td>
      <textarea name="rb_pm_widget" style="width:350px;min-height:100px;">'
       .$gsPropManagerWidget.'</textarea>
    </td>
  </tr>
    
  </table>';
?>