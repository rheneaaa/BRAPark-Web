<?php 
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRA PARK</title>
</head>
<body>
    <?php 
        //Incluir os Arquivos PHP
        require './Conn.php';
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
    <a href="index.php">Listar</a><br>

    <h1>Cadastrar Usuário</h1>
    <!-- Form de cadastro teste -->
    <form  method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome Completo" required/><br><br>
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Ex: joao@gmail.com" required/><br><br>
        <label>Idade: </label>
        <input type="text" name="idade" placeholder="Informe sua idade" required/><br><br>

        <input type="submit" value="Cadastrar" name="SendAddUser"/><br><br>
    </form>
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