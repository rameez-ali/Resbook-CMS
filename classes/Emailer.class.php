<?php

class Emailer
{
  public static function sendEmail($emailTags, $emailTemplate, $recipient, $sender)
  {
    require_once CLASS_DIR_PATH. "/PHPMailer.class.php";
    $emailBody = processTemplate($emailTemplate, $emailTags);

    if($sender)
    {
      $mail = new PHPMailer();
      $mail->IsHTML();
      $mail->AddReplyTo($sender);
      $mail->AddAddress($recipient);
      $mail->SetFrom($sender);
      $mail->FromName = $sender;
      $mail->Subject  = $emailTags['subject'];
      $mail->msgHTML($emailBody);
      if(!PRODUCTION_MODE)
      {
        // echo($mail->Body);
        $mail->Send();
        return true;
      }
      return $mail->Send();
    } else {
      return false;
    }
  }
}