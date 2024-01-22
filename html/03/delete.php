<?php
// products/delete.php
// 登録作品を削除する（ソフトデリート）

require_once __DIR__ . "/utility.php";

try {
    // PDO DB接続
    $db = new PDO( DB_DSN, DB_USER, DB_PASS );
    // POST id
    $id =    filter_input( INPUT_POST, "product_id" );
    $table = TBL_PRODUCTS;

    // SQL delete（削除フラグ）に日時を保存する value : null / timestamp
    // delete という名称はMySQLの予約後のため ` ` で囲う
    // now() MySQLの関数で現在のシステム時刻を返す
    $sql = "update {$table} set `delete` = now() where id = :product_id";

    $stmt = $db -> prepare( $sql );
    $stmt -> bindParam( ":product_id", $id, PDO::PARAM_INT );

    $stmt -> execute();

    // リダイレクト products/index
    redirect( "index.php" );

}
catch( PDOException $error ) {
    print $error -> getMessage();
}