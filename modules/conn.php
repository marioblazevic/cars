<?php

    $serverName = "localhost";
    $dbName="automobili";
    $user="root";
    $passwd="";

    try{
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8",$user,$passwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Greska: ".$e->getMessage();
    }

?>