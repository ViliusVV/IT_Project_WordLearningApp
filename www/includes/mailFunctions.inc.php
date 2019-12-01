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
    $mail->addTo('viliuxxs123@gmail.com');

    // Mail title
    $mail->Subject('PHP mail');

    // Mail contents
    $mail->Body($mailContents);

    return $mail->Send();
}

