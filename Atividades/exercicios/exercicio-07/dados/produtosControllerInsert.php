<?php

    require "connection.php";

    $nome = $_POST["name"];
    $um = $_POST["um"];    

    if (empty($nome) || empty($um)) {
        include("telaDeErro.php");
        die();
    }

    try {
        $connection->beginTransaction();

        $stmt = $connection->prepare("INSERT INTO produtos (nome, um) VALUES (:nome, :um)");

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":um", $um);

        $stmt->execute();

        $connection->commit();

        header("Location: index.php");
        exit();

    } catch (Exception $e) {
        $connection->rollBack();
        die("Erro ao inserir o produto: " . $e->getMessage());
    }
    

