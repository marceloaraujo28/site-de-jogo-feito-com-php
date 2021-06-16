<?php

if(isset($_POST['$contato']) && !empty($_POST['$contato'])){


$assunt = addcslashes($_POST['$assunto']);
$title = addcslashes($_POST['$titulo']);
$contact = addcslashes($_POST['$contato']);
$message = addcslashes($_POST['$mensagem']);

$to = "josielcca@hotmail.com";
$subject = "Suporte - Shadow Worlds";
$body = "Assunto: ".$assunt."\r\n".
        "Título: ".$title."\r\n".
        "Mensagem: ".$message."\r\n".
        "Forma de contato: ".$contact;
$header = "From:suporte@wydsw.com.br"."\r\n"."Reply-To:".$contact."\r\n"."X=Mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)){

    echo("Suporte enviado com sucesso!");
}
else{
    echo("Suporte não foi enviado");
}



}
?>