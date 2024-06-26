<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Replace with your client's email address
    $to = "client@example.com";
    $email_subject = "New Message from Murthy Shutters Contact Form";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message";

    // Set headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
} else {
    echo "Error: Form submission method not allowed.";
}
?>
