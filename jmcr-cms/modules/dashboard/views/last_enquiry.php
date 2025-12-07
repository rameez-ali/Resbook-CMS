<?php

/** View for enquiry widget */

$lastEnquiryWidgetView = '';

$enquiry = fetchRow("SELECT `id`, 
    CONCAT(`first_name`, ' ', `last_name`) AS name,
    `date_added`
  FROM `form_entry`
  ORDER BY `date_added` DESC
  LIMIT 1");

$lastEnquiryWidgetView = '<h3>No enquiry has been made yet</h3>';

if ($enquiry) {

  $enquiryDate = $enquiryTime = 'N/A';

  $enquiryInd   = $enquiry['id'];
  $enquiryName  = $enquiry['name'];

  $enquiryUrl   = ADMIN_BASE_URL.'/index.php?do=forms';
  //$enquiryUrl   .= "&id={$enquiryInd}";

  if ($enquiry['date_added']) {

    $dateEnquired = $enquiry['date_added'];
    
    $enquiryDate = Helper::getDateTimeStr($dateEnquired, 'd F Y');
    $enquiryTime = Helper::getDateTimeStr($dateEnquired, 'h:i A');
    
  }

  $lastEnquiryWidgetView = '
    <p class="label-pair"><strong>Name:</strong> '.$enquiryName.'</p>
    <p class="label-pair"><strong>Date:</strong> '.$enquiryDate.'</p>
    <p class="label-pair"><strong>Time:</strong> '.$enquiryTime.'</p>
    <p class="label-pair">
      <strong><a href="'.$enquiryUrl.'">View all enquiries</a></strong>
    </p>';
}

$lastEnquiryWidgetView = '<div class="col-xs-6 col-md-4">
    <div class="dashboard-item">
      <header class="dheader">
        <span class="icon-holder">
          <span class="circle"></span>
          <i style="margin-left:-13px" class="glyphicon glyphicon-envelope"></i>
        </span>
        <h1>Latest enquiry</h1>
        <div class="clear"></div>
      </header>
      <div class="row">
        <div class="col-xs-12 ditem-body">
          '.$lastEnquiryWidgetView.'
        </div>
      </div>
    </div>
  </div>';
?>