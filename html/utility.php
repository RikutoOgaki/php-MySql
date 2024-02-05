<?php
//
// 汎用的な関数を定義する
//

// 定数ファイル
require_once __DIR__ . "/const.php";

// ログインチェック
function loggedinCheck() {
    $result = true;

    // sessionの開始
    // セッションが開始されていなければ、セッションを開始する
    if( session_status() === PHP_SESSION_NONE ) {
        session_start();
    }

    // ログイン情報を参照
    if( empty($_SESSION[ "loggedin" ]) ) {
        // 未ログイン
        $result = !$result;
    }

    return $result;
}

// ログイン済みかをチェックして、ページ遷移
if(
    ! preg_match("/\/auth\/login.php/", $_SERVER[ "REQUEST_URI" ])
    &&
    ! preg_match("/\/auth\/authenticate.php/", $_SERVER[ "REQUEST_URI" ])
) {
    if( ! loggedinCheck() ) {
        // 未ログイン
        redirect( "/auth/login.php" );

    }
}


// リダイレクト
function redirect( $path ) {
    header( "Location: {$path}");
    exit;
}

// ランダム文字列の生成
function generateToken( $digit = 8 ) {
    $str = random_bytes( $digit );
    $str = str_replace( [ "=", "/" ], "", base64_encode( $str ) );
    $str = substr( $str, 0, $digit );
    return $str;
}