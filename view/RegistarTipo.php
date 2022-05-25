<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <Style>
        <?php include("RegistarTipo.css") ?>img {
            width: 20vw;
            height: 27vh;
            border-radius: 10px;
        }

        td {
            font-size: 22px;
        }

        th {
            font-size: 30px;
            font-weight: 500;
        }
    </Style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="head">
        <h1>SIAR-IMOB</h1>
    </div>

    <div class="principal">
        <div style="display: flex; margin-top:20px; justify-content:space-between">
            <h2 style="margin-left: 10px; letter-spacing:7px; margin-top:25px;" id="tp">Tipos de Proprieadade</h2>
            <button id="bt" onclick="desable()" class="btn btn-outline-secondary">Listar/ Nao Listar</button>
        </div>

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

        <div class="tabela" style="margin-top: 30px;">

            <?php
            use DAO\TipoDAO;

            require_once '../model/model.DAO/TipoDAO.php';
            $am = new TipoDAO();
            $props = $am->select();

            if (count($props) > 0) :
            ?>
                <table id="tab" class="table table-striped">
                    <tr id="tab_produto">
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Bairro</th>
                        <th>Categoria</th>
                        <th>Renda</th>
                        <th>Accoes</th>
                    </tr>
                    <?php foreach ($props as $p) : ?>
                        <tr>
                            <td>
                                <img src="../controller/Uploaded_img/<?= $p["imgurl"] ?>" alt="">
                            </td>
                            <td><?= $p["nome"]; ?></td>
                            <td><?= $p["bairro"]; ?></td>
                            <td><?= $p["categoria"]; ?></td>
                            <td><?= $p["renda"]; ?></td>
                            <td style="display:flex;">
                                <div style="display: flex;">
                                    <a class="btn btn-outline-danger" href="../controller/TipoController.php?idTipo=<?= $p["id"]; ?>">Remover</a>
                                    <a class="btn btn-outline-primary" style="margin-left: 20px; width:90px;" onclick="mostraEdit('<?= $p['nome']; ?>', <?= $p['renda']; ?>,<?= $p['id']; ?>)"> Editar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

        </div>
        <div id="registarTipo" class="border border-dark rounded">
            <h2>Regista Um novo Tipo de Propriedade</h2>
            <hr style="margin-top: 30px; margin-bottom:30px">

            <form method="POST" action="../controller/TipoController.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Bairro" class="col-sm-2 col-form-label" style="font-size: 22px;">Bairro:</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-lg mb-3" name="bairros" required style="height: 40px;">

                            <?php
                            use DAO\BairroDAO;
                            require_once '../model/model.DAO/BairroDAO.php';

                            $am = new BairroDAO();
                            $bairros = $am->select();

                            foreach ($bairros as $b) :
                                echo "<option  value = '{$b['nome']}'>{$b['nome']}</option>";
                            endforeach;
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Renda:</label>
                    <div class="col-sm-10">
                        <input type="number" name="renda" required oninvalid="this.setCustomValidity('CAMPO OBRIGATORIO')" class="form-control">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0" style="font-size: 22px;">Tipo:</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Flat" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Flat
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Vivenda">
                                <label class="form-check-label" for="gridRadios2">
                                    Vivenda
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Imagem:</label>
                    <div class="col-sm-10">
                        <input type="file" required oninvalid="this.setCustomValidity('IMAGEM OBRIGATORIA')" name="img" class="form-control-file">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Descricao:</label>
                    <div class="col-sm-10 ">
                        <textarea class="form-control" name="descriacao" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10" id="btnn">
                        <button type="submit" class="btn btn-secondary">Registar</button>
                        <button type="" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="updateTipo" class="border border-dark rounded" style="display: none;">

            <form action="../controller/TipoController.php" method="Post">

                <div class="form-group row" style="display: flex;">
                    <label for="Nome" class="col-sm-2 col-form-label">
                        <h2>Alterar</h2>
                    </label>
                    <input id="id" style="width: 10vw; height:50px; margin-top:5px; font-weight:500; font-size:25px; margin-left:14px;" type="text" name="id" class="form-control">
                </div>

                <hr style="margin-top: 30px; margin-bottom:30px">

                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Novo nome:</label>
                    <div class="col-sm-10">
                        <input id="nome" type="text" name="nome" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Nova renda:</label>
                    <div class="col-sm-10">
                        <input type="number" id="renda" name="renda" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10" id="btnn">
                        <button type="submit" class="btn btn-secondary">Registar</button>
                        <a onclick="FecharEdit()" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    
    <footer class="bg-light text-center text-lg-start" style="margin-top: 30px;">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <h4>© 2022 Copyright Eddy-Luana</h4>
        </div>
    </footer>

    <script>
        var ja = false;
        function desable() {
            if (ja == false) {
                var cont = document.querySelector("#tab")
                var tp = document.querySelector("#tp")
                cont.style.display = 'none';
                tp.style.display = 'none';
                ja = true;
            } else {
                var cont = document.querySelector("#tab")
                var tp = document.querySelector("#tp")
                tp.style.display = 'flex'
                cont.style.display = 'inline-table';
                ja = false;
            }
        }

        function desable2() {
            var tp = document.querySelector("#ok")
            tp.style.display = 'none';
        }

        function mostraEdit(nome, renda, id) {
            var tp = document.querySelector("#updateTipo")
            var tp1 = document.querySelector("#renda")
            var tp2 = document.querySelector("#nome")
            var tp3 = document.querySelector("#id")
            tp.style.display = 'block';
            tp2.value = nome;
            tp1.value = renda;
            tp3.value = id;
        }

        function FecharEdit() {
            var tp = document.querySelector("#updateTipo")
            tp.style.display = 'none';
        }
    </script>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>