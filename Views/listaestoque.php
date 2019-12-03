<?php
require_once('../Cabecalhos/cabecalhospage.php');
if (!isset($_SESSION['login'])) {
    header('Location: login.php?erro=1');
}
header("Refresh:240");
if (header("Refresh:240")) {
    header('Location: login.php');
}
$status = isset($_GET['status']) ? $_GET['status'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRControl</title>
    <script src="../jquery/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <link rel="stylesheet" href="../PageStyle/cabecalho.css">
    <link rel="stylesheet" href="../PageStyle/Poups.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../scripts/jquery-3.4.1.js"></script>
    <!--<script>
        $(document).ready(function() {
            document.getElementById('btn').addEventListener("click", function() {
                document.querySelector('.bg-modal').style.display = "flex";
            });

            document.querySelector('.close').addEventListener("click", function() {
                document.querySelector('.bg-modal').style.display = "none";
            });
        });
    </script>-->
    <script>
         $(document).ready(function(){
            function atualiza(){
                $.ajax({
                    url: '../Controllers/list_estoque.php',
                    success: function(data){
                        $('#listas').html(data);
                    }
                });
            }
            atualiza();
        });
    </script>
    <script>
        function alertas() {
            $('#myAlert').on('closed.bs.alert', function() {
                //do something...
            });
        }
    </script>
</head>

<body>
    <div class="container  fundo">
        <div class=" ">
            <h4 class="">Estoque</h4>
            <div class="" id="listas">
             
            </div>
            
        </div>
    </div>
    <!--<div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <div class="container">
                <form action="">
                    <div class="col-md-12">
                        <h5>Teste</h5>
                        <hr>
                        <br>
                        <div class="row form-group">
                            <div class=" col-md-1 col">
                                <label for="">ID</label>
                                <input type="text" class="form-control" readonly value="<?echo $id?>">
                            </div>
                            <div class="col col-md-6 col">
                                <label for="">Descrição</label>
                                <input type="text" class="form-control" readonly value="<?echo $txt_desc?>">
                            </div>
                            <div class="col col-md-3 col">
                                <label for="">Status</label>
                                <input type="text" class="form-control" readonly value="<? echo $txt_status?>">
                            </div>
                            <div class="col col-md-2 col">
                                <label for="">Qtde Atual</label>
                                <input type="text" class="form-control" readonly value="<?echo $txt_quant?>">
                            </div>
                            <div class="col col-md-1 col">
                                <label for="">Qtde</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary col">Retirar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>-->
    <?php
    if ($status == 1) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong> Os dados da tabela foram atualizados.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
    } elseif ($status == 2) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong> Não foi possivel atualizar os dados, Tente novamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
    } elseif ($status == 2) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong> Não foi possivel atualizar os dados, Tente novamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
    }
    ?>
    </div>
    </div>

</body>

</html>