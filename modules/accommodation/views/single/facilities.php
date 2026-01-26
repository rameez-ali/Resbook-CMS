<?php

$accommodationFacilityView = '';
$accommodationFactsHtml = '';

// 1. Room Size Column
if (!empty($accommodationroomsize)) {
  $roomSizeText = $accommodationroomsize . ' m²';
  if (!empty($accommodationDeckSize)) {
    $roomSizeText .= ' with ' . $accommodationDeckSize . ' m² deck';
  }

  $accommodationFactsHtml .= '
    <div class="fact">
        <div class="fact__icon">
            <svg id="icon-room-size-medium" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 29.882 29.62">
                <path d="M10.443,11.829a1.377,1.377,0,0,1-.98-.406L2.522,4.484V8.766a1.386,1.386,0,0,1-2.772,0V1.138A1.388,1.388,0,0,1,1.136-.248H8.765a1.386,1.386,0,0,1,0,2.772H4.482l6.941,6.939a1.386,1.386,0,0,1-.98,2.366ZM2.034,3.307l7.773,7.771a.9.9,0,1,0,1.27-1.27L3.3,2.036h5.46a.9.9,0,0,0,0-1.8H1.136a.9.9,0,0,0-.9.9V8.766a.9.9,0,0,0,1.8,0Z" transform="translate(0.25 0.248)" fill="#6E733F"/>
                <path d="M148.43,139.657a1.142,1.142,0,0,0-1.142,1.142v4.87l-7.583-7.583a1.142,1.142,0,1,0-1.615,1.615l7.583,7.583H140.8a1.142,1.142,0,0,0,0,2.284h7.628a1.142,1.142,0,0,0,1.142-1.142V140.8A1.143,1.143,0,0,0,148.43,139.657Z" transform="translate(-119.936 -120.193)" fill="#6E733F"/>
                <path d="M10.674,137.5h0a1.386,1.386,0,0,1,.98,2.366l-7.166,7.167H8.769a1.386,1.386,0,1,1,0,2.772H1.141a1.388,1.388,0,0,1-1.386-1.386v-7.628a1.386,1.386,0,1,1,2.772,0v4.281l7.166-7.167A1.377,1.377,0,0,1,10.674,137.5Zm-1.9,11.818a.9.9,0,0,0,0-1.8H3.31l8-8a.9.9,0,1,0-1.271-1.27l-8,8v-5.459a.9.9,0,1,0-1.8,0v7.628a.9.9,0,0,0,.9-.9Z" transform="translate(0.246 -120.187)" fill="#6E733F"/>
                <path d="M149.7,0h-7.628a1.142,1.142,0,0,0,0,2.284h4.87l-7.356,7.356a1.142,1.142,0,0,0,1.616,1.615L148.554,3.9v4.87a1.142,1.142,0,1,0,2.284,0V1.144A1.142,1.142,0,0,0,149.7,0Z" transform="translate(-121.201 0.242)" fill="#6E733F"/>
            </svg>
        </div>
        <div class="fact__text">' . $roomSizeText . '</div>
    </div>';
}

// 2. Bedroom Column
if (!empty($accommodationFactsHtml) && !empty($accommodationBedroomDetails)) {
  $accommodationFactsHtml .= '<div class="divider" aria-hidden="true"></div>';
}

if (!empty($accommodationBedroomDetails)) {
  $details = explode("\n", str_replace(["\r\n", "\r"], "\n", $accommodationBedroomDetails));
  $bedroomContent = '';
  foreach ($details as $index => $detail) {
    $trimmed = trim($detail);
    if (empty($trimmed))
      continue;
    if (empty($bedroomContent)) {
      $bedroomContent .= '<div class="fact__text">' . $trimmed . '</div>';
    } else {
      $bedroomContent .= '<div class="fact__subtext">' . $trimmed . '</div>';
    }
  }

  if (!empty($bedroomContent)) {
    $accommodationFactsHtml .= '
        <div class="fact">
            <div class="fact__icon">
                <svg id="bed-icon-desktop" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 41.978 29.384">
                    <path d="M80,325.384V312a5.889,5.889,0,0,1,.525-2.466,4.583,4.583,0,0,1,1.574-1.889v-6.087A5.467,5.467,0,0,1,87.661,296h9.445a4.55,4.55,0,0,1,2.151.525,5.612,5.612,0,0,1,1.732,1.417,5.724,5.724,0,0,1,1.705-1.417,4.4,4.4,0,0,1,2.125-.525h9.445a5.468,5.468,0,0,1,3.988,1.6,5.336,5.336,0,0,1,1.627,3.962v6.087a4.583,4.583,0,0,1,1.574,1.889,5.889,5.889,0,0,1,.525,2.466v13.38h-3.148v-4.2H83.148v4.2Zm22.563-18.628H116.73v-5.195a2.3,2.3,0,0,0-.708-1.732,2.435,2.435,0,0,0-1.758-.682h-9.6a1.863,1.863,0,0,0-1.5.735,2.571,2.571,0,0,0-.6,1.679Zm-17.316,0H99.415v-5.195a2.571,2.571,0,0,0-.6-1.679,1.863,1.863,0,0,0-1.5-.735H87.661a2.419,2.419,0,0,0-2.414,2.414Zm-2.1,11.281h35.681V312a2.061,2.061,0,0,0-2.1-2.1H85.247a2.061,2.061,0,0,0-2.1,2.1Zm35.681,0h0Z" transform="translate(-80 -296)" fill="#6E733F"/>
                </svg>
            </div>
            ' . $bedroomContent . '
        </div>';
  }
}

// 3. Sleeps Column
if (!empty($accommodationFactsHtml) && !empty($accommodationSleepsDetails)) {
  $accommodationFactsHtml .= '<div class="divider" aria-hidden="true"></div>';
}

if (!empty($accommodationSleepsDetails)) {
  $accommodationFactsHtml .= '
    <div class="fact">
        <div class="fact__icon">
            <svg id="people-icon-desktop" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 35.981 34.913">
                <path d="M177.99,291.866a8.088,8.088,0,1,1,6.072-2.361A8.219,8.219,0,0,1,177.99,291.866ZM160,309.913v-5.285a6.187,6.187,0,0,1,1.068-3.654,6.858,6.858,0,0,1,2.755-2.3,42.258,42.258,0,0,1,7.224-2.53,29.2,29.2,0,0,1,6.943-.843,27.973,27.973,0,0,1,6.915.871,47.027,47.027,0,0,1,7.192,2.513,6.79,6.79,0,0,1,2.822,2.3,6.172,6.172,0,0,1,1.062,3.645v5.285Zm3.373-3.373h29.234v-1.911a3.08,3.08,0,0,0-.534-1.715,3.384,3.384,0,0,0-1.321-1.209,29.852,29.852,0,0,0-6.578-2.389,29.09,29.09,0,0,0-6.184-.646,29.881,29.881,0,0,0-6.24.646,28.553,28.553,0,0,0-6.578,2.389,3.383,3.383,0,0,0-1.8,2.923Zm14.617-18.047a4.9,4.9,0,1,0-3.626-1.434A4.915,4.915,0,0,0,177.99,288.493ZM177.99,283.433ZM177.99,306.539Z" transform="translate(-160 -275)" fill="#6E733F"/>
            </svg>
        </div>
        <div class="fact__text">' . $accommodationSleepsDetails . '</div>
    </div>';
}

if (!empty($accommodationFactsHtml)) {
  $accommodationFacilityView = '
    <div class="accommodation-facts">
        <div class="container">
            <div class="facts-panel">
                ' . $accommodationFactsHtml . '
            </div>
        </div>
    </div>';
}

// Assign to sub-heading for top-of-page placement and ensure it's centered
$pageSubHeading = $accommodationFacilityView;
