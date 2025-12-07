<?php

/**
 * NETZONE CMS Class perform Database Operations.
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */
class DB
{

  /**
  * Prepares string to be used in MySQL query
  * @param  string  $sql
  * @return string
  */
  public static function prepareForQuery($sql) 
  {
    global $cConnection;
    if (is_null($sql)) {
      
      return 'NULL';
      
    } else {

      $sql = trim($sql);

      //if (get_magic_quotes_gpc()) { 

        $sql = stripslashes($sql);

      //}

      if (!is_int($sql)) {

        $sql = "'" . mysqli_real_escape_string($cConnection->connect(), $sql) . "'";

      }
        
    }	
    return $sql;
  }

  /**
  * Prepares MySQL query and Insert a new record.
  * @param  array  $arrFields
  * @param  string $table
  * @return mixed
  */
  public static function insertRow($arrFields, $table) 
  { 
    global $dedicatedConn;

    $fieldSet    = implode('`, `', array_keys($arrFields));
    $fieldValues = implode(", ", array_map(function($field) {
      return self::prepareForQuery($field);
    }, $arrFields));

    $sql = "INSERT INTO `{$table}` (`{$fieldSet}`) VALUES ({$fieldValues})";

    $result = runQuery($sql);

    if (mysqli_affected_rows($dedicatedConn) == 1) {
      
      return mysqli_insert_id($dedicatedConn);
    
    }

    return false;
  }


  /**
   * Prepares MySQL query and Update a record.
   * @param  array  $arrFields
   * @param  string $table
   * @param  string $end
   */
  public static function updateRow($arrFields, $table, $end): bool
  {
    global $dedicatedConn;

    $fieldSet = '';

    foreach ($arrFields as $fieldKey => $fieldValue) { 

      $fieldSet .= '`'.$fieldKey.'`'.' = '.self::prepareForQuery($fieldValue).', ';
    }

    $fieldSet = rtrim($fieldSet,', ');

    $sql    = "UPDATE `{$table}` SET {$fieldSet} {$end}";
    
    runQuery($sql);
    return mysqli_affected_rows($dedicatedConn) == 1;
      
  }

  /**
   * Prepares MySQL query and Update Module Settings.
   * @param  array  $arrFields
   * @param  string $table
   */
  public static function updateSettings($arrSettings, $table): bool
  {
    foreach ( $arrSettings AS $fieldKey => $fieldValue) {

      $fieldValue = self::prepareForQuery($fieldValue);
  
      $sql    = "UPDATE `{$table}` 
        SET `option_value` = {$fieldValue}
        WHERE `option_name` = '{$fieldKey}' 
        LIMIT 1";
      
      self::runQuery($sql);
    }

    return true;
      
  }
  
  /**
  * Run mysql Query
  * @param  string  $sql
  * @return string
  */

	public static function runQuery($sql)
	{
    global $cConnection, $dedicatedConn;

    $dedicatedConn = mysqli_connect($cConnection->m_ServerName, $cConnection->m_UserName, $cConnection->m_Password, $cConnection->m_DatabaseName);
    
    mysqli_query($dedicatedConn, "SET names utf8;");
	
    $result = mysqli_query($dedicatedConn, $sql);
    
    if ($result) {
      
      return $result;
    
    } else {
    
      $GLOBALS["error"] = "Lookup failed: " . mysqli_error($dedicatedConn) . $sql;
    
      return false;
    
    }
  }

  /**
  * Run mysql query and return single value / coloumn data
  * @param  string  $sql
  * @return string
  */
  public static function fetchValue($sql)
  {	
    $result = self::runQuery($sql);
    
    if (mysqli_num_rows($result) == 1) {

      return mysqli_fetch_array($result)[0];

    } else {

      return false;

    }
  }

  /**
  * Run mysql query and return single row data
  * @param  string  $sql
  * @return array
  */
  public static function fetchRow($sql) 
  {  
    $result = self::runQuery($sql);
    
    if ($result !== '' && $result !== '0') {
    
      return mysqli_fetch_assoc($result);
    
    }

    return false;
  }

  /**
  * Run mysql query and return  all data
  * @param  string  $sql
  * @return array
  */
  public static function fetchAll($sql)
  {
    $result 		= self::runQuery($sql);
    $arrOutput 	= [];

    while ($row = mysqli_fetch_assoc($result)){

      $arrOutput[] = $row;
    
    }
      
    return $arrOutput;
  }


  /**
  * Run mysql query and return data in key value pair
  * @param  string  $sql
  * @return array
  */
  public static function fetchPairs($sql, $key = null, $value = null)
  {
    $result 		= self::fetchAll($sql);
  
    $arrOutput 	= [];

    $key   = (empty($key)) ? 'opKey' : $key;
    $value = (empty($value)) ? 'opValue' : $value;
    
    if ($result !== []) {
      
      $arrOutput = array_column($result, $value, $key);
    
    }
      
    return $arrOutput;
  }

  /**
  * Run mysql query and return data
  * @param  string  $sql
  * @return mixed
  */
  public static function fetchAssoc($sql) 
  {
    $result 		= self::runQuery($sql);

    if (mysqli_num_rows($result) == 1){
    
      return mysqli_fetch_assoc($result);
    
    } else {

      return false;

    }
  }

  /**
  * Run mysql query and return 1st Row
  * @param  string  $sql
  * @return mixed
  */
  public static function mysqlQuickCall($sql) 
  {

    $result 		= self::runQuery($sql);

    if ($result !== '' && $result !== '0') {
    
      $row = mysqli_fetch_row($result);
      return $row[0];
    
    }

    return false;

  }
}