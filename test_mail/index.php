<?php
    require("./mailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP(); // send via SMTP
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = "hr@internship-uk.com"; // SMTP username
    $mail->Password = "2Access4Hr2013"; // SMTP password
    $webmaster_email = ""; //Reply to this email ID (from, sender)
    $email="akr.geo@gmail.com"; // Recipients email ID
    $name="Kikoo Malaka"; // Recipient's name
    $mail->From = $webmaster_email;
    $mail->FromName = "Travel"; //Name to display for from:
	//for ($i=0; $i<30; $i++)     
		$mail->AddBcc($email,$name);// how many time you want
		$mail->AddBcc("bazirehoussin@gmail.com");
    //$mail->AddAddress("myfriend@example.net","Friend's name");
	//$mail->AddAddress("myfriend@example.net");
    $mail->AddReplyTo($webmaster_email,"Webmaster");//name of the sender
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = "This is the subject";
    $mail->Body = "<html><body><h1>Hello world</h1></body></html>"; //HTML Body
    $mail->AltBody = "This is the body when user views in plain text format"; //If the recipients disable the html tag reading
    if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent";
    }
    ?>
