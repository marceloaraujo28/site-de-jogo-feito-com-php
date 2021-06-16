<?php
	include_once("../functions/crud.function.php");
    include_once("../functions/conexao.function.php");
    include_once("../functions/conexao.php");
    include_once("recaptcha.php");
	session_start();	
    $crud = new Crud();
    $conexao = new dbConfig();


	
	if(isset($_POST['submit'])) {
		$username = $crud->escape_string($_POST['username']);
		$password1 = $crud->escape_string($_POST['password']);
        $confirmpass = $crud->escape_string($_POST['confirmpass']);
		$email = $crud->escape_string($_POST['email']);
        $secreta = $crud->escape_string($_POST['secreta']);
        
        $userid=trim($_POST['username']);
        $password=trim($_POST['password']);
        $initial=substr($userid,0,1);
        $userlenght=strlen($userid);
        $passlenght=strlen($password);
        $loc = "C:\\xampp\\\htdocs\\account";

        if (isset($_POST['g-recaptcha-response'])) {
            $captcha_data = $_POST['g-recaptcha-response'];
        }
        
        // Se nenhum valor foi recebido, o usuário não realizou o captcha
        if (!$captcha_data) {
            $_SESSION['error'] = "Recaptcha inválido!";
            header("Location: ../pages/portal/cadastro.php");
            exit();
        }

        $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le_XdUaAAAAACW-xdunrr0eJbd9jFo50KzzFErx&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$responseData = json_decode($resposta);	


        $msg = $crud->check_empty($_POST, array('username', 'password', 'email', 'confirmpass', 'secreta'));
		 if($msg == false){
           if ($responseData->success == true){
                if($confirmpass == $password){
                    $pesquisa = "SELECT * FROM usuarios WHERE username = '$username' OR email = '$email'";
                    $executa = mysqli_query($conn, $pesquisa);
                    $consultar = mysqli_num_rows($executa);
                    if($consultar < 1){
                        if(!@preg_match("/^[0-9a-zA-Z]{4,12}$/",$userid)){
                            
                            $_SESSION['error'] = "Seu login so pode ter caracteres¸a-z,A-Z";
                            header("Location: ../pages/portal/cadastro.php");
                            exit();
                        }
                    elseif(!@preg_match("/^[0-9a-zA-Z]{4,12}$/",$password)){
                        
                            $_SESSION['error'] = "Sua senha so pode ter caracteres¸a-z,A-Z";
                            header("Location: ../pages/portal/cadastro.php");
                            exit();
                        }
                    else{
                        $passmd5 = md5($password1);
                        $inserir = "INSERT INTO usuarios (username,password, email, secreta, dateregister) VALUES ('$username', '$passmd5', '$email', '$secreta', now())";
                        $f=@fopen("5900xt","r") or die("<p class='style1'>Não foi possivel criar a conta $userid. - CONTATE A ADMINISTRAÇÃO<a href='cadastro.php'><span class='style2'>Voltar</span></a>");
                        $acc=@fread($f,9999);
                        $demoid=substr($acc,0,$userlenght);
                        $demopass=substr($acc,16,$passlenght);
                        $acc=str_replace($demoid,$userid,$acc);
                        $acc=str_replace($demopass,$password,$acc); 
                        $faf=@fopen($loc ."/". $initial ."/". $userid,'w');  
                        
                        fwrite($faf,$acc) or die("<p class='style1'>Erro ae criar a conta $userid! - CONTATE A ADMINISTRAÇÃO  <a href='cadastro.php'><span class='style2'>Voltar</span></a>");
                        @fclose($f);
                       
                        

                        if (mysqli_query($conn, $inserir)) {
                            $_SESSION['error'] = "Cadastrado com sucesso!";
                            header("Location: ../pages/portal/cadastro.php");
                            exit();
                        }else {
                            $_SESSION['error'] = "Error: " . $inserir . "<br>" . mysqli_error($conn);
                            header("Location: ../pages/portal/cadastro.php");
                            exit();
                            
                            }

                        
                    }
                    }else{
                        $_SESSION['error'] = "Login ou Email ja utilizado!";
                        header("Location: ../pages/portal/cadastro.php");
                        exit();
                    }
                }else{
                    $_SESSION['error'] = "As senhas não conferem!";
                    header("Location: ../pages/portal/cadastro.php");
                    exit();
                }
            }else{
                $_SESSION['error'] = "Recaptcha inválido";
                header("Location: ../pages/portal/cadastro.php");
                exit();
            }
         }else{
             $_SESSION['error'] = "Algum campo não foi preenchido!";
             header("Location: ../pages/portal/cadastro.php");
             exit();
         }
	}else{
        header("Location: ../pages/portal/cadastro.php");
        $_SESSION['error'] = "Algum campo não foi preenchido!!";
    }

    
    
?>
