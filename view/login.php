<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include('login.css') ?>#iconuser {
            position: absolute;
            left: 0;
            bottom: 205px;
            padding: 9px 8px;
            color: var(--icon);
            transition: .3s;
        }

        #iconpass {
            position: absolute;
            left: 0;
            bottom: 120px;
            padding: 9px 8px;
            color: var(--icon);
            transition: .3s;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

</head>

<body>
    <div class="head">
        <h1>SIAR-IMOB</h1>
        <div class="luana">
            <a href="Cadastro2.php">Criar Conta</a>
            <div id="theme-toggler" class="fa-solid fa-moon"></div>
        </div>
    </div>

    <?php
    if (!isset($resultado)) {
        $resultado['msg'] = "q";
        $resultado["cod"] = "w";
    }

    if (isset($resultado) && $resultado["cod"] == 2) { ?>
        <div id="ok" class="alert alert-danger" style="display:flex; justify-content:space-between; margin-bottom:0px; font-size:22px;">
            <?php echo $resultado["msg"]; ?>
            <a onclick="desable2()" style="width: 70px; color:white;" class="btn btn-primary">OK</a>
        </div>
    <?php } ?>

    <div class="body">
        <div class="form">
            <i class="fa-solid fa-user fa-6x"></i>

            <form action="../controller/UsuarioController.php" method="post" class="dados">
                <input type="text" name="email" placeholder="Email">
                <i id="iconuser" class="fa-solid fa-user fa-2x"></i>

                <input type="password" name="password" placeholder="Palavra Passe" style="margin-top: 20px; ">
                <i id="iconpass" class="fa-solid fa-lock fa-2x"></i>
                <button type="submit" class="sessao" style="margin-top: 50px; width: 45%; border-color: transparent;">Iniciar Sessao</button>
            </form>

            <div style="margin-top: 50px;">
                <a href="" class="senha">Esqueceu senha?</a>
            </div>
        </div>
    </div>

    <footer>
        <i class="fa-regular fa-copyright" style=" font-size: 18px;"></i>
        <h2 style="font-weight: 500; font-size:18px;"> 2022 Copyrigth Eddy-Luana</h2>
    </footer>



    <script>
        let themeToggler = document.querySelector('#theme-toggler')

        themeToggler.onclick = () => {
            themeToggler.classList.toggle('fa-sun')

            if ((themeToggler.classList.contains('fa-sun'))) {
                document.body.classList.add('active')
            } else {
                document.body.classList.remove('active')
            }
        }

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