<?php
include_once('config.php');

if (isset($_POST['usuario']) || isset($_POST['senha']) || isset($_POST['matricula'])) {
    include_once('config.php');
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $matricula = $_POST['matricula'];
    $setor = $_POST['setor'];


    if (strlen($_POST['senha']) < 6 or strlen($usuario) < 6) {
        echo "<label style='color: #f00;'>Erro: Senha ou usuário com menos de 6 caracteres!</label>";
    } else {

        if (strlen($matricula) != 4) {

            echo "<label style='color: #f00;'>Número de matricula inválido!, EX:0000</label>";
        } else {

            $verifica_matricula = mysqli_query($conexao, "SELECT matricula FROM acessos
         WHERE matricula = '$matricula' ORDER BY id ASC");

            if ($verifica_matricula->num_rows > 0) {

                echo "<label style='color: #f00;'>Erro: Número de matricula em uso, Tente outro!</label>";
            } else {

                $verifica_usuario = mysqli_query($conexao, "SELECT usuario FROM acessos
         WHERE usuario = '$usuario' ORDER BY id ASC");

                if ($verifica_usuario->num_rows > 0) {

                    echo "<label style='color: #f00;'>Erro: Nome de usuário em uso, Tente outro!</label>";
                } else {

                    // INSERINDO NO BANCO DE DADOS:

                    $usuario = $_POST['usuario'];
                    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                    $matricula = $_POST['matricula'];

                    $insert = mysqli_query($conexao, "INSERT INTO acessos(usuario,senha,matricula, setor, ativo) 
              VALUES ('$usuario', '$senha','$matricula','$setor', 'Sim')");


                    $sql = mysqli_query($conexao, "SELECT * FROM acessos WHERE usuario = '$usuario' ORDER BY id ASC");

                    if ($sql->num_rows == 0 || $usuario == '' || $senha == '' || $matricula == '') {
                        echo "<label style='color: #f00;'>Erro: Usuário não cadastrado, tente novamente!</label>";
                    } else {
                        print_r("<label style='color: green;'>Bem-vindo !&nbsp</label> " . $usuario);
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
    ">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="download.ico" type="image/x-icon">


    <style>

        
        fieldset {
            position: absolute;
            margin-left: 600px;
            top: 152px;
            padding: 15px;
            border: 4px solid transparent;
            text-align: center;
            width: 410px;
            background-color: none;
        }
        legend {
            background-color: transparent;
            border: none;
            color: white;
        }

        #matricula{
            width: 100px;
        }

        #enviar {
            width: 110px;
            height: 50px;
            border-radius: 10px;
            background-color: green;
            color: aliceblue;
            font-size: 22px;
        }

        .form-control {
            position: relative;
            left: 50px;
            top: 10px;
        }

        a {
            text-decoration: none;
            position: relative;
            left: 70px;
            font-size: 20px;
            color: white;
        }

        
    </style>
    <title>Cadastro</title>
</head>

<body>
    <fieldset>
        <legend>Adicionar Usuário</legend>
        <form action="" method="post">
            <input type="text" name="usuario" class="form-control w-75" autofocus  id="txtu" placeholder="Usuário"> <br> 
            <input type="password" name="senha" class="form-control w-75" id="txts" placeholder="Senha"><br>
            
            <input type="text" name="matricula" id='matricula' class="form-control " placeholder="Matricula"><br>
            <select name="setor" class="form-control w-50" id="setor">
                <option select>Selecione o Setor:</option>
                <option value="adm">Adm</option>
                <option value="Comercial Jaque">Comercial Jaque</option>
                <option value="Comercial Wesley">Comercial Wesley</option>
            </select><br><br>
            <input type="submit" value="Adicionar" id="enviar" name="submit"> 
            <a href="index.php">Voltar</a>
        </form>
    </fieldset>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="/emails/login.js"></script>
</body>

</html>