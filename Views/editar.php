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

    <div class="container">
        <div class="row">
            <div class="col-md-20">
                <br><br>
                <h1>Editar Estoque</h1>

                <fieldset class="borderchamado">
                <?php
                            include_once('../Connections/Conexao.php');
                            
                            $ObjDB = new DB();
                            $link = $ObjDB -> connecta_mysql();
                            
                            $txt_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                            $sql = "select * from Estoque where id_estoque = '$txt_id'";
                            
                            $resultado = mysqli_query($link, $sql);
                            if($resultado){
                                while($registros = mysqli_fetch_array($resultado)){
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
                    <form action="../Controllers/update.php" method="post">
                        <div class=" form-row">
                           <div class="form-group col-md-5 deslocamento">
                               <label for="">Descrição Produto</label>
                               <input type="text" value="<?echo$desc?>" name="campo_descricao" id="campo_descricao" class="form-control" maxlength="50">
                           </div>
                           <div class="form-group col-md-1 deslocamento">
                               <label for="">Qtde.:</label>
                               <input type="number" value="<?php echo $quant?>" name="campo_quantidade" id="campo_quantidade" class="form-control">
                           </div>
                           <div class="form-group col-md-2 deslocamento">
                               <label for="">Data Cadastro</label>
                               <input type="date" class="form-control" value="<?echo $data?>" readonly="readonly" id="campo_data" maxlength="3">
                           </div>
                           <div class="form-group col-md-3 deslocamento input-user">
                               <label for="">Cadastro por</label>
                               <input type="text" class="form-control" value="<?echo $user?>" readonly="readonly"  name="campo_user" id="campo_user" maxlength="3">
                           </div>
                           <div class="form-group col-md-2 deslocamento1">
                               <label for="">Status</label>
                               <input type="text" class="form-control" value="<?echo $status?>" readonly="readonly"  name="campo_status" id="campo_status" maxlength="3">
                           </div>
                           <div class="form-group col-md-2 deslocamento1">
                                <label for="inputState">Armazenado.:</label>
                                <select   name="campo_armazenado" id="campo_armazenado"  class="form-control">
                                <option><?php echo $localArm?></option>
                                <option>--Selecione--</option>
                                <option value="CPD">CPD</option>
                                <option value="Quartinho">Quartinho</option>
                                </select>
                            </div>
                            <div class="form-group col-md-1 deslocamento-id">
                               <label for="">ID</label>
                               <input type="text" class="form-control" readonly="readonly" value="<?echo $txt_id?>"  name="campo_id" id="campo_campo_id" maxlength="4">
                           </div>
                           
                            <div class="form-group col-md-2 deslocamento-btn">
                                <button type="submit" class="btn btn-default" id="btn-gravar"><img src="../imagens/salvar.png" width="35" ></img></button>
                            </div>
                            <div class="form-group col-md-2 deslocamento-btn-cancel">
                               <a href="../Views/listaestoque.php" class="btn btn-default"><img src="../imagens/cancel.png" width="35" ></a>
                            </div>
                            
                       </div>
                       <div class="form-group col-md-6">
                               <h6 class="alert-danger">Atenção ! Cuidado ao editar quantidade, a mesma não realiza soma.</h6>
                           </div>

                    </form>
                    <?php
                        if($status == 1){
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Opss!</strong>Certeza que a quantidade será negativa ?.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                        }
                    
                    ?>
                    
                </fieldset>
            </div>
        </div>
    </div>
</body>