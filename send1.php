<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    // Check if the "email" field is set in the form submission
    if (isset($_POST["email"])) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ds.perera.test@gmail.com';
        $mail->Password = 'ycfdgqfhinumrzjx';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('rehat-sumit@hsenid.com');
        $mail->addAddress('darshana.saluka.pc@gmail.com'); // Add recipient's email address here
        $mail->isHTML(true);

        $mail->Subject = "E-Survey data - " . $_POST["name"];
        $mail->Body = "Name: " . $_POST["name"] . "<br>"
            . "Email: " . $_POST["email"] . "<br>"
            . "Phone: " . $_POST["phone"] . "<br>"
            . "Company: " . $_POST["company"] . "<br>"
            . "Role: " . $_POST["role"] . "<br>"
            . "Country: " . $_POST["country"];
            
        try {
            $mail->send();
            echo "
            <script>
            document.location.href = 'index.html';
            </script>";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        echo "Email field not found in the form submission.";
    }
}
