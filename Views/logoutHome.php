<?php
    session_start(); session_destroy();
    unset($_SESSION['Login']);
    unset($_SESSION['email']);
    header('Location: ../Views/login.php');
?>
