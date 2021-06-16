<?php

        session_start();
        include_once('../functions/conexao.function.php');
        $conecta = new dbConfig();
        $conn = $conecta->__construct();
        


    if((isset($_POST['user'])) && (isset($_POST['password']))){

        $usuario = mysqli_real_escape_string($conn, $_POST['user']); 
        $senha = md5(mysqli_real_escape_string($conn, $_POST['password']));
            

        $result_usuario = "SELECT * FROM usuarios WHERE username = '$usuario' && password = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        

        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['username'];
            $_SESSION['usuarioSenha'] = $resultado['password'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['nivel'];
            
            if($_SESSION['usuarioNiveisAcessoId'] < 2){
                header("Location: ../pages/user/paineluser.php");
            }else{
                header("Location: ../pages/admin/admin.php");
            }
   
        }else{    

            $_SESSION['loginErro'] = "Usuário ou senha inválido";
            header("Location: ../pages/portal/login.php");
		}
    }else{
        $_SESSION['loginErro'] = "Algum campo não foi preenchido!";
        header("Location: ../pages/portal/login.php");
    }

?>