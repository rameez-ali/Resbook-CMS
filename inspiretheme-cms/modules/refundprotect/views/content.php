<?php

if(!empty($id)) {
  $readonly = 'disabled';
  if ($refundIsTicket == FLAG_YES) {
      $packageReadonly = 'disabled';
      $ishotelReadonly = 'disabled';
  } elseif ($refundIsPackage == FLAG_YES) {
      $ticketReadonly = 'disabled';
      $ishotelReadonly = 'disabled';
  } elseif ($refundIsHotel == FLAG_YES) {
      $packageReadonly = 'disabled';
      $ticketReadonly = 'disabled';
  }

  $selectCurrencyView = '<select style="width:100px;" name="contract_currency1" class="textbox" id="contract_currency1" readonly>
  <option value="'.$currencyId.'" readonly>'.$currencyCode.'</option></select>';

}else {
    $request_url  = $rpApiUrl.'/api/v1/contracts/currencies';
    $httpHeader   = ['Authorization: Bearer '.$rpAccessToken];                
    
    $c = curl_init();		
    curl_setopt($c, CURLOPT_URL, $request_url);
    curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);
    curl_setopt($c, CURLOPT_HEADER, 0);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $json         = curl_exec($c);
    $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);		
    curl_close($c);

    $currencyData = json_decode($json,true, 512, JSON_THROW_ON_ERROR);
    if ($responseCode == 200 && !empty($currencyData)) {
        $selectCurrencyView = '<select style="width:92px;height:24px;" name="contract_currency" class="textbox" id="contract_currency" >
        <optgroup label="Pinned">';
        foreach($currencyData as $data){

          if($data['currency_order'] > 0){

            $selectCurrencyView .= '<option value="'.$data['id'].'">'.$data['currency_code'].'</option>';            
          }
        }
        $selectCurrencyView .= '</optgroup>';
        $selectCurrencyView .= '<optgroup label="-----------">';
        foreach($currencyData as $data){

          if($data['currency_order'] == 0){

            $selectCurrencyView .= '<option value="'.$data['id'].'">'.$data['currency_code'].'</option>';            
          }
        }
        $selectCurrencyView .= '</optgroup>';
        $selectCurrencyView .= '</select>';
    }
}

  if($refundTotalCovered == '') {
    $refundTotalCovered = '0';
  }elseif($currencyCode == 'AUD' || $currencyCode == 'NZD' || $currencyCode == 'CAD' || $currencyCode == 'USD') {
    $refundTotalCovered = '$'.$refundTotalCovered;
  }else {
  }
$tabDetailsContent = '<table id="rf-protect-form" width="100%" border="0" cellspacing="0" cellpadding="8" disabled="disabled">
    <tr>
      <td colspan="3" class="text-danger all_mandatory">All fields are mandatory.</td>
    </tr>
    <tr>
      <td width="130">
        <label for="contract_title">Contract Title:</label>
      </td>
      <td>
        <input type="text" name="contract_title" id="contract_title" value="'.$refundContractName.'" style="width:250px;" '.$readonly.'/>        
        <br><span class="text-muted"><small>The name of this contract – this is for your reference and is not shown to your customer or affect the contract.<em></em></small></span>
      </td>
    </tr>

    <tr>
      <td width="130">
        <label for="vendor_sales_reference_id">Unique Booking ID:</label>
      </td>
      <td>
        <input type="text" maxlength="20" name="vendor_sales_reference_id" id="vendor_sales_reference_id" value="'.$refundBookingId.'" style="width:250px;" '.$readonly.' onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));" />
        <br><span class="text-muted"><small>The unique code or booking reference for this purchase. No special characters are allowed and the maximum length is 20 characters.</small></span>
      </td>
    </tr>

    <tr>
      <td>
        <label for="product_price">Total Price of Booking:</label>
      </td>
      <td>
        <input type="'.$inputType.'" name="product_price" class="text-right"
         id="product_price" value="'.$refundProductBasePrice.'" style="width:155px;" '.$readonly.'/>
         '.$selectCurrencyView.'
         <br><span class="text-muted"><small>How much are you covering with refund protection? This includes any additional booking or handling fees (but excludes the refund protection fee which is calculated automatically).<em></em></small></span>
      </td>
    </tr>

    <tr>
      <td>
        <label for="total_covered">Total Payment Received:</label>
      </td>
      <td>
        <label name="total_covered" id="total_covered" class="text-right" style="width:155px;"> '.$refundTotalCovered.' </label>
        <strong>'.$currencyCode.'</strong>
      </td>
    </tr>

    <tr>
      <td>
        <label for="customer_first_name">Customer First Name:</label>
      </td>
      <td>
        <input type="text" name="customer_first_name" id="customer_first_name" value="'.$refundCustFirstName.'" style="width:250px;" '.$readonly.'/>
      </td>
    </tr>

    <tr>
      <td>
        <label for="customer_last_name">Customer Last Name:</label>
      </td>
      <td>
        <input type="text" name="customer_last_name" id="customer_last_name" value="'.$refundCustLastName.'" style="width:250px;" '.$readonly.'/>
      </td>
    </tr>

    <tr>
      <td>
        <label for="insurance_end_date">Booking Commencement Date:</label>
      </td>
      <td>
        <input type="text" name="insurance_end_date" id="insurance_end_date" value="'.$refundInsuranceEndDate.'" style="width:250px;cursor:text;" '.$readonly.'/>
        <br><span class="text-muted"><small>This is the date when this Refund Protect contract will expire.<em></em></small></span>        
      </td>
    </tr>
    
    <tr>   
      <td>
        <label for="product_code">Product Type:</label>
      </td>   
      <td>
        <div class="row">
          <div class="col-md-6 col-lg-4">
          
            <div class="custom-control custom-radio">
              <input name="product_code" type="radio" id="is_ticket" value="TKT" class="custom-control-input"
            '.(($refundIsTicket === FLAG_YES) ? ' checked="checked"' : '').'  '.$ticketReadonly.'/>        
              <label class="custom-control-label" for="is_ticket">Ticket
              </label>
            </div>
            <span class="text-muted"><small>This is any type of individual ticket or booking for an event, transportation, tour, activity, or any other non-refundable ticket for admission.<em></em></small></span>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="custom-control custom-radio">
              <input name="product_code" type="radio" id="is_package" value="PKG" class="custom-control-input"
              '.(($refundIsPackage === FLAG_YES) ? ' checked="checked"' : '').' '.$packageReadonly.'/>
              <label class="custom-control-label" for="is_package">Package
              </label>
            </div>
            <span class="text-muted"><small>This is a package that includes a combination of ticket/tour/transportation AND accommodation, travel etc.<em></em></small></span>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="custom-control custom-radio">
              <input name="product_code" type="radio" id="is_hotel" value="HTL" class="custom-control-input"
              '.(($refundIsHotel === FLAG_YES) ? ' checked="checked"' : '').' '.$ishotelReadonly.'/>
              <label class="custom-control-label" for="is_hotel">Hotel
                </label>
            </div>
            <span class="text-muted"><small>This is any type of accommodation booking which is non-refundable or non-cancellable.<em></em></small></span>
          </div> 
        </div>
      </td>
    </tr>    
</table>

  <!-- Modal -->
  <div class="modal fade" id="createContractModalPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document"><div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative;z-index:9;">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Are these contract details correct?</h4>
      </div>
      <div class="modal-body">
        <table>
          <tr>
            <td>
              The booking amount being covered is:
            </td>
            <td class="text-right" width="150">
            '.$currSymbol.'<span id="CCProductPrice"></span>
            </td>            
          </tr>

          <tr>
            <td>  
              The Refund Protect Fee to cover this booking is:
            </td>
            <td class="text-right">
            '.$currSymbol.'<span id="CCRPAmount"></span>
            </td>
          </tr>

          <tr>
            <td>  
              The total due from the customer:
            </td>
            <td class="text-right">
            '.$currSymbol.'<span id="CCTotalAmount"></span>
            </td>
          </tr> 
         
            <tr>
            <td>  
              The selected currency for this contract is:
            </td>
            <td class="text-right">
              <span id="oncreate_currency"></span>
            </td>
          </tr>

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Go Back</button>
          <button type="button" class="btn btn-default" id="pg-save" onclick="submitForm(\'save\',1)">
            <i class="glyphicon glyphicon-floppy-save"></i> Create Contract
          </button>
      </div>
    </div></div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="cancelContractModalPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document"><div class="modal-content">
    
  <div class="modal-body text-center">
  <h4 class="modal-title">Are you sure, you wish to cancel this contract?<br>You cannot undo this action.</h4><br><br>
  <button type="button" class="btn btn-default" data-dismiss="modal">No, go back</button>
  <button type="button" class="btn btn-default" onclick="submitForm(\'delete\')" data-dismiss="modal">
              <i class="glyphicon glyphicon-trash"></i> Yes, cancel
            </button>
  </div>
  </div></div></div>';


  $extraScripts .= "<script>
    $('#insurance_end_date').attr({autocomplete:'off', readonly:true}).datepicker({
        dateFormat:'dd-mm-yy',
        minDate: new Date()
        
    });
  </script>";

?>