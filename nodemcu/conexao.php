<?php
    try{

        $HOST = "localhost";
        $DATABSE = "nodemcu";
        $USER = "root";
        $PASSWORD = "root";

        $PDO = new PDO("mysql:host=" . $HOST . ";dbname=" . $DATABSE . ";charset=utf8", $USER, $PASSWORD);
    }catch (PDOException $erro){
        echo "Erro de conexão, detalhes: " . $erro->getMessage();
    }
?>
