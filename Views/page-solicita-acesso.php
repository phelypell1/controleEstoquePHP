<?php
    $status = isset($_GET['enviado']) ? $_GET['enviado'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRControl</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <link rel="stylesheet" href="../PageStyle/cabecalho.css">
    <link rel="stylesheet" href="../PageStyle/outher.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
        function alertas(){
            $('#myAlert').on('closed.bs.alert',function(){
                //do something...
            });
            }
    </script>    
    <script type="text/javascript">
      $(document).ready(function(){
        $('#btn-enviar').click(function(){
            var campo_vazio = false;
            if($('#campo_nome').val() ==''){
                $('#campo_nome').css({'border-color': '#A94442'});
                    campo_vazio = true;
            }
            if($('#campo_email').val() ==''){
                $('#campo_email').css({'border-color': '#A94442'});
                    campo_vazio = true;
            }
            if($('#campo_regiao').val() == ''){
                $('#campo_regiao').css({'border-color': '#A94442'});
                    campo_vazio = true;
            }
            if($('#campo_obs').val() == ''){
                $('#campo_obs').css({'border-color': '#A94442'});
                    campo_vazio = true;
            }
            if(campo_vazio) return false;
        });
    });
    </script>
</head>
<body>
    <div class="container ">
        <div class="row">
      
        <div class="col-md-6 fundo form-content">
            <h3>Solicitação Acesso</h3>
            <hr>
          <form action="../EmailPhp/envia_email.php" method="post">
              <div class="form-group top">
                <label for="campo_nome">Nome Completo</label>
                <input type="text" name="campo_nome" id="campo_nome" class="form-control text-input" maxlength="45">
              </div>
              <div class="form-group">
                <label for="campo_nome">email</label>
                <input type="email" name="campo_email" id="campo_email" class="form-control text-input " maxlength="45">
              </div>
              <div class="form-group">
                <label for="inputState">Região</label>
                <select id="inputState" class="form-control text-input" name="campo_regiao">
                    <option selected>--Selecione--</option>
                    <option value="Metropolitana">Metropolitana</option>
                    <option value="Norte" >Norte</option>
                    <option value="Sul">Sul</option>
                    <option value="Todas">Todas</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Observações</label> 
                <textarea name="campo_obs" id="campo_obs" class="form-control text-input" rows="1" maxlength="100"></textarea>
              </div>
              <div class="form-group">
              <button type="submit" class="btn btn-primary col-md-12" id="btn-enviar">Enviar</button>
              </div>
              <div class="form-group">
              <a class="btn btn-danger col-md-12 btn-cancelar" href="../Views/login.php">Sair</a>
              </div>
              <?php
                if($status == 1){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong> Email enviado com sucesso, dentro de instantes você irá receber um email com seu login e senha.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }elseif($status == 2){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Opsss!</strong> Algo de errado não está certo, verifique os campos e tente novamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
              ?>
              </form>
              </div>
        </div>
    </div>
</body>
</html>
