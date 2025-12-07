<?php

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen((string) $input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[random_int(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
 
$randStr = generate_string($permitted_chars, 10);

global $voucherTransactionId;

      
        //$voucherDetails['amount'] = requestVar("vci-price-$i");     
      //$voucherDetails['vc-name'] = requestVar("vci-title-{[$i]}");
    //   if(empty($voucherDetails['voucher_name'] )){
    //     break;
    //   }
      

     // DB::insertRow($columnData, 'content_column');
     
    
    



$voucherData = [];
$newVoucherIdString = '';

for ($i=0; $i < 1000; $i++) { 
        
    $voucherData['voucher_name']    = requestVar("vci-title-$i");
    $voucherData['voucher_price']   = requestVar("vci-price-$i");
    $voucherData['quantity']        = 1;//requestVar("vci-qty-$i");  
    
    $voucherData['purchaser_first_name']    	= $firstName;
    $voucherData['purchaser_last_name']     	= $lastName;
    $voucherData['purchaser_email']     		= $emailAddress;
    $voucherData['purchaser_phone']    			= $phoneNumber;
    $voucherData['amount']    					= $amount;
    //$voucherData['voucher_name']    			= $voucherTitle;

    $voucherData['recipient_name']    			= $name;
    $voucherData['recipient_name_on_voucher']   = $voucherName;
    $voucherData['message']    					= $message;

    $voucherData['delivery_option']    			= $deliverType;
    $voucherData['delivery_email']    			= $deliveryEmail;
    $voucherData['delivery_post']    			= $deliveryAddress;

    $voucherData['delivery_string']    			= $randStr;

    if(empty($voucherData['voucher_name'] )){
        break;
    }

    //get voucher valid for
    $sqlValidfor = "SELECT valid_for FROM page_meta_data where menu_label = '".$voucherData['voucher_name']."'";
    $arrValidfor = DB::fetchRow($sqlValidfor);
    //get purchase date 
    $voucherData['purchase_date']    = date("Y-m-d h:i:s");
    
    $validMonths = $arrValidfor['valid_for'];
    
    if(empty($validMonths)){        
        $vDetails = DB::fetchRow("SELECT valid_for FROM `voucher_settings`");   
        if (!empty($vDetails)) {
            $validMonths          = $vDetails['valid_for'];
        }
    }

    //get expiry date
    $voucherData['expiry_date'] 		= date('Y-m-d h:i:s', strtotime("+".$validMonths."months", strtotime($voucherData['purchase_date'])));
    

    $newVoucherId = DB::insertRow($voucherData, 'voucher_purchased');
    $newVoucherIdString .= $newVoucherId . ',';
    
}

$voucherPurchaseData = [];
if (!empty($newVoucherIdString)) {
    
    $voucherPData['data3'] = $newVoucherIdString;    
    $voucherTransactionId = DB::insertRow($voucherPData, 'voucher_transaction');
    
    $voucherPurchaseData['voucher_transaction_id'] = $voucherTransactionId;
    DB::updateRow($voucherPurchaseData, 'voucher_purchased', "WHERE delivery_string = '$randStr'");
        
	$process_payment = TRUE;
} else {
	$process_payment = FALSE;
}


?>