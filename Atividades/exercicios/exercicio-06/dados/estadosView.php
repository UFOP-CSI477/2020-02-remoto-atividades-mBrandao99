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
                        while ($e = $estados->fetch()){
                            echo "<tr>";
                            echo "<td>" . $e["id"] . "</td>\n";
                            echo "<td>" . $e["nome"] . "</td>\n";
                            echo "<td>" . $e["sigla"] . "</td>\n";
                            echo "</tr>";
                        }
                    
                    ?>

                </tbody>
        </table>

    </div>

</body>
</html>