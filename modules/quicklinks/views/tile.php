<?php
/** QUICKLINKS ICON GRID VIEW */

$viewQuicklinkItems = '';

if (!empty($arrQuicklinks)) {

	foreach ($arrQuicklinks as $quicklink) {
		
		$quicklinkHeading             = $quicklink['heading'];
		$quicklinkUrl                 = $quicklink['url'];
		$quicklinkPhotoPath           = Helper::getFullUrl($quicklink['photo_path']);
		$quicklinkThumbPhotoPath      = Helper::getFullUrl($quicklink['thumb_photo_path']);
		$quicklinkPhotoAltText        = $quicklink['photo_alt_text'];
		$quicklinkDescription         = $quicklink['description'];
		$quicklinkDestId              = $quicklink['page_id'];
		$quicklinkDestUrl             = (empty($quicklink['page_url'])) ?  '' : Helper::getFullUrl($quicklink['page_url']);
		$quicklinkButtonText          = $quicklink['button_text'];

		$quicklinkFullUrl             = (empty($quicklinkUrl)) ? $quicklinkDestUrl : $quicklinkUrl;
		$quicklinkButtonText          = (empty($quicklinkButtonText)) ? 'READ MORE' : $quicklinkButtonText;

		$qlHasLink = !empty($quicklink['url']) || !empty($quicklink['page_id']);

    $qlButtonView = '';

      $qlButtonView = '<p class="ql__icon__cta pl-4">
        <a href="'.$quicklinkFullUrl.'" class="btn btn--sm card__btn"
					data-category="Quicklink" data-action="Button Link" data-name="'.$quicklinkHeading.'">'.$quicklinkButtonText.'
					<svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
          <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
        </svg>
        </a>
      </p>';

      $imageLinkView = '<a href="'.$quicklinkFullUrl.'" class="ql__icon__heading-link" data-category="Quicklink" data-action="Title Link" data-name="'.$quicklinkHeading.'">
      	<img data-src="'.$quicklinkPhotoPath.'" alt="'.$quicklinkPhotoAltText.'" class=" ql__tile__figure-image lazy" />
	  </a>';

		$viewQuicklinkItems .= '<div class="col-12 col-lg-4 card ql_tile card--with-shadow">
		<div class="card__inner ql_tile_inner">
			<figure class="card__figure ql_tile_figure">
				'.$imageLinkView.'
			</figure>

			<div class="card__content ql_tile_content pl-4">
				<div class="card__content-inner ql_tile_content-inner">
				<h5 class="card__heading ql_tile_heading">
					<a href="'.$quicklinkFullUrl.'" data-category="Highlight"
					data-action="Title Link" data-name="'.$quicklinkHeading.'">
					'.$quicklinkHeading.'
					</a>
				</h5>                    
				<p class="card__text ql_tile_desc">'.$quicklinkDescription.'</p>
				</div>            
			</div>
				'.$qlButtonView.'
			</div>
		</div>';
	}

}

if(!empty($viewQuicklinkItems)) {

	$templateTags['mod_view'] .= '<section class="section quicklinks ql_tile bg-lightgrey">
			'.$qlSectionHeaderView.' 		
			<div class="container container--fw ql-icon-wrapper pt-3">				 
				<div class="row justify-content-center">
					'.$viewQuicklinkItems.'
				</div>
			</div>
		</section>';
}
