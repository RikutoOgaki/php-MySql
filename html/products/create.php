<?php
// products/create.php

// 汎用関数の読み込み
require_once __DIR__ . "/../utility.php";

// 送られてきたPOSTデータ
// var_dump( $_POST );
// var_dump( $_FILES );

$name =        filter_input( INPUT_POST, "product_name" );
$method =      filter_input( INPUT_POST, "product_method" );
$role =        filter_input( INPUT_POST, "product_role" );

if( !empty( $_POST[ "product_tools" ] ) ) {
    $tools =       $_POST[ "product_tools" ];
}
else {
    $tools = null;
}

$url =         filter_input( INPUT_POST, "product_url" );
$description = filter_input( INPUT_POST, "product_description" );

// toolsを配列から文字列に結合変換
if( is_array( $tools ) ) {
    $tools = implode( "/", $tools );
}


try {

    $db = new PDO( DB_DSN, DB_USER, DB_PASS );

    $table = TBL_PRODUCTS;
    $sql = "
        insert into
            {$table}( name, method, role, tools, url, description )
        values 
            ( :name, :method, :role, :tools, :url, :description )
    ";

    $stmt = $db -> prepare( $sql );

    $stmt -> bindParam( ":name",        $name,        PDO::PARAM_STR );
    $stmt -> bindParam( ":method",      $method,      PDO::PARAM_STR );
    $stmt -> bindParam( ":role",        $role,        PDO::PARAM_STR );
    $stmt -> bindParam( ":tools",       $tools,       PDO::PARAM_STR );
    $stmt -> bindParam( ":url",         $url,         PDO::PARAM_STR );
    $stmt -> bindParam( ":description", $description, PDO::PARAM_STR );

    $stmt -> execute();

    // products/index.php リダイレクト
    redirect( "index.php" );

}
catch( PDOException $error ) {
    print $error -> getMessage();
}