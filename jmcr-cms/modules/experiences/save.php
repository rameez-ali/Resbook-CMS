<?php

/** Save Experiences Module data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey;

  $now = Helper::getCurrentDateTimeStr();

  $itemId           = validateInput('id', FILTER_VALIDATE_INT);
  $metaDataId       = validateInput('meta_data_id', FILTER_VALIDATE_INT);
  
  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');
  
  $newHeroThumbPath = Helper::createImageThumb($photoPath, EXPERIENCE_THUMB_WIDTH, EXPERIENCE_THUMB_HEIGHT, $thumbPhotoPath);
  
  $url              = (requestVar('url')) ? sanitizeInput('url') : sanitizeInput('name');
  $url              = Helper::url($url);
  
  $templateId       = validateInput('template_id', FILTER_VALIDATE_INT);
  $templateId       = (empty($templateId)) ? DEFAULT_TEMPLATE_ID: $templateId ;


  /** Save Page Meta Data */

  $arrMetaData = [];

  $arrMetaData['name']                  = validateInput('name');
  $arrMetaData['menu_label']            = validateInput('menu_label');
  $arrMetaData['heading']               = validateInput('heading');
  $arrMetaData['url']                   = $url;
  $arrMetaData['full_url']              = "/{$url}";
  $arrMetaData['introduction']          = validateInput('introduction');   
  $arrMetaData['short_description']     = validateInput('short_description');

  $arrMetaData['gallery_id']            = validateInput('gallery_id', FILTER_VALIDATE_INT);
  $arrMetaData['slideshow_id']          = validateInput('slideshow_id', FILTER_VALIDATE_INT);

  $arrMetaData['photo_path']            = $photoPath;
  $arrMetaData['thumb_photo_path']      = getNullIfEmpty($newHeroThumbPath);
  $arrMetaData['photo_alt_text']        = validateInput('photo_alt_text');

  $arrMetaData['date_updated']          = Helper::getCurrentDateTimeStr();
  $arrMetaData['updated_by']            = USER_ID;

  $arrMetaData['template_id']           = $templateId;
  $arrMetaData['item_key']              = $modKey;
  
  /** Save product data */

  $arrItemData = [];

  $arrItemData['from_price']    = validateInput('from_price', FILTER_VALIDATE_FLOAT);
  $arrItemData['currency_code'] = validateInput('currency_code');
  $arrItemData['caption']       = validateInput('caption');
  $arrItemData['is_featured']   = (validateInput('is_featured') == FLAG_YES) ? FLAG_YES: FLAG_NO;
  $arrItemData['button_text']   = validateInput('button_text');
  $arrItemData['booking_url']   = validateInput('booking_url');
  $arrItemData['features']      = requestVar('features');
  $arrItemData['price_description']      = requestVar('price_description'); 

  if (!empty($metaDataId) && !empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}' LIMIT 1");

    /** Update Product data */
    DB::updateRow($arrItemData, 'experience', "WHERE id = '{$id}' LIMIT 1");

  } else {

    /** Add New item data */

    $arrMetaData['date_created'] = $now;
    $arrMetaData['created_by']   = USER_ID;
    $arrMetaData['status']       = FLAG_HIDDEN;

    $metaDataId = DB::insertRow($arrMetaData, 'page_meta_data');	

  	if (!empty($metaDataId)) {

      $arrItemData['page_meta_data_id']  = $metaDataId;

      $id = DB::insertRow( $arrItemData, 'experience' );

    }
  
  }

  // /** Attach Categories Data */
  
  // $attCategoryIds = requestVar('category_id');

  // /** Delete Categories Data */
  // DB::runQuery("DELETE FROM `experience_has_category` WHERE `experience_id` = '{$id}'");

  // if(!empty($attCategoryIds)) {

  //   $insQuery = '';

  //   foreach ($attCategoryIds as $categoryId) { 

  //     $insQuery .= ',('.$id.','.$categoryId.')';
  //   }

  //   $insQuery = ltrim($insQuery, ',');
   
  //   if ($insQuery !== '' && $insQuery !== '0') {

  //     DB::runQuery("INSERT INTO `experience_has_category`(`experience_id`, `experience_category_id`) 
  //       VALUES {$insQuery}");

  //   }

  // }

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

  HighlightHelper::saveHighlights($modKey, $id, $hlSectionData, $arrHighlightIds, $arrHighlightRank, $arrHighlightIsFeatured);
  
  /**
	 * Save page responsive content
	 * Check if content record exist for this page
	 * get all exisitng row belong to this page's content
	 */

	$existingRows = fetchValue("SELECT GROUP_CONCAT(`id`) 
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

  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>