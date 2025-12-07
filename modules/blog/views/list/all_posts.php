<?php

/** Generate pagination links*/

$sqlTotalPosts = "SELECT COUNT(bp.`id`) 
	FROM `blog_post` bp
	LEFT JOIN `page_meta_data` pmd
		ON(pmd.`id` = bp.`page_meta_data_id`)
	LEFT JOIN `cms_users` cu
		ON(cu.`user_id` = pmd.`updated_by`)
	WHERE pmd.`status` = '".FLAG_ACTIVE."'
		AND bp.`date_posted` is not null
	ORDER BY bp.`date_posted` DESC";

$totalPosts =  DB::fetchValue($sqlTotalPosts);

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
	ORDER BY bp.`date_posted` DESC
	LIMIT {$currentOffset}, {$pageMaxRows}";

$arrBlogPosts = DB::fetchAll($sqlBlogPostList);

/** Update Page Meta Index for Robots */
$pageMetaIndexId = 1; // INDEX, FOLLOW  

/* CREATE PAGE CANONICAL TAGS */
$postCanonicalTagUrl = Helper::getFullUrl($blogPageFullURL);		
$pageCanonicalTags   = '<link rel="canonical" href="'.$postCanonicalTagUrl.'">';

?>