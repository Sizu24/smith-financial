<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $formSubmitPath = $_SERVER['DOCUMENT_ROOT'] . "/formSubmit.php";

    // Check CSRF token
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        http_response_code(400); // Bad Request
        echo json_encode(["success" => false, "error" => "CSRF token validation failed"]);
        exit;
    }
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
        include $formSubmitPath;
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
