<?php
  require_once("include/phpmailer/class.phpmailer.php");

  function send_emailto_the_volunteer($emailID, $email_body)
  {
    $mail             = new PHPMailer(); // defaults to using php "mail()"

      $mail->IsSMTP();                                      // set mailer to use SMTP
      $mail->Host = "mail.sewafs.org";  // specify main and backup server
      $mail->SMTPAuth = true;  
      //$mail->SMTPDebug = true;   // turn on SMTP authentication
      $mail->Username = "bayarea@sewafs.org";        // Make sure to replace this with your shell enabled user
      $mail->Password = "mail2SEWAFS";      // Make sure to use the proper password for your user

      if( !$mail->ValidateAddress($emailID))
      {
         header("Location:page_volunteer_registration.php?status=invalidEmail");
         exit;
        }

      $mail->SetFrom('helpme@sewafs.org', 'Sewafs contact Page');
      //$mail->SetFrom($emailID, 'Sewafs contact Page');

      $address = $emailID;
      $mail->AddAddress($address, "Sewa Family Services");
      $mail->WordWrap = 50;                                 // set word wrap to 50 characters
      $mail->IsHTML(true);

      $mail->Subject    = "SewaFS Contact form submission | " . $name;

      $mail->MsgHTML($email_body);
      

      if(!$mail->Send()) {
        //header("Location:page_volunteer_registration.php?status=error");
        echo "Mailer Error: " . $mail->ErrorInfo;
        
      }
      
  }

  function commaSeparatedString($array)
  {
    $arrayStr = "";
    if(sizeof($array) != 0) 
    {
      $length = sizeof($array);

      for($i=0; $i<$length-1; $i++)
      {
        $arrayStr = $arrayStr . $array[$i] .", ";
      }
      $arrayStr = $arrayStr . $array[$i];
    }
    return $arrayStr;
  }

?>
