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
                    <a class="nav-link" href="listar.php">Listar<span class="sr-only">(current)</span></a>
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
        

        echo "<h2>Listar Vagas Livres</h2>"; 
        //Insanciar a Classes
        //Criando o Objeto $listarUsuarios
        $listarvagas = new Crud();
        //Instanciar o método listar
        $result_vagas = $listarvagas->listarVagasLivres();
            
        //Imprime informações do danco teste
        foreach($result_vagas as $row_vagas){
            //var_dump($row_vagas);
            extract($row_vagas);
            echo "N° da Vaga: $n_vaga<br>";
            echo "Horario de Entrada: $hora_entrada<br>";
            echo "Horario De Saida: $hora_saida<br><br><hr>";
                
        }

        echo "<h2>Listar Vagas Ocupadas</h2>";
        //Insanciar a Classes
        //Criando o Objeto $listarUsuarios
        $listarvagas = new Crud();
        //Instanciar o método listar
        $result_vagas = $listarvagas->listarVagasOcupadas();
            
        //Imprime informações do danco teste
        foreach($result_vagas as $row_vagas){
            //var_dump($row_vagas);
            extract($row_vagas);
            echo "N° da Vaga: $n_vaga<br>";
            echo "Horario de Entrada: $hora_entrada<br>";
            echo "Horario De Saida: $hora_saida<br><br><hr>";
                
        }

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
