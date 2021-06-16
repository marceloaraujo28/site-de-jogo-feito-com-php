<?php

    include_once("../functions/conexao.php");
    session_start();

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $secreta = mysqli_real_escape_string($conn, $_POST['secreta']);


    if(empty($email) || empty($secreta)){
        $_SESSION['loginErro'] = "Algum campo não foi preenchido!";
        header("location: ../pages/portal/esqueceusenha.php");
    }else{
        $sql = "SELECT * FROM usuarios WHERE email = '$email' and secreta = '$secreta'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);

        if($result > 0){
            $_SESSION['esqueceusenha'] = "ok";
            $_SESSION['email'] = $email;
            header("location: ../pages/portal/esqueceusenha2.php");
        }else{
            $_SESSION['loginErro'] = "Email ou secreta incorretos!";
            header("location: ../pages/portal/esqueceusenha.php");
        }
    }



?>