<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
    <Style>
        <?php include("Listas2.css"); ?>td {
            font-size: 23px;
        }

        th {
            font-size: 30px;
            font-weight: 500;
        }
    </Style>
</head>

<body>
    <?php

    use DAO\BairroDAO;
    use DAO\PropriedadeDAO;

    require_once '../model/model.DAO/BairroDAO.php';
    require_once '../model/model.DAO/PropriedadeDAO.php';

    $pp = new PropriedadeDAO();
    $am = new BairroDAO();

    $bairros = $am->select();
    $props = $pp->select();
    ?>


    <div class="head">
        <h1>SIAR-IMOB</h1>
    </div>

    <div class="content">
        <div class="top-toolbar" style="display: flex; justify-content:space-between; margin-top:15px;">
            <h2 id="prop" style="margin-top: 10px; margin-left:10px;letter-spacing: 7px;">Propriedades</h2>
            <button id="bt" onclick="desableProps()" class="btn btn-outline-dark">Listar/ Nao Listar</button>
        </div>

        <hr>

        <?php
        if (count($props) > 0) :
        ?>
            <div class="tabela">
                <table id="tab" class="table  table-secondary">
                    <tr id="tab_produto">
                        <th>Codigo</th>
                        <th>Bairro</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Inquilino</th>
                        <th>Accoes</th>
                    </tr>
                    <?php foreach ($props as $p) : ?>
                        <tr>
                            <td><?= $p["id"]; ?></td>
                            <td><?= $p["bairro"]; ?></td>
                            <td><?= $p["Tipo"]; ?></td>
                            <td><?= $p["estado"]; ?></td>
                            <td><?= $p["inquilino"]; ?></td>
                            <td>
                                <a class="btn btn-outline-danger" style="font-size: 21px;">Desativar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>

        <div id="addProp" class="border border-dark rounded">
            <h2>Adiciona Novas Propriedades</h2>
            <hr style="margin-top: 30px; margin-bottom:30px">
            <form method="POST" action="../controller/PropriedadeController.php">
                <div class="form-group row">
                    <label for="Bairro" class="col-sm-2 col-form-label" style="font-size: 22px;">Bairro:</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-lg mb-3" name="bairro">

                            <?php
                            foreach ($bairros as $b) :
                                echo "<option value = '{$b['nome']}'>{$b['nome']}</option>";
                            endforeach;
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Bairro" class="col-sm-2 col-form-label" style="font-size: 22px;">Nome:</label>
                    <div class="col-sm-10">
                        <select class="form-select form-select-lg mb-3" style="height: 40px;" name="tipoProp">

                            <?php
                            use DAO\TipoDAO;
                            require_once '../model/model.DAO/TipoDAO.php';

                            $am = new TipoDAO();
                            $props = $am->select();

                            foreach ($props as $b) :
                                echo "<option  value = '{$b['nome']}'>{$b['nome']}</option>";
                            endforeach;
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Quantidade:</label>
                    <div class="col-sm-10">
                        <input type="number" name="qtd" class="form-control" id="nomeTipo" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="nomeTipo" placeholder="">
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

        <hr style="margin-top: 13vh; margin-bottom:0px;  border: 1px solid;">
        <div class="top-toolbar" style="display: flex; justify-content:space-between; margin-top:15px;">
            <h2 id="br" style="margin-top: 10px; margin-left:10px;letter-spacing: 7px;">Bairros</h2>
            <button id="bt" onclick="desableBairros()" class="btn btn-outline-dark">Listar/ Nao Listar</button>
        </div>

        <hr>

        <?php
        if (count($bairros) > 0) :
        ?>

            <div class="tabela">
                <table id="tab2" class="table  table-secondary">
                    <tr id="tab_produto">
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Accoes</th>
                    </tr>
                    <?php foreach ($bairros as $p) : ?>
                        <tr>
                            <td><?= $p["id"]; ?></td>
                            <td><?= $p["nome"]; ?></td>
                            <td>
                                <a class="btn btn-outline-danger" style="font-size: 21px;">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endif; ?>


        <div id="addProp" class="border border-dark rounded">
            <h2>Adiciona Novo Bairro</h2>
            <hr style="margin-top: 30px; margin-bottom:30px">
            <form action="../controller/BairroController.php" method="POST">
                <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label" style="font-size: 22px;">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" required name="bairro" class="form-control" id="nomeTipo" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10" id="btnn">
                        <button type="submit" class="btn btn-secondary">Registar</button>
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <footer class="bg-light text-center text-lg-start" style="margin-top: 30px;">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <h4>© 2020 Copyright Eddy-Luana</h4>
        </div>
        <!-- Copyright -->
    </footer>

    <script>
        jaProps = false;
        jaBairros = false;

        function desableProps() {
            if (jaProps == false) {
                var cont = document.querySelector("#tab")
                var tp = document.querySelector("#prop")
                cont.style.display = 'none';
                tp.style.display = 'none';
                jaProps = true;
            } else {
                var cont = document.querySelector("#tab")
                var tp = document.querySelector("#prop")
                tp.style.display = 'flex'
                cont.style.display = 'inline-table';
                jaProps = false;
            }
        }

        function desableBairros() {
            if (jaBairros == false) {
                var cont = document.querySelector("#tab2")
                var tp = document.querySelector("#br")
                cont.style.display = 'none';
                tp.style.display = 'none';
                jaBairros = true;
            } else {
                var cont = document.querySelector("#tab2")
                var tp = document.querySelector("#br")
                tp.style.display = 'flex'
                cont.style.display = 'inline-table';
                jaBairros = false;
            }
        }
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>