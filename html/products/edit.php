<?php
    // admin/products/edit
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
    <h1 class="text-2xl">Product - Edit</h1>
    <ul>
        <li><a href="products/">作品</a></li>
    </ul>

    <form action="update.php" method="POST">
        <input type="hidden" name="product_id" value="2">
        
        <div>
            <label>作品の名前</label>
            <input type="text" name="product_name">
        </div>
        <div>
            <labe>作品の説明</labe>
            <textarea name="product_description"></textarea>
        </div>
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</div>
</body>
</html>