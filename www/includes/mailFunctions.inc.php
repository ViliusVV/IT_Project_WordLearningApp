<?php

require 'stmpmailer/class/SMTPMailer.php';


function send_mail($sendTo, $mailContents)
{
    // Create object
    $mail = new SMTPMailer();

    // Configure STMP client
    $mail->server = 'mail.gmx.com';
    $mail->port   =  587;
    $mail->secure = 'tls';
    $mail->username = 'lisqrnd@gmx.com';
    $mail->password = 'BigBang0258';

    // Send to
    $mail->addTo($sendTo);

    // Mail title
    $mail->Subject('Žodžių mokymosi aplinka, suvestinė');

    // Mail contents
    $mail->Body($mailContents);

    return $mail->Send();
}

if(isset($_POST['content']))
{
    send_mail($_POST["email"], $_POST["content"]);
}

