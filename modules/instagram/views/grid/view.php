<?php

$igUsername = '';

if (!empty($instagramUsername)) {
  
  $igUsername ='<a href="'.$instagramUrl.'" class="instagram-grid__heading-link" 
      data-category="Instagram" data-action="Instagram Link" data-name="'.$instagramUsername.'">
      <span>#'.$instagramUsername.'</span>
    </a>';
} 

$instagramGridView .= '<section class="section instagram">
    <div class="container-fluid container-fluid--fw">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6 text-center instagram-grid">
          <header class="instagram-grid__header">
            <h2 class="instagram-grid__heading">
              <i class="fab fa-instagram instagram-grid__heading-icon"></i>Instagram '.$igUsername.'
            </h2>
          </header>
          <div id="instagram-grid"></div>
        </div>
      </div>
    <div>
  </section>';

$templateTags['instagram_view']  .= $instagramGridView;


?>