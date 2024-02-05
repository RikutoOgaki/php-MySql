<?php

require_once __DIR__ . "/../utility.php";

// POSTで送信されてきた[account][password][repassword]を取り出す
// [account]がメールアドレスとして正常か（@がついてるか）をチェック
// [account]がapp1_usersに重複するのがないかチェック
// [password]と[repassword]が一致するかチェック
// [password]の暗号化(password_hash)
// [account]と[暗号化したpassword]をapp1_usersに登録
// auth\login.phpへリダイレクト

if( $_SERVER[ "REQUEST_METHOD" ] !== "POST" ) {
    redirect( "entry.php" );
}

$account =    filter_input( INPUT_POST, "account" );
$password =   filter_input( INPUT_POST, "password" );
$repassword = filter_input( INPUT_POST, "repassword" );

try {
    // アカウントのメールアドレスフォーマットチェック
    if( ! preg_match("/@+/", $account) ) {
        throw new Exception( "メールアドレスを入力してください" );
    }
    // パスワードチェック
    if( empty( $password ) ) {
        throw new Exception( "パスワードが入力されていません" );
    }
    if( $password !== $repassword ) {
        throw new Exception( "再入力されたパスワードが間違っています" );
    }

    $db = new PDO( DB_DSN, DB_USER, DB_PASS );

    $table = "app1_users";

    // アカウントを重複チェック
    $sql =   "select account from {$table} where account = :account";
    $stmt =  $db -> prepare( $sql );
    $stmt -> bindParam( ":account", $account );
    $stmt -> execute();

    if( $stmt -> rowCount() ) {
        throw new Exception("メールアドレスは既に登録されています");
    }

    // パスワードのハッシュ（暗号）化
    $hashPassword = password_hash( $password, PASSWORD_BCRYPT, [ "cost" => 13 ] );

    // アカウントの登録
    $sql =  "insert into {$table}( account, password ) values ( :account, :password )";
    $stmt = $db -> prepare( $sql );
    $stmt -> bindParam( ":account",  $account );
    $stmt -> bindParam( ":password", $hashPassword );
    $stmt -> execute();

    redirect( "../auth/login.php" );

}
catch( PDOException $error ) {
    print $error -> getMessage();
}
catch( Exception $error ) {
    print $error -> getMessage();
}