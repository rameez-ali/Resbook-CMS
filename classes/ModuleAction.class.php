<?php

/**
 * NETZONE CMS Class perform common module actions.
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */
class ModuleAction
{

  /**
 	* @var string -  detault page meta data table name.
 	*/
  static $defaultTable 		= 'page_meta_data';

 
  /**
	 * Hide Items
	 *
	 * @param mixed   $itemIds, Description - item ids
	 * @param string  $targetTable, Description - name of the table
	 *
	 * @return string
	*/

	public static function hide(mixed $itemIds, $targetTable = NULL )
	{
    global $moduleMainHeading, $moduleSubHeading;

    $moduleLabel = strtolower((string) $moduleMainHeading);

    /** Define target table name here */
    $targetTable = (empty($targetTable)) ? self::$defaultTable : $targetTable;  

    /** Execute module action and return response message */
    if (!empty($itemIds)) {

      $sqlModuleAction = "UPDATE `".$targetTable."` 
        SET `status` = '".FLAG_HIDDEN."' 
        WHERE `id` IN(".implode(',', $itemIds).")";

        DB::runQuery($sqlModuleAction);

      $actionMsg = "Selected {$moduleLabel} have been hidden.";
    
    } else {
    
      $actionMsg = "Please select {$moduleLabel} from the list.";
    
    }

    return $actionMsg;

  }
  

  /**
	 * Publish Items
	 *
	 * @param mixed   $itemIds, Description - item ids
	 * @param string  $targetTable, Description - name of the table
	 *
	 * @return string
	*/

  public static function publish(mixed $itemIds, $targetTable = NULL )
	{
    global $moduleMainHeading, $moduleSubHeading;

    $moduleLabel = strtolower((string) $moduleMainHeading);
    
    /** Define target table name here */
    $targetTable = (empty($targetTable)) ? self::$defaultTable : $targetTable;  

    /** Execute module action and return response message */
    if (!empty($itemIds)) {

      $sqlModuleAction = "UPDATE `".$targetTable."` 
        SET `status` = '".FLAG_ACTIVE."' 
        WHERE `id` IN(".implode(',', $itemIds).")";

      DB::runQuery($sqlModuleAction);

      $actionMsg = "Selected {$moduleLabel} have been published.";
    
    } else {
    
      $actionMsg = "Please select {$moduleLabel} from the list.";
    
    }

    return $actionMsg;

  }
  
  /**
	 * Delete Items
	 *
	 * @param mixed   $itemIds, Description - item ids
	 * @param string  $targetTable, Description - name of the table
	 *
	 * @return string
	*/

  public static function delete(mixed $itemIds, $targetTable = NULL )
	{
    global $moduleMainHeading, $moduleSubHeading;

    $moduleLabel = strtolower((string) $moduleMainHeading);
    
    $sqlExtra = (empty($targetTable)) ? ", `date_deleted` = '".Helper::getCurrentDateTimeStr()."'" : '';

    /** Define target table name here */

    $targetTable = (empty($targetTable)) ? self::$defaultTable : $targetTable;  
   

    /** Execute module action and return response message */
    if (!empty($itemIds)) {

      $sqlModuleAction = "UPDATE `".$targetTable."` 
        SET `status` = '".FLAG_DELETED."'
        {$sqlExtra}  
        WHERE `id` IN(".implode(',', $itemIds).")";

      DB::runQuery($sqlModuleAction);

      $actionMsg = "Selected {$moduleLabel} have been moved to trash.";
    
    } else {
    
      $actionMsg = "Please select {$moduleLabel} from the list.";
    
    }

    return $actionMsg;

  }
  
   /**
	 * Restore Items
	 *
	 * @param mixed   $itemIds, Description - item ids
	 * @param string  $targetTable, Description - name of the table
	 *
	 * @return string
	*/

  public static function restore(mixed $itemIds, $targetTable = NULL )
	{
    global $moduleMainHeading, $moduleSubHeading;

    $moduleLabel = strtolower(str_replace(' | Trash','',(string) $moduleMainHeading));
    
    $sqlExtra = (empty($targetTable)) ? ", `date_deleted` = NULL" : '';

    /** Define target table name here */
    $targetTable = (empty($targetTable)) ? self::$defaultTable : $targetTable;  

    /** Execute module action and return response message */
    if (!empty($itemIds)) {

      $sqlModuleAction = "UPDATE `".$targetTable."` 
        SET `status` = '".FLAG_HIDDEN."'
          {$sqlExtra}
        WHERE `id` IN(".implode(',', $itemIds).")";

      DB::runQuery($sqlModuleAction);

      $actionMsg = "Selected {$moduleLabel} have been restored.";
    
    } else {
    
      $actionMsg = "Please select {$moduleLabel} from the list.";
    
    }

    return $actionMsg;

  }
  
   /**
	 * Save Item Rank
	 *
	 * @param mixed   $itemRank, Description - array of item id and ranks 
	 * @param string  $targetTable, Description - name of the table
	 *
	 * @return string
	*/

  public static function saveRank(mixed $itemRank, $targetTable = NULL )
	{
    global $moduleMainHeading, $moduleSubHeading;

    $moduleLabel = strtolower((string) $moduleMainHeading);
    
    /** Define target table name here */
    $targetTable = (empty($targetTable)) ? self::$defaultTable : $targetTable;  

    /** Execute module action and return response message */
    if (!empty($itemRank)) {

      foreach ($itemRank as $itemId => $rank) {
      
      if($rank == ''){$rank = '0';}
      
      $sqlModuleAction = "UPDATE `".$targetTable."` 
          SET `rank` = '{$rank}' 
          WHERE `id` = '{$itemId}'";

        DB::runQuery($sqlModuleAction);
      }    

      $actionMsg = "Ranking for {$moduleLabel} have been saved.";
    
    } else {
    
      $actionMsg = "No {$moduleLabel} available.";
    
    }

    return $actionMsg;

	}

}