<?php
/**
* Core Functions of the NetZone Base CMS
*
* @package    NetZone Base CMS 2.0
* @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
* @copyright  Tomahawk Brand Management Ltd.
* @version    2.0
* @since      File available since version 2.0
*/
/**
* To print data
*
* @return void
*/
function prePrintR(mixed $print, $breakPoint=FALSE)
{

	echo '<pre>';
	print_r($print);
	echo '</pre><hr>';

	if ($breakPoint) {

		die();

	}

}


/**
* To get null if value is not set.
*
* @return mixed
*/
function getNullIfEmpty(mixed $var)
{
	return (empty($var)) ? null : $var;
}

/**
* To get requested data
*
* @return mixed
*/
function requestVar(mixed $var)
{
  $output = $_POST[$var] ?? '';
  
  if(empty($output))
  {
    $output = $_GET[$var] ?? '';
  }
  //$output = (isset($_POST[$var])) ? $_POST[$var] : $_GET[$var];

  return (empty($output)) ? null : $output;
}


/**
* Get Current date time
*
* @param  string $format
* @return date
*/
function getCurrentDateTime($format = 'Y-m-d H:i:s')
{

	$objDateTime = new DateTime();

	return $objDateTime->format($format);

}


/**
* Create dropdown list for templates
*
* @param  integer $selectedTemplateId
* @return mixed
*/
function getTemplateList($selectedTemplateId = null): string
{
	$tmplSQL = "SELECT tn.`tmpl_id` AS ind,
    tn.`tmpl_name` AS label
    FROM `templates_normal` tn
    WHERE tn.`tmpl_showincms` = '".FLAG_YES."'";

  $output = '<select name="template_id" id="template_id" style="width:250px">';
  $output .= createItemList($tmplSQL, $selectedTemplateId);

  return $output . '</select>';
}

/**
* To serch and return key from array.
*
* @param  array  $haystack
* @param  mixed  $haystack
* @return mixed
*/
function arrayRecursiveSearch($needle, $haystack)
{
    foreach ($haystack as $key=>$value) {

      $currentKey = $key;

      if ($needle === $value
      	|| (is_array($value)
      		&& arrayRecursiveSearch($needle, $value) !== false)) {

        return $currentKey;

      }

    }

    return false;
}

/**
* Process tamplate file to replace tags with value
*
* @param  string  $path
* @param  array   $tags
* @param  string  $startTag
* @param  string  $endTag
* @return string
*/
function processTemplate(
	$path,
	$tags = [],
	$startTag = '{',
	$endTag = '}')
{

	if (file_exists($path)) {

    /** read email tempalte file */
    $template = file_get_contents($path);

    /** replace tags with value */
    foreach ($tags as $tag => $value) {

			$value    = $value ?: '';
			$template = str_replace("$startTag{$tag}$endTag", $value, $template);

		}

		return $template;

	} else {

		return FALSE;

	}

}

/**
* get email list
*
* @param  string  $emails
* @return object
*/
function getEmailList($emails)
{
    $filters = ["\r", "\n", "\t"];

    if ($emails !== '' && $emails !== '0') {

        // Provide an empty string as the default value for $emails
        $arrEmails = explode(';', str_replace($filters, '', $emails ?? ''));

        $arrEmails = array_filter($arrEmails, 'isEmail');

        if($arrEmails !== []) {

            $emailList = [];
            $emailList['primaryEmail'] = $arrEmails[0];

            unset($arrEmails[0]);
            $emailList['list'] = (object) $arrEmails;

            return (object) $emailList;

        }

    }

    return false;

}


/**
* To find absolute parent page id.
*
* @param  integer  $cursorPageId
* @return integer
*/
function getAbsoluteParentId($cursorPageId)
{
	global $absoluteParent;

	$sql = "SELECT `id`,
		`parent_id`
		FROM `general_pages`
		WHERE `id` = '{$cursorPageId}'";

	$arrParentPage    = fetchRow($sql);

	$cursorpageParent = $arrParentPage['parent_id'];
	$cursorPageId     = $arrParentPage['id'];

	if ( $cursorpageParent != 0 ) {

		getAbsoluteParentId($cursorpageParent);

	} else {

		$absoluteParent = $cursorPageId;

	}

	return $absoluteParent;
}

/**
* To check if page is a child of parent page
*
* @param  integer  $childPageId
* @param  integer  $parentPageId
* @param  bool  	 $includeSelf
* @return bool
*/
function isChildOf($childPageId, $parentPageId, $includeSelf = false)
{
	if ($includeSelf && $childPageId == $parentPageId) {

		return true;

	}

	$sql = "SELECT `page_parentid`
    FROM `general_pages`
    WHERE `page_id` = '{$childPageId}'";

	$arrParent = fetchRow($sql);

	$cursorPageParent 	= $arrParent['page_parentid'];

	if ($cursorPageParent) {

		if ($cursorPageParent == $parentPageId) {

			return true;

		} else {

			return isChildOf($cursorPageParent, $parentPageId, false);

		}

	} else {

		return false;

	}
}

/**
* Return base64 image.
*
* @param  string  		$file
* @return mixed
*/

function imageToBase64($file)
{
  if ($file && file_exists($file)) {

    $imageDetails = getimagesize($file);

    $mime = $imageDetails['mime'];

    if (preg_match('/(jpeg|png|gif|jpg)$/', (string) $mime)) {

      $handler = fopen($file, "r");
      $picture = fread($handler,filesize($file));

      fclose($handler);

      return 'data:'.$mime.';base64,'.base64_encode($picture);

    } else {

      return false;

    }

  }
  else
  {
    return false;
  }
}

/**
* cretae options for number dropdown
*
* @param  integer $min
* @param  integer $max
* @param  integer $sel
* @param  bool    $showLastPlus
* @return string
*/
function generateNumberDropdown($min, $max, $sel = '', $showLastPlus = false)
{
	$output = '';

	if (is_numeric($min) && is_numeric($max)) {

		for ($i=$min; $i <= $max; $i++) {

			$selected = ($sel == $i) ? ' selected="selected"' : '';

			$output .= '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
		}

		if($showLastPlus) {

			$selected = (($sel === "{$max}+") ? ' selected="selected"' : '');
			$output .= '<option value="'.$max.'+"'.$selected.'>'.$max.'+</option>';

		}

		return $output;
	}

	return false;
}

/**
* cretae options for dropdown
*
* @param  string  $sql
* @param  string  $selected
* @return string
*/
function createItemList($sql, $selected='')
{
	$html = '';

	if($sql !== '' && $sql !== '0') {

		$items = fetchAll($sql);

		foreach ($items as $item) {

				$itemInd   = $item['ind'];
				$itemLabel = $item['label'];

				$isSelected = ($itemInd == $selected) ? ' selected="selected"' : '';

				$html .= '<option value="'.$itemInd.'"'.$isSelected.'>';
				$html .= $itemLabel;
				$html .= '</option>';

			}
	}

	return $html;
}

/**
* Generate Random characters.
*
* @param  array  $config
* @return string
*/
function createRandomChars($config = [])
{
	$arrConfig = [];

	$arrConfig['min_len']            = 8;
	$arrConfig['max_len']            = 8;
	$arrConfig['make_uppercase']     = FALSE;
	$arrConfig['only_numbers']       = TRUE;
	$arrConfig['only_alphabets']     = FALSE;
	$arrConfig['make_alpha_numeric'] = TRUE;
	$arrConfig['inc_special_chars']  = FALSE;

	if($arrConfig['only_numbers']
		&& $arrConfig['only_alphabets']) {

		$arrConfig['alpha_numeric'] = TRUE;

	} else {

		$arrConfig['alpha_numeric'] = $arrConfig['make_alpha_numeric'];

	}

	$config = array_merge($arrConfig, $config);

  $length = random_int($config['min_len'], $config['max_len']);

  $selection = '';

  if (($config['only_numbers'] || $config['alpha_numeric'])) {

    $selection .= str_shuffle('2591730648');

  }

  if(($config['only_alphabets'] || $config['alpha_numeric'])) {

    $selection .= str_shuffle('aeuoyibcdfghjklmnpqrstvwxz');

  }

  if($config['inc_special_chars']) {
    $selection .= "!@04f7c318ad0360bd7b04c980f950833f11c0b1d1quot;#$%&[]{}?|";
  }

  $selection = str_shuffle($selection);

  $str = '';

  for ($i=0; $i<$length; $i++) {

    $strLenth     = strlen($selection);
    $strSelection = $selection[(random_int(0, mt_getrandmax()) % $strLenth)];

    if ($config['make_uppercase']) {

      $str .= (random_int(0,1) !== 0 ? strtoupper($strSelection) : $strSelection) ;

    } else {

      $str .= $strSelection;

    }

  }

  return $str;
}

/**
* Set Action Message
*
* @param  string  $message
*/
function setFlashMsg($message)
{
	$_SESSION['flash_msg'] = $message;
}

/**
* Get Action Message
*
* @param  void
* @return string
*/
function getFlashMsg()
{
	return ($_SESSION['flash_msg'] ?: '' );
}

/**
* Unset Action Message
*
* @param  void
* @return void
*/
function destroyFlashMsg()
{
	if (isset($_SESSION['flash_msg'])) {

		unset($_SESSION['flash_msg']);

	}
}

/**
* Display Action Message
*
* @param  string  $message
* @param  string  $class
* @param  string  $element
* @return string
*/
function displayMessage($message, $class = 'text-danger', $element = 'p')
{
	if ($message || !empty($message)) {

		return createElement(['class'=> $class], $element, $message);

	}

	return false;
}

/**
* Display Action Message
*
* @param  array   $attributes
* @param  string  $element
* @param  string  $html
* @return string
*/
function createElement(
  $attributes = ['class'=>'element-class'],
  $element='div',
  $html = '')
{

	$tag   = '';
	$attrs = '';

	$selfClosingTags = ['area', 'base', 'basefont', 'br', 'col', 'frame', 'hr', 'img', 'input', 'link', 'meta', 'param'];

	if (@is_array($attributes)) {

		ksort($attributes);

		foreach ($attributes as $key => $value) {

			$attrs .= ' '.$key.'="'.$value.'"';

		}

	}

	if ($element !== '' && $element !== '0') {

		$tag = "<$element$attrs>";

		if (!@in_array($element, $selfClosingTags)) {

			$tag .= "$html</$element>";

		}

	}

	return $tag;
}

/**
* Checks and Truncates a string to the number of words / characters specified.
*
* @param  string  $text
* @param  integer $length
* @param  string  $ending
* @param  bool    $byWords
* @param  bool    $html
* @return string
*/
function strTruncate(
    $text,
    $length = 100,
    $ending = '...',
    $byWords = true,
    $html = true)
{

  $eTags  = "img|br|input|hr|area|base|basefont|col|frame|";
  $eTags .= "isindex|link|meta|param";

  $matchPattern1 = "/^<(\s*.+?\/\s*|\s*({$eTags})(\s.+?)?)>$/is";

  $matchPattern2 = "/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i";

  if ($html) {
      if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
  
        return $text;
  
      }
      /** splits all html-tags to scanable lines */
      preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
      $totalLength = strlen($ending);
      $openTags    = [];
      $output      = '';
      foreach ($lines as $line) {
  
      if (!empty($line[1])) {
  
        if (preg_match($matchPattern1, $line[1])) {

          /** do nothing */
  
        } elseif (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line[1], $tag)) {
  
          /** delete tag from $openTags list */
          $pos = array_search($tag[1], $openTags);
  
          if ($pos !== false) {
  
            unset($openTags[$pos]);
  
          }
  
        } elseif (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line[1], $tag)) {
  
          /** Add tag to the beginning of $openTags list */
          array_unshift($openTags, strtolower($tag[1]));
  
        }
  
        /** Add html-tag to $output'd text */
        $output .= $line[1];
  
      }
  
      /**
       *  Calculate the length of the plain text part of the line;
       *  Handle entities as one character
       */
  
      $contentLength = strlen(preg_replace($matchPattern2, ' ', $line[2]));
  
      if ($totalLength+$contentLength > $length) {
  
        /** the number of characters which are left */
        $left = $length - $totalLength;
        $entityLength = 0;
  
        /** search for html entities */
        if (preg_match_all($matchPattern2,
          $line[2],
          $entities,
          PREG_OFFSET_CAPTURE)) {
  
          /** calculate the real length of all entities in the legal range */
          foreach ($entities[0] as $entity) {
  
            if ($entity[1]+1-$entityLength <= $left) {
  
                $left--;
                $entityLength += strlen($entity[0]);
  
            } else {
              /** no more characters left */
              break;
            }
          }
        }
  
        $output .= substr($line[2], 0, $left+$entityLength);
        /** maximum lenght is reached, so get off the loop */
        break;
  
        } else {
  
          $output .= $line[2];
          $totalLength += $contentLength;
  
        }
  
        /** if the maximum length is reached, get off the loop */
        if ($totalLength >= $length) {
          break;
        }
      }
  } elseif (strlen($text) <= $length) {
      return $text;
  } else {

    $output = substr($text, 0, $length - strlen($ending));
  }

  /** if the words shouldn't be cut in the middle */
  if ($byWords) {

    /** search the last occurance of a space */
    $spacepos = strrpos($output, ' ');

    $output = substr($output, 0, $spacepos);

  }

  /** add the defined ending to the text */
  $output .= $ending;

  if ($html) {

    /** close all unclosed html-tags */
    foreach ($openTags as $tag) {

        $output .= '</' . $tag . '>';

    }

  }

  return $output;
}

function createRandChars($config = [])
{
  $defaults = [];

$defaults['min_len']            = 8;
$defaults['max_len']            = 8;
$defaults['make_uppercase']     = FALSE;
$defaults['only_numbers']       = TRUE;
$defaults['only_alphabets']     = FALSE;
$defaults['make_alpha_numeric'] = TRUE;
$defaults['alpha_numeric']      = ($defaults['only_numbers'] && $defaults['only_alphabets'])? TRUE: $defaults['make_alpha_numeric'];
$defaults['inc_special_chars']  = FALSE;

$config = array_merge($defaults, $config);

    $length = random_int($config['min_len'], $config['max_len']);
    $selection = '';
    if(($config['only_numbers'] || $config['alpha_numeric']))
    {
        $selection .= str_shuffle('2591730648');
    }
    if(($config['only_alphabets'] || $config['alpha_numeric']))
    {
        $selection .= str_shuffle('aeuoyibcdfghjklmnpqrstvwxz');
    }
    if($config['inc_special_chars'])
    {
        $selection .= "!@04f7c318ad0360bd7b04c980f950833f11c0b1d1quot;#$%&[]{}?|";
    }

    $selection = str_shuffle($selection);
    
    $str = '';
    for($i=0; $i<$length; $i++) {
        $str .= ($config['make_uppercase']) ? (random_int(0,1) !== 0 ? strtoupper($selection[(random_int(0, mt_getrandmax()) % strlen($selection))]) : $selection[(random_int(0, mt_getrandmax()) % strlen($selection))]) : $selection[(random_int(0, mt_getrandmax()) % strlen($selection))];
    }
    return $str;
}

function prepareItemUrl($str)
{
  $url = '';
  if($str)
  {
    $url  = preg_replace('/[^_a-z0-9-]/i','', preg_replace('/\s+/', '-', strtolower(trim((string) $str))));
          $url  = trim(preg_replace('/-+/', '-', $url), '-');
  }
  return $url;
}
?>