<?php 

/**
 * NETZONE CMS Class for Module Settings.
 *
 * @package    NetZone Base CMS 3.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 1.0
 */

class ModuleSettings
{
  /**
	 * to get list settings for Module
	 *
	 * @param string $itemKey, Description - name of the module
	 *
	 * @return string
	*/
	public static function fetchSettings($moduleKey)
	{		
		$output		= [];

		if(!empty($moduleKey)) {

      $sql = "SELECT `id`,
          `option_name` AS opKey,
          `option_value` AS opValue
        FROM `module_settings`
        WHERE `module_key` = '".$moduleKey."'
          AND `language_id` = '".LANGUAGE_ID."'";
      
      $output = DB::fetchPairs($sql);
    }

		return $output;

	}


  /**
  * to get list settings for Module
  *
  * @param string $moduleKey, Description - name of the module
  * @param mixed $options, Description - module setting data 
  *
  */
 public static function saveSettings(mixed $options, $moduleKey): bool
	{		
    $insQuery = '';

		if(!empty($options) && !empty($moduleKey)) {
      
      foreach ( $options AS $fieldKey => $fieldValue) {

        $fieldValue = DB::prepareForQuery($fieldValue);

        /** Check if settings record is available */
        $sql = "SELECT `id`
          FROM `module_settings`
          WHERE `option_name` = '".$fieldKey."'
            AND `module_key` = '".$moduleKey."'
            AND `language_id` = '".LANGUAGE_ID."'
          LIMIT 1";

        $settingId = DB::fetchValue($sql);

        if (!empty( $settingId )) {
         
          /** Update Settings */

          $sql    = "UPDATE `module_settings` 
            SET `option_value` = {$fieldValue}
            WHERE `id` = '".$settingId."' 
            LIMIT 1";
        
          DB::runQuery($sql);
        
        } else {

          $insQuery .= ", ('".$fieldKey."', ".$fieldValue.", '".$moduleKey."', '".LANGUAGE_ID."')";

        }

        
      }

      /** Insert Settings */

      if (!empty($insQuery)) {

        $insQuery = ltrim($insQuery, ',');

        $sql ="INSERT INTO `module_settings` (`option_name`,`option_value`,`module_key`,`language_id`)
          VALUES {$insQuery}";

        DB::runQuery($sql);

      }

    }

		return true;

	}

}