<?php
include_once('../Cabecalhos/cabecalhospage.php');
$status = isset($_GET['status']) ? $_GET['status'] : 0;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRControl</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <link rel="stylesheet" href="../PageStyle/cabecalho.css">
</head>

<body>
    <?php
    include_once('../Connections/Conexao.php');
    $ObjDB = new DB();
    $link = $ObjDB->connecta_mysql();
    $txt_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "select * from Estoque where id_estoque = '$txt_id'";
    $resultado = mysqli_query($link, $sql);
    if ($resultado) {
        while ($registros = mysqli_fetch_array($resultado)) {
            $txt_id = $registros['id_estoque'];
            $desc = $registros['descricao'];
            $quant = $registros['quant'];
            $data = $registros['data_cadastro'];
            $user = $registros['user_cad'];
            $status = $registros['status'];
            $localArm = $registros['local_armazenado'];
        }
    }
    ?>
    <div class="container">
        <div class="col-md-12">
            <br><br>
            <h1>Retirada</h1>
            <div class="bg-modal">
                <div class="modal-content">
                    <div class="container">
                        <form action="../Controllers/retirada.php" method="post">
                            <div class="col-md-12">
                                <h5>Teste</h5>
                                <hr>
                                <br>
                                <div class="row form-group">
                                    <div class=" col-md-1 col">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control" name="campo_id" readonly value="<? echo $txt_id ?>">
                                    </div>
                                    <div class="col col-md-6 col">
                                        <label for="">Descrição</label>
                                        <input type="text" class="form-control" readonly value="<? echo $desc ?>">
                                    </div>
                                    <div class="col col-md-3 col">
                                        <label for="">Status</label>
                                        <input type="text" class="form-control" readonly value="<? echo $status ?>">
                                    </div>
                                    <div class="col col-md-2 col">
                                        <label for="">Qtde Atual</label>
                                        <input type="text" class="form-control" name="campo_antigo" readonly value="<? echo $quant ?>">
                                    </div>
                                    <div class="col col-md-1 col">
                                        <label for="">Qtde</label>
                                        <input type="text" class="form-control" name="campo_qtde" id="campo_qtde">
                                    </div>
                                    <div class="col-md-2 btn-retirar">
                                        <button class="btn btn-primary col">Retirar</button>
                                    </div>
                                    <div class="col-md-2 btn-retirar">
                                        <button class="btn btn-danger col">Cancelar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--<form action="../Controllers/retirada.php" method="post" class="fundo">
                <div class="form-row col">
                    <div class="form-group posit">
                        <label for="">ID</label>
                        <input type="text" name="campo_id" class="form-control inputs-id" readonly value="<? echo $txt_id ?>">
                    </div>
                    <div class="form-group posit col-md-4">
                        <label for="">Descrição</label>
                        <input type="text" class="form-control inputs" readonly value="<? echo $desc ?>">
                    </div>
                    <div class="form-group posit">
                        <label for="">Qtde</label>
                        <input type="text" name="campo_antigo" class="form-control inputs-id" maxlength="3" readonly value="<? echo $quant ?>">
                    </div>
                    <div class="form-group posit">
                        <label for="form-group posit">Data</label>
                        <input type="date" class="form-control inputs" readonly value="<? echo $data ?>"> 
                    </div>
                    <div class="form-group posit">
                        <label for="">Status</label>
                        <input type="text" class="form-control inputs col-md-7" readonly value="<? echo $status ?>"> 
                    </div>
                </div>
                <hr>
                <br>
                <div class="row col-md-6">
                <div class="form-group col">
                    <label for="">Quantidade a ser retirada</label>
                    <input type="number" name="campo_qtde" id="campo_qtde"class="form-control col-md-4 inputs">
                </div>
                <div class="form-group col">
                    <button class="btn btn-primary">Retirar</button>
                    <button class="btn btn-primary">Sair</button>
                </div>
                </div>
                
                <br>
            </form>-->
            <?php
            if ($status == 1) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Opss!</strong>Certeza que a quantidade será negativa ? Volte para lista e tente novamente..
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
            }
            if ($status == 2) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Opss!</strong>Certeza que a quantidade será negativa ? Volte para lista e tente novamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
            }
            ?>
        </div>
    </div>
</body>