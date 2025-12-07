<?php

$sqlFeaturedPost = "SELECT bp.`id`,
  pmd.`heading`, 
  pmd.`url`, 
  pmd.`full_url` AS fullURL,
  pmd.`short_description` AS details,
  pmd.`photo_path`, 
	pmd.`thumb_photo_path` AS thumbPhotoPath,
	pmd.`photo_alt_text`,
  DATE_FORMAT(COALESCE(bp.`date_posted`, '0000-00-00 00:00:00'), '%M %d, %Y') AS postedOn,
  TRIM(CONCAT(cu.`user_fname`, ' ', cu.`user_lname`)) AS authorName,
  REPLACE(LOWER(TRIM(cu.`user_fname`)), ' ', '-') AS authorUrl
  FROM `blog_post` bp
  LEFT JOIN `page_meta_data` pmd
  ON(pmd.`id` = bp.`page_meta_data_id`)
  LEFT JOIN `cms_users` cu
  ON(cu.`user_id` = pmd.`updated_by`)
  WHERE pmd.`status` = '".FLAG_ACTIVE."'
  AND bp.`is_featured` = '".FLAG_YES."'
  AND bp.`date_posted` is not null
  AND pmd.`thumb_photo_path` != ''  
  ORDER BY bp.`date_posted` DESC";

$featuredPosts = DB::fetchAll($sqlFeaturedPost);

$blogItem = '';

if (!empty($featuredPosts)) {

  foreach ($featuredPosts as $featuredPost) {

    $postHeading    = $featuredPost['heading'];
    $postDetails    = $featuredPost['details'];
    $postAuthorName = $featuredPost['authorName'];
    $postDate       = $featuredPost['postedOn'];
    $postAltText    = $featuredPost['photo_alt_text'];
    $postPhotoPath  = Helper::getFullUrl($featuredPost['thumbPhotoPath']);
    $extImgClass = '';

    
    $ending        = '...';
    $postDetails   = nl2br((string) $postDetails);
    
    $postHeading   = Helper::strTruncate($postHeading, 40, $ending, true, true);
    $postDetails   = Helper::strTruncate($postDetails, 100, $ending, true, true);
        
    $postFullURL   = Helper::getFullUrl($blogPageFullURL.'/post/'.$featuredPost['url']);
  
    $blogItem .= '<div class="blog blog--featured">
      <div class="blog-default__wrapper">
        <figure class="blog-default__figure '.$extImgClass.'">
          <img data-lazy="'.$postPhotoPath.'" alt="'.$postAltText.'" class="blog-default__figure__img">
          <a href="'.$postFullURL.'" class="blog-default__link"
            data-category="Blog" data-action="Image Link" data-name="'.$postHeading.'"></a>
        </figure>
        <div class="blog-default__content">
          <a href="'.$postFullURL.'" class="blog-default__heading__link" data-category="Blog"
            data-action="Title Link" data-name="'.$postHeading.'">
              <h3 class="blog-default__heading"> '.$postHeading.'</h3>
          </a>
          </div>
        </div>
      </div>';
  }

  $templateTags['mod_view']  .= '<section class="section featured-posts">
    '.$blogSectionHeading.'
    <div class="container container--fw">
      <div class="row">       
        <div class="w-100">
          <div class="blog-showcase showcase">
          '.$blogItem.'
          </div>
        </div>
        <div class="col-12 text-center">'.$blogSectionButton.'</div>
      </div>
    </div>  
  </section>';

}

?>