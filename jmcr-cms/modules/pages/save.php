<?php

/** Save Experiences Module data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey;

  $now = Helper::getCurrentDateTimeStr();

  $parentId           = validateInput('page_parentid', FILTER_VALIDATE_INT);
	$metaDataId         = validateInput('meta_data_id', FILTER_VALIDATE_INT);
	$menuLabel          = validateInput('menu_label');

	$templateId = sanitizeInput('template_id', FILTER_VALIDATE_INT);
	$templateId = ($id == 1) ? HOME_TEMPLATE_ID: ((empty($templateId)) ?  DEFAULT_TEMPLATE_ID: $templateId) ;

	$url  = (requestVar('url')) ? validateInput('url') : validateInput('name');
	$url  = Helper::url($url);

	$pageSlideshowId = validateInput('slideshow_id', FILTER_VALIDATE_INT);
  $pageGallertId   = validateInput('gallery_id', FILTER_VALIDATE_INT);
  $slideshowPageId = validateInput('slideshow_page_id', FILTER_VALIDATE_INT);

	/** COVER PHOTO THUMB */
	$coverPhotoPath      = validateInput('cover_photo');
	$thumbCoverPhotoPath = validateInput('thumb_cover_photo');

	$thumbWidth  				 = COVER_PHOTO_THUMB_WIDTH;
	$thumbHeight         = COVER_PHOTO_THUMB_HEIGHT;

  $newCoverThumbPath   = Helper::createImageThumb($coverPhotoPath, $thumbWidth, $thumbHeight, $thumbCoverPhotoPath);

  /** Save Page Meta Data */

  $arrMetaData = [];

	$arrMetaData['name']                  = validateInput('name');
	$arrMetaData['menu_label']            = $menuLabel;
	$arrMetaData['footer_menu']           = validateInput('footer_menu');

	$arrMetaData['heading']               = validateInput('heading');
	$arrMetaData['sub_heading']           = validateInput('sub_heading');
	$arrMetaData['url']      							= ($id != 1) ? "{$url}" : 'home';
	$arrMetaData['full_url'] 							= ($id != 1) ? "/{$url}": "/";
	$arrMetaData['introduction']          = validateInput('introduction');
	$arrMetaData['short_description']     = validateInput('short_description');

	$arrMetaData['cover_photo']           = $coverPhotoPath;
	$arrMetaData['thumb_cover_photo']     = $newCoverThumbPath;

	$arrMetaData['date_updated'] 					= Helper::getCurrentDateTimeStr();
	$arrMetaData['updated_by']            = USER_ID;
	$arrMetaData['gallery_id']            = $pageGallertId;
	$arrMetaData['slideshow_id']          = $pageSlideshowId;
  $arrMetaData['slideshow_page_id']     = $slideshowPageId;
  $arrMetaData['template_id']           = $templateId;
  $arrMetaData['item_key']              = $modKey;
  $arrMetaData['external_url']          = validateInput('external_url');

	//$arrMetaData['page_meta_index_id']    = $pageMetaIndexId;

  /** Save Features Data */
  $arrMetaData['features']           = requestVar('features');

   /** Save CTA Bunner Data */
   $arrMetaData['cta_bunner_title']                    = validateInput('cta_bunner_title');
   $arrMetaData['cta_bunner_description']             = validateInput('cta_bunner_description');
   $arrMetaData['cta_bunner_primary_url']    = validateInput('cta_bunner_primary_url');
  //  $arrMetaData['cta_bunner_primary_external_url']    = validateInput('cta_bunner_primary_external_url');
   $arrMetaData['cta_bunner_primary_button_text']     = validateInput('cta_bunner_primary_button_text');
   $arrMetaData['cta_bunner_secondary_url']  = validateInput('cta_bunner_secondary_url');
  //  $arrMetaData['cta_bunner_secondary_external_url']  = validateInput('cta_bunner_secondary_external_url');
   $arrMetaData['cta_bunner_secondary_button_text']   = validateInput('cta_bunner_secondary_button_text');

   /** Save Reservation Banner Data */
   $arrMetaData['reservation_banner_title']          = validateInput('reservation_banner_title');
   $arrMetaData['reservation_banner_button_text']     = validateInput('reservation_banner_button_text');
   $arrMetaData['reservation_banner_button_url']      = validateInput('reservation_banner_button_url');
+  $arrMetaData['reservation_banner_rank']            = (int) validateInput('reservation_module_rank');

   $arrMetaData['prefilter_catid']   = validateInput('prefilter_catid');
   
  /** PAGE DETAILS */
  
  $arrPageData = [];

  $arrPageData['parent_id'] 		= $parentId;
  $arrPageData['form_id'] 			=  validateInput('form_id');

  if (!empty($metaDataId) && !empty($id)) {

    /** Update existing item data */
    DB::updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}' LIMIT 1");
    /** Update Product data */
    DB::updateRow($arrPageData, 'general_pages', "WHERE id = '{$id}' LIMIT 1");

  } else {

    /** Add New item data */

    $arrMetaData['date_created'] = $now;
    $arrMetaData['created_by']   = USER_ID;
    $arrMetaData['status']       = FLAG_HIDDEN;

    $metaDataId = DB::insertRow($arrMetaData, 'page_meta_data');

  	if (!empty($metaDataId)) {

      $arrPageData['page_meta_data_id']  = $metaDataId;

      $id = DB::insertRow( $arrPageData, 'general_pages' );

    }

  }

  /** UPDATE PAGE FULL URL */

  if ($id != 1) {

		$pgFullUrl 		= DBHelper::buildPageUrl($id);

		if ($pgFullUrl){

			$arrPageData = ['full_url' => "/{$pgFullUrl}"];

      DB::updateRow($arrPageData, 'page_meta_data', "WHERE `id` = '{$metaDataId}'");

		}
  }

  /** Save SEO Data */
  $seoData            = requestVar('seo');
  SeoHelper::saveSeoData($metaDataId, $seoData);

  /** Save Quicklinks Data */
  $qlSectionData      = requestVar('quicklink');
  $arrQuicklinkIds    = requestVar('item_quicklink_id');
  $arrQuicklinkRank   = requestVar('item_quicklink_rank');

  QuicklinkHelper::saveQuicklinks($modKey, $id, $qlSectionData, $arrQuicklinkIds, $arrQuicklinkRank);

  /** Save Highlights Data */
  $hlSectionData      = requestVar('highlight');
  $arrHighlightIds    = requestVar('item_highlight_id');
  $arrHighlightRank   = requestVar('item_highlight_rank');
  $arrHighlightIsFeatured = requestVar('item_highlight_is_featured');
  // var_dump( $arrHighlightIsFeatured );die('bbb');
  HighlightHelper::saveHighlights($modKey, $id, $hlSectionData, $arrHighlightIds, $arrHighlightRank, $arrHighlightIsFeatured);

  /**
	 * Save page responsive content
	 * Check if content record exist for this page
	 * get all exisitng row belong to this page's content
	 */

	$existingRows = DB::fetchValue("SELECT GROUP_CONCAT(`id`)
    FROM `content_row`
    WHERE `page_meta_data_id` = '{$metaDataId}'");

  if ($existingRows) {

    /** delete all columns */
    DB::runQuery("DELETE FROM `content_column`
      WHERE `content_row_id` IN({$existingRows})");

    /** delete all rows */
    DB::runQuery("DELETE FROM `content_row`
      WHERE `id` IN($existingRows)");
  }


  if (!empty(requestVar('row-index')) && $metaDataId) {

    /** save new content rows and columns */
    $rows      = requestVar('row-index');
    $rowsRanks = requestVar('row-rank');
    $totalRows = is_countable($rows) ? count($rows) : 0;

    if ($totalRows > 0) {

      for ($i=0; $i < $totalRows; $i++) {

        $rowData = [];

        $rowData['rank']              = ($rowsRanks[$i]);
        $rowData['page_meta_data_id'] = $metaDataId;

        $rowId = DB::insertRow($rowData, 'content_row');

        if ($rowId) {

          $columnsRank    = requestVar("content-{$rows[$i]}-rank");
          $columnsContent = requestVar("content-{$rows[$i]}-text");
          $columnsClass   = requestVar("content-{$rows[$i]}-class");

          $totalROwColumns = is_countable($columnsContent) ? count($columnsContent) : 0;

          if ($totalROwColumns > 0) {

            for ($k=0; $k < $totalROwColumns; $k++) {

              $columnData                   = [];

              $columnData['content']        = $columnsContent[$k];
              $columnData['css_class']      = $columnsClass[$k];
              $columnData['rank']           = $columnsRank[$k];
              $columnData['content_row_id'] = $rowId;

              DB::insertRow($columnData, 'content_column');
            }
          }
        }
      }
    }
  }

  /** save page modules */

  $moduleRank = requestVar('mp_rank');
  $moduleIds  = requestVar('mod_id');

  $sql = "DELETE mp.*
    FROM `module_pages` mp
    LEFT JOIN `modules` m
      ON (m.`mod_id` = mp.`mod_id`)
    WHERE mp.`page_id` = '{$id}'
      AND m.`mod_showincms`='".FLAG_YES."'";

  DB::runQuery($sql);
  $moduleIdsCount = is_countable($moduleIds) ? count($moduleIds) : 0;

  for ($i=0; $i < (is_countable($moduleIds) ? $moduleIdsCount : 0); $i++) {

    $arrModuleData = [];

    if ($moduleRank[$i] > 0) {

      $arrModuleData['page_id']       = $id;
      $arrModuleData['modpages_rank'] = $moduleRank[$i];
      $arrModuleData['mod_id']        = $moduleIds[$i];

      DB::insertRow($arrModuleData, 'module_pages');
    }
  }



  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";

}

?>