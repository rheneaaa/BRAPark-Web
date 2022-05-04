<?php 

//Criando conexão com o banco
abstract class Conn {
    
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "root";
    public string $dbname = "park";
    public int $port = 3307;
    public object $connect;

    public function connectDb(){
        try{
            //Conexao com a porta
           $this->connect = new PDO(
               "mysql:host=" . $this->host .";dbname=" . $this->dbname. ";port=" . $this->port, 
            $this->user, 
            $this->pass);
           echo "Conexão realizada com sucesso! <br><br>";
           return $this->connect;
        } catch(Exception $error){
            echo "Error: Conexão não realizada com sucesso! " . $error;
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
