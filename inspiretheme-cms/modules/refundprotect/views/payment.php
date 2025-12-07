<?php

if($id) {
  $disabled = $refundStatus == 'Active' ? '' : 'disabled';
}

$updateButtonView = '<li>
<button type="button" class="btn btn-default" id="udateContract" data-toggle="modal" data-target="#updateContractModalPopup" '.$disabled.'>
  Log Payment
</button>
</li>';
$tabPaymentContent .= '
'.$updateButtonView.'</br></br>
 <table width="100%" class="bordered" >
   <thead>
     <tr height="30">
       <th align="left">Payment</th> 
       <th width="100" align="left">Currency</th>            
       <th width="300" align="left">Notes</th>  
       <th width="200" align="left">Made On</th>       
     </tr>
   </thead>
   <tbody>
    '.$paymentHistory.'
   </tbody>
 </table>
 
 <!--update Modal 1 -->

 <div class="modal fade" id="updateContractModalPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document"><div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative;z-index:9;">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4><strong> Add Payment </strong></h4> </br>
      <h6 class="modal-title" id="myModalLabel">How much would you like to add to this Contract?</h6>
      <i><h6 class="modal-title" id="myModalLabel">The selected currency for this contract is: <strong><span id="popup1_currency"></span></strong></h6></i>
    </div>
    <div class="modal-body">
      <table width="100%" border="0" cellspacing="0" cellpadding="8"> 
          <tr>  
            <td width="130">
              <label for="total_amount">Total Booking Amount:</label>
            </td>
            <td>
              <div class="text-right" id="total_amount" name="total_amount" style="width:155px;">'.$currencySymbolOnPayment.''.$refundProductBasePrice.'</div>
            </td>
          </tr>

          <tr>  
            <td width="130">
              <label for="total_baseandrefundamount">Total Coverage </br> Amount:</label>
            </td>
            <td>              
              <label class="text-right" name="total_baseandrefundamount" id="total_baseandrefundamount" style="width:155px;"></label>
            </td>
          </tr>

          <tr>  
            <td width="130">
              <label for="total_coveredamount">Total Payment </br> Received:</label>
            </td>
            <td>              
              <label class="text-right" name="total_coveredamount" id="total_coveredamount" style="width:155px;" >'.($refundTotalCovered == '' ? '$0' : $refundTotalCovered) .' </label>
            </td>
          </tr>
          
          <tr>
            <td width="130">
              <label for="addmore_amount">Amount to add:</label>
            </td>
            <td>
              <input type="number" name="addmore_amount" id="addmore_amount" class="text-right" value="'.$refundAddMoreAmount.'" style="width:155px;" />        
              <span id="addmore_amount_error" class="text-danger"></span>
            </td>
          </tr>
          <tr>
            <td width="130">
              <label for="addmore_notes">Notes:</label>
              <br><span class="text-muted"><small>optional<em></em></small></span>
            </td>
            <td>        
              <textarea name="addmore_notes" id="addmore_notes" style="width:250px;height:70px;"
              maxlength="200" class="check-max">'.$refundNotes.'</textarea>
              <br><span class="text-muted"><small>Max 200 characters (including spaces) <em></em></small></span>
            </td>
          </tr>
          
      </table>
    </div>
    <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-default" id="preview_update" >
        <i class="glyphicon glyphicon-floppy-save"></i> Submit
      </button>
    </div>
  </div></div>
</div>


<!--Update Modal 2 -->
<div class="modal fade" id="updateConfirmContractModalPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document"><div class="modal-content">
    <div class="modal-header">
      
      <h4><strong> Confirm Payment Information</strong></h4>
    </div>
    <div class="modal-body">

    <table width="100%" border="0" cellspacing="0" cellpadding="8"> 
          <tr>  
            <td width="150">
              <label for="ctotal_amount">Total Booking Amount:</label>
            </td>
            <td>
              <div id="ctotal_amount" name="ctotal_amount" style="width:155px;" class="text-right"></div>
            </td>
          </tr>

          <tr>  
            <td width="130">
              <label for="ctotal_baseandrefundamount">Total Coverage </br> Amount:</label>
            </td>
            <td>              
              <label name="ctotal_baseandrefundamount" id="ctotal_baseandrefundamount" style="width:155px;" class="text-right"></label>
            </td>
          </tr>

          <tr>  
            <td >
              <label for="ccurrent_coveredamount">Total Payment </br> Received:</label>
            </td>
            <td >
              <div id="ccurrent_coveredamount" style="width:155px;" class="text-right">'.($refundTotalCovered == '' ? '$0' : $refundTotalCovered) .' </div>
            </td>
          </tr>          

          <tr>
            <td>
              <label for="caddmore_amount">Amount to add:</label>
            </td>
            <td>
            <div id="caddmore_amount" style="width:155px;" class="text-right"></div>
            </td>
          </tr>
          <tr class="alert alert-success">
            <td>
              <label for="cnew_amountcovered">New Amount Covered:</label>
            </td>
            <td>
              <div style="width:155px;" class="text-right">
                <strong id="cnew_amountcovered" name="cnew_amountcovered"></strong>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label for="cremaining_balance">Remaining Balance:</label>
            </td>
            <td>
              <div style="width:155px;" class="text-right">
                <strong id="cremaining_balance" name="cremaining_balance"></strong>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label for="popup2_currency">All currency values are in:</label>
            </td>
            <td>
              <div style="width:155px;" class="text-right">
                <strong id="popup2_currency" name="popup2_currency"></strong>
              </div>
            </td>
          </tr>
            <tr>
              <td >
                <label for="caddmore_notes">Notes:</label>
                <br><span class="text-muted"><small>optional<em></em></small></span>
              </td>
              <td>        
                <div id="caddmore_notes" name="caddmore_notes" style="word-break: break-word;"></div>
              </td>
            </tr>         

      </table>

    </div>
    <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-default payment-save" id="pg-save" onclick="submitForm(\'save\',1)">
        <i class="glyphicon glyphicon-floppy-save"></i> Confirm
      </button>
    </div>
  </div></div>
</div>';

?>