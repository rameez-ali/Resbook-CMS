<?php
require_once __DIR__.DS.'config.php';


$smHeadingView = (empty($socialmediaHeading)) ? '' : '<h2 class="footer__heading">'.$socialmediaHeading.'</h2>';
$smHeadingView .= (empty($socialmediaDescription)) ? '' : '<p class="footer__text footer_shortdesc">'.$socialmediaDescription.'</p>';

$viewSocialMediaWidget = '';

if(!empty($arrSocialMedia)) {
  
  foreach ($arrSocialMedia as $socialMedia) {

    $socialName    = $socialMedia['name'];
    $socialTitle   = $socialMedia['title'];
    $socialIconCls = $socialMedia['icon_cls'];
    $socialImgpath = $socialMedia['icon_image_path'];
    $socialUrl     = $socialMedia['url'];
   
    $socialImgpath = (empty($socialImgpath)) ? '' : Helper::getFullUrl($socialImgpath);
    
    if (!empty($socialImgpath)) {

      $socialIcon = '<img data-src="'.$socialImgpath.'" alt="'.$socialTitle.'" class="social-icons__image lazy"/>';

    } elseif (!empty($socialIconCls)) {

      $socialIcon = '<i class="'. $socialIconCls.' social-icons__icon"></i>';
    
    }

    $viewSocialMediaWidget .= '<li class="social-icons__item">
        <a href="'.$socialUrl.'" class="social-icons__link" target=_blank title='.$socialName.'
        data-category="Social Media" data-action="'.$socialName.' Link" data-name="'.$socialUrl.' ">
          '.$socialIcon.'
        </a>
      </li>';

  }
}

if (!empty($viewSocialMediaWidget)) {
	
	$viewSocialMediaWidget = '<div>
		<ul class="social-icons">'.$viewSocialMediaWidget.'</ul>
	</div>';

}

$socialMediaContent = '';

if($viewSocialMediaWidget != '') {
  $socialMediaContent = '<div class="col-12 col-lg-4  footer__item"><div class="footer__content">
  '.$smHeadingView.$viewSocialMediaWidget.'</div></div>';
}

$templateTags['social_links'] = $socialMediaContent;


?>