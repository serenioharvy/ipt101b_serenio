<?php
session_start();
session_destroy(); // destroy all sessions
header("Location: login.php"); // redirect to the login page
exit;
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logout Form</title>
</head>
<body>
  <h1>Are you sure you want to log out?</h1>
  <form action="logout.php" method="POST">
    <button type="submit">Logout</button>
  </form>
</body>
</html>
