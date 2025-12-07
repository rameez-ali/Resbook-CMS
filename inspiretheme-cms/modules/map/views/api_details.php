<?php

$arrAccounts = DB::fetchAll("SELECT `id`,
    `api_key`,
    `is_production_mode`
  FROM `googlemap_account`");

if(!empty($arrAccounts)){

  $apiSettingsContent = '';

  foreach ($arrAccounts as $key => $gmAcount) {
  
    $gmInd            = $gmAcount['id'];
		$gmApiKey         = $gmAcount['api_key'];
    $gmProductionMode = $gmAcount['is_production_mode'];

    if ($gmProductionMode === FLAG_YES) {

      $accountType = '<span class="label label-success label--tag">LIVE</span>';
    
    } else {
    
      $accountType = '<span class="label label-default label--tag">TEST</span>';
    
    }

    $igItemHr = ( $key != 0 ) ? '<hr class="content-hr">' : '';

    $apiSettingsContent .= '
      <tr>
          <td colspan="2">
            '.$igItemHr.'
            <h2 class="form-section-heading">Google Map API '.$accountType.'</h2>
        </td>
      </tr>
      <tr>
        <td width="116"><label for="account-'.$gmInd.'-apikey">API Key:</label></td>
        <td>
          <input type="text" style="width:400px;" 
           id="account-'.$gmInd.'-apikey" name="account['.$gmInd.'][apikey]" value="'.$gmApiKey.'">
        </td>
      </tr>';

  }

}
if (!empty($apiSettingsContent)) {

  $tabApiDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    '.$apiSettingsContent.'
    </table>';

}


?>