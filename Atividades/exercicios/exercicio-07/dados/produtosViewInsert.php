<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Inserir novo produto";
    include("head.php");
?>
<body onload="validation()">

    <div class="container">

        <h2  class="mt-5 mb-5">Inserir novo produto no banco de dados</h2>

        <form method="POST" id="formData" name="formData" action="produtosControllerInsert.php">

            <div class="form-group row mb-3" >
                <label class="col-sm-3 col-form-label" for="name">Nome </label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Nome do produto">
                </div>
            </div>  

            <fieldset class="form-group mb-3">
                <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0">Unidade de medida </legend>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="um" id="peca" value="pç">
                            <label class="form-check-label" for="peca">Peça</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="um" id="quilo" value="kg">
                            <label class="form-check-label" for="quilo">Quilo</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="um" id="litro" value="l">
                            <label class="form-check-label" for="litro">Litro</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="um" id="metro" value="m">
                            <label class="form-check-label" for="metro">Metro</label>
                        </div>                        

                    </div>
                </div>
            </fieldset>
           
            <div class="form-group">
                <input type="submit" value="Inserir" class="btn btn-primary">
                <input type="reset" value="Limpar" class="btn btn-warning">
                <a href="index.php"><input type="button" value="Voltar" class="btn btn-secondary"></a>
            </div>

        </form>

        

    </div>
</body>
</html>