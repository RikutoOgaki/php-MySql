<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Welcome!</h2>
<p>You are logged in.</p>
<a href="/sample">API</a>
<a href="logout.php">Logout</a>
</body>
</html>
