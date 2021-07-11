<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Lista de estados";
    include("head.php");
?>

<body>

    <div class="container">

        <table class="table table-hover mt-5">
            <caption>Estados</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Sigla</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($estadosObjects as $e) {
                            echo "<tr>\n";
                            echo "<td>" . $e->getId() . "</td>\n";
                            echo "<td>" . $e->getNome() . "</td>\n";
                            echo "<td>" . $e->getSigla() . "</td>\n";
                            echo "</tr>\n";
                        }                 
                    ?>

                </tbody>
        </table>

    </div>

</body>
</html>