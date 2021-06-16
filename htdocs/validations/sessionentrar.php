<?php
    if (!isset($_SESSION)) session_start();
    
    if (!isset($_SESSION['usuarioId']) OR ($_SESSION['usuarioNiveisAcessoId'] < 2)) {
        header("Location: ../pages/user/paineluser.php");
    }else{
        header("Location: ../pages/admin/paineluser.php");
    }
?>