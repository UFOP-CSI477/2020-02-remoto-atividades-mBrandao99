<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Lista de produtos";
    include("head.php");
?>

<body>

    <div class="container">
        <a href="/dados/produtosViewInsert.php"><input type="button" value="Inserir novo produto" class="btn btn-success mt-5"></a>

        <table class="table table-hover mt-5">
            <caption>Produtos</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Unidade de Medida</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        while ($p = $produtos->fetch()){
                            echo "<tr>";
                            echo "<td>" . $p["id"] . "</td>\n";
                            echo "<td>" . $p["nome"] . "</td>\n";
                            echo "<td>" . $p["um"] . "</td>\n";
                            echo "</tr>";
                        }
                    
                    ?>

                </tbody>
        </table>

    </div>

</body>
</html>