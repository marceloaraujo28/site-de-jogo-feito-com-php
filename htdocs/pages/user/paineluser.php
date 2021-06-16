<!DOCTYPE html>
<html lang="en">

<?php
    include_once "../../validations/validasessionuser.php";
	include_once "../../functions/crud.function.php";
    include_once "../..//functions/conexao.php";

	$crud = new Crud();
    
	$id = $_SESSION['usuarioId'];
	
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
    $registro = mysqli_fetch_array($resultado);
    $dados[] = $registro;

    $sql2 = "SELECT * FROM status";
    $result2 = mysqli_query($conn,$sql2);
    $state = mysqli_fetch_array($result2);
    $inf[] = $state;

    foreach($inf as $status){
        $servidor = $status['servidor'];
        $evento = $status['evento'];
    }

    foreach($dados as $result){
        $username = $result['username'];
        $email = $result['email'];
        $secreta = $result['secreta'];
        $dateregister = $result['dateregister'];
    }
    
    if ($evento == "ATIVO"){
        $color = "green";
    }else{
        $color = "red";
    }

    if ($servidor == "ONLINE"){
        $color1 = "green";
    }else if($servidor == "OFFLINE"){
        $color1 = "red";
    }else{
        $color1 = "yellow";
    }
    
    

  ?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../css/painelstyle.css">
    <link rel="shortcut icon" href="../../images/site/favicon.ico" type="image/x-icon">
    <title>Painel Usuario</title>
</head>
<body>
<div class="navbar">
        <a href="/index.php" class="painelmenu1">HOME</a>
        <a href="/pages/portal/cadastro.php" class="painelmenu1">CADASTRO</a>
        <a href="/pages/download.php" class="painelmenu1">DOWNLOAD</a>
        <a href="/pages/doacao.php" class="painelmenu1">DOAÇÃO</a>
</div>

<div class="container">
<div class="menu">
    <a href="paineluser.php" class="pmenu">DASHBOARD</a>
    <a href="guild.php" class="pmenu">MINHA GUILD</a>
    <a href="doacao.php" class="pmenu">DOAÇÃO</a>
    <a href="suporte.php" class="pmenu">SUPORTE</a>
</div>

<div class="painel">
    <div class="iniciop" role="alert">
        <img src="/../images/site/perfil.jpg" alt="avatar" class="avatar">
            <div class="nomeuser">
                <h1>Seja bem vindo, <?php echo $username; ?></h1>
                <p class="pinfo"></p>
            </div>
    </div>
</div>

<div class="dados">
    <div class="inf">
        <h5>Usuário</h5>
        <p><?php echo $username; ?></p>
    </div>
    <div class="inf">
        <h5>Email</h5>
        <p><?php echo $email; ?></p>
    </div>
    <div class="infs">
        <h5>Senha</h5>
        <button class="btnpass">ALTERAR SENHA</button>
    </div>
    <div class="inf">
        <h5>Palavra Secreta</h5>
        <p><?php echo $secreta; ?></p>
    </div>
    <div class="inf">
        <h5>Data de Cadastro</h5>
        <p><?php echo date("d/m/Y", strtotime($dateregister)); ?></p>
    </div>
    <div class="botao">
        <a href="../portal/sair.php"><p>DESCONECTAR</p></a>
    </div>
                  <!-- ALTERAR SENHA -->  
            <div class="popup-wrapper">
                <div class="popup">
                    <div class="popup-content">
                        <h1>ALTERAR SENHA</h1>
                        <form action="../../validations/valida_alterarsenha.php" method="POST">
                            <input type="password" class="input-pass" name="passwordatual" placeholder="Senha antiga">
                            <input type="password" class="input-pass" name="passwordnovo" placeholder="Nova senha">
                            <input type="password" class="input-pass" name="confirmpassword" placeholder="Confirme a senha">
                            <button class="popup-submit">Salvar</button>
                            <button class="popup-close">Cancelar</button>
                        </form>
                    </div>
                </div> 
            </div>

            <script src="../../js/sw.js"></script>
                    <!---->

            <?php
                        if(isset($_SESSION['loginErro'])){
                            $message = $_SESSION['loginErro'];
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            unset($_SESSION['loginErro']);
                        }
             ?>
</div>


<div class="direito">
    <div class="status">
        <table class="backg">
            <tr>
                <td class="infstatus"><h1>Status do Servidor:</h1></td>
                <td class="onstatus"><h1><font color="<?php echo $color1 ?>"><?php echo $servidor?></font></h1></td>
            </tr>
            <tr>
                <td class="infstatus"><h1>Status do Evento:</h1></td>
                <td class="onstatus"><h1><font color="<?php echo $color ?>"><?php echo $evento ?></font></h1></td>
            </tr>
        </table>
    </div>
                        
</div>
    <div class="boxlivre">
        <p class="notibox">Política de Privacidade e Segurança</p>
        <P class="infobox">Respeito e transparência são compromissos 
            que a Equipe Shadow Wolrds mantém com seus jogadores na 
            condução de suas atividades. Neste sentido, faremos 
            questão de garantir a privacidade e o sigilo das informações 
            fornecidas pelos usuários através do nosso servidor/site.</P>
        <p class="infobox2">Divirta-se jogando em nosso servidor!</p>
    </div>


</div>            
</div>
</div>
</body>
</html>