<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <Style>
        <?php include 'cadastro2.css' ?>
    </Style>
    <title>Document</title>
</head>

<body style="background-color: #F6F7F9;">
    <nav class="navbar" style="background-color: #D4D4D4;">
        <h1>SIAR-IMOB</h1>
        <button class="btn btn-outline-dark" style="width: 110px;color:black;">Voltar</button>
    </nav>
    <?php
    if (!isset($resultado)) {
        $resultado['msg'] = "q";
        $resultado["cod"] = "w";
    }

    if (isset($resultado) && $resultado["cod"] == 1) { ?>
        <div id="ok" class="alert alert-success" style="margin-top: 15px; display:flex; justify-content:space-between">
            <?php echo $resultado["msg"]; ?>
            <a onclick="desable2()" style="width: 70px; color:white;" class="btn btn-primary">OK</a>
        </div>
    <?php } else if ($resultado["cod"] == 2) { ?>
        <div id="ok" class="alert alert-danger" style="margin-top: 15px; display:flex; justify-content:space-between">
            <?php echo $resultado["msg"]; ?>
            <a onclick="desable2()" style="width: 70px; color:white;" class="btn btn-primary">OK</a>
        </div>
    <?php } ?>


    <div class="container col-sm-10  border border-dark rounded" style="margin-top: 10vh;">
        <h2 style="margin-top: 20px;">Crie uma conta no SIAR-IMOB</h2>
        <hr style="margin-top: 30px; margin-bottom:30px">

        <form action="../controller/UsuarioController.php" method="POST">
            <div class="form-group row">
                <label for="Nome" class="col-sm-4 col-form-label" style="font-size: 22px;">Nome:</label>
                <div class="col-sm-7">
                    <input id="nome" type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="nome" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label" style="font-size: 22px;">Email:</label>
                <div class="col-sm-7">
                    <input id="email" type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="pass" class="col-sm-4 col-form-label" style="font-size: 22px;">Palavra Passe:</label>
                <div class="col-sm-7">
                    <input id="pass" type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="password" class="form-control" placeholder="Palavra Passe">
                </div>
            </div>
            <div class="form-group row">
                <label for="cpass" class="col-sm-4 col-form-label" style="font-size: 22px;">Palavra Passe:</label>
                <div class="col-sm-7">
                    <input id="cpass" type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="cPassword" class="form-control" placeholder="Confirme a Palavra Passe">
                </div>
            </div>
            <div class="form-group row">
                <label for="bi" class="col-sm-4 col-form-label" style="font-size: 22px;">B.I:</label>
                <div class="col-sm-7">
                    <input id="bi" type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="bi" class="form-control" placeholder="Numero do bilhete de identificacao">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlefone" class="col-sm-4 col-form-label" style="font-size: 22px;">Data de Nascimento:</label>
                <div class="col-sm-7">
                    <input id="tlefone" type="date" required name="dataNasc" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="tlefone" class="col-sm-4 col-form-label" style="font-size: 22px;">Telefone:</label>
                <div class="col-sm-7">
                    <input id="tlefone" type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="Telefone" class="form-control" placeholder="Numero do telfone">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-7" id="btnn" style="margin-left: 20vw;">
                    <button type="submit" class="btn btn-outline-primary">Registar</button>
                    <a class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <footer class="bg-light text-center text-lg-start" style="margin-top: 90px;">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <h4>© 2022 Copyright Eddy-Luana</h4>
        </div>
    </footer>
    <script>
        function desable2() {
            var tp = document.querySelector("#ok")
            tp.style.display = 'none';
        }
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>