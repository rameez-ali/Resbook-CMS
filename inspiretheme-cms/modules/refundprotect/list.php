<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType, $moduleMainHeading, $moduleSubHeading, $rpAccessToken, $rpApiUrl, $company, $rpApiUrl, $rpPaginationView;
  $rowrefundProtects      =  (empty($rowrefundProtects)) ? '' : $rowrefundProtects;
  $contractList = '';
  $sqlExtra = ($listType == FLAG_DELETED) ? "r.`status` = '".FLAG_DELETED."'" : "r.`status` != '".FLAG_DELETED."'";
  $now = Helper::getCurrentDateTimeStr();

  $pageUrl = 1;
  if(!empty($_GET['page'])) {
    $pageUrl = $_GET['page'];
  }
  $request_url = $rpApiUrl."/api/v1/contracts?company_name=".$company.'&page='.$pageUrl;
    $httpHeader = ['accept: application/json', 'Content-Type: application/json', 'Authorization: Bearer '.$rpAccessToken];               
        
		$c = curl_init();		
		curl_setopt($c, CURLOPT_URL, $request_url);
    curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);
    curl_setopt($c, CURLOPT_HEADER, 0);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		$json         = curl_exec($c);		
    $responseCode = curl_getinfo($c, CURLINFO_HTTP_CODE);
		curl_close($c);    
    $contractList = json_decode($json, true); 
    
    if ($responseCode == 200) {
        if(!empty($contractList)){
          if($contractList['total'] == 0) {
            $rowrefundProtects .= '<tr>
            <td colspan="4" align="center" class="no-data">No contract available.</td>
          </tr>';
          } else {
            $itemsCount = is_countable($contractList['data']) ? count($contractList['data']) : 0;
            for ($i=0; $i < (is_countable($contractList['data']) ? $itemsCount : 0); $i++) {
    
              $refundProtectId         = $contractList['data'][$i]['id'];
              $refundProtectLabel      = $contractList['data'][$i]['contract_title'];      
              $refundProtectAmount     = $contractList['data'][$i]['product_price'];
              $refundProtectCurrency   = $contractList['data'][$i]['currency_code'];
      
              if($contractList['data'][$i]['is_deleted'] == 0){
                $refundProtectStatus    = '<span class="label label-success">Active</span>';
              } else {
                $refundProtectStatus    = '<span class="label label-danger">Cancelled</span>';
              }      
              
              $refundProtectDate        = date("d-m-Y", strtotime((string) $contractList['data'][$i]['vendor_sales_date']));
              $insuranceEndDate         = date("d-m-Y", strtotime((string) $contractList['data'][$i]['insurance_end_date']));
              $now                      = date("d-m-Y", strtotime((string) $now));        
              $insuranceEndDateObj      = new DateTime($insuranceEndDate);
              $currentDateObj           = new DateTime($now);           
              
              if($insuranceEndDateObj < $currentDateObj) {        
                $refundProtectStatus = '<span class="label label-warning">Expired</span>';
              }
              
              $itemSelect = '<label class="custom-check">
                <input type="checkbox" name="item_select[]"
                class ="checkall" value="'.$refundProtectId.'"><span></span>
              </label>';      
              
              $itemRankElm = '';
      
              if ($listType != FLAG_DELETED) {
      
                $itemRankElm = '<input type="text" name="item_rank['.$refundProtectId.']" value="'.$refundProtectId.'" 
                title="Rank for '.$refundProtectLabel.'"
                class="input--rank">';
      
              }
  
              $config = [];
              $config['base_url']     = ADMIN_BASE_URL.'/?do='.$do;
              $config['total_rows']   = $contractList['total'];
              $config['per_page']     = 10;
              $config['cur_page']     = $contractList['current_page'];
              $config['query_string'] = 'page';
            
              $pagination = new Pagination($config);
              $rpPaginationView = $pagination->generate_links_rp();
  
              if($refundProtectCurrency == 'AUD' || $refundProtectCurrency == 'NZD' 
                || $refundProtectCurrency == 'CAD' || $refundProtectCurrency == 'USD'){
                  $refundProtectCurrencySymbol = '$';
              }else {
                $refundProtectCurrencySymbol = '';
              }
                 
              $rowrefundProtects .= '<tr>
              
              <td  width="250" height="30">            
                <a href="'.ADMIN_BASE_URL.'/?do='.$do
                    .'&action=edit&id='.$refundProtectId.'" 
                  title="Edit the '.$refundProtectLabel.' page">'.$refundProtectLabel.'</a>
              </td>
              <td width="150" style="text-align:right;">'.$refundProtectCurrencySymbol.''.number_format($refundProtectAmount, 2, '.', ',').'</td>
              <td width="80">'.$refundProtectCurrency.'</td>
              <td width="100">'.$refundProtectDate.'</td>
              <td width="100" align="center">'.$refundProtectStatus.'</td>
              </tr>';
            } 
          }                  
        }
    } elseif ($responseCode == 403 || $contractList != null) {
      if($contractList['error'] == "Unauthenticated."){
        $objrpOauth     = new RefundApiOauth();
        $rpAccessToken  = $objrpOauth->RefundProtectOauth();
        $now            = Helper::getCurrentDateTimeStr();
        $arrSettings    = [];
        $arrSettings['rptoken']           = $rpAccessToken;
        $arrSettings['rptoken_createdat'] = $now;
        updateRow($arrSettings, 'general_settings', "WHERE `id` = '1' LIMIT 1");
      }
    } else {
      $rowrefundProtects .= '<tr>
      <td colspan="4" align="center" class="no-data">No contract available.</td>
    </tr>';
    } 
  

  return $rowrefundProtects;
}
?>