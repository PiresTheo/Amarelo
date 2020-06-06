<?php
$to      = 'theopires99@gmail.com';
$subject = 'Amarelo Contact - '.$_POST['name'];
$message = $_POST['message'];
$headers = array(
    'From' => $_POST['email'],
    'Reply-To' => $_POST['email'],
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);
header('Location: http://127.0.0.1/Amarelo');
?>