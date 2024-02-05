<?php
// ログイン認証

require_once __DIR__ . "/../utility.php";

// POSTメソッドで訪問しているか?
// メールアドレスとパスワードを取り出す
// app1_usersに登録されているメールアドレスかをチェック
// パスワードが正しいかチェック
// admin\index.phpへリダイレクト

$authFlag = true;

try {
    if( $_SERVER[ "REQUEST_METHOD" ] !== "POST" ) {
        throw new Exception( "405 Method Not Allowed" );
    }

    $account =  filter_input( INPUT_POST, "account" );
    $password = filter_input( INPUT_POST, "password" );

    if( empty( $account ) || empty( $password ) ) {
        throw new Exception( "400 Bad Request" );
    }

    $db = new PDO( DB_DSN, DB_USER, DB_PASS );
    $table = TBL_USERS;

    $sql =   "select * from {$table} where account = :account";
    $stmt =  $db -> prepare( $sql );
    $stmt -> bindParam( ":account", $account );
    $stmt -> execute();

    if( ! $stmt -> rowCount() ) {
        throw new Exception( "アカウントが登録されていません" );
    }

    $user = $stmt -> fetchObject();

    if( ! password_verify( $password, $user -> password ) ) {
        throw new Exception( "メールアドレスかパスワードが間違っています" );
    }

    session_start();
    // print "Login Success!!!!";
    $_SESSION[ "loggedin" ] = $user -> account;

}
catch( PDOException $error ) {
    $authFlag = false;
    $message = $error -> getMessage();
}
catch( Exception $error ) {
    $authFlag = false;
    $message = $error -> getMessage();
}

if( $authFlag ) {
    redirect( "../index.php" );
}
else {
    redirect( "login.php?message={$message}" );
}