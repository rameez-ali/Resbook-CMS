<?php

/** Save SEO data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading;;


  $modSettings = [];

  $modSettings['js_code_head_close']    = requestVar('js_code_head_close');
  $modSettings['js_code_body_open']     = requestVar('js_code_body_open');
  $modSettings['js_code_body_close']    = requestVar('js_code_body_close');
  $modSettings['gtm_code_head_close']   = requestVar('gtm_code_head_close');
  $modSettings['gtm_code_body_open']    = requestVar('gtm_code_body_open');
  $modSettings['adwords_code']          = requestVar('adwords_code');
  $modSettings['structure_data_markup'] = requestVar('structure_data_markup');

  /** Update existing item data */

  foreach ( $modSettings AS $fieldKey => $fieldValue) {

    $fieldValue = DB::prepareForQuery($fieldValue);

    $sql = "UPDATE `seo_settings` 
      SET `option_value` = {$fieldValue}
      WHERE `option_name` = '".$fieldKey."' 
      LIMIT 1";
    
    DB::runQuery($sql);
  }
  
  $message = $moduleMainHeading." have been saved";
  
}

?>