<?php

/** Generate pagination links*/

if( isset($totalPosts) && $totalPosts > 0 ) {
	
  $blogPageBaseUrl = $blogPageFullURL;
  $blogPageBaseUrl .= ($segment1) ? '/'.$segment1 : '';
  $blogPageBaseUrl .= ($segment2) ? '/'.$segment2 : '';
  $blogPageBaseUrl .= ($segment3) ? '/'.$segment3 : '';

  $blogPageBaseUrl  = Helper::getFullUrl($blogPageBaseUrl);

	$config = [];

	$config['base_url']     = $blogPageBaseUrl;
	$config['total_rows']   = $totalPosts;
	$config['per_page']     = $pageMaxRows;
	$config['cur_page']     = $currentPage;
	$config['query_string'] = $queryString;

	$pagination = new Pagination($config);

	$blogPaginationView = $pagination->generate_links();
	
}


?>