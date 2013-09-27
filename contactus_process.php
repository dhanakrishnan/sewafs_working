<?php
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    require_once("include/phpmailer/class.phpmailer.php");
    require_once("include/registration_check.php");

    $name = trim($_POST['name']);
    $emailID = trim($_POST['emailID']);
    $message = trim($_POST['message']);

    $email_body = "";
    $email_body = $email_body . "Name : " . $name . "\n" . "<br />";
    $email_body = $email_body . "EmailID : " . $emailID . "\n" . "<br />";
    $email_body = $email_body . "Message : " . $message;

    //echo $email_body;

    //validate contact form

    if(!contactRequiredField($name, $emailID, $message))
    {
      header('Location:page_contact.php?status=blank');
        exit;
    }
    //require_once('../class.phpmailer.php');

    foreach ($_POST as $value)
    {
          if(stripos($value, 'Content-Type') != FALSE)
          {
            header("Location:page_contact.php?status=unexpected");
        exit;
      }
      }

      if($_POST["address"] != "")
      {
        header("Location:page_contact.php?status=unexpected");
      exit;
      }

      

    $mail             = new PHPMailer(); // defaults to using php "mail()"

    $mail->IsSMTP();                                      // set mailer to use SMTP
    $mail->Host = "mail.sewafs.org";  // specify main and backup server
    $mail->SMTPAuth = true;  
    //$mail->SMTPDebug = true;   // turn on SMTP authentication
    $mail->Username = "bayarea@sewafs.org";        // Make sure to replace this with your shell enabled user
    $mail->Password = "mail2SEWAFS";      // Make sure to use the proper password for your user

    if( !$mail->ValidateAddress($emailID))
    {
       header("Location:page_contact.php?status=invalidEmail");
       exit;
      }

    $mail->SetFrom('helpme@sewafs.org', 'Sewafs contact Page');
    //$mail->SetFrom($emailID, 'Sewafs contact Page');

    $address = "bayarea@sewafs.org";
    $mail->AddAddress($address, "Sewa Family Services");
    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);

    $mail->Subject    = "SewaFS Contact form submission | " . $name;

    $mail->MsgHTML($email_body);
    

    if(!$mail->Send()) {
      header("Location:page_contact.php?status=error");
      exit;
    }
    else {
      
        header("Location:page_contact.php?status=success");
      exit;
    }
    

    
  }

?>