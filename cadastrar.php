<?php 
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Alteracao: incluindo shrink-to BS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="custom.css"> 

    <title>BRA PARK</title>
</head>
<body>
    <?php 
        //Incluir os Arquivos PHP
        require './config/Conn.php';
        require './Crud.php';

        //Recebe o Array do form
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //Verifica se não está vazio 
        if(!empty($formData['SendAddUser'])){
            //var_dump($formData);
            //Cria o objeto para fazer o cadastro no banco
            $createUser = new Crud();
            $createUser->formData = $formData;
            $value = $createUser->cadastro();
            //verifica se foi cadastrado
            if($value){
                //Mostra a mensagem se cadastrado com sucesso redireciona para a pagina index.php
                $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
                header("Location: index.php");
            } else {
                echo "<p style='color: #f00;'>Usuário não cadastrado com sucesso!</p>";
            }
        }

    ?>
    <!-- Criação da Barra de Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">BRAPark</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav col-md-3 ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Cadastro <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Contato <span class="sr-only">(current)</span></a>
        </li>
        </ul>
        </form>
    </div>
</nav>

    <a href="index.php">Listar</a><br>

    <!-- Form de cadastro teste -->
    <div class="container mb-3">
        <div class="row">
            <div class="col-8">
                <legend>Cadastro de Usuários</legend>
                    <form method="POST" action="">
                        <div class="form-group mb-2">
                            <label for="exampleInputName">Nome</label>
                            <input type="text" name="nome" class="form-control form-control-sm" id="exampleInputName" placeholder="Nome Completo">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPhone">Telefone</label>
                            <input type="text" name="celular" class="form-control form-control-sm" id="exampleInputPhone" placeholder="(XX) X XXXX - XXXX">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputCpf">CPF</label>
                            <input type="text" name="cpf" class="form-control form-control-sm" id="exampleInputCpf" placeholder="XXX.XXX.XXX-XX">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail">E-mail</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail" placeholder="Ex: joao@gmail.com" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputCep">CEP</label>
                            <input type="text" name="cep" class="form-control form-control-sm" id="exampleInputCep" placeholder="XXXXXX-XXX">
                        </div>
                        
                        <div class="row">  
                            <div class="col-md-8 col-xs-8">
                                <div class="form-group mb-2">
                                    <label for="exampleInputRua">Logradouro</label>
                                    <input type="text" name="rua" class="form-control form-control-sm" id="exampleInputRua" placeholder="Rua Número Um">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <div class="form-group mb-2">
                                    <label for="exampleInputNum">Número</label>
                                    <input type="text" name="numero" class="form-control form-control-sm" id="exampleInputNum">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleInputComplemento">Complemento</label>
                            <input type="text" name="complemento" class="form-control form-control-sm" id="exampleInputComplemento" placeholder="Apartameto, sala, lote, ... ">
                        </div>


                                <label >Nível de Acesso</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="flexRadioColab">
                                    <label class="form-check-label" for="flexRadioColab">
                                        Colaborador
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="flexRadioCliente">
                                    <label class="form-check-label" for="flexRadioCliente">
                                        Cliente
                                    </label>
                                </div>

                        <br><br>
                        <button type="submit" class="btn btn-outline-dark btn-sm" name="SendAddUser">Enviar</button>
                        <input class="btn btn-outline-dark btn-sm" type="reset" value="Limpar">
                    </form>
                </div>
            </div>
        </div>

        


     <!-- JQuery -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" 
    crossorigin="anonymous"></script>
<!-- //Por enquanto somente foi criado o banco de dados (park) e ás tabelas usuarios e teste
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
//qualquer alteração por favor comente a mesma e compartilhe -->
</body>
</html>