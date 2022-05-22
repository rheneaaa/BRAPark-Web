<?php 

//require './Conn.php';

//classe que vai fazer o crud
class Crud extends Conn{

    public object $conn;
    public array $formData;

    public function listarUsuarios(): array //Função que lista os usuarios
    {
        $this->conn = $this->connectDb();
        //Comando SQL de busca no banco
        $query_usuario = "SELECT usr.id, usr.nome, usr.celular, usr.cpf, usr.email, usr.created, nvl.nivel, pl.plano, edr.cep, edr.rua, edr.numero, edr.complemento,
                       vcl.modelo, vcl.marca, vcl.placa 
                       FROM usuarios AS usr 
                       INNER JOIN niveis_acesso AS nvl ON nvl.id=usr.niveis_acesso_id
                       INNER JOIN planos AS pl ON pl.id=usr.plano_id
                       INNER JOIN enderecos AS edr ON edr.id=usr.endereco_id
                       INNER JOIN veiculos AS vcl ON vcl.id=usr.veiculo_id
                       ORDER BY id DESC LIMIT 4";
        $result_usuario = $this->conn->prepare($query_usuario);
        $result_usuario->execute();
        return $result_usuario->fetchAll();
    }

    public function listarVagasLivres(): array //Função que lista vagas livres
    {
        $this->conn = $this->connectDb();
        $query_vagas = "SELECT * FROM vagas WHERE hora_entrada < 1 ";
        $result_vagas = $this->conn->prepare($query_vagas);
        $result_vagas->execute();
        return $result_vagas->fetchAll();
    }

    public function listarVagasOcupadas(): array //Fução que lista vagas Ocupadas
    {
        $this->conn = $this->connectDb();
        $query_vagas = "SELECT * FROM vagas WHERE hora_entrada > 1 ";
        $result_vagas = $this->conn->prepare($query_vagas);
        $result_vagas->execute();
        return $result_vagas->fetchAll();
    }

    public function Cadastro(): bool 
    {
        //var_dump($this->formData);
        $this->conn = $this->connectDb();
        $query_cadastrar = "INSERT INTO usuarios (nome, celular, cpf, email, brapa, created) VALUES (:nome, :celular, :cpf, :email, :brapa, NOW())";
        $add_cadastro = $this->conn->prepare($query_cadastrar);
        $add_cadastro->bindParam(':nome', $this->formData['nome']);
        $add_cadastro->bindParam(':celular', $this->formData['celular']);
        $add_cadastro->bindParam(':cpf', $this->formData['cpf']);
        $add_cadastro->bindParam(':email', $this->formData['email']);
        $add_cadastro->bindParam(':brapa', $this->formData['brapa']);
        $add_cadastro->execute();

        if($add_cadastro->rowCount()){
            return true;
        } else {
            return false;
        }
        /* ainda em desenvolvimento 
        $this->conn = $this->connectDb();
        $query_cadastrar = "INSERT INTO enbereços (cep, rua, numero, complemento, created) VALUES (:cep, :rua, :numero, :complemento, NOW())";
        $add_cadastro = $this->conn->prepare($query_cadastrar);
        $add_cadastro->bindParam(':cep', $this->formData['cep']);
        $add_cadastro->bindParam(':rua', $this->formData['rua']);
        $add_cadastro->bindParam(':numero', $this->formData['numero']);
        $add_cadastro->bindParam(':complemento', $this->formData['complemento']);
        $add_cadastro->execute();

        if($add_cadastro->rowCount()){
            return true;
        } else {
            return false;
        }
        
        if ($query_cadastrar == $query_cadastrar[colaborador]){
            $this->conn = $this->connectDb();
            $query_cadastrar = "INSERT INTO niveis_acesso (colaborador, created) VALUES (:colaborador, NOW())";
            $add_cadastro = $this->conn->prepare($query_cadastrar);
            $add_cadastro->bindParam(':colaborador', $this->formData['colaborador']);
            $add_cadastro->execute();

            if($add_cadastro->rowCount()){
                return true;
            } else {
                return false;
            }
        } else {
            $this->conn = $this->connectDb();
            $query_cadastrar = "INSERT INTO niveis_acesso (cliente, created) VALUES (:cliente, NOW())";
            $add_cadastro = $this->conn->prepare($query_cadastrar);
            $add_cadastro->bindParam(':cliente', $this->formData['cliente']);
            $add_cadastro->execute();

            if($add_cadastro->rowCount()){
                return true;
            } else {
                return false;
            }
        }*/
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