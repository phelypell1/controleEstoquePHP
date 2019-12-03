<?php
    require_once('../Cabecalhos/cabecalhospage.php');
    if(!isset($_SESSION['login'])){
        header('Location: ../Views/login.php?erro=1');
    }
    $cad = isset($_GET['ok']) ? $_GET['ok'] : 0;
    header("Refresh:240");
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <link rel="stylesheet" href="../PageStyle/cabecalho.css">
    <script lang="javascript">
        $(document).ready(function(){
            $('#btn_acesso').click(function(){
                if($('#campo_descricao').val().length > 0 && $('#campo_quantidade').val().length > 0 && $('#campo_data').val().length > 0){
                    $.ajax({
                       url: '../Controllers/cadastrarProdutos.php',
                       method: 'post',
                       data: $('#formularioCadastro').serialize(),
                       success: function(data){
                           $('#campo_descricao').val('');
                           $('#campo_quantidade').val('');
                           $('#campo_data').val('');
                           $('#campo_armazenado').val('--Selecione--');
                           alert('Cadastrado com sucesso !');
                       }
                   });
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12 ">
                <h4 class="">Cadastro de Produtos</h4>
                <hr>
                <br>
                <form method="POST" id="formularioCadastro" action="">
                    <fieldset class="borderchamado">
                       <div class=" form-row">
                           <div class="form-group col-md-6 deslocamento">
                               <label for="">Descrição Produto</label>
                               <input type="text" id="campo_descricao" name="campo_descricao" class="form-control" id="" placeholder="Ex. Teclados" maxlength="50">
                           </div>
                           <div class="form-group col-md-1 deslocamento">
                               <label for="">Qtde.:</label>
                               <input type="number" id="campo_quantidade" name="campo_quantidade" class="form-control">
                           </div>
                           <div class="form-group col-md-2 deslocamento">
                               <label for="">Data Cadastro</label>
                               <input type="date" class="form-control" id="campo_data" name="campo_data" maxlength="3">
                           </div>
                           <div class="form-group col-md-2 deslocamento">
                                <label for="inputState">Armazenado.:</label>
                                <select  id="campo_armazenado" name="campo_armazenado" class="form-control">
                                <option selected id="selecione">--Selecione--</option>
                                <option value="CPD">CPD</option>
                                <option value="Quartinho">Quartinho</option>
                                </select>
                            </div>
                       </div>
                        <div class="form-group col-md-12">
                            <input type="file" class="fileinput-button">
                            <button type="button" class="btn-criar-chamado pull-right col-md-2" id="btn_acesso">Cadastrar</button>
                        </div>
                    </fieldset>
                </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>