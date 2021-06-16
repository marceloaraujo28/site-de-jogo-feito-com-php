<!DOCTYPE html>
<html lang="en">
<?php
    include_once "../../validations/validasessionadm.php";
     if(isset($_SESSION['loginErro'])){
        $message = $_SESSION['loginErro'];
        echo "<script type='text/javascript'>alert('$message');</script>";
        unset($_SESSION['loginErro']);
      }
      include_once "../../functions/conexao.php";
      $id = $_GET['id'];
      $sql = "SELECT * FROM noticia WHERE id = '$id'";
      $query = mysqli_query($conn, $sql); 
      while($linha = mysqli_fetch_assoc($query)){
         $row[] = $linha;
      }

      foreach($row as $result){
          $titulo = $result['titulo'];
          $descricao = $result['descricao'];
          $mensagem = $result['mensagem'];
      }
      
      
                        
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="/../css/painelstyle.css">
    <link rel="shortcut icon" href="../../images/site/favicon.ico" type="image/x-icon">
</head>
<body>

<div class="navbar">
        <a href="/index.php" class="painelmenu1">HOME</a>
        <a href="/pages/portal/cadastro.php" class="painelmenu1">CADASTRO</a>
        <a href="/pages/download.php" class="painelmenu1">DOWNLOAD</a>
        <a href="/pages/doacao.php" class="painelmenu1">DOAÇÃO</a>
</div>

<div class="containeradm">
    <div class="menu">
    <a href="admin.php" class="pmenu">ADMINISTRATIVO</a>
    <a href="painelnot.php" class="pmenu">NOTÍCIAS</a>
    <a href="paineluser.php" class="pmenu">DADOS</a>
    <a href="guild.php" class="pmenu">MINHA GUILD</a>
</div>

<div class="painel">
    <div class="barradm" role="alert">
        <h1>PAINEL ADMINISTRATIVO</h1>
    </div>
</div>



<div class="noticia">
    <form class="form" method="post" action="../../validations/editnoticia.php" enctype="multipart/form-data">
        <select class="notitema" name="categoria">
            <option value="noticia">Notícia</option>
            <option value="evento">Evento</option>
            <option value="manutencao">Manutenção</option>
        </select>
        <input class="notitulo" name="titulo" placeholder="Título" value="<?php echo $titulo; ?>">
        <textarea class="notdescri" name="descricao" placeholder="Descrição"><?php echo $descricao;?></textarea>
        <textarea class="notitext" name="mensagem" placeholder="Digite sua mensagem"><?php echo $mensagem;?></textarea>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input class="btnnot" type="submit" value="Editar">
    </form>
</div>

<div class="divisao2"></div>

</body>
</html>              