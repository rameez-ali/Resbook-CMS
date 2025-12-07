<?php


if(!empty($ctaButtonView) && !empty($accCtaHeading)) {
  $accommodationBookingView = '';

  $accommodationBookingView .= '<section class="section accommodation-booking topaz-bg pt-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <header class="section__header">
            <h2 class="section__heading section__heading--alt">
              '.$accCtaHeading.'
            </h2>
          </header>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center justify-content-center">
          '.$ctaButtonView.'
        </div>
      </div>
    </div>
  </section>';
  
}