<?php
/**
* @package    NetZone Base CMS 2.0
* @author     Sam Walsh, Tomahawk Brand Management
* @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
* @copyright  Tomahawk Brand Management Ltd.
* @version    2.0
* @since      File available since version 1.0
*/

/**
* Sanitize only one variable .
* Returns the variable sanitized according to the desired type or true/false 
* 
* NOTE: True/False is returned only for telephone, pin, id_card data types
*
* @param mixed The variable itself
* @param string A string containing the desired variable type
* @return The sanitized variable or true/false
*/
function sanitizeOne($var, $type = 'sqlsafe'){       

  $cConnection = null;
  switch($type){

    /** integer */
    case 'int': 
      $var = (int)$var;
      break;

    /** trim string */
    case 'str': 
      $var = trim((string) $var);
      break;

    /** trim string, no HTML allowed */
    case 'noHtml': 
      $var = htmlentities(trim((string) $var),ENT_QUOTES);
      break;

    /** trim string, no HTML allowed, plain text */
    case 'plain': 
      $var =  htmlentities(trim((string) $var),ENT_NOQUOTES)  ;
      break;

    /** make string safe from sql injection */
    case 'sqlSafe': 
      $var = filter_var($var, FILTER_SANITIZE_ADD_SLASHES);
      break;

    /** trim string, upper case words */
    case 'ucWord': 
      $var = ucwords(strtolower(trim((string) $var)));
      break;

    /** trim string, upper case first word */
    case 'ucFirst': 
      $var = ucfirst(strtolower(trim((string) $var)));
      break;

    /** trim string, lower case words */
    case 'lower': 
      $var = strtolower(trim((string) $var));
      break;

    /** Trim string, url decoded */
    case 'trimUrl': 
      $var = urldecode(trim((string) $var));
      break;

    /** True/False for a telephone number */
    case 'telephone': 
      $size = strlen((string) $var) ;

      for ($x=0;$x<$size;$x++) {

        if (!((ctype_digit((string) $var[$x]) 
          || ($var[$x] == '+') 
          || ($var[$x] == '*') 
          || ($var[$x] == 'p') 
          || ($var[$x] == '(') 
          || ($var[$x] == ')')))) {

            return false;

        }

      }
      return true;

    /** True/False for a PIN */
    case 'pin':
      if ((strlen((string) $var) != 13) || (ctype_digit((string) $var) != true)) {

          return false;
      }

      return true;

    /** True/False for an ID CARD */
    case 'id_card': 
      if ((ctype_alpha(substr((string) $var,0,2)) != true) 
        || (ctype_digit(substr((string) $var,2,6)) != true) 
        || (strlen((string) $var) != 8)) {

          return false;

      }

      return true;

    /** True/False if the given string is SQL injection safe */
    case 'sql': 
      return mysqli_real_escape_string($cConnection->Connect(), (string) $var);
  }

  return $var; 

}

/**
 * Sanitize an array.
 * 
 * sanitize($_POST, array('id'=>'int', 'name' => 'str'));
 * sanitize($customArray, array('id'=>'int', 'name' => 'str'));
 *
 * @param array $data
 * @param array $whatToKeep
 */
function sanitizeArray( &$data, $whatToKeep )
{
  $data = array_intersect_key( $data, $whatToKeep ); 

  foreach (array_keys($data) as $key) {

    $data[$key] = sanitizeOne( $data[$key] , $whatToKeep[$key] );

  }
}

/**
* Sanitize Input
*
* @param  string  $var
* @return string
*/

function sanitizeOutput($var)
{
  $search    = [];

  $search[]  = '/\>[^\S ]+/s'; /** strip whitespaces after tags */
  $search[]  = '/[^\S ]+\</s'; /** strip whitespaces before tags */
  $search[]  = '/(\s)+/s';     /** shorten multiple whitespace sequences */

  $replace = ['>', '<', '\\1'];

  return preg_replace($search, $replace, $var);
}

/**
* Sanitize Input
*
* @param  string  $var
* @param  string  $filterType
* @param  string  $method
*/
function sanitizeInput(
    $var, 
    $filterType = FILTER_SANITIZE_ADD_SLASHES,  
    $method = 'post'): string
{

  $outputMethod = ($method == 'post') ? INPUT_POST : INPUT_GET;

  $varOutput = filter_input($outputMethod, $var, $filterType);

  return stripslashes(strip_tags(htmlentities((string) $varOutput, ENT_QUOTES)));
}

/**
* Sanitize Input
*
* @param  string  $var
* @param  string  $filterType
* @param  string  $method
* @return string
*/

function validateInput(
    $var, 
    $filterType = FILTER_SANITIZE_ADD_SLASHES,  
    $method = 'post')
{

  $outputMethod = ($method == 'post') ? INPUT_POST : INPUT_GET;

  $varOutput = filter_input($outputMethod, $var, $filterType);
  $varOutput = stripslashes(strip_tags(htmlentities((string) $varOutput, ENT_QUOTES)));

  return getNullIfEmpty($varOutput);
}


/**
* Sanitize variable
*
* @param  string  $var
* @param  string  $filterType
*/
function sanitizeVar($var, $filterType = FILTER_SANITIZE_ADD_SLASHES): string
{

  $varOutput = filter_var($var, $filterType);

  return stripslashes(strip_tags(htmlentities((string) $varOutput, ENT_QUOTES)));

}

/**
 * Sanitize string SQLSAFE.
 * 
 * @param string $var
 * @return string
 */
function sanitizeSqlSafe($var)
{
  return filter_var($var, FILTER_SANITIZE_ADD_SLASHES);
}

/**
* Sanitize Input with callback
*
* @param  string  $var
* @param  array   $options
* @param  string  $filterType
*/
function sanitizeCallback(
    $var, 
    $options = ['options' => 'isLowerAlpha'], 
    $filterType = FILTER_CALLBACK): string
{

  $varOutput = filter_var( $var, $filterType, $options);

  return stripslashes(strip_tags(htmlentities((string) $varOutput, ENT_QUOTES)));

}

/**
* Sanitize eMAIL
*
* @param  string  $var
* @return string
*/
function sanitizeEmail($var)
{
  return filter_var($var, FILTER_SANITIZE_EMAIL);
}

/**
* Sanitize integer
*
* @param  integer  $var
* @return integer
*/
function sanitizeInt($var)
{
  return filter_var($var, FILTER_SANITIZE_NUMBER_INT);
}

/**
* Sanitize Float
*
* @param  integer  $var
* @return integer
*/
function sanitizeFloat($var)
{
  return filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT);
}

/**
* Sanitize string
*
* @param  string $var
* @return string
*/
function sanitizeString($var)
{
    return filter_var($var, FILTER_SANITIZE_STRIPPED);
}

/**
* Sanitize sanitize alpha numeric value
*
* @param  string $var
* @return string
*/
function sanitizeAlphaNum($var)
{
    return preg_replace('/[^a-zA-Z0-9]/', '', $var);
}

/**
* Sanitize sanitize URL
*
* @param  string $var
* @return string
*/
function sanitizeUrl($var)
{
  return filter_var($var, FILTER_SANITIZE_URL);
}

/** get_magic_quotes_gpc() this has been deprecated and below functions are not being used in application. So both are commented */
/**
* Sanitize sanitize SQL
*
* @param  mixed $var
* @return mixed
*/
// function sanitizeSql($var)
// {    
//   if (is_array($var)) {

//     $output = array_map('_clean', $var);

//   } else {

//     $var = (get_magic_quotes_gpc()) ? stripslashes($var) : $var ;

//     $output = str_replace('\\', '\\\\', htmlspecialchars($var, ENT_QUOTES));
//   }

//   return $output;
// }

/**
* Sanitize sanitize XSS
*
* @param  mixed $var
* @return mixed
*/
// function sanitizeXss($var)
// {

//   if (is_array($var)) {

//     array_map('_clean', $str);

//   } else {

//     $var = (get_magic_quotes_gpc()) ? stripslashes($var) : $var;
//     $var = htmlspecialchars($var , ENT_QUOTES);
//     $var = str_replace('\\', '\\\\', strip_tags(trim($var)));

//     $output = str_replace('\\', '\\\\', htmlspecialchars($var, ENT_QUOTES));
//   }

//   return $output;
// }

?>