<?php

/** Edit refund protect data */
function cancelItem() 
{

  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action, $rpApiUrl, $company, $rpAccessToken ;

  $disableMenu = FLAG_YES; 

  if(!empty($id)) {

    //call api to cancel contract
    
    $request_url = $rpApiUrl.'/api/v1/contracts/'.$id;
    $httpHeader = ['Content-Type: application/json', 'Authorization: Bearer '.$rpAccessToken];                

    $c = curl_init();		
    curl_setopt($c, CURLOPT_URL, $request_url);
    curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);
    curl_setopt($c, CURLOPT_HEADER, 0);
    curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'DELETE');  
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($c);
    $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);				
    curl_close($c);

    $contractDeleteMessage = json_decode($json,true, 512, JSON_THROW_ON_ERROR); 
    
    if ($responseCode == 200 || $responseCode == 203) {
        $checkString = "The cooling off period of 14 days has passed";
        if(str_contains((string) $contractDeleteMessage, $checkString))
        {
          $message = "This contract has passed the 14 day cooldown period. You can still cancel this contract by emailing accounts@tomahawk.co.nz";
        } else {
            $message = "Contract deleted successfuly.";
        }
    } elseif ($responseCode == 401) {
        $objrpOauth     = new RefundApiOauth();
        $rpAccessToken  = $objrpOauth->RefundProtectOauth();
        $now            = Helper::getCurrentDateTimeStr();
        $arrSettings    = [];
        $arrSettings['rptoken']           = $rpAccessToken;
        $arrSettings['rptoken_createdat'] = $now;
        updateRow($arrSettings, 'general_settings', "WHERE `id` = '1' LIMIT 1");
        $message = "There has been an error cancelling this contract. The contract has NOT been cancelled. Email your Tomahawk account manager to resolve this issue.";
    } else {      
      $message = "There has been an error cancelling this contract. The contract has NOT been cancelled. Email your Tomahawk account manager to resolve this issue.";
    }

  }
}

?>
