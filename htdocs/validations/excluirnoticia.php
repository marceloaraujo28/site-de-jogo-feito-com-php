<?php

        include_once('../validations/validasessionadm.php');
        include_once('../functions/conexao.php');
        $id = $_GET['id'];
        if(empty($id)){
            header('location: ../pages/admin/painelnot.php');
        }else{
            $sql = "DELETE FROM noticia WHERE id='$id'";
            $query = mysqli_query($conn, $sql);
            header('location: ../pages/admin/painelnot.php');
            $_SESSION['loginErro'] = "Excluido";
        }
?>