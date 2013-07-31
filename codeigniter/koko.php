<?php
$to = 'djothi.grondin@live.fr';

$subject = 'From XSP';

$headers = "From: Djothi \r\n";
$headers .= "Reply-To: K0ko \r\n";
$headers .= "CC: lil.j-974@hotmail.fr \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$message = '<html><body>';
$message .= '<h1>Hello, World!</h1>';
$message .= '</body></html>';


mail($to, $subject, $message, $headers);
?>
