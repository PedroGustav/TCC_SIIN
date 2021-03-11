<?php

    include('conexao.php');

    $nivelUmidade = $_GET['nivelUmidade'];
    
    $sql = "INSERT INTO registrosUmidade (nivelUmidade) VALUES (:nivelUmidade)";

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':nivelUmidade', $nivelUmidade);


    if($stmt->execute()) {
        echo "salvo_mano";
    }else{
        echo "erro_mano";
    }

?>