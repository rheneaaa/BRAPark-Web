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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="css/customcadastrar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="image/Logo carro.png" alt="BRA parking">
                <a class="mt-20" href="index.html">BRA parking</a>
            </div>
            <ul class="menu" id="menu-site">
                <li><a href="index.php">Home</a></li>
                <li><a href="sobre-empresa.php">Sobre Empresa</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <div class="menu-btn" id="menu-btn">
                <i class="fa-solid fa-bars" id="menu-icon"></i>
            </div>
        </div>
    </nav><br>




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
        <br><br><br><br>
        <h2>Cadastro de Usuários</h2><br>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-6">
                <label for="nome_usuario" class="form-label">Nome completo</label>
                <input type="text" class="form-control" id="nome_usuario" placeholder="Digite seu nome completo" required>
                <div class="valid-feedback">
                    Ok
                </div>
            </div>

            <div class="invalid-feedback">
                Digite o nome corretamente!
            </div><br>

            <div class="col-md-3">
                <label for="validationCustom02" class="form-label">Telefone de contato</label>
                <input type="number" class="form-control" id="validationCustom02" placeholder="(00) 0 0000-0000" value="" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite um telefone válido!
                </div>
            </div><br>

            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">CPF</label>
                <input type="cpf" class="form-control" id="validationCustom03" placeholder="000.000.000-00" value="" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite seu CPF!
                </div><br>
            </div>

            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Endereço</label>
                <input type="text" name="text" class="form-control" id="validationCustom04" placeholder="rua Blumenau, 000" value="" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite seu endereço!
                </div><br>
            </div>

            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Bairro</label>
                <input type="text" name="text" class="form-control" id="validationCustom05" placeholder="Centro" value="" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite seu bairro!
                </div><br>
            </div>

            <div class="col-md-3">
                <label for="validationCustom06" class="form-label">Cidade</label>
                <input type="text" name="text" class="form-control" id="validationCustom06" placeholder="Blumenau" aria-describedby="emailHelp" value="" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite sua cidade!
                </div><br>
            </div>

            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">CEP</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="00000-000" required>
                <div class="invalid-feedback">
                    Digite o cep corretamente!
                </div>
            </div>

            <div class="col-md-6">
                <label for="exampleInputEmail" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Ex: joao@gmail.com" aria-describedby="emailHelp" value="" required>
                <div class="valid-feedback">
                    Ok
                </div>
                <div class="invalid-feedback">
                    Digite seu e-mail!
                </div><br>
            </div>

            <div class="col-md-3">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" value="" required>
            </div>

            <div class="invalid-feedback">
                Digite uma senha válida!
            </div><br>

            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Placa do veículo</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="AAA-1B11" required>
                <div class="invalid-feedback">
                    Digite corretamente!
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Modelo do veículo</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Gol" required>
                <div class="invalid-feedback">
                    Digite corretamente!
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Marca do veículo</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Volkswagen" required>
                <div class="invalid-feedback">
                    Digite corretamente!
                </div><br>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Aceito os termos e condições
                    </label>
                    <div class="invalid-feedback">
                        Você deve concordar antes de enviar.
                    </div>
                </div><br>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </div>

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