<?php

if(isset($_POST['submit']))
{
include_once('config.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$setor = $_POST['setor'];
header('Location: envio.php');

$result = mysqli_query($conexao, "INSERT INTO emails(nome,email,senha,setor)
 VALUES ('$nome','$email','$senha','$setor')");
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="download.ico" type="image/x-icon">
    <title>Econet - Inserir E-mail</title>
</head>
<body>
    <div class="box">
        <form action="inserir.php" method="post">
            <fieldset>
                <legend><b>Inserir E-mail!</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="text" class="labelInput">email</label>
                    <br><br>
                </div>

                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" required>
                    <label for="text" class="labelInput">senha</label>
                </div>
                <br>
                <p>setor:</p>
                <input type="radio" id="Adm" name="setor" value="Adm" >
                <label for="Adm">Adm</label>
                <br>
                <input type="radio" id="Comercial Jaque" name="setor" value="Comercial Jaque" >
                <label for="Comercial Jaque">Comercial-Equipe Jaque</label>
                <br>
                <input type="radio" id="Comercial Wesley" name="setor" value="Comercial Wesley" >
                <label for="Comercial Wesley">Comercial-Equipe Wesley</label>
                <br>
                <input type="radio" id="T.I" name="setor" value="T.I" >
                <label for="T.I">T.I</label>
                <br>
                <input type="radio" id="Federal" name="setor" value="Federal">
                <label for="Federal">Federal</label>
                <br>
                <input type="radio" id="Fiscal" name="setor" value="Fiscal" >
                <label for="Fiscal">Fiscal</label>
                <br>
                <input type="radio" id="Trabalhista" name="setor" value="Trabalhista" >
                <label for="Trabalhista">Trabalhista</label>
                <br>
                <input type="radio" id="Atendimento" name="setor" value="Atendimento" >
                <label for="Atendimento">Atendimento</label>
                <br>
                <div class="inputBox">
                <br>                
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
