<?php

/**
 * NETZONE CMS LOGIN MODULE.
 * File to process logout functionality
 * 
 * @package    NetZone Base CMS 2.0
 * @author     Brian Walker, Tomahawk Brand Management
 * @author     Sam Walsh, Tomahawk Brand Management
 * @author     Ton Jo Immanuel, Tomahawk Brand Management
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */


function doLogout()
{

  global $message, $isValidSession, $moduleContent;

  session_destroy();
  
  $isValidSession = FLAG_NO;
  
  $message = "You are successfully logged out now.";

  $moduleContent .= '<div class="alert alert-success">
        <strong>
          <i class="glyphicon glyphicon-ok-sign" 
            style="font-size:15px;vertical-align:text-top;margin:-2px 4px 0 0;"></i>
          '.$message.'
        </strong>
      </div>';
  
  Helper::redirect(ADMIN_BASE_URL);

}


