<?php
/** QUICKLINKS DEFAULT GRID VIEW */

$viewQuicklinkItems = '';

if (!empty($arrQuicklinks)) {
	
	foreach ($arrQuicklinks as $quicklink) {
		
		$quicklinkHeading             = $quicklink['heading'];
		$quicklinkUrl                 = $quicklink['url'];
		$quicklinkPhotoPath           = Helper::getFullUrl($quicklink['photo_path']);
		$quicklinkThumbPhotoPath      = Helper::getFullUrl($quicklink['thumb_photo_path']);
		$quicklinkPhotoAltText        = $quicklink['photo_alt_text'];
		$quicklinkDescription         = Helper::strTruncate($quicklink['description'], 80, '...');     
		$quicklinkDestId              = $quicklink['page_id'];
		$quicklinkDestUrl             = (empty($quicklink['page_url'])) ?  '' : Helper::getFullUrl($quicklink['page_url']);
		$quicklinkButtonText          = $quicklink['button_text'];

		$quicklinkFullUrl             = (empty($quicklinkUrl)) ? $quicklinkDestUrl : $quicklinkUrl;
		$quicklinkButtonText          = (empty($quicklinkButtonText)) ? 'READ MORE' : $quicklinkButtonText;

		$qlHasLink = !empty($quicklink['url']) || !empty($quicklink['page_id']);

    $qlButtonView = '';

    if ($qlHasLink) {

      $qlButtonView = '<p class="ql__card__cta">
        <a href="'.$quicklinkFullUrl.'" class="btn btn--ghost-white ql__card__btn" data-category="Quicklink" data-action="Button Link" data-name="'.$quicklinkHeading.'" aria-label="Find out more - '.$quicklinkHeading.'">'.$quicklinkButtonText.'</a>
      </p>';

	  $isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	  $finalImage = $isMobileDevice ? $quicklinkThumbPhotoPath : $quicklinkPhotoPath;

      $imageLinkView = '<a href="'.$quicklinkFullUrl.'" class="ql__card__heading-link" data-category="Quicklink" data-action="Title Link" data-name="'.$quicklinkHeading.'"></a>
      <img data-src="'.$finalImage.'" alt="'.$quicklinkPhotoAltText.'" class="ql__card__figure-image lazy" />';
    }else {
      $imageLinkView = '';
    }

		$viewQuicklinkItems .= '<div class="col-12 col-lg-4 card ql__card ql__card--with-shadow">
				<div class="ql__card__inner">
					<figure class="ql__card__figure">
					'.$imageLinkView.'
					</figure>
					<div class="ql__card__content">
					<h3 class="ql__card__heading pl-5">
								'.$quicklinkHeading.'
					</h3>
					<div class="ql__card__content-inner">
						<p class="ql__card__text">'.$quicklinkDescription.'</p>
						'.$qlButtonView.'
					</div>         
					</div>
				</div>
			</div>';
	}

}

if(!empty($viewQuicklinkItems)) {
	
	$templateTags['mod_view'] .= '<section class="section quicklinks ql__default bg-lightgrey pt-3 pb-3">
			'.$qlSectionHeaderView.' 		
			<div class="container container--fw">				 
				<div class="row justify-content-center">
					'.$viewQuicklinkItems.'
				</div>
			</div>
		</section>';
}
