<?php
// ... (データベース接続処理)
$servername = "mysql";
$username = "user";
$password = "user";
$dbname = "myDatabaseName";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo 'seikou'

//   $email = $_POST['email'];
//   $password = $_POST['password'];
  
//   $sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
//   $result = $conn->query($sql);
  
//   if ($result->num_rows > 0) {
//     // Login successful, redirect to dashboard
//     header('Location: test.php');
//   } else {
//     echo "Invalid email or password";
//   }
//   $conn->close();

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>