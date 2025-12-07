<?php

$arrAuthorData = DB::fetchRow("SELECT cu.`user_id`,
		cu.`user_fname`,
	  	cu.`user_lname`,
		TRIM(CONCAT(cu.`user_fname`, ' ', cu.`user_lname`)) AS authorName
	FROM `cms_users` cu
	WHERE REPLACE(LOWER(TRIM(cu.`user_fname`)), ' ', '-') = '{$segment2}'
	LIMIT 1");

if (!empty($arrAuthorData)) {

	$blogAuthorId            = $arrAuthorData['user_id'];
  
  $sqlTotalPost = "SELECT COUNT(bp.`id`)
		FROM `blog_post` bp
		LEFT JOIN `page_meta_data` pmd
			ON(pmd.`id` = bp.`page_meta_data_id`)
		LEFT JOIN `cms_users` cu
			ON(cu.`user_id` = pmd.`updated_by`)
		WHERE pmd.`status` = '".FLAG_ACTIVE."'
			AND bp.`date_posted` is not null
			AND pmd.`updated_by` = '{$blogAuthorId}'
		ORDER BY bp.`date_posted` DESC";

	$totalPosts =  DB::fetchValue($sqlTotalPost);

	require_once (__DIR__ . '/pagination.php');

	$currentOffset = $currentPage - 1;

	if ($currentOffset > 0) {
		
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
		LEFT JOIN `cms_users` cu
			ON(cu.`user_id` = pmd.`updated_by`)
		WHERE pmd.`status` = '".FLAG_ACTIVE."'
			AND bp.`date_posted` is not null
			AND pmd.`updated_by` = '{$blogAuthorId}'
		ORDER BY bp.`date_posted` DESC
		LIMIT {$currentOffset}, {$pageMaxRows}";

  $arrBlogPosts = fetchAll($sqlBlogPostList);
	
	$heading  = 'Author Archives: '.$arrAuthorData['authorName'];

	/* OVERRIDE PAGE VARS */
	$pageHeading  = $heading;

  /** UPDATE TEMPLATE TAGS */
	$templateTags['title']   = (empty($pageTitle)) ? $heading : $pageTitle.' | '.$heading;	
	
	/** Update Page Meta Index for Robots */
	$pageMetaIndexId = 2; // NO INDEX, FOLLOW

	/* CREATE PAGE CANONICAL TAGS */
	$postCanonicalTagUrl = Helper::getFullUrl($blogPageFullURL);		
	$pageCanonicalTags   = '<link rel="canonical" href="'.$postCanonicalTagUrl.'">';
}




?>