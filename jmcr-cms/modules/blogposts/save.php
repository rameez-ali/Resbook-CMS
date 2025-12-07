<?php

/** Save BLOG PPOSTS data */

function saveItem (){

	global $id, $message, $do, $moduleMainHeading, $moduleSubHeading, $modMsgLabel, $modKey, $modName;

  $now = Helper::getCurrentDateTimeStr();

  $itemId           = validateInput('id', FILTER_VALIDATE_INT);
  $metaDataId       = validateInput('meta_data_id', FILTER_VALIDATE_INT);
  $author           = validateInput('author', FILTER_SANITIZE_NUMBER_INT);
  
  $photoPath        = validateInput('photo_path');
  $thumbPhotoPath   = validateInput('thumb_photo_path');
  
  $newHeroThumbPath = Helper::createImageThumb($photoPath, BLOG_THUMB_WIDTH, BLOG_THUMB_HEIGHT, $thumbPhotoPath);
  
  $url              = (requestVar('url')) ? sanitizeInput('url') : sanitizeInput('name');
  $url              = Helper::url($url);
  
  $templateId       = validateInput('template_id', FILTER_VALIDATE_INT);
  $templateId       = (empty($templateId)) ? DEFAULT_TEMPLATE_ID: $templateId ;


  /** Save Page Meta Data */

  $arrMetaData = [];

  $arrMetaData['name']                  = validateInput('heading');
  $arrMetaData['heading']               = validateInput('heading');
  $arrMetaData['url']                   = $url;
  $arrMetaData['full_url']              = "/{$url}";
  $arrMetaData['introduction']          = validateInput('introduction');   
  $arrMetaData['short_description']     = validateInput('short_description');
  $arrMetaData['description']           = requestVar('description');
  $arrMetaData['slideshow_id']          = validateInput('slideshow_id', FILTER_VALIDATE_INT);

  $arrMetaData['photo_path']            = $photoPath;
  $arrMetaData['thumb_photo_path']      = getNullIfEmpty($newHeroThumbPath);
  $arrMetaData['photo_alt_text']        = validateInput('photo_alt_text');

  $arrMetaData['date_updated']          = Helper::getCurrentDateTimeStr();
  $arrMetaData['updated_by']            = $author ?: USER_ID;
  $arrMetaData['template_id']           = $templateId;
  $arrMetaData['item_key']              = $modKey;
  
  /** Save Post data */

  $arrItemData = [];

  $postedDate       = validateInput('posted_on');
  $postIsFeatured   = validateInput('is_featured');
  $postedDate       = (validateDate( $postedDate, 'd/m/Y' )) ? Helper::formateDate($postedDate) : null;

  $arrItemData['date_posted']      = $postedDate;
  $arrItemData['is_featured']      = ($postIsFeatured == FLAG_YES) ? FLAG_YES: FLAG_NO;

  // if ($postIsFeatured == FLAG_YES) {

  //   /** Reset Featured Post */

  //   $sqlResetFeatured = "UPDATE `blog_post` SET `is_featured`='".FLAG_NO."' 
  //     WHERE `is_featured`='".FLAG_YES."'";

  //   DB::runQuery($sqlResetFeatured);

  // }
  
  if (!empty($metaDataId) && !empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($arrMetaData, 'page_meta_data', "WHERE id = '{$metaDataId}' LIMIT 1");

    /** Update Product data */
    DB::updateRow($arrItemData, 'blog_post', "WHERE id = '{$id}' LIMIT 1");

  } else {

    /** Add New item data */

    $arrMetaData['date_created'] = $now;
    $arrMetaData['created_by']   = USER_ID;
    $arrMetaData['updated_by']   = USER_ID;
    $arrMetaData['status']       = FLAG_HIDDEN;
    $arrMetaData['template_id']  = DEFAULT_TEMPLATE_ID;

    $metaDataId = DB::insertRow($arrMetaData, 'page_meta_data');	

  	if (!empty($metaDataId)) {

      $arrItemData['page_meta_data_id']  = $metaDataId;

      $id = DB::insertRow( $arrItemData, 'blog_post' );

    }
  
  } 

  /** Attach Categories Data */

  $attCategoryIds = requestVar('category_id');

  /** Delete Categories Data */
  DB::runQuery("DELETE FROM `blog_post_has_category` WHERE `post_id` = '{$id}'");

  if(!empty($attCategoryIds)) {

    $insQuery = '';

    foreach ($attCategoryIds as $categoryId) { 

      $insQuery .= ',('.$id.','.$categoryId.')';
    }

    $insQuery = ltrim($insQuery, ',');
    
    if ($insQuery !== '' && $insQuery !== '0') {

      DB::runQuery("INSERT INTO `blog_post_has_category`(`post_id`, `category_id`) 
        VALUES {$insQuery}");

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
  
  $message = ucfirst(strtolower((string) $modMsgLabel))." has been saved";
  
}

?>