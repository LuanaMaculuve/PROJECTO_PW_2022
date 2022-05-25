<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        <?php include 'Arrenda.css' ?>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="head">
        <h1>SIAR-IMOB</h1>
        <div>
            <h4>Redes sociais</h4>
        </div>
    </div>

    <?php
    use DAO\TipoDAO;

    require_once '../model/model.DAO/TipoDAO.php';
    $am = new TipoDAO();
    $props = $am->select();
    ?>

    <div class="container" style="background-color: rgb(174, 174, 174); ">
        <?php
        for ($a = 0; $a < 6; $a++) {
            if (isset($props[$a]['imgurl'])) {
        ?>
                <div class="bairro1">
                    <img src="../controller/Uploaded_img/<?= $props[$a]["imgurl"] ?>" alt="">
                    <h3><?= $props[$a]["nome"] ?></h3>
                    <a class="button" href="login.php">Saber Mais</a>
                </div>
        <?php }
        }
        ?>
    </div>
    <footer>
        <i class="fa-regular fa-copyright" style="margin-right: 5px;"></i>
        <h2 style="font-size:20px;"> 2022 Copyrigth Eddy-Luana</h2>
    </footer>
</body>

</html>