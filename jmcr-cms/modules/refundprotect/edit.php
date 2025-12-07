<?php

/** Edit refund protect data */
function editItem() 
{
  $contractList = [];
  $refundContractName = null;
  $refundStatus = null;
  $refundTotalCovered = null;
  $moduleContent = null;
  $resultPageContent = null;
  /** Remove warning message PHP 8.0 */
  error_reporting(E_ERROR | E_PARSE);
  global $message, $id, $do, $disableMenu, $moduleSubHeading, $moduleMainHeading, $action, $rpApiUrl, $company, $rpAccessToken;
  $extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
  $createButtonView   = (empty($createButtonView)) ? '' : $createButtonView;
  $disableMenu = FLAG_YES; 

  
  if(!empty($id)) {   

    $extraScripts .= "<script>
      $('.all_mandatory').hide();
      </script>";

    //fetch data for specific contract
    $request_url  = $rpApiUrl.'/api/v1/contracts/'.$id;
    $httpHeader   = ['Authorization: Bearer '.$rpAccessToken];                
    
    $c = curl_init();		
    curl_setopt($c, CURLOPT_URL, $request_url);
    curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);
    curl_setopt($c, CURLOPT_HEADER, 0);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $json         = curl_exec($c);
    $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);		
    curl_close($c);

    $contractData = json_decode($json,true, 512, JSON_THROW_ON_ERROR);

    if($responseCode == 200) {
      if(!empty($contractData)) {

        $refundContractName     = $contractData['contract_title'];          
        $refundBookingId        = $contractData['vendor_sales_reference_id'];
        $refundProductBasePrice = $contractData['product_price'];
        $refundProductBasePrice = number_format($refundProductBasePrice, 2);
        $inputType              = 'text';
        $refundTotalCovered     = ($contractData['covered_amount'] == null) ? 0 : $contractData['covered_amount'];
        $refundTotalCovered     = number_format($refundTotalCovered, 2);
        $refundCustFirstName    = $contractData['customer_first_name'];
        $refundCustLastName     = $contractData['customer_last_name'];;
        $refundInsuranceEndDate = date("d-m-Y", strtotime((string) $contractData['insurance_end_date']));
        $currencyCode           = $contractData['currency_code'];
        $currencyId             = $contractData['contract_currency'];
        if($currencyCode == 'AUD' || $currencyCode == 'NZD' || $currencyCode == 'CAD' || $currencyCode == 'USD'){
          $currencySymbolOnPayment = '$';
        }else {
          $currencySymbolOnPayment = '';
        }
        $refundStatus = $contractData['is_deleted'] == 0 ? 'Active' : 'Cancelled';
        if($contractData['product_code'] == 'HTL') {        
          $refundIsHotel = FLAG_YES;
        } elseif($contractData['product_code'] == 'TKT') {
        $refundIsTicket  = FLAG_YES;
        } elseif($contractData['product_code'] == 'PKG') {
        $refundIsPackage  = FLAG_YES;
        }
  
        $request_url            = $rpApiUrl.'/api/v1/contracts/payments/'.$id;
        $httpHeader = ['Authorization: Bearer '.$rpAccessToken];                
            
        $c = curl_init();		
        curl_setopt($c, CURLOPT_URL, $request_url);
        curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);
        curl_setopt($c, CURLOPT_HEADER, 0);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($c);
        $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);			
        curl_close($c);
  
        $contractPaymentData = json_decode($json,true, 512, JSON_THROW_ON_ERROR);
  
        if($responseCode == 200) {
          if(!empty($contractPaymentData)) {        
            $paymentHistory = '';
            foreach($contractPaymentData as $item) {          
              $paymentHistory .='<tr height="30">
              <td width="20" style="text-align: right;">'.$currencySymbolOnPayment.''.number_format($item['amount'], 2, '.', ',').'</td>    
              <td width="100">'.$item['currency_code'].'</td>
              <td width="300">'.$item['notes'].'</td>
              <td width="100" align="center">'.date("d-m-Y h:i:sa", strtotime((string) $item['updated_at'])).'</td>
            </tr>';
            }                            
          }
        } elseif($contractPaymentData['error'] == "Unauthenticated." && $responseCode == 403) {        
  
            $objrpOauth     = new RefundApiOauth();
            $rpAccessToken  = $objrpOauth->RefundProtectOauth();
            $now            = Helper::getCurrentDateTimeStr();
            $arrSettings    = [];
            $arrSettings['rptoken']           = $rpAccessToken;            
            $arrSettings['rptoken_createdat'] = $now;                    
            updateRow($arrSettings, 'general_settings', "WHERE `id` = '1' LIMIT 1");
            
        } elseif($responseCode == 204 || $responseCode == 404 || $responseCode == 500) {
          $message = 'No payment found.';
        }
                
      }
    } elseif($contractList['error'] == "Unauthenticated." || $responseCode == 403) {
      
        $objrpOauth     = new RefundApiOauth();
        $rpAccessToken  = $objrpOauth->RefundProtectOauth();
        $now            = Helper::getCurrentDateTimeStr();
        $arrSettings    = [];
        $arrSettings['rptoken']           = $rpAccessToken;            
        $arrSettings['rptoken_createdat'] = $now;                    
        updateRow($arrSettings, 'general_settings', "WHERE `id` = '1' LIMIT 1");
              
    } elseif($responseCode == 204 || $responseCode == 404 || $responseCode == 500) {
        $message = 'No content found.';
    }
    
    
  } else {
    $createButtonView = '<li>      
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-default" id="createContract">
        Preview & Submit
      </button>
    </li>';
    $inputType = 'number';
  }
  

  $moduleSubHeading = 'Editing Refundable bookings: '.$refundContractName;

  if(($refundStatus == 'Active' & $refundTotalCovered > 0.00) !== 0 ) {
    $cancelButtonView = '<li class="pull-right">
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#cancelContractModalPopup" >
        <i class="glyphicon glyphicon-trash"></i> Cancel Contract
      </button>
    </li>';
  } else {
    $cancelButtonView = '';
  }

  /** Module actions */
  $moduleActions = '<ul class="page-action">
    '.$createButtonView.'    
    <li>
      <a class="btn btn-default" href="'.ADMIN_BASE_URL.'/?do='.$do.'">
        <i class="glyphicon glyphicon-arrow-left"></i> Back
      </a>
    </li>
    '.$cancelButtonView.'    
  </ul>';
  

  /** Show message */
  if (!empty($message)) {

    $moduleContent .= '<div class="alert alert-warning page">
        <i class="glyphicon glyphicon-info-sign"></i>
        <strong>'.$message.'</strong>
      </div>';

  }

  $modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;


  /** Content tab content */
  require_once MOD_VIEWS_DIR.DS.'content.php';

  /** Generate tab array */

  $arrMenuTabs = [];

  $arrMenuTabs['Details']  = $tabDetailsContent;
  if(!empty($id)) { 
    require_once MOD_VIEWS_DIR.DS.'payment.php';
    $arrMenuTabs['Payment']  = $tabPaymentContent;
    }
  

  $tabIndex   = 0;
  $tabList    = "";
  $tabContent = "";

  foreach ($arrMenuTabs as $tabKey => $tabValue) {

    $tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
    $tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
    $tabIndex++;

  }

  $moduleContent = '<form action="'.ADMIN_BASE_URL.'/index.php" method="post" 
     name="pageList" enctype="multipart/form-data">
      <div id="tabs">
        <ul>'.$tabList.'</ul>
        <div style="padding:10px;">'.$tabContent.'</div>
      </div>
      <input type="hidden" name="action" value="" id="action">
      <input type="hidden" name="do" value="'.$do.'">
      <input type="hidden" name="id" value="'.$id.'">
  </form>';
  $extraScripts .= '<script src="'.$modBaseDirPath.'/assets/js/refundprotect.js?v=1"></script>';
  
  require "resultPage.php";
  echo $resultPageContent;
  exit();
  
}

?>
