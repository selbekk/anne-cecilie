<?php
/*
    Booking.php

    A glorified contact form. No, not even glorified.

    Sends email.
*/

if( !isset($_POST['name'], $_POST['email'], $_POST['message']) ) {
    http_response_code(400);
    die();
}

// Let's set up some defaults;
$fromEmail = $_POST['email'];
$toEmail = 'ac.ukkelberg@gmail.com';
$subject = 'Melding fra websiden din!';
$fromName = $_POST['name'];

// Template for the email itself
$message = '<!DOCTYPE html><html><body>'.
            '<p><strong>Fra:</strong> '. $fromName .' <'. $fromEmail .'>'.
            '<p><strong>Melding:</strong></p>'.
            '<p>'. $_POST['message'] .'</p>'.
            '</body></html>';


// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Additional headers
$headers .= 'To: webmaster <'. $toEmail .'>' . "\r\n";
$headers .= 'From: '. $fromName .' <'. $fromEmail .'>' . "\r\n";

if(mail($toEmail, $subject, $message, $headers)) {
    http_response_code(200);
}
else {
    http_response_code(500);
}




?>
