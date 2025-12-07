<?php

$templateTags['page_features_view'] = '';

if (!empty($accommodationFeatures)) {
  $accommodationView .= '<section class="section section--no-padding accommodation-accordion">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="accommodation-amenities pt-4 mb-5">
            <div id="accommodation" class="accommodation__body">
              '.$accommodationFeatures.'
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>';
}
