<?php
    // PDO( PHP Database Object )
    $dsn =      "mysql:dbname=myDatabaseName;host=mysql";
    $username = "user";
    $password = "user";

    try {
        // DB接続
        $db = new PDO($dsn, $username, $password);
        // SQL
        $sql = "select * from app1_products";
        // プリペアドステートメント
        $stmt = $db -> prepare( $sql );
        // ステートメントの実行
        $stmt -> execute();

        // ステートメントの実行結果を取り出す
        while( $row = $stmt -> fetchObject() ) {
            $products[] = $row;
        }

        var_dump( $products );
        
    }
    catch(PDOException $error) {
        print $error -> getMessage();
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アプリ開発演習１ - 管理</title>
</head>
<body>
    <h1>Product - Index</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach( $products as $product): ?>
            <tr>
                <td><?= $product -> id ?></td>
                <td><?= $product -> name ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>