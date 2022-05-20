<?php 
//Criando a classe onde haverá todos os métodos para o programa.

class Usuario {
    
    
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;

        try
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        }
        catch(PDOException $errorsdb)
        {
            $msgErro = $errorsdb->getMessage();
        }
        
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //Verificar se já existe um email cadastrado
        $select = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
        $select->bindValue(":email", $email);
        $select->execute();
        if($select->rowCount() > 0) 
        {
            return false;//Já está cadasatrada
        }
        else 
        //Caso o email não foi cadasatrado, insere a pessoa no banco de dados.
        {
          $insert = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES(:nome, :telefone, :email, :senha)");
          $insert->bindValue(":nome", $nome);
          $insert->bindValue(":telefone", $telefone);
          $insert->bindValue(":email", $email);
          $insert->bindValue(":senha", md5($senha));

          $insert->execute();

          return true;
        }
    }

    public function login($email, $senha)
    {
        global $pdo;
        //Verificar se o email e a senha estão cadastrados
        $select = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email AND senha = :senha");
        $select->bindValue(":email", $email);
        $select->bindValue(":senha", md5($senha));

        $select->execute();
        if($select->rowCount() > 0) 
        {
            $dados = $select->fetch();    
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            return true; //Usuário logado com sucesso.
        }
        else
        {
            return false;// Retorna como falso caso o usuário não estiver logado.
        }

        //Se estiverem cadastrados, devemos entrar no sistema.
    }
}









?>