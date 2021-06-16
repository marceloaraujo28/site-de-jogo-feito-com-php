<?php

    include_once("../functions/conexao.php");
    session_start();
    $id = $_SESSION['usuarioId'];
    $senhasession =  $_SESSION['usuarioSenha'];

    $senhaatual = mysqli_real_escape_string($conn, $_POST['passwordatual']); 
    $novasenha = mysqli_real_escape_string($conn, $_POST['passwordnovo']); 
    $confirmpass = mysqli_real_escape_string($conn, $_POST['confirmpassword']); 

   if(empty($senhaatual) || empty($novasenha) || empty($confirmpass)){
        $_SESSION['loginErro'] = "Algum campo não foi preenchido!";
        header("Location: ../pages/user/paineluser.php");
   }else{
       if($novasenha == $confirmpass){
            if(md5($senhaatual) == $senhasession){
                if(!@preg_match("/^[0-9a-zA-Z]{4,12}$/",$novasenha)){
                        $_SESSION['loginErro'] = "Sua senha só pode ter caracteres¸a-z,A-Z";
                        header("Location: ../pages/user/paineluser.php");
                        exit();
                    }else{
                        $senhamd5 = md5($novasenha);
                        $insert = "UPDATE usuarios SET password='$senhamd5' WHERE id='$id'";
                        $query = mysqli_query($conn, $insert);
                        $_SESSION['loginErro'] = "Senha alterada com sucesso";
                        header("Location: ../pages/user/paineluser.php");
                        exit();
                    }
            }else{
                $_SESSION['loginErro'] = "Senha atual incorreta";
                header("Location: ../pages/user/paineluser.php");
            }
       }else{
            $_SESSION['loginErro'] = "Senhas não conferem!";
            header("Location: ../pages/user/paineluser.php");
       }
   }
?>