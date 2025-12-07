<?php
$contactSectionContent = '';
$errorCls             = ' has-error';

$firstNameErrorCls    = ($firstNameError) ? $errorCls : '';
$lastNameErrorCls     = ($lastNameError) ? $errorCls : '';
$emailAddressErrorCls = ($emailAddressError) ? $errorCls : '';
$subjectErrorCls      = ($subjectError) ? $errorCls : '';
$messageErrorCls      = ($messageError) ? $errorCls : '';
$captchaErrorCls      = ($captchaError) ? $errorCls : '';

$templateTags['script_ext']  .= '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';

if ($contactPhoneNumber) {
    $contactSectionContent .= '<p class="contact contact--phone">Phone:'.$contactPhoneNumber.'</p>';
} elseif ($contactFreePhoneNumber) {
    $contactSectionContent .= '<p class="contact contact--phone">Phone:'.$contactFreePhoneNumber.'</p>';
}


$contactFormView .= '<p>
    <span class="text-danger">*</span> indicates required fields
  </p>
  <form action="'.$contactPageFullUrl.'" method="post" role="form" class="contact__form">
    <div class="form__group form__group--half'.$firstNameErrorCls.'">
      <label class="form__label" for="first-name">First Name<span class="text-danger">*</span></label>
      <input type="text" id="first-name" value="'.$firstName.'" class="form__control" name="first-name" tabindex="1">
      '.$firstNameErrorMsg.'
    </div>
    <div class="form__group form__group--half'.$lastNameErrorCls.'">
      <label class="form__label" for="last-name">Last Name<span class="text-danger">*</span></label>
      <input type="text" id="last-name" value="'.$lastName.'" class="form__control" name="last-name" tabindex="2">
      '.$lastNameErrorMsg.'
    </div>
    <div class="form__group form__group--half'.$emailAddressErrorCls.'">
      <label class="form__label" for="email-address">Email<span class="text-danger">*</span></label>
      <input type="email" id="email-address" value="'.$emailAddress.'" 
        class="form__control" name="email-address" tabindex="3">
      '.$emailAddressErrorMsg.'
    </div>
    <div class="form__group form__group--half">
      <label class="form__label" for="contact-number">Phone/Mobile</label>
      <input type="tel" id="contact-number" class="form__control" value="'.$contactNumber.'" name="contact-number"
       tabindex="4">
    </div>
    <div class="form__group">
      <label class="form__label" for="subject">Subject</label>
      <input id="subject" class="form__control" value="'.$subject.'" name="subject" tabindex="5">
    </div>
    <div class="form__group '.$messageErrorCls.'">
      <label class="form__label" for="message">Message<span class="text-danger">*</span></label>
      <textarea name="message" id="message" class="form__control" tabindex="6" rows="6">'.$message.'</textarea>
      '.$messageErrorMsg.'
    </div>
    <div class="form__group '.$captchaErrorCls.'">
      <label class="form__label"></label>
      <div class="controls">
        <div class="g-recaptcha" data-sitekey="'.$gcSiteKey.'"></div>
        <span class="help-inline text-danger">'.$captchaErrorMsg.'</span>
      </div>
    </div>
    <div class="form__group">
      <button type="submit" class="btn btn--primary" name="continue" value="1" tabindex="8">Submit</button>
    </div>
  </form>';

$contactFormView = '<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 col-lg-8">
      <h2 class="form__heading">'.$contactFormText.'</h2>
        '.$contactFormView.'    
      </div>                    
    </div>
  </div>
</section>';