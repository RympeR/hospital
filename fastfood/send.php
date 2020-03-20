<?php
$to      = 'georg.rashkov@gmail.com';
$subject = 'form';
$message = 'Name: '.$_POST["your-name"].' Email: '.$_POST['your-email'].' Subject: '.$_POST['your-subject'].' Message: '.$_POST['your-message'];
$headers = 'georg.rashkov@gmail.com';

mail($to, $subject, $message, $headers);
?>