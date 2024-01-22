<?php
// admin/products/entry
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
<div class="container mx-auto">
    <h1 class="text-2xl">Product - Entry</h1>
    <ul>
        <li><a href="products/">作品</a></li>
    </ul>

    <form action="create.php" method="POST">
        <div>
            <label>作品の名前</label>
            <input type="text" name="product_name">
        </div>
        <div>
            <labe>作品の説明</labe>
            <textarea name="product_description"></textarea>
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
</div>
</body>
</html>