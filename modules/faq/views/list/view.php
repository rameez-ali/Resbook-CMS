<?php

if (!empty($arrFaqs)) {

  foreach ($arrFaqs AS $faq) {
			
    $question = $faq['question'];
    $answer   = nl2br((string) $faq['answer']);

    $pageFaqContent .= '
        <div class="col-12 faq">
          <div class="faq__head">
            <p class="faq__title">
              '.$question.'
            </p>
          </div>
          <div class="faq__body">
            <p class="faq__content">'.$answer.'</p>
          </div>
        </div>';
  }

  if (!empty( $pageFaqContent)) {

    $templateTags['mod_view'] .='<section class="section faq-list">
        <div class="container">
          <div class="row justify-content-center">
            '.$pageFaqContent.'
          </div>
        </div>
      </section>';
  }
}

?>