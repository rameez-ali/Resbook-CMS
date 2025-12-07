<?php
/**
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since version 2.0
 */

/**
* @param  string  $var
* @return string
*/

function quoteSQL($var, $null = true) 
{
	$foo = null;
 if ($foo =="" && $null) {
		
		return "null";

	} else {
		
		return "'" . mysqli_escape_string($foo) . "'";

	}
}

/**
* Run mysql Query
* @param  string  $sql
* @return string
*/

function runQuery($sql) 
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
* Run mysql query and return single row data
* @param  string  $sql
* @return array
*/
function fetchRow($sql) 
{  
  $result = runQuery($sql);
	
	if ($result !== '' && $result !== '0') {
	
		return mysqli_fetch_assoc($result);
	
	}

	return false;
}

/**
* Run mysql query and return single row data
* @param  string  $sql
* @return array
*/
function fetchAll($sql)
{
	$result 		= runQuery($sql);
	$arrOutput 	= [];

	while ($row = mysqli_fetch_assoc($result)){

		$arrOutput[] = $row;
	
	}
		
	return $arrOutput;
}

/**
* Run mysql query and return single value / coloumn data
* @param  string  $sql
* @return string
*/
function fetchValue($sql)
{	
  $result = runQuery($sql);
  
  if (mysqli_num_rows($result) == 1) {

    return mysqli_fetch_array($result)[0];

  } else {

    return false;

  }
}

/**
* Run mysql query and return data
* @param  string  $sql
* @return string
*/
function fetchAssoc($sql) 
{
  $result = runQuery($sql);

  if (mysqli_num_rows($result) == 1){
  
    return mysqli_fetch_assoc($result);
  
  } else {

    return false;

  }
}

/**
* Run mysql query and return 1st Row
* @param  string  $sql
* @return string
*/
function mysqlQuickCall($sql) 
{

	$result = runQuery($sql);

	if ($result !== '' && $result !== '0') {
	
		$row = mysqli_fetch_row($result);
		return $row[0];
	
	}

	return false;

}

/**
* Prepares string to be used in MySQL query
* @param  string  $sql
* @return string
*/
function prepareForQuery($sql) 
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

			$sql = "'" . mysqli_real_escape_string($cConnection->Connect(), $sql) . "'";

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
function insertRow($arrFields, $table) 
{ 
	global $dedicatedConn;

	$fieldSet    = implode('`, `', array_keys($arrFields));
	$fieldValues = implode(", ", array_map('prepareForQuery', $arrFields)); 

	$sql = "INSERT INTO `{$table}` 
		(`{$fieldSet}`)
    VALUES ({$fieldValues})";

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
function updateRow($arrFields, $table, $end): bool
{
	global $dedicatedConn;

	$fieldSet = '';

	foreach ($arrFields as $fieldKey => $fieldValue) { 

		$fieldSet .= '`'.$fieldKey.'`'.' = '.prepareForQuery($fieldValue).', ';
	}

	$fieldSet = substr($fieldSet, 0, -2);

	$sql    = "UPDATE `{$table}` SET {$fieldSet} {$end}";
	
	$result = runQuery($sql);
 return mysqli_affected_rows($dedicatedConn) == 1;
		
}