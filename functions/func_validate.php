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
* Check if valid email
*
* @param  string  $var
* @return bool
*/
function isEmail($var)
{
  return filter_var($var, FILTER_VALIDATE_EMAIL);
}

/**
* Check if valid number
*
* @param  string  $var
* @param  string  $type
* @return bool
*/
function isNumber($var)
{
  return filter_var($var,FILTER_VALIDATE_INT); 
}

/**
* Check if valid decimal number
*
* @param  string  $var
* @param  string  $type
* @return bool
*/
function isFloat($var)
{
  filter_var($var,FILTER_VALIDATE_FLOAT); 
}

/**
* Check if alpha 
*
* @param  string  $var
* @param  string  $type
*/
function isAlpha($var): bool{
  
  return ctype_alpha($var);

}

/**
* Check if alpha and lowercase 
*
* @param  string  $var
* @param  string  $type
* @return bool
*/
function isLowerAlpha($var){
    $var = trim($var);

    if(ctype_lower($var)) {
      
      return $var;
    
    }

    return false;
}

/**
* Check if valid date
*
* @param  string  $date
* @param  string  $format
* @return bool
*/
function validateDate($date, $format = 'Y-m-d')
{
  if ( $date && $format ) {

    $d = DateTime::createFromFormat($format, $date);
    
    return $d && $d->format($format) == $date;

  }
  return false;
}


?>