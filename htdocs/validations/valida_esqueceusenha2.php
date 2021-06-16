<?php
    include_once("../functions/conexao.php");
    session_start();

    $email = $_POST['email'];
    $novasenha = $_POST['novasenha'];
    $confirmsenha = $_POST['confirmsenha'];

    if(!empty($email)){
        if(empty($novasenha) || empty($confirmsenha)){
                $_SESSION['esqueceusenha'] = "ok";
                $_SESSION['email'] = $email;
                $_SESSION['loginErro'] = "Algum campo não foi preenchido!";
                header("location: ../pages/portal/esqueceusenha2.php");
        }else{
            if($novasenha == $confirmsenha){
                if(!@preg_match("/^[0-9a-zA-Z]{4,12}$/",$novasenha)){
                    $_SESSION['esqueceusenha'] = "ok";
                    $_SESSION['email'] = $email;
                    $_SESSION['loginErro'] = "Sua senha so pode ter caracteres¸a-z,A-Z";
                    header("location: ../pages/portal/esqueceusenha2.php");
                    exit();
                }else{
                    $senhamd5 = md5($novasenha);
                    $sql = "UPDATE usuarios SET password='$senhamd5' WHERE email='$email'";
                    $query = mysqli_query($conn, $sql);
                    $_SESSION['loginErro'] = "Senha alterada com sucesso";
                    header("location:   ../pages/portal/login.php");
                }

            }else{
                $_SESSION['esqueceusenha'] = "ok";
                $_SESSION['email'] = $email;
                $_SESSION['loginErro'] = "Senhas não conferem!";
                header("location: ../pages/portal/esqueceusenha2.php");
            }
        }
    }else{
        header("location: ../../index.php");
    }

?>

