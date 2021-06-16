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

            <div class="dados">
                    <form action="../../validations/validaguild.php" enctype="multipart/form-data" method="post">
                        <div class="inf2">
                            <h5>Index Guild</h5>
                            <input type="text" name="guildid" placeholder="Index">
                        </div>
                        <div class="inf2">
                            <h5>Imagem da Guild</h5>
                            <input type="file" name="arquivo">
                        </div>

                        <div class="enviarguild">
                            <input type="submit" value="Enviar">
                        </div>
                        
                        <div class="inf">
                            <h5><?php if(isset($_SESSION['errorguild'])){
                                echo $_SESSION['errorguild'];
                                unset($_SESSION['errorguild']);
                            }?></h5>
                        </div>
                        

                    </form>    ㅤ
                                   

            </div>

            <div class="direitog">
                    <h1 class="guildt">Criação da guild</h1><br>
                    <div class="guildm">
                    1.1 - Para criar sua guild digite /criar NOME dentro do jogo;<br><br>
                    1.2 - Após criar sua guild, relogue sua conta para que atualize as informações em sua medalha;<br><br>
                    1.3 - Aperte "I" para abrir seu invetário e coloque o ponteiro do mouse sobre a medalha para ver o index;<br><br>
                    1.4 - Pegue o número de Index correspondente a sua guild e informe no campo ao lado;<br><br>
                    1.5 - Selecione também um arquivo de formato BMP contendo as dimensões de <strong>16x12 24px </strong>que representará sua guild;<br><br>
                    1.6 - Ao enviar uma guildmark, esta informação será salva em nosso banco de dados, portanto, não envie imagens para<br> index de outras guildas que não correspondem a sua.   <strong>(Sujeito a punição)</strong>
                    </div>
            </div>


        </div>
    </div>
</body>
</html>