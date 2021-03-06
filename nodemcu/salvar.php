<?php

    include('conexao.php');

    $sensor = $_GET['sensor'];
    
    $sql = "INSERT INTO registrosUmidade (nivelUmidade) VALUES (:sensor)";

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':sensor', $sensor);


    if($stmt->execute()) {
        echo "salvo_mano";
    }else{
        echo "erro_mano";
    }

?>