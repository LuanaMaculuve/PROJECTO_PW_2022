<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include('cadastro.css') ?>
    </style>
</head>

<body>
    <div class="head">
        <h1>SIAR-IMOB</h1>
    </div>

    <div id="sucessos">
        <div id="sucesso" style="margin-left: 2.9%;"></div>
        <div style="display: flex; margin-right:5%;">
            <a id="Continue" href="#">Continuar</a>
            <a href="#" style="padding-left: 20px; padding-right:20px;">Voltar</a>
        </div>
    </div>

    <div class="container">
        <div class="form">
            <div>
                <h1 style="font-weight: 400;">Cadastro</h1>
            </div>
            <div style="width: 100%; border-bottom:solid 1px rgb(207, 200, 200)"></div>

            <div class="info">
                <div class="label">
                    <h1>Nome:</h1>
                    <h1>Email:</h1>
                    <h1>Palavra Passe:</h1>
                    <h1>Confirma Palavra Passe:</h1>
                    <h1>Numero de B.I.:</h1>
                    <h1>Data de Nascimento:</h1>
                    <h1>Telefone:</h1>
                </div>

                <div class="input">
                    <form action="../controller/UsuarioController.php" method="POST" style="display: flex; flex-direction: column;">
                        <input type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="nome" placeholder="Nome:">
                        <input type="email" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="email" placeholder="Email:">
                        <input type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="password" placeholder="Palavra Passe:">
                        <input type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="cPassword" placeholder="Confirma Palavra Passe:">
                        <input type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="bi" placeholder="Numero de B.I.">
                        <input type="date" required name="dataNasc" placeholder="Data de Nascimento:">
                        <input type="text" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" name="Telefone" placeholder="Telefone:">

                        <div class="botoes" style="display: flex; width: 100%; justify-content: space-evenly; margin-left:30px;">
                            <button id="concluir" onclick="" type="submit">Concluir</button>
                            <a id="cancelar" href="">Cancelar</a>
                        </div>
                    </form>

                    <?php
                    $_SESSION["registado"];
                   
                    if($_SESSION["registado"] == true){
                        echo '<script> var div3 = document.querySelector("#sucessos")
                            div3.style.display = \'flex\';
                          </script>';
                    }
                    if ($_SESSION["registado"] == true) {
                        echo
                        '<script> var div = document.querySelector("#sucesso")
                         div.innerHTML="<H1>Cadastro feito com sucesso</H1>"
                        </script>';
                    } else if ($_SESSION["registado"] == 0) {
                        echo
                        '<script> var cont = document.querySelector("#Continue") 
                         cont.style.display = \'none\';
                        var div = document.querySelector("#sucesso")
                         div.innerHTML="<H1>Erro ao fazer cadastro</H1>"
                        </script>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <i class="fa-regular fa-copyright" style="margin-right: 5px;"></i>
        <h2> 2022 Copyrigth Eddy-Luana</h2>
    </footer>
</body>

</html>