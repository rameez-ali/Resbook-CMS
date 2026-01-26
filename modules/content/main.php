<?php

$templateTags['page_main_content'] = '';
$templateTags['page_content'] = '';

/** Generate View for Page Main Content */

$pageHeadingView = (empty($pageHeading)) ? '' : '<h1 class="main__content-heading">' . $pageHeading . '</h1>';
$pageSubHeadingView = (empty($pageSubHeading)) ? '' : $pageSubHeading;
$pageIntroductionView = (empty($pageIntroduction)) ? '' : '<p class="main__content-intro">' . $pageIntroduction . '</p>';
$pageShortDescriptionView = (empty($pageShortDescription)) ? '' : '<div class="main__content-short-desc">' . $pageShortDescription . '</div>';
$pageContent = (empty($pageMetaDataId)) ? '' : getPageContent($pageMetaDataId);

if (
  !empty($pageHeadingView) ||
  !empty($pageSubHeadingView) ||
  !empty($pageIntroductionView) ||
  !empty($pageShortDescriptionView)
) {

  $templateTags['page_main_content'] = '<section class="section main__content section--no-bottom main__content-paddingtop text-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="main__content-inner">
              ' . $pageHeadingView . '
              ' . $pageSubHeadingView . '
              ' . $pageIntroductionView . '
              ' . $pageShortDescriptionView . '
            </div>
          </div>
        </div>
      </div>
    </section>';
}

if (!empty($pageContent)) {

  $templateTags['page_content'] = '<section class="section main__content section--main-content main__content-paddingbottom ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="main__content-wrapper">' . $pageContent . '</div>
        </div>
      </div>
    </div>
    </section>';
}