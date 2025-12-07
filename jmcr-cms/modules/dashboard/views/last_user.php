<?php

/** View for last user loggedin widget */

$lastUserWidgetView = '';


if(isset($_SESSION['last_user_loggedin']))
{
  $lastUser     = $_SESSION['last_user_loggedin'];

  $lastUserInd  = $lastUser['user_id'];
  $lastUserName = $lastUser['full_name'];

  $lastUserProf = ADMIN_BASE_URL.'/index.php?do=users&action=edit';
  $lastUserProf .= "&id={$lastUserInd}";

  $userLoginDate = $lastUser['last_login_date'];

  $lastLoginDate = Helper::getDateTimeStr($userLoginDate, 'd F Y');
  $lastLoginTime = Helper::getDateTimeStr($userLoginDate, 'h:i A');

  $lastUserWidgetView = '
    <div class="col-xs-6 col-md-4">
      <div class="dashboard-item">
        <header class="dheader">
          <span class="icon-holder">
            <span class="circle"></span>
            <i class="glyphicon glyphicon-user" style="margin-left:-13px"></i>
          </span>
          <h1>Last logged in user</h1>
          <div class="clear"></div>
        </header>
        <div class="row">
          <div class="col-xs-12 ditem-body" style="min-height:117px;">
            <p class="label-pair">
              <strong>Username:</strong> '.$lastUserName.'
            </p>
            <p class="label-pair">
              <strong>Date:</strong> '.$lastLoginDate.'
            </p>

            <p class="label-pair">
              <strong>Time:</strong> '.$lastLoginTime.'
            </p>
            <p class="label-pair">
              <strong>
                <a href="'.$lastUserProf.'">View profile</a>
              </strong>
            </p>
          </div>
        </div>
      </div>
    </div>';
}

?>