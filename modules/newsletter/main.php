<?php

require_once __DIR__.DS.'config.php';

$nlHeadingView = (empty($newsletterHeading)) ? '' : '<h2 class="footer__heading">'.$newsletterHeading.'</h2>';
// $nlCaptionView = (empty($newsletterDescription)) ? '' : '<p class="footer__text">'.$newsletterDescription.'</p>';

if (!empty($mailchimpApiKey) && !empty($mailchimpListId)) {
	
	$templateTags['newsletter_view'] = ' <div class="col-12 col-xl-5 offset-xl-1 col-lg-4 footer__item"><div class="footer__content">
			'.$nlHeadingView.'
			<form action="#" class="form newsletter">
				<div class="form__group">
					<input type="email" class="form__control" id="newsletter-email" placeholder="Enter your email">
					<button type="submit" id="newsletter-btn">Sign Up<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon ml-2">
					<path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="currentColor"/>
				  </svg></button>
				</div>
				<p class="newsletter__msg">&nbsp;</p>
			</form>
		</div></div>';

	}

?>