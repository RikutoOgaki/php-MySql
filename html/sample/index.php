<?php
    header('Content-Type: application/json; charset=UTF-8');

    $dsn = "mysql:host=mysql;dbname=myDatabaseName;charset=utf8";
    $user = 'user';
    $password = 'user';

    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'select * from Menu where 1';

    $stmt = $dbh -> prepare($sql);
    $stmt -> execute();

    while(true) {
        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

        if ($rec === false) {
            break;
        }
        $arr[] = $rec;
    }

    print json_encode($arr, JSON_PRETTY_PRINT);
?>