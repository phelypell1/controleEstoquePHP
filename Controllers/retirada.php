<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: home.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
     
    //Variaveis via post
    $id = filter_input(INPUT_POST, 'campo_id', FILTER_SANITIZE_NUMBER_INT);
    $txt_qt = filter_input(INPUT_POST, 'campo_antigo', FILTER_SANITIZE_NUMBER_INT);
    $txt_qtde = filter_input(INPUT_POST, 'campo_qtde', FILTER_SANITIZE_NUMBER_INT);
    $data_envio = date('Y-m-d');
    $user = $_SESSION['username'];

    if($txt_qtde <= "-1" || $txt_qtde <="0"){
        header('location: ../Views/retira-estoque.php?status=1');
        die();
    }
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $nvalor = ($txt_qt - $txt_qtde);

    $sql="update Estoque set quant='".$nvalor."', data_alteracao='".$data_envio."' ,user_alteracao ='".$user."' ";
    $sql.=" where id_estoque = '".$id."'";

    if(mysqli_query($link, $sql)){
       header('location: ../Views/listaestoque.php?status=1');
    }else{
        header('location: ../Views/listaestoque.php?status=2');
        echo'Error'.mysqli_error($link);
    }

?>