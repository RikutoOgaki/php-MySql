<?php
// products/update.php
// 登録済みの作品情報を更新する

// 汎用関数の読み込み
require_once __DIR__ . "/utility.php";

var_dump( $_POST );


try {

    $db = new PDO( DB_DSN, DB_USER, DB_PASS );

    $id =          filter_input( INPUT_POST, "product_id" );
    $name =        filter_input( INPUT_POST, "product_name" );
    $description = filter_input( INPUT_POST, "product_description" );
    $table =       TBL_PRODUCTS;

    // SQL UPDATE
    $sql = "
        update 
            {$table} 
        set 
            name = :product_name, description = :product_description
        where
            id = :product_id
    ";

    $stmt = $db -> prepare( $sql );
    $stmt -> bindParam( ":product_id", $id, PDO::PARAM_INT );
    $stmt -> bindParam( ":product_name", $name, PDO::PARAM_STR );
    $stmt -> bindParam( ":product_description", $description, PDO::PARAM_STR );

    $stmt -> execute();

    // リダイレクト products/index
    redirect( "index.php" );

}
catch( PDOException $error ) {
    print $error -> getMessage();
}