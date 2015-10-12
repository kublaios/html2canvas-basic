<?php
// required phpmailer files
require_once 'phpmailer/class.phpmailer.php';
require_once 'phpmailer/class.smtp.php';

// turn error mode on
ini_set('display_errors', 'on');

// Get the base-64 string from data
$filteredData = substr($_POST['img_val'], strpos($_POST['img_val'], ',') + 1);

// Decode the string
$unencodedData = base64_decode($filteredData);

// Save the image
file_put_contents('img.png', $unencodedData);

// prepare the mail
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host     = 'smtp.gmail.com';
$mail->Port     = 587;
$mail->SMTPSecure = 'tls';

// set credentials and meta
$mail->Username = 'username@gmail.com';
$mail->Password = 'secret';
$mail->SetFrom('username@gmail.com', 'Sender Alias');
$mail->FromName = 'Sender Name';
$mail->AddAddress('receiver@gmail.com');
$mail->IsHTML(true);
$mail->CharSet  = 'UTF-8';
$mail->Subject = 'Test mail';

// attach screenshot as embedded image
$mail->AddEmbeddedImage('img.png', 'attachment', 'img.png');
$mail->Body = 'Embedded Image: <img alt="Screenshot" src="cid:attachment"> This is the screenshot';

// send the mail
if($mail->Send()) {
    echo 'true';
} else {
    echo $mail->ErrorInfo;
}

// finally, delete the image
unlink('img.png');
