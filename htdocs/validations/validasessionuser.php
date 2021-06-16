<?php
    if (!isset($_SESSION)) session_start();
    
    if (!isset($_SESSION['usuarioId']) OR ($_SESSION['usuarioNiveisAcessoId'] > 1)) {
        session_destroy();
        header("Location: ../portal/sair.php"); exit;
    }
?>