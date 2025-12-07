<?php

/** QUICKLINKS COVER VIEW */

$viewQuicklinkItems = '';

if (!empty($arrQuicklinks)) {

  foreach ($arrQuicklinks as $itemIndex => $quicklink) {

    $quicklinkHeading             = $quicklink['heading'];
    $quicklinkUrl                 = $quicklink['url'];
    $quicklinkPhotoPath           = Helper::getFullUrl($quicklink['photo_path']);
    $quicklinkThumbPhotoPath      = Helper::getFullUrl($quicklink['thumb_photo_path']);
    $quicklinkPhotoAltText        = $quicklink['photo_alt_text'];
    $quicklinkDescription         = Helper::strTruncate($quicklink['description'], 250, '...');     
    $quicklinkDestId              = $quicklink['page_id'];
    $quicklinkDestUrl             = (empty($quicklink['page_url'])) ?  '' : Helper::getFullUrl($quicklink['page_url']);
    $quicklinkButtonText          = $quicklink['button_text'];

    $quicklinkFullUrl             = (empty($quicklinkUrl)) ? $quicklinkDestUrl : $quicklinkUrl;
    $quicklinkButtonText          = (empty($quicklinkButtonText)) ? 'READ MORE' : $quicklinkButtonText;

    $qlHasLink = !empty($quicklink['url']) || !empty($quicklink['page_id']);

    $qlImageBlockView = '<figure class="ql-cover__image col-12 col-md-6">
        '.(($qlHasLink) ? '<a href="'.$quicklinkFullUrl.'" class="ql-cover__image-link"
         data-category="Quicklink" data-action="Image Link" data-name="'.$quicklinkHeading.'">': '').'

          <img data-src="'.$quicklinkPhotoPath.'" alt="'.$quicklinkPhotoAltText.'" class="ql-cover__figure-img lazy"/>
        '.(($qlHasLink) ? '</a>': '').'
      </figure>';

    $qlHeadingView = '<h3 class="ql-cover__heading">
        '.(($qlHasLink) ? '<a href="'.$quicklinkFullUrl.'" class="ql-cover__heading-link"
         data-category="Quicklink" data-action="Title Link" data-name="'.$quicklinkHeading.'">': '').'
          '.$quicklinkHeading.'
        '.(($qlHasLink) ? '</a>': '').'
      </h3>';

    $qlButtonView = '';

    if ($qlHasLink) {

      $qlButtonView = '<p class="ql-cover__btn text-center">
        <a href="'.$quicklinkFullUrl.'" class="btn btn--primary m-t-20"
          data-category="Quicklink" data-action="Button Link" data-name="'.$quicklinkHeading.'">'.$quicklinkButtonText.'
          <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
            <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
          </svg>
        </a>
      </p>';
    }

    $qlDetailsBlockView = '<div class="ql-cover__details col-12 col-md-6 bg-grey">
        <div class="ql-cover__details-inner">
          '.$qlHeadingView.'
          <p class="ql-cover__text">'.$quicklinkDescription.'</p>
          '.$qlButtonView.'
        </div>  
      </div>';

    
    if ($itemIndex%2 == 0 ) {
      
      $quicklinkItemCls  = '';
      $quicklinkRowView = $qlImageBlockView.$qlDetailsBlockView;

    } else {

      $quicklinkItemCls  = 'ql-cover--odd';
      $quicklinkRowView = $qlDetailsBlockView.$qlImageBlockView;

    }

    $viewQuicklinkItems.= '<div class="row ql-cover '.$quicklinkItemCls.'">
      '.$quicklinkRowView.'
    </div>';

	}
}


if(!empty($viewQuicklinkItems)) {
  
  $templateTags['mod_view'] .= '<section class="section quicklinks bg-lightgrey">
      '.$qlSectionHeaderView.'  
      <div class="container container--fw">
      '.$viewQuicklinkItems.'
      </div>
    </div>
  </section>';
}  