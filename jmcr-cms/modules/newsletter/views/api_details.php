<?php

$arrAccounts = DB::fetchAll("SELECT `id`,
    `api_key`,
    `is_production_mode`
  FROM `mailchimp_account`");

if(!empty($arrAccounts)){

  $apiSettingsContent = '';

  foreach ($arrAccounts as $key => $acount) {
  
    $mcInd             = $acount['id'];
		$mcApiKey          = $acount['api_key'];
    $mcProductionMode  = $acount['is_production_mode'];

    if ($mcProductionMode === FLAG_YES) {

      $accountType = '<span class="label label-success label--tag">LIVE</span>';
    
    } else {
    
      $accountType = '<span class="label label-default label--tag">TEST</span>';
    
    }

    $itemHr = ( $key != 0 ) ? '<hr class="content-hr">' : '';

    /** Create fields for Accounts */
    $apiSettingsContent .= '
      <tr>
        <td colspan="2">
          '.$itemHr.'
          <h2 class="form-section-heading">Mailchimp API '.$accountType.'</h2>
        </td>
      </tr>
      <tr>
        <td width="160"><label for="account-api-key-'.$mcInd.'">API Key:</label></td>
        <td>
          <input type="text" id="account-api-key-'.$mcInd.'" name="account['.$mcInd.']" value="'.$mcApiKey.'"
           style="width:400px;">
        </td>
      </tr>';

    /** Create fields for Account Lists*/
    
    $arrAccountLists = DB::fetchAll("SELECT `id`,
        `label`,
        `option_key`,
        `option_value`
      FROM `mailchimp_lists`
      WHERE `mailchimp_account_id` = '{$mcInd}'
      AND `label` !=''
      AND `option_key` != ''");

    if (!empty($arrAccountLists)) {

      foreach ($arrAccountLists as $list) {
        
        $mcListInd    = $list['id']; 
        $mcListLabel  = $list['label'];
        $mcListKey    = $list['option_key'];
        $mcListValue  = $list['option_value'];

        $apiSettingsContent .= '
          <tr>
            <td><label for="list-'.$mcListInd.'">'.$mcListLabel.':</label></td>
            <td>
              <input type="text" id="list-'.$mcListInd.'" name="list['.$mcListInd.']" value="'.$mcListValue.'"
              style="width:150px;">
            </td>
          </tr>
        ';
      }

    }

      

  }

}
if (!empty($apiSettingsContent)) {

  $tabApiDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
    '.$apiSettingsContent.'
    </table>';

}


?>