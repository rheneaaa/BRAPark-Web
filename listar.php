<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Alteracao: incluindo shrink-to BS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="css/custom.css">

    <title>BRA PARK</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-9">                
                <a class="navbar-brand" href="#">BRA Parking</a>
            </div>
            <div class="col"></div>
        </div>




        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav col-md-3 ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cadastrar.php">Cadastrar <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="vagas.php">Vagas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contato.php">Contato <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <?php 
        //Incluir os Arquivos PHP
        require './Conn.php';
        require './Crud.php';
        //Mostra a mensagen e depois destroi a mesma
        if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        }
        

        echo "<h2>Listar Usuários</h2>";
            
        //Insanciar a Classes
        //Criando o Objeto $listarUsuarios
        $listarusuario = new Crud();
        //Instanciar o método listar
        $result_usuario = $listarusuario->listarUsuarios();
            
        //Imprime informações das tabelas Usuarios, planos, niveis_acesso, enberecos e veiculos
        foreach($result_usuario as $row_usuario){
            //var_dump($row_teste);
            extract($row_usuario);
            echo "Dados Pessoais: <br>";
            echo "ID do usuário: $id<br>";
            echo "Nome do usuário: $nome<br>";
            echo "Contato do usuário: $celular<br>";
            echo "Cpf do usuário: $cpf<br>";
            echo "E-mail do usuário: $email<br>";
            echo "Enbereço: <br>";
            echo "Rua: $rua   N°: $numero " .  ucfirst($complemento)."   Cep: $cep<br>";
            echo "Dados do Veiculo do Usuário: $nome<br>";
            echo "Fabricante: $marca    Modelo: $modelo    Placa: ". strtoupper($placa)."<br>";
            echo "Dados Complementares: <br>";
            echo "Nivel de Acesso: $nivel<br>";
            echo "Plano: $plano<br>";
            echo "Usuário criado: " . date('d/m/Y H:i:s', strtotime($created))."<br><hr>";
                
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
?>

    <!-- JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" 
    crossorigin="anonymous"></script>
</body>
</html>
