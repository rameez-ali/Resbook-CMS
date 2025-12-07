<?php

$arrAccounts = DB::fetchAll("SELECT `id`,
    `username`,
    `client_id`,
    `client_secret`,
    `access_token`,
    `url`,
    `is_production_mode`
  FROM `instagram_accounts`");

if (!empty($arrAccounts)) {

  $apiSettingsContent = '';

  foreach ($arrAccounts as $key => $igAcount) {
  
    $igInd            = $igAcount['id'];
		$igLabel            = "Instagram Account";
		$igUsername         = $igAcount['username'];
		$igClientId         = $igAcount['client_id'];
		$igClientSecret     = $igAcount['client_secret'];
		$igAccessToken      = $igAcount['access_token'];
		$igUrl              = $igAcount['url'];
    $igProductionMode   = $igAcount['is_production_mode'];

    if ($igProductionMode === FLAG_YES) {

      $accountType = '<span class="label label-success label--tag">LIVE</span>';
    
    } else {
    
      $accountType = '<span class="label label-default label--tag">TEST</span>';
    
    }

    $igItemHr = ( $key != 0 ) ? '<hr class="content-hr">' : '';

    $apiSettingsContent .= '
      <tr>
          <td colspan="2">
            '.$igItemHr.'
            <h2 class="form-section-heading">Instagram API '.$accountType.'</h2>
        </td>
      </tr>
      <tr>
        <td width="160"><label for="account-'.$igInd.'-username">Username:</label></td>
        <td>
          <input type="text" style="width:400px;" id="account-'.$igInd.'-username" 
           name="account['.$igInd.'][username]" value="'.$igUsername.'">
        </td>
      </tr>
      <tr>
        <td><label for="account-'.$igInd.'-clientid">Instagram App Id:</label></td>
        <td>
          <input type="text" style="width:400px;" id="account-'.$igInd.'-clientid"
           name="account['.$igInd.'][clientid]" value="'.$igClientId.'">
        </td>
      </tr>
      <tr>
        <td><label for="account-'.$igInd.'-secret">Instagram App Secret:</label></td>
        <td>
          <input type="text" style="width:400px;" id="account-'.$igInd.'-secret"
           name="account['.$igInd.'][clientsecret]" value="'.$igClientSecret.'">
        </td>
      </tr>
      <tr>
        <td><label for="account-'.$igInd.'-accesstoken">Access Token:</label></td>
        <td>
          <input type="text" style="width:400px;" id="account-'.$igInd.'-accesstoken" 
           name="account['.$igInd.'][accesstoken]" value="'.$igAccessToken.'">
        </td>
      </tr>
      <tr>
        <td><label for="account-'.$igInd.'-url">URL:</label></td>
        <td>
          <input type="text" style="width:400px;" id="account-'.$igInd.'-url" 
           name="account['.$igInd.'][url]" value="'.$igUrl.'">
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