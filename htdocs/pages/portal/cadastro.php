<!DOCTYPE html>
<html lang="pt-br">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Shadow Worlds</title>
    <link rel="stylesheet" href="/../css/portal.css">
    <link rel="shortcut icon" href="../../images/site/favicon.ico" type="image/x-icon">
    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
</head>
<body">
<div class="navbar">
        <a href="/index.php" class="painelmenu1">HOME</a>
        <a href="/pages/portal/cadastro.php" class="painelmenu1">CADASTRO</a>
        <a href="/pages/download.php" class="painelmenu1">DOWNLOAD</a>
        <a href="/pages/doacao.php" class="painelmenu1">DOAÇÃO</a>
</div>

    <div class="bodyc">
    <main class="container">
        <h2>Criar nova conta</h2>
        <form action="../../validations/validacadastro.php" method="POST">
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="e-mail">
            </div>
            <div class="input-field">
                <input type="text" name="username" id="login" placeholder="usuário">
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="senha">
            </div>
            <div class="input-field">
                <input type="password" name="confirmpass" id="password" placeholder="confirme a senha">
            </div>
            <div class="input-field">
                <input type="text" name="secreta" id="secreta" placeholder="palavra secreta">
            </div>

            <div class="g-recaptcha" data-sitekey="6LcyEJgaAAAAAHiNyhlip8B8rUHsii5Hc_ll0sQ" style="transform:scale(0.84);transform-origin:0 0"></div>

            <input type="submit" name="submit" class="register" value="Cadastrar">
        
             <a class="linksig" href="../portal/login.php">Já possui conta?</a>
            
            </form>
            <div class="msgerro">
            <?php
            if(isset($_SESSION['error'])){
                echo "<h2>".$_SESSION['error']."</h2>";
                unset($_SESSION['error']);
            }
            ?>
            </div>
    </main>
    </div>
</body>
</html>