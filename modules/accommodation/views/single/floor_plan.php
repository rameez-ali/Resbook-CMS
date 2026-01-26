<?php

$accommodationFloorPlanView = '';

if (!empty($accommodationFloorPlan)) {
    $accommodationFloorPlanView = '
    <section class="section floor-plan-section">
      <div class="container">
        <h2 class="amenities-heading text-center">Floorplan</h2>
        <div class="floor-plan-image-wrapper text-center mt-4">
          <img src="' . $accommodationFloorPlan . '" alt="' . $pageHeading . ' Floor Plan" class="img-fluid">
        </div>
      </div>
    </section>
    ';
}
