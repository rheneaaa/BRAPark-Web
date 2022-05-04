<?php 

//require './Conn.php';

//classe que vai fazer o crud
class Crud extends Conn{

    public object $conn;
    public array $formData;

    public function listar(): array
    {
        $this->conn = $this->connectDb();
        //Comando SQL de busca no banco
        $query_teste = "SELECT id, nome, email, idade, created FROM teste ORDER BY id DESC LIMIT 4";
        $result_teste = $this->conn->prepare($query_teste);
        $result_teste->execute();
        return $result_teste->fetchAll();
    }

    public function Cadastro(): bool 
    {
        //var_dump($this->formData);
        $this->conn = $this->connectDb();
        $query_cadastrar = "INSERT INTO teste (nome, email, idade, created) VALUES (:nome, :email, :idade, NOW())";
        $add_cadastro = $this->conn->prepare($query_cadastrar);
        $add_cadastro->bindParam(':nome', $this->formData['nome']);
        $add_cadastro->bindParam(':email', $this->formData['email']);
        $add_cadastro->bindParam(':idade', $this->formData['idade']);
        $add_cadastro->execute();

        if($add_cadastro->rowCount()){
            return true;
        } else {
            return false;
        }
    }
}
//Por enquanto somente foi criado o banco de dados (park) e ás tabelas usuarios e teste
//Foi criado a class de Conn que faz a conexão com o banco ainda em teste
//E a class Usuarios ainde em desenvonvimento  
//function listar pronta ainda em teste 
//24/04/2022 qualquer alteração por favor comente a mesma e compartilhe 
////////////////////////////////////////////////////////////////////////////////////////////////
//Alterações da dia 26/04/2022
//Foi criado a class de Conn que faz a conexão com o banco funcionando perfeitamente
//class Usuarios ainde em desenvonvimento 
//function listar pronta funcionando perfeitamente
//function cadastrar criada ainda em teste 
//Foi implementado session_start() e ob_start() para limpar o cache após cadastrar um usuário
//qualquer alteração por favor comente a mesma e compartilhe 