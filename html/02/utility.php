<?php
//
// 汎用的な関数を定義する

// 定数ファイル
require_once __DIR__ . "./const.php";

// リダイレクト
function redirect( $path ) {
    header( "Location: {$path}" );
    exit;
}