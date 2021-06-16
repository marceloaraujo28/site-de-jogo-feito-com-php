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

    foreach($dados as $result){
        $username = $result['username'];
        $email = $result['email'];
        $secreta = $result['secreta'];
        $dateregister = $result['dateregister'];
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
            <div class="suporte">
                <form class="form" method="post" action="../pages/email.php">
                    <select class="field" name="assunto">
                        <option selected disabled value="selecione">Selecione um assunto</option>
                        <option value="Duvida">Dúvida</option>
                        <option value="Sugestao">Sugestão</option>
                        <option value="Financeiro">Financeiro</option>
                    </select>
                    <input class="field" name="titulo" placeholder="Título">
                    <textarea class="field" name="mensagem" placeholder="Digite sua mensagem"></textarea>
                    <input class="field" name="contato" placeholder="Forma de contato">
                    <input class="fieldbtn" type="submit" value="Enviar">
                </form>
            </div>

            <div class="infsuporte">
            <h2>Informação</h2>
            <p>
            No campo "Forma de contato" preencha com a forma que <br>deseja resposta deste suporte junto de seus dados, podendo ser:<br><br>
            <p><pre><code>DISCORD       EMAIL       WHATSAPP</code></pre></p>
            <p>Exemplo: Forma de contato: Whatsapp 011 99999-9999</p>
            </p>
            <div class="boxsup"></div>
        </div>
        </div>
    </div>
</body>
</html>