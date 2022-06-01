<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/favicon.ico">
    <link rel="stylesheet" href="css/custom-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>BRA parking - Login</title>
</head>


<body>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="image/Logo carro.png" alt="BRA parking">
                <a href="index.html">BRA parking</a>
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
    </nav>

    <section class="top">
        <div class="max-width">
            <div class="top-content">
                <nav class="d-flex">
                    <div class="container-login">
                        <div class="wrapper-login">
                            <div class="title">
                                <span>Área Restrita</span>
                            </div>
                            <form action="" class="form-login">
                                <div class="row">
                                    <i class="fa-solid fa-user"></i>
                                    <input type="text" placeholder="E-mail" required>
                                </div>
                                <div class="row">
                                    <i class="fa-solid fa-lock"></i>
                                    <input type="password" placeholder="Senha" required>
                                </div>
            
                                <div class="row button">
                                    <input type="submit" value="Acessar">
                                </div>
            
                                <div class="signup-link">
                                    <a href="">Cadastrar</a> - <a href="">Esqueceu a senha</a>
            
                                </div>
            
                            </form>
            
                        </div>
            
                    </div>
            
                </nav>


            </div>
        </div>
    </section>


    


    <script src="js/custom.js"></script>
</body>

</html>