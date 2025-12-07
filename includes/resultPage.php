<?php
/**
 * Load the template and replace template tags.
 * 
 * @package    NetZone Base CMS 2.0
 * @author     Sam Walsh, Tomahawk Brand Management
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

$templatePath = fetchValue("SELECT tn.`tmpl_path`
  FROM `templates_normal` tn
  WHERE tn.`tmpl_id` = '{$pageTemplateId}'
  LIMIT 1");

if (!empty($templatePath)) {
  $pageView = file_get_contents(TEMPLATES_DIR_PATH . DS . $templatePath);

  foreach ($templateTags as $key => $value) {
      $replaceValue = $value ?? '';
      $pageView = str_replace('==' . $key . '==', $replaceValue, $pageView);
  }
}

?>