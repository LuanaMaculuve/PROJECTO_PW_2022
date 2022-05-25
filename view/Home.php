<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="Home.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<style>
    img {
        height: 550px;
        background-size: cover;
    }

    <?php include('Home.css'); ?>
</style>

<body>
    <?php

    use DAO\TipoDAO;

    require_once '../model/model.DAO/TipoDAO.php';
    $am = new TipoDAO();
    $props = $am->select(); ?>
    <header>
        <h1 style="font-weight: 500;">SIAR-IMOB</h1>

        <div style="display: flex;  margin-top: 0px; ">
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    VER CASAS
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="VerProps.php?prop=Flat">Flats</a>
                    <a class="dropdown-item" href="VerProps.php?prop=Vivenda">Vivendas</a>
                </div>
            </div>
            <div>
                <a href="../view/RegistarTipo.php" class="btn btn-secondary bg-sm">SITUACAO</a>
            </div>
            <div style="margin-top: 15px;">
                <a href="login.php" style="background-color:transparent; margin-right:10px;"><i  class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        </div>
    </header>

    <div class="imagem">
        <div>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                <div id="imagem" class="carousel-inner">
                    <?php if (isset($props[0]['imgurl'])) { ?>
                        <div class="carousel-item active">
                            <img src="../controller/Uploaded_img/<?= $props[0]["imgurl"] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 style="color: black;margin-bottom:15px;"><?= $props[0]["nome"] ?></h1>
                            </div>
                        </div>
                    <?php } ?>

                    <?php for ($a = 0; $a < 4; $a++) {
                        if (isset($props[$a]['imgurl'])) { ?>
                            <div class="carousel-item ">
                                <img src="../controller/Uploaded_img/<?= $props[$a]["imgurl"] ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1 style="color: black;margin-bottom:15px;"><?= $props[1]["nome"] ?></h1>
                                </div>
                            </div>
                    <?php }
                    } ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div style="background-color: rgb(224, 224, 224); height: 22vh; color: white;">

        <h2 style="margin-left: 10%; color: black;padding-top:5px; ">Contacto</h2>
        <hr style="margin-top: 0; border:black solid 0.5px;">
        <div class="container2">

            <div style="display: flex; margin-left: 10%;">

                <i class="fa-solid fa-location-dot" style="margin-top: 5px;margin-right: 7px; color: black; line-height: 0;"></i>

                <div style="font-size: 20px; color:black;">
                    <p style="line-height: 7px;">SIAR-IMOB</p>
                    <p style="line-height: 17px;">Maputo, D.M. Kamubukwana</p>
                    <p style="line-height: 15px;">AV. Mocambique, Flat 10</p>
                </div>
            </div>

            <div style="margin-right: 10%; color:black">

                <div class="call" style="display: flex;">

                    <i class="fa-solid fa-phone" style="font-size: 22px;color: black; margin-top: 5px; margin-right: 10px;"></i>
                    <p style="font-size: 21px;">+258 844 090 867 / +258 849 176 535</p>
                </div>

                <div style="display: flex;;">

                    <i class="fa-regular fa-envelope" style="font-size: 22px;color: black; margin-top: 5px; margin-right: 10px; line-height: 15px;"></i>
                    <p style="font-size: 22px; line-height: 15px;">siarimob@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <i class="fa-regular fa-copyright" style="margin-right: 5px;"></i>
        <h2> 2022 Copyrigth Eddy-Luana</h2>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>