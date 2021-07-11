<?php

require "../vendor/autoload.php";

use App\Database\Connection;
use App\Database\AdapterSQLite;
use App\Models\Estado;
use App\Models\Produto;

$connection = new Connection(new AdapterSQLite());
// var_dump($connection);

$connection->getAdapter()->open();

$estados = $connection->getAdapter()->get()->query("SELECT * FROM estados");
$estadosObjects = [];

while ($e = $estados->fetch()) {
    array_push($estadosObjects, new Estado($e["id"], $e["nome"], $e["sigla"]));
}

$produtos = $connection->getAdapter()->get()->query("SELECT * FROM produtos");
$produtosObjects = [];

while ($p = $produtos->fetch()) {
    array_push($produtosObjects, new Produto($p["id"], $p["nome"], $p["um"]));
}

// var_dump($estadosObjects);
// echo "<br><br>";
// var_dump($produtosObjects);

$title = "Lista de estados e produtos";
require "../App/Views/Header.php";

require "../App/Views/Estados.php";
echo "<br><br>";
require "../App/Views/Produtos.php";

$connection->getAdapter()->close();

