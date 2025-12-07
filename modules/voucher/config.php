<?php

/** Identify module for Settings */
$modName         = 'Voucher';

$voucherSettings = ModuleSettings::fetchSettings($modName);

if (!empty($voucherSettings)) {

  /** define vars */
  $voucherImpPageId     = $voucherSettings['imp_page'];

  $impPageVoucher     = DBHelper::fetchImpPageData($voucherImpPageId);

  $vDetails = DB::fetchRow("SELECT * FROM `voucher_settings`");

  $adminVoucherEmail     = $vDetails['notification_email_address'];
  $voucherSuccessMessage = $vDetails['success_payment_message'];
  $voucherErrorMessage = $vDetails['fail_payment_message'];
  $voucherTerms          = $vDetails['terms_and_cond'];
  $voucherAmt          = $vDetails['voucher_amount'];
  $voucherSurchargeText  = $vDetails['surcharge_text'];
}