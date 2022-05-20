<?php 

//Chamando a classe 'Usuario'
require_once 'classes/Usuario.php';

//Instanciando a classe.

$usuario = new Usuario();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="main">
        <img src="./img/logo-responsivo.png" alt="logo-fecap">
        <h1>Cadastrar-se</h1>
        <form method="POST" action="">
            <input type="text" name="nome" id="nome" placeholder="Nome completo" maxlength="200">
            <input type="text" name="telefone" id="telefone" placeholder="Telefone" maxlength ="30">
            <input type="email" name="email" id="email" placeholder="Email" maxlength ="40">
            <input type="password" name="senha" id="senha" placeholder="Senha" maxlength ="32">
            <input type="password" name="confSenha" id="confSenha" placeholder="Confirmar senha">
            <input class="btn-login" name="cadastrar" id="cadastrar" type="submit" value="Cadastrar">
            <a href="index.html">Já é cadastrado ? <strong> Faça o seu login </strong></a>

        </form>
    </div>
</body>

<?php 
//Se o botão cadastrar foi setado.

if(isset($_POST['cadastrar']))
{   
    //Crie as variaveis para coletar os dados($nome, $telefone, $email, $senha, $confsenha).
    $nome      = addslashes(mb_strtolower($_POST['nome']));
    $telefone  = addslashes($_POST['telefone']);
    $email     = addslashes(strtolower($_POST['email']));
    $senha     = addslashes($_POST['senha']);
    $confSenha = addslashes($_POST['confSenha']);

  

    //Verificando se os dados de login não estão vazios
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha))
    {
        if($senha == $confSenha) 
        {   
            $usuario->conectar("telalogincrud", "localhost","root","");
            if($usuario->$msgErro == "")//Não houve erro na conexão
            {
                if($usuario->cadastrar($nome,$telefone,$email,$senha))
                {
                    echo "<script>
                    alert('Usuário cadastrado com sucesso!\\n NOME: $nome \\n TELEFONE: $telefone \\n EMAIL: $email \\n Acesse o sistema e faça o seu login.');
                    window.location.href='index.php';
                    </script>";
                }
                else
                {
                    echo "<script>
                    alert('O email: $email já foi cadastrado. \\nAcesse o sistema e faça o seu login.\\nOu cadastre-se!');
                    window.location.href='index.php';
                    </script>";
                }    
            }
            else
            {
                echo "Erro:".$usuario->msgErro;  
            }
          
        }
        else
        {
            echo "<script>
            alert('Os campos senha e confirmar senha não correspondem!');
            </script>";
        }
    }
    else
    {
        echo "<script>
        alert('Para efetuar o cadastro preencha todos os campos!');
        </script>";
    }
}



?>