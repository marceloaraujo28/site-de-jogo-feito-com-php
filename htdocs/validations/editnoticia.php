<?php
    include_once("../functions/conexao.php");
    include_once("validasessionadm.php");

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $mensagem = $_POST['mensagem'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];

    if(empty($titulo) || empty($descricao) || empty($mensagem)){
        $_SESSION['loginErro'] = "Algum campo esta Vazio!";
        header('location: ../pages/admin/editarnoticia.php?id='.$id);
    }else{
        $sql = "UPDATE noticia SET titulo='$titulo', descricao = '$descricao', mensagem = '$mensagem', categoria = '$categoria' WHERE id='$id'";
        $query = mysqli_query($conn, $sql);
        $_SESSION['loginErro'] = "Noticia alterada com sucesso!";
        header('location: ../pages/admin/painelnot.php');
    }

?>