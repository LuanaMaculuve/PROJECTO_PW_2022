<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include('VerProps.css'); ?>
    </style>
</head>

<body>
    <div class="head">
        <h1>SIAR-IMOB</h1>
        <div style="margin-top: 15px;">
            <a href="../view/Home.php" class="button">VOLTAR</a>
        </div>
    </div>

    <?php

    use DAO\TipoDAO;

    require_once '../model/model.DAO/TipoDAO.php';
    $am = new TipoDAO();
    $props = $am->select();
    $achou = 2;
    ?>

    <div class="cont">
        <?php
        for ($a = 0; $a < count($props); $a++) {
            if ($props[$a]['categoria'] == $_GET['prop']) {
                $achou = 1;
        ?>
                <div class="bairro1">
                    <img src="../controller/Uploaded_img/<?= $props[$a]["imgurl"] ?>" alt="">
                    <h3 style="margin-top:20px;"><?= $props[$a]["nome"] ?></h3>
                    <a class="button" href="Arrendarrr.php?nome=<?= $props[$a]["nome"] ?>">Saber Mais</a>
                </div>
        <?php }
        }
        ?>
        <?php
        if ($achou == 2) { ?>
            <style>
                .cont {
                    grid-template-columns: none;
                    display: inline-block;
                    background-color:darkgrey;
                }

                .cont div:hover {
                    transform: none;
                }

                .cont div {
                    width: 100vw;
                }
            </style>

            <div>
                <h1>SEM PROPRIEDADES DISPONIVEIS</h1>
            </div>
        <?php } ?>
    </div>
    <footer>
        <i class="fa-regular fa-copyright" style="margin-right: 5px;"></i>
        <h2 style="font-size:20px;"> 2022 Copyrigth Eddy-Luana</h2>
    </footer>
</body>

</html>