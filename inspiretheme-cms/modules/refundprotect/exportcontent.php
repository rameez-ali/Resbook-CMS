<?php

/** Export refund protect data */
function downloadContract() 
{

  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action, $rpApiUrl, $company, $rpAccessToken ;

  $disableMenu = FLAG_YES; 
  
  $fromDate = date("Y-m-d", strtotime((string) validateInput('from_date')));
  $toDate = date("Y-m-d", strtotime((string) validateInput('to_date')));  

 if($fromDate == "1970-01-01" || $toDate == "1970-01-01") {
   echo '<script>alert("Please select date")</script>';
   require_once __DIR__ . '/export.php';                       
   export();
 } else {
   //api call
   $request_url = $rpApiUrl.'/api/v1/contracts/export?start_date='.$fromDate.'&end_date='.$toDate.'&company_name='.$company.'';
   $httpHeader = ['Authorization: Bearer '.$rpAccessToken];             

   $c = curl_init();		
   curl_setopt($c, CURLOPT_URL, $request_url);
   curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);
   curl_setopt($c, CURLOPT_HEADER, 0);    
   curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
   $json = curl_exec($c);
   $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);		
   curl_close($c);

   if($responseCode == 200) {
     $fileName = "RefundProtect_" . date('Y-m-d') . ".csv"; 
     // Headers for download 
     header("Content-Type: application/vnd.ms-excel"); 
     header("Content-Disposition: attachment; filename=\"$fileName\""); 
  
     // Render excel data 
     echo $json;       
     $exportmessage = '';
     // if(!empty($json)) {
     //   header("Location:".ADMIN_BASE_URL.'/?do='.$do);
     // }
     exit;
   } else {        
     echo '<script>alert("No contract was found.")</script>';        
     require_once __DIR__ . '/export.php';                       
     export();
   }
   
   
 }
  
}

?>
