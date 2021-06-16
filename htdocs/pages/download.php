<!DOCTYPE html>
<html lang="pt-br">
<?php

    include_once("../functions/conexao.php");

    $sql = "SELECT * FROM download";
    $resultado = mysqli_query($conn,$sql);
    $registro = mysqli_fetch_array($resultado);
    $dados[] = $registro;

    foreach($dados as $links){
        $mega = $links['mega'];
        $shared = $links['shared'];
        $media = $links['media'];
    }
    
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styleoutros.css">
    <link rel="shortcut icon" href="../images/site/favicon.ico" type="image/x-icon">
    <title>Download - Shadow Worlds</title>
</head>
<body>
<div class="navbar">
        <a href="/index.php" class="painelmenu1">HOME</a>
        <a href="./portal/cadastro.php" class="painelmenu1">CADASTRO</a>
        <a href="download.php" class="painelmenu1">DOWNLOAD</a>
        <a href="doacao.php" class="painelmenu1">DOAÇÃO</a>
</div>

<div class="container">
    <div class="infodo">
        <h1>DOWNLOAD DO JOGO</h1>   
        <p>Escolha um dos links abaixo e click em "Download".</p>
        <p>Caso o download esteja lento tente utilizar outra opção.</p>
    </div> 

    <div class=itensdownload>
        <div class="itensleft">
            <img src="../images/download/mega.png" width="50" height="50" alt="" srcset="">
        </div>
        <div class="itensright">
            <a href="<?php echo $mega?>">DOWNLOAD MEGA</a>
        </div>
    </div>

    <div class=itensdownload>
        <div class="itensleft">
            <img src="../images/download/mediafire.png" width="50" height="50" alt="" srcset="">
        </div>
        <div class="itensright">
            <a href="<?php echo $media?>">DOWNLOAD MEDIAFIRE</a>
        </div>
    </div>

    <div class=itensdownload>
        <div class="itensleft">
            <img src="../images/download/4shared.png" width="50" height="50" alt="" srcset="">
        </div>
        <div class="itensright">
            <a href="<?php echo $shared?>">DOWNLOAD 4SHARED</a>
        </div>
    </div>

<div class="espacamento"></div>





</div>
</body>
</html>