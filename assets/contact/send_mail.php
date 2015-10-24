<?php
require 'PHPMailer/PHPMailerAutoload.php';

$host = 'YOUR_HOST';

$username = 'USERNAME@DOMAIN.com';

$password = 'YOUR_PASSWORD';

$send = false;

// Subject
$subject = addslashes(strip_tags($_POST['subject']));

// Name
$name = addslashes(strip_tags($_POST['name']));

// Email
$email = addslashes(strip_tags($_POST['email']));

// Message
$message = addslashes(strip_tags($_POST['message']));

// Services
$services = '';

if ( isset($_POST['services']) AND count($_POST['services']) > 0)
{
    $index = 1;
    
    foreach ( $_POST['services'] as $val)
    {
        $services .= ( $index == count($_POST['services'])) ? $val : $val . ', ';
        
        $index++;
    }
}
else
{
    $services .= '-';
}

// Project Class
if ( isset($_POST['project_class']) AND $_POST['project_class'] <> '')
{
    $project_class = addslashes(strip_tags($_POST['project_class']));
}
else
{
    $project_class = '-';
}

$htmlmessage = <<<MESSAGE
    <html>
    	<head>
            <title>$subject</title>
    	</head>
        
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong> $message</p>
            <p><strong>Services:</strong> $services</p>
            <p><strong>Project Class:</strong> $project_class</p>
        </body>
    </html>
MESSAGE;

$mail = new PHPMailer;
        
$mail->isSMTP();
// $mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = TRUE;
$mail->Host = $host;
// $mail->Port = '465';

$mail->Username = $username;
$mail->Password = $password;

$mail->From = $email;
$mail->FromName = $name;

// Add receive email address
$mail->addAddress($username);

$mail->isHTML(true);

$mail->Subject = $subject;

$mail->Body    = $htmlmessage;

// Send the message
if ( $mail->send()) 
{
    $send = true;
}

echo json_encode($send);