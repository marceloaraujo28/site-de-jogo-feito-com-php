<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
include_once("functions/conexao.php");
$sql = "SELECT * FROM noticia ORDER BY id DESC LIMIT 4";
$query =  mysqli_query($conn, $sql);
while ($linha = mysqli_fetch_array($query)){
    $notica[] = $linha;
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shadow Worlds</title>
    <link rel="shortcut icon" href="../images/site/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="navbar">
        <a href="/index.php" class="painelmenu1">HOME</a>
        <a href="/pages/portal/cadastro.php" class="painelmenu1" target="_blank">CADASTRO</a>
        <a href="/pages/download.php" class="painelmenu1">DOWNLOAD</a>
        <a href="/pages/doacao.php" class="painelmenu1">DOAÇÃO</a>
</div>

    <div id="container">

        <div id="banner">
            <img src="images/site/bg-logo30.png" alt="" srcset="">
        </div>

        <div id="conteudo">
            <div id="esquerda">
                <div class="login">
                    <?php
                        if(!isset($_SESSION['usuarioId'])){
                            echo "<h1>Painel de Login</h1>";
                            echo "<div class='formlogin'>";
                                echo "<form action='validations/validalogin.php' method='post'>";
                                    echo "<input type='text' name='user' placeholder='Usuário'><br>";
                                    echo "<input type='password' name='password' placeholder='Senha'><br>";
                            echo "</div>";
                            echo "<div class='btn-form'>";
                                    echo "<input type='submit' class='btn-form' value='Entrar'>";
                            echo "</div>";
                                echo "</form>";
                            echo "<div class='msgerro'>";
                                            if(isset($_SESSION['loginErro'])){
                                                echo "<h2>".$_SESSION['loginErro']."</h2>";
                                                unset($_SESSION['loginErro']);
                                            }
                            echo "</div>";
                            echo "<div class='esqueceusenha'>";
                                echo "<h5><a href='pages/portal/esqueceusenha.php'>Esqueceu sua senha?</a></h5>";
                                echo "<h5><a href='pages/portal/cadastro.php'>Não tem conta? Cadastre-se!</a> </h5>";  
                            echo "</div>";
                        }else{
                            echo "<h2>Conectado como:<br> ".$_SESSION['usuarioNome']."<h2>";
                            echo "<h3><a href='validations/sessionentrar.php'>Acessar Painel</a></h3>";
                            echo "<h6><a href='pages/portal/sair.php'>Desconectar</a></h6>";
                        }
                    ?>
                         
                </div>

                <div class="suporte">
                    <center><h1>Suporte</h1></center>
                </div>

                <div class="redes">
                    <center><h1>Redes Sociais</h1></center>
                    <a href="https://www.facebook.com/wyd.shadow" target="_blank"><img src="images/social/facebook.png" class="facebook"></a>
                    <a href="https://www.instagram.com/wyd.shadow/" target="_blank"><img src="images/social/instagram.png" class="instagram"></a>
                    <a href="https://api.whatsapp.com/send?phone=5551982387942" target="_blank"><img src="images/social/whatsapp.png" class="whatsapp"></a>
                </div>

                <div class="discord">
                    <center>
                    <iframe src="https://discord.com/widget?id=817529511758659645&theme=dark" width="295" height="407" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                    </center>
                </div>
            </div>

<div id="direita">
    <div class="slide">
        <section class="galeria">
                <img src="images/slide/1.jpg" alt="" class="foto">
                <img src="images/slide/2.jpg" alt="" class="foto">
                <img src="images/slide/3.jpg" alt="" class="foto">
                <img src="images/slide/4.jpg" alt="" class="foto">
        </section>
    </div>
        
         
            
                <div class="notice">
            <?php
                foreach($notica as $notice){
                        echo "<div class='noticia1'>";
                            echo "<img src='./imagesnoticia/".$notice['imagem']."' width='120' height='120' alt='imgnot'>";
                            echo "<h1>".$notice['titulo']."</h1>";
                            echo "<p>".$notice['descricao']."</p>";
                            echo "<a href=\"/pages/post/noticia.php?id=$notice[id]\"><button class='btnnoticia'>Ler mais</button></a>";
                        echo "</div>";
                    }
            ?>
            </div>
    </div>
</div>



        </div>

    </div>
    <div style="clear:both;"></div>
    <div class="rodape"></div>
    
</body>
</html>


