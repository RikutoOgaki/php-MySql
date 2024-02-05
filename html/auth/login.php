<?php
    require_once __DIR__ . "/../utility.php";

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
    <h1 class="text-2xl">Auth - Login</h1>
    
    <form action="authenticate.php" method="POST">
        <div>
            <label>Email.</label>
            <input type="mail" name="account" placeholder="example@ecc.com">
        </div>
        <div>
            <label>Password.</label>
            <input type="password" name="password">
        </div>
        <div>
            <button type="submit">ログイン</button>
        </div>
        <p><a href="index.php">アカウントを作る</a></p>
    </form>

</div>
</body>
</html>