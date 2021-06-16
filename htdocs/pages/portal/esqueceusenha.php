<!DOCTYPE html>
<html lang="pt-br">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu senha - Shadow Worlds</title>
    <link rel="stylesheet" href="/../css/portal.css">
    <link rel="shortcut icon" href="../../images/site/favicon.ico" type="image/x-icon">
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
        <h2>Alterar Senha</h2>
        <form action="../../validations/valida_esqueceusenha.php" method="post">
            <div class="input-field">
                <input type="text" name="email" id="password" placeholder="Email">
            </div>
            <div class="input-field">
                <input type="text" name="secreta" id="login" placeholder="Secreta">
            </div>
            <input type="submit" class="sigin" value="Alterar Senha">
        
            <div class="msgerro">
                <?php
                        if(isset($_SESSION['loginErro'])){
                            echo "<h2>".$_SESSION['loginErro']."</h2>";
                            unset($_SESSION['loginErro']);
                        }
                ?>
            </div>
        </form>
    </main>
    </div>
</body>
</html>