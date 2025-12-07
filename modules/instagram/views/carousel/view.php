<?php

$igUsername = ''; 

if(empty($instagramCarouselView)) {
  $instagramCarouselView = '';
}else {
  $instagramCarouselView = $instagramCarouselView;
}

if (!empty($instagramUsername)) {
  
  $igUsername ='<a href="'.$instagramUrl.'" class="instagram-carousel__heading-link" 
      data-category="Instagram" data-action="Instagram Link" data-name="'.$instagramUsername.'">
      <span>#'.$instagramUsername.'</span>
    </a>';
} 

$instagramCarouselView .= '<section class="section instagram">
    <div class="container-fluid container-fluid--fw">
      <div class="row justify-content-center">
        <div class="col-12 text-center instagram-carousel">
          <header class="instagram-carousel__header">
            <h2 class="instagram-carousel__heading">
              <i class="fab fa-instagram instagram-carousel__heading-icon"></i>Instagram '.$igUsername.'
            </h2>
          </header>
          <div id="instagram-carousel"></div>
        </div>
      </div>
    </div>
  </section>';
	
$templateTags['instagram_view'] .= $instagramCarouselView;
