
  <?php
/*
Logica Guild Marck:
 
b030(00000+$guildid).bmp
b030(00000+$guildid).bmp
*/
    session_start();
    $guildid = $_POST['guildid'];
    $img = ".\\images\\guilds\\b0".(3000000+$guildid).".bmp";
       
       if (isset($_FILES['arquivo']['name'])){
                $uploaddir = '.\\images\\guilds\\';
                $arquivo = $uploaddir."b0".(3000000+$guildid).".bmp";
                $dimensao = @getimagesize($_FILES['arquivo']['tmp_name']);
               
                if($_FILES['arquivo']["type"] == "image/bmp")
                {
                        if(($dimensao[0] <= 16) && ($dimensao[1] <= 12))
                        {
                                if($_FILES['arquivo']["size"] <= 2000)
                                {
                                        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo))
                                        {
                                                copy($arquivo,$uploaddir."b0".(2000000+$guildid).".bmp");
                                                copy($arquivo,$uploaddir."b0".(1000000+$guildid).".bmp");
                        
                                                $_SESSION['errorguild'] = "O arquivo foi enviado com sucesso.";
                                                if($_SESSION['usuarioNiveisAcessoId'] < 2){
                                                        header("Location: ../pages/user/guild.php");
                                                }else{
                                                        header("Location: ../pages/admin/guild.php");
                                                }
                                                $img = "imags_guilds/b0".(3000000+$guildid).".bmp";
                                        }
                                        else
                                        {
                                                $_SESSION['errorguild'] = "[Error]: O arquivo não foi enviado.";
                                                if($_SESSION['usuarioNiveisAcessoId'] < 2){
                                                        header("Location: ../pages/user/guild.php");
                                                }else{
                                                        header("Location: ../pages/admin/guild.php");
                                                }
                                                exit();
                                        }
                                }
                                else
                                {
                                        $_SESSION['errorguild'] = "[Error]: Imagem muito pesada.";
                                        if($_SESSION['usuarioNiveisAcessoId'] < 2){
                                                header("Location: ../pages/user/guild.php");
                                        }else{
                                                header("Location: ../pages/admin/guild.php");
                                        }
                                        exit();
                                }
                        }
                        else
                        {
                                $_SESSION['errorguild'] = "[Error]: Imagem muito grande.";
                                if($_SESSION['usuarioNiveisAcessoId'] < 2){
                                        header("Location: ../pages/user/guild.php");
                                }else{
                                        header("Location: ../pages/admin/guild.php");
                                }
                                exit();
                        }
                }
                else
                {
                        $_SESSION['errorguild'] = "[Error]: Formato de imagem invalida.";
                        if($_SESSION['usuarioNiveisAcessoId'] < 2){
                                header("Location: ../pages/user/guild.php");
                        }else{
                                header("Location: ../pages/admin/guild.php");
                        }
                        exit();
                }
        }else{
            echo "CONTATE A ADMINISTRAÇÃO";
        }
?>