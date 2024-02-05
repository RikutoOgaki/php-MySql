<?php

require_once __DIR__ . "/../utility.php";

if( session_status() === PHP_SESSION_NONE ) {
    session_start();
}

// セッションの破棄
session_destroy();

// ログインページへ移動
redirect("login.php");