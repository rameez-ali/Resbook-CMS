<?php



require_once __DIR__.DS.'config.php';
require_once __DIR__ . '/inc/vars.php';

if ($mainPageId == $voucherImpPageId) {

	if(sanitizeInput('continue') === '1' && $formIsValid === true)
	{
		require_once __DIR__ . '/inc/insert_data.php';

		if ($process_payment) {
			require_once(__DIR__ . '/inc/payment_process/pxpay.php');
			send_info();
		  }

	
	} elseif(isset($_GET['result'])) {
    require_once(__DIR__ . '/inc/payment_process/pxpay.php');
    $donation_result = get_result_from_dps();


    if(isset($_GET['success'])) 
    {
      require_once(__DIR__ . '/views/form/success.php');
    }
    elseif(isset($_GET['error'])) 
    {       
      require_once(__DIR__ . '/views/form/error.php');
    }
  } else {

	require_once __DIR__ . '/views/form/form.php';

	// if($_SESSION['']){
	// 	require_once 'views/form/buy.php';
	// } else { 
	// 	require_once 'views/form/form.php';
	// }
	
	}

	/** CREATE PAGE CANONICAL TAGS*/
	$pageCanonicalTags   = '<link rel="canonical" href="'.$voucherPageFullUrl.'">';

}

$templateTags['mod_view'] .= $voucherFormView ?: '';