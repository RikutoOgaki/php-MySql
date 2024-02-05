<?php
    // admin\index.php

    require_once __DIR__ . "/utility.php";


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
            <h1 class="text-2xl font-bold mb-5">Admin - Index</h1>
            <div class="flex justify-between">
                <nav>
                    <ul class="flex gap-5">
                        <li><a href="./index.php" class="uppercase hover:text-amber-600">home</li>
                        <li><a href="products/" class="uppercase hover:text-amber-600">product</a></li>
                    </ul>
                </nav>
                <div>
                    <a href="auth/logout.php" class="px-5 py-3 bg-pink-600 text-white rounded-md">logout</a>
                </div>
            </div>
        </div>
    </header>

    <main>
    </main>

</body>
</html>