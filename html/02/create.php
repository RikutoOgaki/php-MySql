<?php
// admin/products/create

// 汎用関数の読み込み
require_once __DIR__ . "./utility.php";

// 送られてきたPOSTデータ
// var_dump( $_POST );

$name =        filter_input( INPUT_POST, "product_name" );
$description = filter_input( INPUT_POST, "product_description" );

try {

    $db = new PDO( DB_DSN, DB_USER, DB_PASS );

    $table = TBL_PRODUCTS;
    $sql = "
			insert into {$table} (
				name, 
				description
			) 
			values 
				( :name, :description )
		";

    $stmt = $db -> prepare( $sql );

    $stmt -> bindParam( ":name", $name, PDO::PARAM_STR );
    $stmt -> bindParam( ":description", $description, PDO::PARAM_STR );

    $stmt -> execute();

    // products/indexへリダイレクト
    redirect( "index.php" );

}
catch( PDOException $error ) {
    print $error -> getMessage();
}