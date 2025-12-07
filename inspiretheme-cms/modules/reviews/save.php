<?php

/** Save review data */

function saveItem (){

	global $id, $message, $do;

  $reviewData = [];

  $now = Helper::getCurrentDateTimeStr();

  $postedDate = validateInput('posted_on');

  $postedDate = (validateDate( $postedDate, 'd/m/Y' )) ? Helper::formateDate($postedDate) : null;

  $reviewData['person_name']     = validateInput('person_name');
  $reviewData['person_location'] = validateInput('person_location');
  $reviewData['date_posted']     = $postedDate;
  $reviewData['description']     = validateInput('description');
  $reviewData['date_updated']    = $now;
  $reviewData['updated_by']      = USER_ID;
  
  if (!empty($id)) {
   
    /** Update existing item data */
    DB::updateRow($reviewData, 'review', "WHERE id = '{$id}' LIMIT 1");

  } else {

    /** Add new item*/
    $reviewData['status']       = FLAG_HIDDEN;
    $reviewData['date_created'] = $now;
    $reviewData['created_by']   = USER_ID;  
  
    $id = DB::insertRow( $reviewData, 'review' );
   }
  
  $message = "Review has been saved";
  
}

?>