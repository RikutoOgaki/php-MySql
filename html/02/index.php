<?php
    // admin/products/index

    require_once __DIR__ . "./utility.php";

    try {
        // PDO( PHP Database Object )
        // DB接続
        $db = new PDO( DB_DSN, DB_USER, DB_PASS );
				$table = TBL_PRODUCTS;
        // SQL
        $sql = "select * from {$table}";
        // プリペアドステートメント
        $stmt = $db -> prepare( $sql );
        // ステートメントの実行
        $stmt -> execute();

        // ステートメントの実行結果を取り出す
        while( $row = $stmt -> fetchObject() ) {
            $products[] = $row;
        }

        // var_dump( $products );
        
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

    <a href="entry.php">作品の登録</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach( $products as $product ): ?>
            <tr>
                <td><?= $product -> id ?></td>
                <td><?= $product -> name ?></td>
                <td>
                    <a href="edit.php?id=<?= $product -> id ?>">edit</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

</body>
</html>