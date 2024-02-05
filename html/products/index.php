<?php
    // products/index

    require_once __DIR__ . "/../utility.php";

    try {
        // PDO( PHP Database Object )
        // DB接続
        $db = new PDO( DB_DSN, DB_USER, DB_PASS );
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

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>アプリ開発演習１ - 管理</title>
</head>
<body class="bg-slate-50">
    <header class="bg-slate-800 text-white">
        <div class="container mx-auto py-10">
            <h1 class="text-2xl font-bold mb-5">Product - Index</h1>
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

            <div class="flex mb-10">
                <a href="./entry.php" class="bg-rose-500 hover:bg-rose-400 text-white px-5 py-3 rounded-md">作品の登録</a>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="bg-slate-600 text-white">
                        <th class="py-2">#</th>
                        <th>name</th>
                        <th>setting</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $products as $product ): ?>
                    <tr class="hover:bg-slate-200 <?php if( $product -> delete ): print "text-slate-300"; endif ?>">
                        <td class="w-1/12 text-center py-3"><?= $product -> id ?></td>
                        <td><?= $product -> name ?></td>
                        <td class="w-1/12 text-center">
                            <a href="detail.php?id=<?= $product -> id ?>" class="hover:text-amber-600">detail</a>
                            <a href="edit.php?id=<?= $product -> id ?>" class="hover:text-amber-600">edit</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>