<?php
$arrBlogPostData = DB::fetchRow("SELECT bp.`id`,
    pmd.`heading`,
    pmd.`url`, 
    pmd.`full_url` AS fullURL, 
    pmd.`slideshow_id`,
    pmd.`photo_path`, 
		pmd.`thumb_photo_path` AS thumbPhotoPath,
		pmd.`photo_alt_text`, 
    pmd.`short_description`,
    pmd.`introduction`,
    pmd.`description`,
    pmd.`title`,
    pmd.`meta_description`,
    pmd.`og_title`,
    pmd.`og_meta_description`,
    pmd.`og_image`,
    pmd.`page_code_head_close`,
		pmd.`page_code_body_open`,
		pmd.`page_code_body_close`,
    pmd.`page_structure_data_markup`,
    pmd.`item_key` AS `module_key`,
    IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%M %d, %Y'), '') AS postedOn,
    TRIM(CONCAT(cu.`user_fname`, ' ', cu.`user_lname`)) AS authorName,
    REPLACE(LOWER(TRIM(cu.`user_fname`)), ' ', '-') AS authorUrl,
    pmd.`page_meta_index_id`
  FROM `blog_post` bp
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = bp.`page_meta_data_id`)
  LEFT JOIN `cms_users` cu
    ON(cu.`user_id` = pmd.`updated_by`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
    AND pmd.`url` = '{$segment2}'
    AND bp.`date_posted` is not null
  ORDER BY bp.`date_posted` DESC
  LIMIT 1");

$isSingle = true;

if( !empty($arrBlogPostData) )
{
	// DEFINE PAGE VARS
	$blogPageId                   		   = $arrBlogPostData['id'];
	$blogPageUrl                   		   = $arrBlogPostData['url'];
	$blogPageFullUrl                	   = $arrBlogPostData['fullURL'];
	
  /* OVERRIDE PAGE VARS */
  
  $pageHeading                         = $arrBlogPostData['heading'];
  $pageSubHeading                      = '';
  $pageIntroduction                    = nl2br((string) $arrBlogPostData['introduction']);
  $pageMetaDataId                      = null;
  $pageMetaIndexId                     = $arrBlogPostData['page_meta_index_id'];

  $pageSlideshowId                     = $arrBlogPostData['slideshow_id'];
  $pageCodeHeadClose                   = $arrBlogPostData['page_code_head_close'];
	$pageCodeBodyOpen                    = $arrBlogPostData['page_code_body_open'];
  $pageCodeBodyClose                   = $arrBlogPostData['page_code_body_close'];
  $pageSchemaMarkup                    = $arrBlogPostData['page_structure_data_markup'];
  
  $pageQlModuleKey                     = $arrBlogPostData['module_key'];
  $pageQlItemId                        = $blogPageId;

  /** UPDATE TEMPLATE TAGS */
	$templateTags['title']               = $arrBlogPostData['title'];
	$templateTags['meta_description']    = $arrBlogPostData['meta_description'];
	$templateTags['og_title']            = $arrBlogPostData['og_title'];
	$templateTags['og_meta_description'] = $arrBlogPostData['og_meta_description'];
  $templateTags['og_image']            = Helper::getFullUrl($arrBlogPostData['og_image']);
  
  /* CREATE PAGE CANONICAL TAGS */
  $postCanonicalTagURL = Helper::getFullUrl($blogPageFullURL.'/post'.$blogPageFullUrl);		
  $pageCanonicalTags   = '<link rel="canonical" href="'.$postCanonicalTagURL.'">';

}
?>