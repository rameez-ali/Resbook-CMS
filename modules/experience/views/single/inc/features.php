<?php

$experienceFeatureView = '';
$templateTags['page_features_view'] = '';

if (!empty($experienceFeatures)) {
  $experienceFeatureView .= '<section class="section section--no-padding experience-accordion pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="experience-amenities">
            <div id="experience" class="experience__body">
              '.$experienceFeatures.'
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>';
}
