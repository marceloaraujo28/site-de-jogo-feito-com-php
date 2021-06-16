<!DOCTYPE html>
<html lang="pt-br">
<?php
        session_start();
        if(!isset($_SESSION['usuarioId'])){
            header("Location: ../portal/sair.php"); exit;
        }

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar senha - Shadow Worlds</title>
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
        <form action="../../validations/valida_alterarsenha.php" method="post">
            <div class="input-field">
                <input type="password" name="passwordatual" id="password" placeholder="Senha Atual">
            </div>
            <div class="input-field">
                <input type="password" name="passwordnovo" id="login" placeholder="Nova Senha">
            </div>
            <div class="input-field">
                <input type="password" name="confirmpassword" id="password" placeholder="Confirme Sua Senha">
            </div>

                <div class="custom-checkbox">
                    <input id="checkbox" type="checkbox">
                    <label for="checkbox">Lembre de mim</label>
                </div>

            <input type="submit" class="sigin" value="Alterar Senha">
        
        </form>
    </main>
    </div>
</body>
</html>