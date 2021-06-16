<?php

include_once('../functions/conexao.php');

$mega = $_POST['mega'];
$shared = $_POST['shared'];
$media = $_POST['media'];

$insert = "UPDATE download SET mega='$mega', shared='$shared', media='$media' WHERE id=1";
$query = mysqli_query($conn, $insert);

header("Location: ../pages/admin/admin.php");

?>