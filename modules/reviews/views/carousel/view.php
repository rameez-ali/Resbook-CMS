<?php
/** Review to showcase in carousel format */

$sqlreviews = "SELECT r.`id`,
	    r.`person_name`,
	    r.`person_location`,
	    r.`description`,
	    r.`date_posted`,
	    r.`rank`
	FROM `review` r
	WHERE r.`status` = '".FLAG_ACTIVE."'
  ORDER BY {$orderBy}
  LIMIT {$rsCount}";

$arrReviews = DB::fetchAll($sqlreviews);

if ($arrReviews) {		

	foreach ($arrReviews as $review) {

		$reviewPersonName  = $review['person_name'];
		$reviewLocation    = $review['person_location'];
		$reviewDetail      = $review['description'];
    
    $reviewPersonName  .= (($reviewLocation) ? ", {$reviewLocation}" : '');

    $reviewDetail = Helper::strTruncate($reviewDetail, 300, '...', true, false);
  
		$pageReviewsContent .='<div class="review__wrapper slick-slide-review">
				<div class="review__item review-carousel__item review-bg">
					<p class="review__item-content">'.$reviewDetail.'</p>
					<p class="review__item-person">'.$reviewPersonName.'</p>
				</div>
			</div>';
	}
	
	$pageReviewsContent = '<section class="section '.$reviewsSectionBgClass.'" '.$reviewsSectionBg.'>
			<div class="container container--fw review featured-review">
				<div class="row justify-content-center">
					'.$reviewsSectionHeading.'
					<div class="col-12 text-center">
						<div class="review__carousel">
							'.$pageReviewsContent.'
            </div>
            '.$reviewsSectionButton.'
			 		</div>
			 	</div>
			</div>
    </section>';
    if(empty($templateTags['custom_code'])) {
		$templateTags['footer_review'] .= $pageReviewsContent;
	}

}
?>