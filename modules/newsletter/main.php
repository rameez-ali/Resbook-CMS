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
					<button type="submit" id="newsletter-btn">Sign Up</button>
				</div>
				<p class="newsletter__msg">&nbsp;</p>
			</form>
		</div></div>';

	}

?>