<?php 
    $dsn = 'mysql:host=mysql;port=3306;dbname=myDatabaseName;charset=utf8';
    $username = 'user';
    $password = 'user';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "データベースに接続しました。";
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
?>