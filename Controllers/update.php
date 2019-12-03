<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: home.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
     
    //Variaveis via post
    $txt_id = filter_input(INPUT_POST, 'campo_id', FILTER_SANITIZE_STRING);
    $txt_desc = filter_input(INPUT_POST, 'campo_descricao', FILTER_SANITIZE_STRING);
    $txt_qtde = filter_input(INPUT_POST, 'campo_quantidade', FILTER_SANITIZE_STRING);
    $txt_data = filter_input(INPUT_POST, 'campo_data', FILTER_SANITIZE_STRING);
    $txt_user = filter_input(INPUT_POST, 'campo_user', FILTER_SANITIZE_STRING);
    $txt_status = filter_input(INPUT_POST, 'campo_stats', FILTER_SANITIZE_STRING);
    $txt_armazenado = filter_input(INPUT_POST, 'campo_armazenado', FILTER_SANITIZE_STRING);
    $data_envio = date('Y-m-d');
    $user_logado = $_SESSION['username'];

    if($txt_desc == "" || $txt_qtde <= "-1"  || $txt_armazenado==""){
        header('location: ../Views/editar.php?status=1 user_alteracao');
        die();
    }
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql="update Estoque set descricao='".$txt_desc."', quant='".$txt_qtde."', local_armazenado='".$txt_armazenado."', data_alteracao ='".$data_envio."' , user_alteracao ='".$user_logado."' ";
    $sql.=" where id_estoque = '".$txt_id."'";

    if(mysqli_query($link, $sql)){
       header('location: ../Views/listaestoque.php?status=1');
    }else{
        header('location: ../Views/listaestoque.php?status=2');
       //echo'Error'.mysqli_error($link);
    }

?>