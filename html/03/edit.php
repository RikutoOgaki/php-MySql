<?php
// admin/products/edit
// 登録済みの作品情報を更新する入力画面

require_once __DIR__ . "/utility.php";

var_dump( $_GET );

try {
    $db = new PDO( DB_DSN, DB_USER, DB_PASS );

    // GET id
    $id =    filter_input( INPUT_GET, "id" );
    $table = TBL_PRODUCTS;

    $sql = "select * from {$table} where id = :product_id";
    $stmt = $db -> prepare( $sql );
    $stmt -> bindParam( ":product_id", $id, PDO::PARAM_INT );
    $stmt -> execute();

    // 抽出したレコードデータの取り出し
    $product = $stmt -> fetchObject();
    
    var_dump( $product );
    
}
catch( PDOException $error ) {
    print $error -> getMessage();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="<https://cdn.tailwindcss.com>"></script>

    <title>アプリ開発演習１ - 管理</title>
</head>
<body class="bg-slate-50">
<div class="container mx-auto">
    <h1 class="text-2xl">Product - Edit</h1>
    <ul>
        <li><a href="products/">作品</a></li>
    </ul>

    <form action="update.php" method="POST">
        <input type="hidden" name="product_id" value="<?= $product -> id ?>">
        
        <div>
            <label>作品の名前</label>
            <input type="text" name="product_name" value="<?= $product -> name ?>">
        </div>
        <div>
            <labe>作品の説明</labe>
            <textarea name="product_description"><?= $product -> description ?></textarea>
        </div>
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</div>
</body>
</html>
