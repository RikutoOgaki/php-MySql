<?php
// products/detail.php
// 登録済みの作品詳細情報を表示する画面

require_once __DIR__ . "/../utility.php";

// var_dump( $_GET );

try {
    
    // GET id
    $id =    filter_input( INPUT_GET, "id" );
    $table = TBL_PRODUCTS;

    $db = new PDO( DB_DSN, DB_USER, DB_PASS );

    $sql = "select * from {$table} where id = :product_id";
    $stmt = $db -> prepare( $sql );
    $stmt -> bindParam( ":product_id", $id, PDO::PARAM_INT );
    $stmt -> execute();

    // 抽出したレコードデータの取り出し
    $product = $stmt -> fetchObject();

    // サムネイル情報の抽出
    $table = TBL_THUMBS;
    $sql = "select * from {$table} where product_id = :product_id";

    $stmt = $db -> prepare( $sql );

    $stmt -> bindParam( ":product_id", $product -> id, PDO::PARAM_INT );
    
    $stmt -> execute();

    $thumbnails = [];
    while( $row = $stmt -> fetchObject() ) {
        $thumbnails[] = $row;
    }
    
    // var_dump( $product );
    // var_dump( $thumbnails );

    
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
    <script src="https://cdn.tailwindcss.com"></script>

    <title>アプリ開発演習１ - 管理</title>
</head>
<body class="bg-slate-50">
    <header class="bg-slate-800 text-white">
        <div class="container mx-auto py-10">
            <h1 class="text-2xl font-bold mb-5">Product - Detail</h1>
            <nav>
                <ul class="flex gap-5">
                    <li><a href="../index.html" class="uppercase hover:text-amber-600">home</a></li>
                    <li><a href="index.php" class="uppercase hover:text-amber-600">product</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container mx-auto py-10">

            <div class="flex justify-end">
                <form action="delete.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product -> id ?>">
                    <button type="submit" class="bg-rose-500 hover:bg-rose-400 text-white px-5 py-3 rounded-md"><?= ( $product -> delete )? "アーカイブ解除" : "アーカイブ" ?></button>
                </form>
            </div>
            
            <div class="flex flex-col mb-5">
                <label class="font-bold uppercase">Name.</label>
                <p class="px-3 py-2 border-2 border-gray-400 rounded-md"><?= $product -> name ?></p>
            </div>

            <div class="flex gap-10">
                <div class="grow flex flex-col mb-5">
                    <label class="font-bold uppercase">Method.</label>
                    <p class="px-3 py-2 border-2 border-gray-400 rounded-md"><?= $product -> method ?></p>
                </div>

                <div class="grow flex flex-col mb-5">
                    <label class="font-bold uppercase">Role.</label>
                    <p class="px-3 py-2 border-2 border-gray-400 rounded-md"><?= $product -> role ?></p>
                </div>
            </div>

            <div class="grow flex flex-col mb-5">
                <label class="font-bold uppercase">Tools.</label>
                <p class="px-3 py-2 border-2 border-gray-400 rounded-md"><?= $product -> tools ?></p>
            </div>
            

            <div class="flex gap-5">
                <div class="flex flex-col mb-5">
                    <label class="font-bold uppercase">Tnumb.</label>
                <?php foreach( $thumbnails as $thumbnail ): ?>
                    <figure class="rounded-md overflow-hidden">
                        <img src="../storage/images/<?= $thumbnail -> name ?>" alt="<?= $thumbnail -> description ?>" class="object-contain align-bottom">
                    </figure>
                <?php endforeach ?>
                </div>
                    
                <div class="grow flex flex-col mb-5">
                    <labe class="font-bold uppercase">Description.</labe>
                    <p class="grow px-3 py-2 border-2 border-gray-400 rounded-md"><?= $product -> description ?></p>
                </div>
            </div>

            <div class="grow flex flex-col mb-5">
                <label class="font-bold uppercase">URL</label>
                <p class="px-3 py-2 border-2 border-gray-400 rounded-md"><?= $product -> url ?></p>
            </div>

        </div>
    </main>
</body>
</html>