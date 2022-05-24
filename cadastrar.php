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

    <link rel="stylesheet" href="css/custom.css">

    <title>BRA parking</title>
</head>

<body>
    <?php
    //Incluir os Arquivos PHP
    require './Conn.php';
    require './Crud.php';

    //Recebe o Array do form
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //Verifica se não está vazio 
    if (!empty($formData['SendAddUser'])) {
        //var_dump($formData);
        //Cria o objeto para fazer o cadastro no banco
        $createUser = new Crud();
        $createUser->formData = $formData;
        $value = $createUser->cadastro();
        //verifica se foi cadastrado
        if ($value) {
            //Mostra a mensagem se cadastrado com sucesso redireciona para a pagina index.php
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
            header("Location: index.php");
        } else {
            echo "<p style='color: #f00;'>Usuário não cadastrado com sucesso!</p>";
        }
    }

    ?>
    <!-- Criação da Barra de Menu -->
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
                    <a class="nav-link" href="listar.php">Listar <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="vagas.php">Vagas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contato.php">Contato <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            </form>
        </div>
    </nav>



    <!-- Form de cadastro teste -->
    <div class="container">
        <h2>Cadastro de Usuários</h2><br>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-8">
                <label for="nome_usuario" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome_usuario" placeholder="Digite seu nome completo" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite o nome corretamente!
                </div><br>
                <label for="validationCustom02" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="(00) 0 0000-0000" value="" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite um telefone válido!
                </div><br>
                <div class="form-group mb-2">
                    <label for="validationCustom02" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="000.000.000-00" value="" required>
                    <div class="valid-feedback">
                        Ok
                    </div>
                    <div class="invalid-feedback">
                        Digite seu CPF!
                    </div><br>
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputEmail" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Ex: joao@gmail.com" aria-describedby="emailHelp" value="" required>
                    <div class="valid-feedback">
                        Ok
                    </div>
                    <div class="invalid-feedback">
                        Digite seu e-mail!
                    </div><br>
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" value="" required>
                </div>
                <div class="invalid-feedback">
                        Digite uma senha válida!
                    </div><br>
                <button type="submit" class="btn btn-outline-primary" name="SendAddUser">Cadastrar</button>

        </form>
    </div>
    </div>
    </div>




    <!-- JQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
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