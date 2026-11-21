<?php
// message.php
$message = $_GET["msg"] ?? "Submission complete.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Status Message</title>
</head>
<body>
  <p><?php echo htmlspecialchars($message, ENT_QUOTES, "UTF-8"); ?></p>
  <a href="index.php">Back to form</a>
</body>
</html>