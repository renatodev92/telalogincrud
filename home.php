<?php

//Iniciando a sessão
session_start();


//Se não existir a sessão id_usuario, redireciona o usuário apra pagina index.php.
if(!isset($_SESSION['id_usuario'])){
    header('Location:index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>HOME</h1>

    <a href="logout.php">Sair do sistema</a>
</body>

</html>