<?php
// products/delete.php
// 登録作品を削除する（ソフトデリート）

require_once __DIR__ . "/../utility.php";

try {
    // PDO DB接続
    $db = new PDO( DB_DSN, DB_USER, DB_PASS );
    // POST id
    $id =    filter_input( INPUT_POST, "product_id" );
    $table = TBL_PRODUCTS;

    // IDを使って作品レコードの抽出
    $sql =   "select `delete` from {$table} where id = :product_id";
    $stmt =  $db -> prepare( $sql );
    $stmt -> bindParam( ":product_id", $id, PDO::PARAM_INT );
    $stmt -> execute();

    $product = $stmt -> fetchObject();

    // 削除済みかのチェック
    if( $product -> delete ) {
        // 削除済みのとき
        $sql = "update {$table} set `delete` = null where id = :product_id";
    }
    else {
        // 未削除のとき
        $sql = "update {$table} set `delete` = now() where id = :product_id";
    }

    $stmt = $db -> prepare( $sql );
    $stmt -> bindParam( ":product_id", $id, PDO::PARAM_INT );
    $stmt -> execute();

    // リダイレクト products/index
    redirect( "index.php" );

}
catch( PDOException $error ) {
    print $error -> getMessage();
}