<?php

    include_once('../functions/conexao.php');

    $servidor = $_POST['servidor'];
    $evento = $_POST['evento'];

    $insert = "UPDATE status SET servidor='$servidor', evento='$evento' WHERE id=1";
    $query = mysqli_query($conn, $insert);

    header("Location: ../pages/admin/admin.php");


   

?>