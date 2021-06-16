<!DOCTYPE html>
<html lang="en">
<?php
    include_once "../../validations/validasessionadm.php";
    include_once "../../functions/conexao.php";
    $sql = "SELECT * FROM pincode LIMIT 10";
    $query = mysqli_query($conn, $sql);
    $rows = array();
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

<div class="servidor">
        <h1 class="titulostatus">Status do servidor</h1>
        <form class="formstatus" method="post" action="../../validations/validastatus.php">
                <select class="srvsel" name="servidor">
                    <option value="ONLINE">Online</option>
                    <option value="MANUTENÇÃO">Manutenção</option>
                    <option value="OFFLINE">Offline</option>
                </select>
                <select class="srvsel" name="evento">
                    <option value="DESATIVADO">Desativado</option>
                    <option value="ATIVO">Ativo</option>
                </select>
        
                <div class="formstatus">
                    <button class="btnadm">Salvar</button>
                </div>
        </form>
</div>

<div class="divisao"></div>

<div class="download">
    <h1 class="titulostatus">Link para download</h1>
    <form class="formstatus" method="post" action="../../validations/validadown.php">
        <input type="text" class="down" name="mega" placeholder="Link do Mega">
        <input type="text" class="down" name="shared" placeholder="Link do 4Shared">
        <input type="text" class="down" name="media" placeholder="Link do Mediafire">
        <div class="formstatus">
        <button class="btnadm">Salvar</button>
    </div>
    </form>
</div>

<div class="divisao"></div>

<div class="donate">
    <h1 class="titulostatus">Gerador de PINCODE</h1>
    <form class="formstatus" method="post" action="../../validations/gerarpincode.php">
        <input type="text" class="don" name="user" placeholder="Usuário">
        <input type="text" class="don" name="valor" placeholder="R$">
        <input type="text" class="don" name="shadows" placeholder="Shadows">
        <input type="text" required="required" name="pincode" data-mask="999.999.999" value="<?php echo rand(0,10000); ?><?php echo rand(0,10000); ?>" class="don" id="inputEmail4" readonly="">
        <div class="formstatus">
        <button class="btnadm">Gerar</button>
    </div>
    </form>
                     <?php
                        if(isset($_SESSION['loginErro'])){
                            $message = $_SESSION['loginErro'];
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            unset($_SESSION['loginErro']);
                        }
                        ?>
</div>

<div class="regpin">
				<table width='90%' border="1" >
			
			<tr class="pintable" bgcolor='#CCCCCC'>
				<td>ID</td>
				<td>USUÁRIO</td>
				<td>VALOR R$</td>
				<td>PINCODE</td>
				<td>SHADOWS</td>
				<td>DATA</td>
				<td>AÇÃO</td>
			</tr>
<?php
    while ($result = mysqli_fetch_assoc($query)){
        $rows[] = $result;
    }

    $infs = $rows;

    foreach ($infs as $key => $res) {
        echo "<tr class='pinbase'>";
        echo "<td class='pinbase2'>".$res['id']."</td>";
        echo "<td class='pinbase2'>".$res['usuario']."</td>";
        echo "<td class='pinbase2'>".$res['valor']."</td>";
        echo "<td class='pinbase2'>".$res['pincode']."</td>";
        echo "<td class='pinbase2'>".$res['shadows']."</td>";
        echo "<td class='pinbase2'>".date("d/m/Y", strtotime($res['data']))."</td>";
        echo "<td class='pinbase2'><a href=\"../../validations/excluirpin.php?id=$res[id]\">Excluir</a></td>";
        echo "<tr class='pinbase'>";
        
    }
?>
                </table>

</body>
</html>              