<?php

if (!empty($arrBlogPosts) && !$isSingle) {
    /** Generate List view */
    foreach ($arrBlogPosts as $post) {
   
       $postTitle      = $post['heading'];
       $postHeading    = $post['heading'];
   		$postDetails    = $post['details'];
   		$postTitle      = $post['title'];
   		$postAuthorName = $post['authorName'];
   		$postAltText    = $post['photo_alt_text'];
   		$postDate       = Helper::getDateTimeStr($post['postedOn'], 'dS F Y');
      $postOrigPhotoPath =  $post['photo_path'];
   		
   		$ending        = '...';
   		$postDetails   = nl2br((string) $postDetails);
       
       $postHeading   = Helper::strTruncate($postHeading, 40, $ending, true, true);
       $postDetails   = Helper::strTruncate($postDetails, 80, $ending, true, true);
   
       $extImgClass = (empty($post['thumbPhotoPath'])) ? 'no-image' : '';
           
   		$postPhotoPath = Helper::getFullUrl($post['thumbPhotoPath']);
   		
   		$postFullURL   = Helper::getFullUrl($blogPageFullURL.'/post/'.$post['url']);
   
       $postAuthorURL = Helper::getFullUrl($blogPageFullURL.'/author/'.$post['authorUrl']);
       
       $postFigureView = '';
      //  var_dump($post);die('gggg');
   
       if(!empty($post['photo_path'])) {
         $postFigureView = '<figure class="blog__figure '.$extImgClass.'">
          <a href="'.$postFullURL.'" class="blog__figure-link"
            data-category="Blog" data-action="Image Link" data-name="'.$postHeading.'">
              <img data-src="'.$postOrigPhotoPath.'" alt="'.$postAltText.'" class="blog__figure-img lazy">
          </a>
        </figure>';
       }
       
       $blogPostView .= '<div class="row blog">
          <div class="col-12 col-lg-5 blog__image">
            '.$postFigureView.'
          </div>
          <div class="col-12 col-lg-7 blog__content">
            <h5 class="blog__heading">
              <a href="'.$postFullURL.'" class="blog__heading-link"
                data-category="Blog" data-action="Title Link" data-name="'.$postHeading.'">
                '.$postHeading.'
              </a>
            </h5>
            <p class="blog__date">              
              '.$postDate.'
            </p>
            <p class="blog__details">'.$postDetails.'</p>
            <a href="'.$postFullURL.'" class="btn btn--link btn-blog" data-category="Blog"
              data-action="Read More link" data-name="'.$postHeading.'"> Read More</a>
          </div>        
    </div>';
   	}
} elseif (!empty($arrBlogPostData)) {
    /** Generate post details view */
    $postHeading    = $arrBlogPostData['heading'];
    $postDetails    = $arrBlogPostData['description'];
    $postTitle      = $arrBlogPostData['title'];
    $postAuthorName = $arrBlogPostData['authorName'];
    $postDate       = $arrBlogPostData['postedOn'];
    $postAuthorURL = Helper::getFullUrl($blogPageFullURL.'/author/'.$arrBlogPostData['authorUrl']);
    $blogPostView .= '<div class="post__content">
        '.$postDetails.'
        <p class="author">
          <i class="fa fa-clock-o"></i>Posted by 
          <a href="'.$postAuthorURL.'" class="blog__link" data-category="Blog" 
            data-action="Author Link" data-name="'.$postAuthorName.'">
            '.$postAuthorName.'</a> on '.$postDate.'
        </p>
			</div>';
}

?>