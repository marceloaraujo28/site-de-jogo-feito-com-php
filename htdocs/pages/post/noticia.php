<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
include_once("../../functions/conexao.php");
$id = $_GET['id'];
$sql = "SELECT * FROM noticia WHERE id = '$id'";
$query =  mysqli_query($conn, $sql);
while ($linha = mysqli_fetch_array($query)){
    $notica[] = $linha;
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shadow Worlds - Notícia</title>
    <link rel="stylesheet" href="/css/styleoutros.css">
    <link rel="shortcut icon" href="../../images/site/favicon.ico" type="image/x-icon">
    <style>
    </style>
</head>
<body>
<div class="navbar">
        <a href="/index.php" class="painelmenu1">HOME</a>
        <a href="../portal/cadastro.php" class="painelmenu1">CADASTRO</a>
        <a href="../download.php" class="painelmenu1">DOWNLOAD</a>
        <a href="../doacao.php" class="painelmenu1">DOAÇÃO</a>
</div>

<div class="containernoticia">

        <div class="infodo">
            <h1>INFORMAÇÃO</h1>
        </div> 
<div class="border">
      <div class="backnoti">
          <?php
          foreach($notica as $notice){
           echo "<h1>".$notice['titulo']."</h1>";
            echo "<img src='../../imagesnoticia/".$notice['imgnotice']."' width='' height='' alt=''>";
            echo "<p>".$notice['mensagem']."</p>";
            echo "<h3>Atenciosamente, <br>Equipe Shadow Worlds</h3>";
          }
          ?>

      </div>
</div>




</div>



</body>
</html>