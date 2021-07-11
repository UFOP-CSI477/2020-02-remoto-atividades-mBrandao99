<?php 

    require_once "connection.php";

    $produtos = $connection->query("SELECT * FROM produtos");

    // var_dump($estados->fetchAll());


    require "produtosView.php";
    
    