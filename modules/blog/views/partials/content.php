<?php

$blogSectionHeading = ''; 
$blogSectionButton  = ''; 

/** Section Heading View */

if (!empty($bsHeading) || !empty($bsDescription)) {

  if (!empty($bsHeading)) {
    
    $bsHeading = '<header class="section__header">
      <h2	class="section__heading">'.$bsHeading.'</h2>
    </header>';

  }

  if (!empty($bsDescription)) {

    $bsDescription = '<p class="section__caption">
    '.$bsDescription.'
    </p>';
  
  }

  $blogSectionHeading = '<div class="container container--fw">
      <div class="row">      
        <div class="col-12 section__header-wrapper">
          '.$bsHeading.' 
          '.$bsDescription.'
        </div>
      </div>
    </div>';

}

/** Section Button View */
if (!empty($impPageBlog) && !empty($bsButtonText)) {

  $moreBlogUrl   = Helper::getFullUrl($impPageBlog->full_url);
  $moreBlogtitle = $impPageBlog->title;

  $blogSectionButton   = '<a href="'.$moreBlogUrl.'"
    class="btn section__btn-blog"
    data-category="Blog" data-action="CTA Button" data-name="'.$bsButtonText.'">
    '.$bsButtonText.'<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
    <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
  </svg></a>';

}


?>