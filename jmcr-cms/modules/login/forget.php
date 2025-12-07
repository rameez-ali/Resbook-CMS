<?php

function doForget()
{
  global $pageHeading, $moduleContent, $loginCls, $message, $action;

  require_once __DIR__ . '/forget_form.php';
  require_once __DIR__ . '/forget_reset.php';

  $pageHeading = "Forget Password";

  $rawEmail       = requestVar('email-address');
  $isValidCaptcha = Helper::validateImageCaptcha();

  match ($action) {
      'request' => displayForgetView(),
      'process-retrieve' => processRetrieveRequest($rawEmail, $isValidCaptcha),
      'reset' => displayResetView(),
      'process-reset' => processResetRequest(),
      default => displayForgetView(),
  };
}
