<?php
    session_start();

    if(isset($_SESSION['Login'])){
        header('Location: ../Views/login.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
    
    //variaveis//
    $txt_desc = $_POST['campo_descricao'];
    $txt_quant = $_POST['campo_quantidade'];
    $txt_data = $_POST['campo_data'];
    $txt_armazenado = $_POST['campo_armazenado'];
    $txt_status = "Em Estoque";

    //Session Para trazer dados do usuário//
    $nome = $_SESSION['username'];

    if($txt_desc == '' || $txt_quant == '' || $txt_data== '' || $txt_armazenado == ''){
        echo'<br>';
        echo'<div class="alert alert-warning" role="alert"><p>Preencha os campos!</p></div>';
        die();
    }

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql = "insert into Estoque (descricao, quant, data_cadastro, user_cad, status, local_armazenado)";
    $sql.="values('$txt_desc', '$txt_quant', '$txt_data','$nome','$txt_status','$txt_armazenado')";

    mysqli_query($link,$sql);

?>