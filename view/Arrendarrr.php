<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        <?php include 'Arrendar.css'; ?>
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="head">
        <h1>SIAR-IMOB</h1>
        <div style="margin-top: 15px;">
            <a href="../view/VerProps.php" class="button">VOLTAR</a>
        </div>
    </div>
    <?php

    use DAO\TipoDAO;

    require_once '../model/model.DAO/TipoDAO.php';
    $am = new TipoDAO();
    $props = $am->select(); ?>


    <div class="container col-md-10">
        <?php for ($a = 0; $a < count($props); $a++) {
            if ($props[$a]['nome'] == $_GET['nome']) {
        ?>
                <div style="display: flex;">
                    <div>
                        <img src="../controller/Uploaded_img/<?= $props[$a]["imgurl"] ?>" alt="">
                    </div>
                    <div style="margin-left:50px; margin-top:2vh;">
                        <h2 style="line-height: 50px; font-weight:bold">Tipo: <span style="letter-spacing: 5px; font-size:30px; font-weight:400"> <?= $props[$a]["categoria"] ?></span></h2>
                        <h2 style="line-height: 50px; font-weight:bold">Bairro: <span style="letter-spacing: 5px; font-size:30px; font-weight:400"><?= $props[$a]["bairro"] ?></span></h2>
                        <h2 style="line-height: 50px; font-weight:bold">Renda: <span style="letter-spacing: 5px; font-size:30px; font-weight:400"><?= $props[$a]["renda"] ?>.00 MT</span></h2>
                        <h2 style="line-height: 50px; font-weight:bold">Descricao: <span style="letter-spacing: 5px; font-size:30px; font-weight:400"><?= $props[$a]["descricao"] ?></span></h2>

                        <a onclick="abrir()" class="btn btn-outline-primary" style="margin-top: 20px;">ARRENDAR</a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <div id="confirmar" class="border border-dark rounded" style="margin-top:50px; display:none;">

            <form action="../controller/TipoController.php" method="Post">

                <div class="form-group row" style="display: flex;">
                    <label for="Nome" class="col-sm-8 col-form-label">
                        <h2 style="margin-left: 1vw; padding-top:15px;">Confirmar Pedido de Arrendamento</h2>
                    </label>
                </div>

                <hr style="margin-top: 20px; margin-bottom:20px">

                <div class="form-group row" style="padding: 10px;">
                    <label for="Nome" class="col-sm-5 col-form-label" style="font-size: 22px;">Deseja ficar durante quanto tempo:</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1 Mes</option>
                            <option>2 Meses</option>
                            <option>3 Meses</option>
                            <option>4 Meses</option>
                            <option>5 Meses</option>
                            <option>6 Meses</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row" style="padding: 10px;">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Palavra Passe:</label>
                    <div class="col-sm-10">
                        <input id="nome" type="text" name="nome" class="form-control">
                    </div>
                </div>
                <div class="form-group row" style="padding: 10px;">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Contacto:</label>
                    <div class="col-sm-10">
                        <input type="number" id="renda" name="renda" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10" id="btnn" style="display: flex; justify-content:space-evenly;">
                        <button type="submit" class="btn btn-dark">Pagar e Confirmar</button>
                        <a onclick="FecharEdit()" class="btn btn-danger" style="width: 150px; font-size:20px;">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start" style="margin-top: 90px;">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <h4>© 2022 Copyright Eddy-Luana</h4>
        </div>
    </footer>
    <script>
        function FecharEdit() {
            var tp = document.querySelector("#confirmar")
            tp.style.display = 'none';
        }

        function abrir() {
            var tp = document.querySelector("#confirmar")
            tp.style.display = 'block';
        }
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>