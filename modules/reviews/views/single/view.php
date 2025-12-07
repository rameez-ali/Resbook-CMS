<?php
/** Show single review */
$sqlreview ="SELECT r.`id`,
    r.`person_name`,
    r.`person_location`,
    r.`description`,
    r.`date_posted`,
    r.`rank`
  FROM `review` r
  WHERE r.`status` = '".FLAG_ACTIVE."'
  AND r.`description` != ''
  ORDER BY {$orderBy}
  LIMIT 1";
  
$arrReview = DB::fetchRow($sqlreview);

if (!empty($arrReview)) {

  $reviewPersonName  = $arrReview['person_name'];
  $reviewLocation    = $arrReview['person_location'];
  $reviewDetail      = $arrReview['description'];
  $reviewPhotoPath   = Helper::getFullUrl($arrReview['photo_path']);
  
  $reviewPersonName  .= (($reviewLocation) ? ", {$reviewLocation}" : '');

  $reviewDetail = Helper::strTruncate($reviewDetail, 300, '...', true, false);
  
  $pageReviewsContent = '
		<section class="section review'.$reviewsSectionBgClass.'" '.$reviewsSectionBg.'>
			<div class="container">
        <div class="row justify-content-center">
          '.$reviewsSectionHeading.'
          <div class="col-11 text-center">
            <div class="review__wrapper">
              <div class="review__item">
                <p class="review__item-content">'.$reviewDetail.'</p>
                <p class="review__item-person">'.$reviewPersonName.'</p>			
              </div>
            </div>
						'.$reviewsSectionButton.'
					</div>
				</div>
			</div>
    </section>';
    
  $templateTags['footer_review']  = $pageReviewsContent;
}
?>