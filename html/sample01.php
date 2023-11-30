<?php
$servername = "mysql"; // Docker Composeで設定したサービス名
$username = "user"; // 環境変数 MYSQL_USER の値
$password = "user"; // 環境変数 MYSQL_PASSWORD の値
$dbname = "myDatabaseName"; // 環境変数 MYSQL_DATABASE の値

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// ... (接続処理)

$sql = "SELECT id,text  FROM my_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["text"]. " - text: " . $row["text"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample01 データの取得</title>
</head>
<body>
    
</body>
</html>