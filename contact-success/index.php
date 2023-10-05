<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $phone = $_POST["contact-phone"];
    $message = $_POST["message"];

    // Validate data
    if (empty($firstName) || empty($lastName) || empty($email) || empty($message)) {
        echo json_encode(["success" => false]);
        exit;
    }

    // Sanitize data to prevent SQL injection
    $firstName = htmlspecialchars($firstName);
    $lastName = htmlspecialchars($lastName);
    $email = htmlspecialchars($email);
    $phone = htmlspecialchars($phone);
    $message = htmlspecialchars($message);

    // Compose and send email
    $to = "sizu1124@gmail.com"; // Replace with your email address
    $subject = "Contact Form Submission from $firstName $lastName";
    $messageBody = "Name: $firstName $lastName\n";
    $messageBody .= "Email: $email\n";
    $messageBody .= "Phone: $phone\n";
    $messageBody .= "Message:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $messageBody, $headers)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
