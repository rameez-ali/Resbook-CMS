<?php

$blogPostView         = '';
$blogContentView      = '';
$blogSidebarPanelView = '';
$blogPaginationView   = '';
$delimiter            = ',';

$pageMaxRows          = 4;//PAGE_MAX_ROWS;
$queryString          = 'page';
$currentPage          = $_GET[$queryString] ?? 1;
$isSingle             = false;

$segment1 = ${"option{$pageIndex}"};
$segment2 = ${"option".($pageIndex+1)};
$segment3 = ${"option".($pageIndex+2)};

$arrPostType = ['archive', 'author', 'post', 'category'];

if (($segment1 && $segment2) && in_array( $segment1, $arrPostType)) {

	switch ($segment1) {

		case 'author':
			require_once __DIR__ . '/author_posts.php'; 	// NOIndex, Follow
      break;
      
		case 'category':
			require_once __DIR__ . '/category_posts.php'; 	// NOIndex, Follow
      break;
      
		case 'archive':
			require_once __DIR__ . '/archive_posts.php'; 	// NOIndex, Follow
      break;
      
		case 'post':
			require_once __DIR__ . '/single_post.php'; 	// Index, Follow
		  break;
	}	

} else {

	require_once __DIR__ . '/all_posts.php';

	// Index, Follow

}
/** Generate page view */
require_once __DIR__ . '/generate_view.php';

/** remove side panel as per inspire theme core 2 design */
//require_once __DIR__ . '/panels/posts.php';
//require_once __DIR__ . '/panels/archives.php';

require_once __DIR__ . '/panels/category.php';

$exListCls = (empty($isSingle)) ? ' blog-list' : '';
$blogPanelView = '';

if(empty($isSingle)){
	$blogPanelView = '<div class="col-12 col-md-7 col-lg-8'.$exListCls.'">
					<div class="blog-list__inner">
						'.$blogPostView.'
						'.((empty($blogPaginationView)) 
								? '' 
								: '<div class="pagination__wrapper">'.$blogPaginationView.'</div>' ).'						
					</div>
				</div>					
				<div class="col-12 col-md-5 col-lg-4">
				'.$blogSidebarPanelView.'
				</div>';
} else {
	$blogPanelView = '<div class="col-12">
	<div class="blog-list__inner">
		'.$blogPostView.'

		'.((empty($blogPaginationView)) 
				? '' 
				: '<div class="pagination__wrapper">'.$blogPaginationView.'</div>' ).'						
		</div>
	</div>';
}

/** Generate page view */
$blogContentView = '<section class="section blog 2">
		<div class="container container--fw">
			<div class="row">
				'.$blogPanelView.'		
			</div>
		</div>
	</section>';

$templateTags['mod_view']  .= $blogContentView;
?>