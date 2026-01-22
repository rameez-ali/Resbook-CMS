<?php
/** QUICKLINKS BANNER VIEW - Three vertical panels side by side */

$viewQuicklinkItems = '';

if (!empty($arrQuicklinks)) {
	
	foreach ($arrQuicklinks as $quicklink) {
		
		$quicklinkHeading             = $quicklink['heading'];
		$quicklinkUrl                 = $quicklink['url'];
		$quicklinkPhotoPath           = Helper::getFullUrl($quicklink['photo_path']);
		$quicklinkThumbPhotoPath      = Helper::getFullUrl($quicklink['thumb_photo_path']);
		$quicklinkPhotoAltText        = $quicklink['photo_alt_text'];
		$quicklinkDescription         = Helper::strTruncate($quicklink['description'], 150, '...');     
		$quicklinkDestId              = $quicklink['page_id'];
		$quicklinkDestUrl             = (empty($quicklink['page_url'])) ?  '' : Helper::getFullUrl($quicklink['page_url']);
		$quicklinkButtonText          = $quicklink['button_text'];

		$quicklinkFullUrl             = (empty($quicklinkUrl)) ? $quicklinkDestUrl : $quicklinkUrl;
		$quicklinkButtonText          = (empty($quicklinkButtonText)) ? 'READ MORE' : $quicklinkButtonText;

		$qlHasLink = !empty($quicklink['url']) || !empty($quicklink['page_id']);

		$isMobileDevice = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
		$finalImage = $isMobileDevice ? $quicklinkThumbPhotoPath : $quicklinkPhotoPath;

		$qlButtonView = '';
		if ($qlHasLink) {
			$qlButtonView = '<a href="'.$quicklinkFullUrl.'" class="btn btn--primary ql-banner__btn" 
				data-category="Quicklink" data-action="Button Link" data-name="'.$quicklinkHeading.'">'.$quicklinkButtonText.'</a>';
		}

		$imageLinkView = '';
		if ($qlHasLink) {
			$imageLinkView = '<a href="'.$quicklinkFullUrl.'" class="ql-banner__link" 
				data-category="Quicklink" data-action="Image Link" data-name="'.$quicklinkHeading.'"></a>';
		}

		$viewQuicklinkItems .= '<div class="col-12 col-md-4 ql-banner__panel">
			<div class="ql-banner__panel-inner">
				'.$imageLinkView.'
				<figure class="ql-banner__figure">
					<img data-src="'.$finalImage.'" alt="'.$quicklinkPhotoAltText.'" class="ql-banner__image lazy" />
				</figure>
				<div class="ql-banner__overlay">
					<div class="ql-banner__content">
						<h3 class="ql-banner__heading">'.$quicklinkHeading.'</h3>
						'.(!empty($quicklinkDescription) ? '<p class="ql-banner__text">'.$quicklinkDescription.'</p>' : '').'
						
					</div>
				</div>
			</div>
		</div>';
	}
}

if(!empty($viewQuicklinkItems)) {
	
	$templateTags['mod_view'] .= '<section class="section quicklinks ql-banner">
		'.$qlSectionHeaderView.' 		
		<div class="ql-banner__wrapper">				 
			<div class="row no-gutters ql-banner__row">
				'.$viewQuicklinkItems.'
			</div>
		</div>
	</section>';
}
