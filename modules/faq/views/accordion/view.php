<?php

if (!empty($arrFaqs)) {

  foreach ($arrFaqs AS $key => $faq) {
		
    $question = $faq['question'];
    $answer   = nl2br((string) $faq['answer']);

    $pageFaqContent .= '
        <div class="col-12 faq ">
          <div class="faq__head">
            <p class="faq__title">
            <a href="#faq-'.$key.'" class="faq__link" data-category="FAQs"
            data-action="FAQ Link" data-name="'.$question.'">
                <i class=" faq__link-icon arrow-up"></i>
                '.$question.'
              </a>
            </p>
          </div>
          <div id="faq-'.$key.'" class="faq__body">
            <p class="faq__content">'.$answer.'</p>
          </div>
        </div>';
  }

  if (!empty( $pageFaqContent)) {

    $templateTags['mod_view'] .='<section class="section faq-accordion">
        <div class="container">
          <div class="row justify-content-center">
            '.$pageFaqContent.'
          </div>
        </div>
      </section>';
  }
}

?>