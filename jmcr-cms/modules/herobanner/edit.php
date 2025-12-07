<?php

/** Edit item data */

function editItem() {

	$name = null;
 $itemPhotoPath = null;
 $itemPhotoThumbPath = null;
 $resultPageContent = null;
 global $message, $id, $do, $disableMenu, $moduleMainHeading, $moduleSubHeading, $activeTabIndex;
	$template           = (empty($template)) ? '' : $template;
	$extraScripts       = (empty($extraScripts)) ? '' : $extraScripts;
	$extraStyles        = (empty($extraStyles)) ? '' : $extraStyles;
	$arrItemTypes = [
		[
			'label' => 'Image',
			'value' => HERO_BANNER_TYPE_IMAGE,
		], [
			'label' => 'Video',
			'value' => HERO_BANNER_TYPE_VIDEO,
		], [
			'label' => 'Slideshow',
			'value' => HERO_BANNER_TYPE_SLIDER,
		]
	];

	$disableMenu  = FLAG_YES;

	$sql = "SELECT `id`, 
	 `name`, 
	 `photo`,
	 `thumb_photo`,
	 `slideshow_speed`, 
	 `active_type`,
	 `is_gallery`
		FROM `hero_banner` 
		WHERE `id` = '{$id}'";

	$data = DB::fetchRow($sql);

	if (!empty($data)) {
		$name                = $data['name'];
		$itemPhotoPath       = $data['photo'];
		$itemPhotoThumbPath  = $data['thumb_photo'];
		$slideshowSpeed      = $data['slideshow_speed'];
		$activeType          = $data['active_type'];
		$isGallery           = $data['is_gallery'];
	} else {
	 	$activeType = HERO_BANNER_TYPE_IMAGE;
	}

	$arrItems = [];

	if (!empty($data)) {
		$itemsSql = runQuery("SELECT `id`, 
			`photo_path`, 
			`thumb_photo_path`,
			`photo_width`, 
			`photo_height`, 
			`title`, 
			`sub_title`, 
			`alt_text`, 
			`button_text`,
			`button_url`, 
			`video_id`, 
			`type`, 
			`rank`,
			`hero_bunner_header`,
			`hero_cta_bunner_url`,
			`hero_cta_bunner_text`
			FROM `hero_banner_item` 
			WHERE `hero_banner_id` = '{$id}'
			AND `type` IN('".HERO_BANNER_TYPE_IMAGE."','".HERO_BANNER_TYPE_VIDEO."')
			ORDER BY `rank`");

		if (mysqli_num_rows($itemsSql) > 0) {
			while ($arrItem = mysqli_fetch_assoc($itemsSql)) {
				$arrItems[$arrItem['type']] = $arrItem;
			} 
		}
	}
	
	$itemLabel = $name ?: 'Untitled';

	$moduleSubHeading = 'Editing hero banner: '.$itemLabel;

  /** Module actions */
	$moduleActions = '<ul class="page-action">
			<li>
				<button type="button" class="btn btn-default" 
					onclick="submitForm(\'save\',1)">
						<i class="glyphicon glyphicon-floppy-save"></i> Save
				</button>
			</li>
			<li>
				<a class="btn btn-default" href="'.ADMIN_BASE_URL.DS.'?do='.$do.'">
					<i class="glyphicon glyphicon-arrow-left"></i> Cancel
				</a>
			</li>
		</ul>';

	$modBaseDirPath  = ADMIN_BASE_URL.'/'.MODULES_DIR.'/'.$do;
		
	/** Details tab view */
  include_once MOD_VIEWS_DIR.DS.'details.php';

	/** Slider tab view */
	include_once MOD_VIEWS_DIR.DS.'slider.php';
	
	/** Video tab view */
	include_once MOD_VIEWS_DIR.DS.'video.php';
    
	/** Generate tab array */

	$arrMenuTabs = [];

	$arrMenuTabs['Image']     = $tabDetailsContent;
	$arrMenuTabs['Video']     = $tabVideoContent;
	$arrMenuTabs['Slideshow'] = $tabSliderContent;

	$tabIndex   = 0;
	$tabList    = "";
	$tabContent = "";
	$activeTabIndex = 0;

	foreach ($arrMenuTabs as $tabKey => $tabValue) {

		if ($arrItemTypes[$tabIndex]['value'] === $activeType) {
			$activeTabIndex = $tabIndex;
		}

		$tabList    .= '<li><a href="#tabs-'.$tabIndex.'">'.$tabKey.'</a></li>';
		$tabContent .= '<div id="tabs-'.$tabIndex.'">'.$tabValue.'</div>';
		$tabIndex++;

	}

	$arrItemTypesView = '';
	
	foreach ($arrItemTypes as $a => $arrItemType) {

		$isChecked = ($arrItemType['value'] === $activeType) ? ' checked' : '';

		$arrItemTypesView .= '<span class="switch-group">
			<strong class="switch-group-label">'.$arrItemType['label'].'</strong>
			<input type="radio" name="active_type" id="item-type-'.$a.'" value="'.$arrItemType['value'].'" class="switch"'.$isChecked.'>
			<label for="item-type-'.$a.'" class="switch-label">&nbsp;</label>
		</span>';
	}

	$moduleContent = '
	<form action="'.ADMIN_BASE_URL.'/index.php?do='.$do.'" method="post" 
		name="pageList" enctype="multipart/form-data">
			
			<table>
				<tr>
					<td style="width: 150px;">
						<label for="name" style="margin-top: 10px;">Hero Banner Name:</label>
					</td>
					<td>
						<input name="name" class="textbox" id="name"
							value="'.$name.'"
							placeholder="Give your hero banner a name" 
							style="width: 300px;">
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td><label for="photo_path">Hero Banner Cover Logo:</label></td>
					<td>
						<input name="photo_path" type="text" value="'.$itemPhotoPath.'" 
						style="width:300px;" id="photo_path" readonly autocomplete="off">
						<input name="thumb_photo_path" type="hidden" value="'.$itemPhotoThumbPath.'" 
						id="thumb_photo_path" readonly autocomplete="off">
						<input type="button" value="browse" onclick="openCKFileBrowser(\'photo_path\')"> 
						<input type="button" value="clear" onclick="clearValue(\'photo_path\')"><br>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 150px;">
						<label>Choose one option:</label>
					</td>
					<td valign="middle">
						'.$arrItemTypesView.'
					</td>
				</tr>
				<tr>
					<td colspan="2">
						&nbsp;
					</td>
				</tr>
				</table>
			<div id="tabs">
				<ul>'.$tabList.'</ul>
				<div style="padding:10px;">'.$tabContent.'</div>
			</div>
			<input type="hidden" name="action" value="" id="action">
			<input type="hidden" name="do" value="'.$do.'">
			<input type="hidden" name="id" id="hero-banner-id" value="'.$id.'">
	</form>
	';
  /** load slideshow script & style */
  $extraStyles  .= '<link href="'.$modBaseDirPath.'/assets/css/herobanner.css?v=2.1" rel="stylesheet">';
	$extraScripts .= '<script src="'.$modBaseDirPath.'/assets/js/herobanner.js?v=2.1"></script>';
	
	require "resultPage.php";
	echo $resultPageContent;
	exit();
}

?>