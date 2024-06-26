<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to the Composer autoload file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mailxshutters@gmail.com'; // Your Gmail address
        $mail->Password = '123456789@Dk'; // Your Gmail password or app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('mailxshutters@gmail.com', 'Mailer');
        $mail->addAddress('dineshkorukonda05@gmail.com'); // Your client's email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Message from Murthy Shutters Contact Form";
        $mail->Body    = "You have received a new message from your website contact form.<br><br>" .
                        "Name: $name<br>" .
                        "Email: $email<br>" .
                        "Subject: $subject<br>" .
                        "Message:<br>$message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
