<?php
/**
 * Manage Files
 *
 * @category   Module
 * @package    NetZone Base CMS 2.0
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 1.0
 */

function initMain(): never
{

  $resultPageContent = null;
  global $moduleMainHeading, $do, $scriptsOnLoad, $moduleActions;

	$moduleMainHeading = 'File Manager';
	$moduleContent     = '';
	$template		   = '';
	//$moduleActions	   = '';
	$moduleContent = '<div id="ckfinder">
		<h3 style="color:#000;font-size:20px;font-weight:700;padding:10px 0;margin:0;">Loading...</h3>
	</div>';

	$scriptsOnLoad .= "CKFinder.widget('ckfinder', {
			skin: 'jquery-mobile',
			width: '100%',
			height: '550'
		});";
    
	require "resultPage.php";
	echo $resultPageContent;
	exit();
}

?>
