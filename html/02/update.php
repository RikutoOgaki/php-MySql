<?php
// products/update.php
// 登録済みの作品情報を更新する

// 汎用関数の読み込み
require_once __DIR__ . "/utility.php";

var_dump( $_POST );


try {

    

}
catch( PDOException $error ) {
    print $error -> getMessage();
}