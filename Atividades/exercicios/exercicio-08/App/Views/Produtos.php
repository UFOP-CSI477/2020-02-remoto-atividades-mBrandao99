<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Lista de produtos";
    include("head.php");
?>

<body>

    <div class="container">

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
                        foreach ($produtosObjects as $p) {
                            echo "<tr>\n";
                            echo "<td>" . $p->getId() . "</td>\n";
                            echo "<td>" . $p->getNome() . "</td>\n";
                            echo "<td>" . $p->getUm() . "</td>\n";
                            echo "</tr>\n";
                        }                 
                    ?>

                </tbody>
        </table>

    </div>

</body>
</html>