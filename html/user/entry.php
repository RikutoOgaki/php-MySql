<?php

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
    <h1 class="text-2xl">User - Entry</h1>

    <h2>Register New Account</h2>
    
    <form action="./create.php" method="POST">
        <div>
            <label>Email.</label>
            <input type="mail" name="account" placeholder="example@ecc.com">
        </div>
        <div>
            <label>Password.</label>
            <input type="password" name="password">
        </div>
        <div>
            <label>Re Password.</label>
            <input type="password" name="repassword">
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>

</div>
</body>
</html>