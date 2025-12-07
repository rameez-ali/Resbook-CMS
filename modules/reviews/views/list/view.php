<?php
/** Show all active reviews */

$sqlreviews ="SELECT r.`id`,
	    r.`person_name`,
	    r.`person_location`,
	    r.`description`,
	    r.`date_posted`,
	    r.`rank`
	FROM `review` r
	WHERE r.`status` = '".FLAG_ACTIVE."'
	ORDER BY r.`rank`";

$arrReviews = DB::fetchAll($sqlreviews);

if ($arrReviews) {		

	foreach ($arrReviews as $review) {

		$reviewPersonName  = $review['person_name'];
		$reviewLocation    = $review['person_location'];
		$reviewDetail      = $review['description'];
    
    $reviewPersonName  .= (($reviewLocation) ? ", {$reviewLocation}" : '');
		
		$pageReviewsContent .='<div class="review__item">
				<p class="review__item-content">'.$reviewDetail.'</p>
				<p class="review__item-person text-uppercase">'.$reviewPersonName.'</p>			
			</div>';
	}
	
	$pageReviewsContent = '<section class="section review review--list text-center pb-4">
			<div class="container">
				<div class="row">
					<div class="col-12">
						'.$pageReviewsContent.'
					</div>
			 	</div>
			</div>
    </section>';
    
  $templateTags['mod_view'] .= $pageReviewsContent;

}

?>