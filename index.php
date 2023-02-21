<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
use \Swift_SmtpTransport;
// SMTP configuration
$smtpHost = 'smtp.gmail.com';
$smtpPort = 587;
$smtpUsername = 'example@gmail.com';
$smtpPassword = 'your password';

//Remember to set up your account to allow app password in gmail




// SMTP configuration
// Create SMTP transport
$transport = (new Swift_SmtpTransport($smtpHost, $smtpPort, 'tls'))
  ->setUsername($smtpUsername)
  ->setPassword($smtpPassword);

// Email content
$to = 'markbmugo@gmail.com';
$subject = 'Test email';
$message = 'This is a test email sent using SMTP in PHP.';



// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create the message
$message = (new Swift_Message($subject))
  ->setFrom([$smtpUsername => 'Your Name'])
  ->setTo([$to])
  ->setBody($message);

// Send the message
$result = $mailer->send($message);

// Check if the email was sent successfully
if ($result) {
  echo 'Email sent successfully.';
} else {
  echo 'Error: Email was not sent.';
}
?>
