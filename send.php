<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "vastuprasadshivarkar@gmail.com"; // तुझा email add केला
    $full_subject = "Contact Form: " . $subject;

    $body = "First Name: $name\n";
    $body .= "Last Name: $lname\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    $headers = "From: $email";

    if(mail($to, $full_subject, $body, $headers)){
        echo "Message sent successfully!";
    } else {
        echo "Error sending message!";
    }
}
?>