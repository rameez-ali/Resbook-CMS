<?php

$categoryData = DB::fetchRow("SELECT bc.`id`, 
		pmd.`menu_label`,
		pmd.`url`, 
		pmd.`full_url` AS fullURL, 
		pmd.`title`,
    pmd.`meta_description`,
    pmd.`og_title`,
    pmd.`og_meta_description`,
    pmd.`og_image`,
		pmd.`page_code_head_close`,
		pmd.`page_code_body_open`,
		pmd.`page_code_body_close`,
		pmd.`page_structure_data_markup`,
    pmd.`item_key` AS `module_key`
	FROM `blog_category` bc
	LEFT JOIN `page_meta_data` pmd
		ON(pmd.`id` = bc.`page_meta_data_id`)
	WHERE pmd.`url` = '{$segment2}'
		AND pmd.`status` = '".FLAG_ACTIVE."'
	LIMIT 1");


if (!empty($categoryData)) {

	/** Create vars */
	$blogCategoryId  			= $categoryData['id'];

	$sqlTotalPost = "SELECT COUNT(bp.`id`)
		FROM `blog_post_has_category` bphc  
		LEFT JOIN `blog_post` bp
			ON (bphc.`post_id` = bp.`id`)
		LEFT JOIN `blog_category` bc
			ON(bc.`id` = bphc.`category_id`)
		LEFT JOIN `page_meta_data` pmd
			ON(pmd.`id` = bp.`page_meta_data_id`)
		LEFT JOIN `cms_users` cu
			ON(cu.`user_id` = pmd.`updated_by`)
		WHERE pmd.`status` = '".FLAG_ACTIVE."'
			AND bp.`date_posted` is not null
			AND bc.`id` = '{$blogCategoryId}'
		ORDER BY bp.`date_posted` DESC";
	
	$totalPosts =  DB::fetchValue($sqlTotalPost);

	require_once (__DIR__ . '/pagination.php');

	$currentOffset = $currentPage - 1;

	if($currentOffset > 0) {
  
    $currentOffset *= $pageMaxRows;
  
  }

	$sqlBlogPostList = "SELECT pmd.`heading`, 
			pmd.`url`, 
			pmd.`full_url` AS fullURL, 
			pmd.`title`, 
			pmd.`description`, 
			pmd.`short_description` AS details,
			pmd.`photo_path`, 
			pmd.`thumb_photo_path` AS thumbPhotoPath,
			pmd.`photo_alt_text`,
			IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%M %d, %Y'), '') AS postedOn,
			TRIM(CONCAT(cu.`user_fname`, ' ', cu.`user_lname`)) AS authorName,
			REPLACE(LOWER(TRIM(cu.`user_fname`)), ' ', '-') AS authorUrl
		FROM `blog_post` bp
		LEFT JOIN `page_meta_data` pmd
			ON(pmd.`id` = bp.`page_meta_data_id`)
		LEFT JOIN `blog_post_has_category` bphc
			ON(bp.`id` = bphc.`post_id`)
		LEFT JOIN `blog_category` bc
			ON(bc.`id` = bphc.`category_id`)
		LEFT JOIN `cms_users` cu
			ON(cu.`user_id` = pmd.`updated_by`)
		WHERE pmd.`status` = '".FLAG_ACTIVE."'
			AND bp.`date_posted` is not null
			AND bc.`id` = '{$blogCategoryId}'
		ORDER BY bp.`date_posted` DESC
		LIMIT {$currentOffset}, {$pageMaxRows}";

	$arrBlogPosts = DB::fetchAll($sqlBlogPostList);
	  
  /** UPDATE TEMPLATE TAGS */
	
	$templateTags['title']               = $categoryData['title'];
	$templateTags['meta_description']    = $categoryData['meta_description'];
	$templateTags['og_title']            = $categoryData['og_title'];
	$templateTags['og_meta_description'] = $categoryData['og_meta_description'];
	$templateTags['og_image']            = Helper::getFullUrl($categoryData['og_image']);
	
	/** Override Page Vars */

	$pageHeading        = 'Category Archives: '.$categoryData['menu_label'];

	$pageQlModuleKey    = $categoryData['module_key'];
  $pageQlItemId       = $blogCategoryId;
	
	$pageCodeHeadClose  = $categoryData['page_code_head_close'];
	$pageCodeBodyOpen   = $categoryData['page_code_body_open'];
	$pageCodeBodyClose  = $categoryData['page_code_body_close'];
	$pageSchemaMarkup   = $categoryData['page_structure_data_markup'];
  
  /** Update Page Meta Index for Robots */
	$pageMetaIndexId = 2; // NO INDEX, FOLLOW

	/** CREATE PAGE CANONICAL TAGS*/
	$postCanonicalTagUrl = Helper::getFullUrl($blogPageFullURL);		
	$pageCanonicalTags   = '<link rel="canonical" href="'.$postCanonicalTagUrl.'">';
}


?>