<?php

    include('conexao.php');

    $sensor1 = $_GET['sensor1'];
    $sensor2 = $_GET['sensor2'];
    $sensor3 = $_GET['sensor3'];

    $sql = "INSERT INTO dados (sensor1, sensor2, sensor3) VALUES (:sensor1, :sensor2, :sensor3)";

    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':sensor1', $sensor1);
    $stmt->bindParam(':sensor2', $sensor2);
    $stmt->bindParam(':sensor3', $sensor3);

    if($stmt->execute()) {
        echo "salvo_mano";
    }else{
        echo "erro_mano";
    }

?>