<?php

/** Save Refund Protect data */

function saveItem (){

	global $id, $message, $do, $rpApiUrl, $company, $rpAccessToken;

  $now = Helper::getCurrentDateTimeStr();

  if (!empty($id)) {
    
      $request_url = $rpApiUrl.'/api/v1/contracts/'.$id;
      $httpHeader = ['Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$rpAccessToken];
      $postdata = ['product_price'=> validateInput('addmore_amount'), 'notes'=> validateInput('addmore_notes')];
      
      $c = curl_init();		
      curl_setopt($c, CURLOPT_URL, $request_url);
      curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($c, CURLOPT_CUSTOMREQUEST, "PUT");    
      curl_setopt($c, CURLOPT_POSTFIELDS,  http_build_query($postdata));
      curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);        	
      $json = curl_exec($c);
      $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);		
      curl_close($c);
      $updateMessage = json_decode($json,true, 512, JSON_THROW_ON_ERROR);    
      if ($responseCode == 200 || $responseCode == 203) {
          $message = "Contract has been updated.";
      } elseif ($responseCode == 401) {
          $objrpOauth     = new RefundApiOauth();
          $rpAccessToken  = $objrpOauth->RefundProtectOauth();
          $now            = Helper::getCurrentDateTimeStr();
          $arrSettings    = [];
          $arrSettings['rptoken']           = $rpAccessToken;
          $arrSettings['rptoken_createdat'] = $now;
          updateRow($arrSettings, 'general_settings', "WHERE `id` = '1' LIMIT 1");
          $message = "There has been an error logging this payment. The payment has NOT been logged. Can you please try again.";
      } else {
        $message = "There has been an error logging this payment. The payment has NOT been logged.";
      }

  } else {

        $coveredAmount = empty(validateInput('addmore_amount')) ? 0 : validateInput('addmore_amount');

        if(!empty($company)) {
          $substrCompany    = substr(strtolower((string) $company),0,3);
          $datetime         = date("dmyhis");
          $vendorSalesRfID  = $substrCompany.$datetime.'-'.validateInput('vendor_sales_reference_id');      
        } 

        //call create contract api   
        $request_url = $rpApiUrl.'/api/v1/contracts';
        $httpHeader = ['Content-Type: application/json', 'Authorization: Bearer '.$rpAccessToken];
        $postdata = ['vendor_sales_reference_id' => $vendorSalesRfID, 'contract_title'            => validateInput('contract_title'), 'company_name'              => $company, 'vendor_sales_date'         => date("d-m-Y", strtotime((string) $now)), 'customer_first_name'       => validateInput('customer_first_name'), 'customer_last_name'        => validateInput('customer_last_name'), 'product_code'              => validateInput('product_code'), 'product_price'             => validateInput('product_price'), 'covered_amount'            => $coveredAmount, 'insurance_end_date'        => validateInput('insurance_end_date'), 'contract_currency'         => validateInput('contract_currency', FILTER_VALIDATE_INT)];
      
        $c = curl_init();		
        curl_setopt($c, CURLOPT_URL, $request_url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($postdata, JSON_THROW_ON_ERROR));
        curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);        	
        $json = curl_exec($c);
        $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);			
        curl_close($c);
        $details = json_decode($json);

        if($responseCode == 200)
        {
          $message = "Contract has been created";
        } else {
          $message = "There has been an error creating this contract. This contract has NOT been created.";
        }        
    
   }
  
  
  
}

?>