<?php

//Chamando a classe 'Usuario'
require_once 'classes/Usuario.php';

//Instancinado a classe 'Usuario'
$usuario = new Usuario;

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="main">
        <img src="./img/logo-responsivo.png" alt="logo-fecap">
        <h1>Entre com suas credenciais.</h1>
        <form method="POST" action="">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="senha" id="senha" placeholder="Senha">
            <input class="btn-login" name="login" id="login" type="submit" value="Entrar">
            <a href="cadastrar.php">Não é cadastrado ? <strong> Cadastrar-se! </strong></a>

        </form>
    </div>
</body>

</html>

<?php 
//Verificando se o botão login foi clicado
if(isset($_POST['login']))

//Se for verdade
 //Crie as variaveis para coletar os dados($email, $senha).
{
    $email  = addslashes($_POST['email']);
    $senha  = addslashes($_POST['senha']);    
    
    if($usuario->$msgErro == "")
    {   

        //Se as variaves email e senha não estiverem vazias.
        if(!empty($email) && !empty($senha))
        {   

            //Se for verdade
            $usuario->conectar("telalogincrud",  "localhost","root","");
            if($usuario->login($email, $senha))
            {
                header('Location: home.php');
            }

            //Se for mentira
            else
            {
                echo "<script>
                alert('Email e/ou senha estão incorretos!\\n');
                window.location.href='index.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
                alert('Para acessar o sistema preencha o usuário e senha.\\n');
                window.location.href='index.php';
                </script>"; 
        }
    }
}

    






?>