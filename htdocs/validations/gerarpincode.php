<?php
    include_once("../functions/conexao.php");
    session_start();

    $usuario = filter_var($_POST['user']);
	$pincode = filter_var($_POST['pincode']);
	$valor = filter_var($_POST['valor']);
	$qtd = filter_var($_POST['shadows']);
    $dir = "Diretorio";

    if(empty($usuario) || empty($valor) || empty($qtd)){
        $_SESSION['loginErro'] = "Algum campo não foi preenchido!";
        header("location:   ../pages/admin/admin.php");
    }else{
            
            $sql = "INSERT INTO pincode (usuario, valor, pincode, shadows, data) values('$usuario', '$valor', '$pincode', '$qtd', now())";
            $query = mysqli_query($conn, $sql);
            $_SESSION['loginErro'] = "PINCODE Gerado!";
             header("location:   ../pages/admin/admin.php");
    }


?>