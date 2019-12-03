<?php
    require_once('../Cabecalhos/cabecalhospage.php');
    if(!isset($_SESSION['login'])){
        header('Location: login.php?erro=1');
    }
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
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <link rel="stylesheet" href="../PageStyle/cabecalho.css">
    <script src="../scripts/jquery-3.4.1.js"></script>
</head>
<body>
    <div class="container">
    </div>
</body>
<?php
    require_once('../Cabecalhos/rodape.php');
?>
</html>