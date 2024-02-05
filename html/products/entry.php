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
            <h1 class="text-2xl font-bold mb-5">Product - Entry</h1>
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
            <form action="create.php" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col mb-5">
                    <label class="font-bold uppercase">Name.</label>
                    <input type="text" name="product_name" class="px-3 py-2 border-2 border-gray-400 rounded-md focus:border-cyan-500 outline-none">
                </div>

                <div class="flex flex-col mb-5">
                    <label class="font-bold uppercase">Method.</label>
                    <div>
                        <input type="radio" name="product_method" id="personal" class="" value="個人"><label for="personal">個人</label>
                        <input type="radio" name="product_method" id="team" class="" value="チーム"><label for="team">チーム</label>
                    </div>
                    <div>
                        <label>役割</label>
                        <input type="text" name="product_role" class="">
                    </div>
                </div>

                <div class="flex flex-col mb-5">
                    <label class="font-bold uppercase">Tool.</label>
                    <div>
                        <input type="checkbox" name="product_tools[]" id="tool_1" class="" value="Illustrator"><label for="tool_1">Illustrator</label>
                        <input type="checkbox" name="product_tools[]" id="tool_2" class="" value="Photoshop"><label for="tool_2">Photoshop</label>
                        <input type="checkbox" name="product_tools[]" id="tool_3" class="" value="Figma"><label for="tool_3">Figma</label>
                        <input type="checkbox" name="product_tools[]" id="tool_4" class="" value="XD"><label for="tool_4">XD</label>
                        <input type="checkbox" name="product_tools[]" id="tool_5" class="" value="Affter Efect"><label for="tool_5">Affter Efect</label>
                    </div>
                </div>

                <div class="flex flex-col mb-5">
                    <label class="font-bold uppercase">Tumbnail.</label>
                    <div>
                        <input type="file" name="product_thumbnail_1" id="thumb_1" class="" value="">
                    </div>
                </div>

                <div class="flex flex-col mb-5">
                    <label class="font-bold uppercase">URL.</label>
                    <div>
                        <input type="text" name="product_url" id="url" class="" value="">
                    </div>
                </div>

                <div class="flex flex-col mb-5">
                    <label class="font-bold uppercase">Description.</label>
                    <textarea name="product_description" class="px-3 py-2 border-2 border-gray-400 rounded-md focus:border-cyan-500 outline-none" rows="10"></textarea>
                </div>
                <div class="flex justify-end gap-5">
                    <a href="index.php" class="bg-slate-500 hover:bg-slate-400 text-white px-5 py-3 rounded-md">戻る</a>
                    <button type="submit" class="bg-rose-500 hover:bg-rose-400 text-white px-5 py-3 rounded-md">登録</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>