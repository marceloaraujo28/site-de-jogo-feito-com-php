<?php
    include_once("../functions/conexao.php");
    include_once("validasessionadm.php");

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $mensagem = $_POST['mensagem'];
    $categoria = $_POST['categoria'];
    $nomeimg = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];
    $nomeimgnoticia = $_FILES['imgnoticia']['name'];
    $tempnoticia = $_FILES['imgnoticia']['tmp_name'];

    if(empty($titulo) || empty($descricao) || empty($mensagem) || empty($nomeimg) || empty($nomeimgnoticia)){
        $_SESSION['loginErro'] = "Algum campo não foi preenchido!";
        header('location: ../pages/admin/painelnot.php');
    }else{
        $sql = "INSERT INTO noticia (titulo, descricao, mensagem, imagem, imgnotice, categoria) values ('$titulo', '$descricao', '$mensagem', '$nomeimg', '$nomeimgnoticia', '$categoria')";
        $query = mysqli_query($conn, $sql);

        move_uploaded_file($temp, "../imagesnoticia/".$nomeimg);
        move_uploaded_file($tempnoticia, "../imagesnoticia/".$nomeimgnoticia);
        $_SESSION['loginErro'] = "Noticia postada com sucesso!";
        header('location: ../pages/admin/painelnot.php');
    }

?>