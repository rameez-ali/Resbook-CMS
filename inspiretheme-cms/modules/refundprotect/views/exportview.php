<?php

$exportViewContent = '
  
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td colspan="3" ><span class="text-muted"><small>Please select the contract creation date range you wish to export contracts for.<em></em></small></span></td>
    </tr>  
    <tr>
      <td width="50">
        <label for="from_date">From </label>
      </td>
      <td>        
        <input type="text" name="from_date" class="form-control" id="from_date" placeholder="Select Date" value="'.$rpfromvalue.'" style="width:155px;" />
      </td>
    </tr>
    <tr>   
      <td>
        <label for="to_date">To </label> 
      </td>
      <td>
        <input type="text" name="to_date" class="form-control" id="to_date" placeholder="Select Date" value="'.$rptovalue.'" style="width:155px;" />
      </td>
    </tr>
  </table>';


      $extraScripts .= "<script>
      $('#from_date').attr({autocomplete:'off', readonly:true}).datepicker({
          dateFormat:'dd-mm-yy',
          maxDate: new Date(),
          onSelect: function(dateText, inst){
            $('#to_date').datetimepicker('option', 'minDate', dateText);          
         }
         
      });
      
      $('#to_date').attr({autocomplete:'off', readonly:true}).datepicker({
        
        dateFormat:'dd-mm-yy',
        maxDate: new Date()
        
      });
      
      </script>";
?>