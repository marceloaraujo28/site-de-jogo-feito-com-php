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
    <title>Painel Usuario</title>
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
            <div class="donation">
                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 225 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 15,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%2015%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 560 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 35,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%2035%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 1.020 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 60,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%2060%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 1.980 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 110,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%20110%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 4.180 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 220,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%20220%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 6.600 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 330,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%20330%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 13.860 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 660,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%20660%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 22.275 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 990,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%20990%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="boxdoacao">
                    <div class="boxleft">
                        <h1>Coins: 37.500 Shadows</h1>
                    </div>
                    <div class="boxright">
                        <table>
                            <tr>
                                <td><h3>Valor: R$ 1.500,00</h3></td>
                                <td class="dh2"><a href="https://api.whatsapp.com/send?phone=5551982387942&text=Ol%C3%A1%2C%20gostaria%20de%20doar%20R%24%201.500%2C00%20em%20troca%20de%20Shadows." target="blank"><h2>DOAR</h2></a></td>
                            </tr>
                        </table>
                    </div>

                </div>








            </div>
        </div>
    </div>
</body>
</html>