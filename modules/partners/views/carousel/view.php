<?php

$sqlPartners = "SELECT `id`,
    `name`,
    `menu_label`,
    `logo_path`,
    `alt_text`,
    `url`,
    `status`,
    `rank`
  FROM `partnership_logo`
  WHERE `status` = '".FLAG_ACTIVE."'
    AND `logo_path` != ''
  ORDER BY `rank` ASC";

  $partners = DB::fetchAll($sqlPartners);


  if (!empty($partners)) {

    $partnerLogoView = '';

    foreach ($partners AS $partner) {

      $imgSrc  = $partner['logo_path'];
      $imgSrc  = (empty($imgSrc)) ? '': Helper::getFullUrl($imgSrc);
      $altText = $partner['alt_text'];
      $url     = $partner['url'];
      
      $logoItem = '<img data-lazy="'.$imgSrc.'" alt="'.$altText.'" class="partner-logo__image">';

      if (!empty($url)) {

        $logoItem = '<a href="'.$url.'" class="partner-logo__link" target="_blank" rel="external"
           data-category="Partners" data-action="Partner Link" data-name="'.$altText.'">'.$logoItem.'</a>';

      }

      $partnerLogoView .= '<figure class="partner-logo__item justify-content-center">
          '.$logoItem.'
        </figure>';

    }

    if (!empty($partnerLogoView)) {

      $templateTags['partner_view'] .= '<section class="section section__partner">
        <div class="container container--fw">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="partner-logo">
              '.$partnerLogoView.'
              </div>
            </div>
          </div>
        </div>
      </section>';

    }

  }