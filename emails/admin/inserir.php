<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="download.ico" type="image/x-icon">
    <style>
        span{
            position: relative;
            left: 600px;
            top: 40px;
            font-size: 20px;
            color: white;
        }

        #voltar {
            text-decoration: none;
            color: white;
            font-size: 20px;
            position: absolute;
            bottom: 20px;
            
        }
    </style>
    <title>Econet - Inserir E-mail</title>
</head>
<body>
<?php
include_once('config.php');


if(isset($_POST['submit']))
{
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sophia = $_POST['sophia'];
$setor = $_POST['setor'];

$sql = "SELECT nome FROM emails WHERE nome = '$nome'";

$result = $conexao->query($sql);

if($result->num_rows > 0) {

    echo "<span id='span'>Usuário já existe!</span>";

    echo "<script>setTimeout(function() {
        $('#span').fadeOut('fast');
         }, 2000);</script>";

} else {

if ($sophia == null) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sophia = $_POST['sophia'];
    $setor = $_POST['setor'];

    $sql = mysqli_query($conexao, "INSERT INTO emails(nome, email, senha, sophia, setor, ativo)
    VALUES ('$nome','$email','$senha','econet123','$setor', 'Sim')"); // *** Sim significa o status de ativo***

        echo "<span id='span'>Usuário adicionado com sucesso</span>";

        echo "<script>setTimeout(function() {
            $('#span').fadeOut('fast');
            }, 2000);</script>";

} else {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sophia = $_POST['sophia'];
    $setor = $_POST['setor'];

$sql = mysqli_query($conexao, "INSERT INTO emails(nome, email, senha, sophia, setor, ativo)
 VALUES ('$nome','$email','$senha','$sophia','$setor', 'Sim')"); // *** Sim significa o status de ativo*** 

$sql = "SELECT * FROM emails";

$result = $conexao->query($sql);

if ($result->num_rows != 0) {
    
    echo "<span id='span'>Usuário adicionado com sucesso</span>";

    echo "<script>setTimeout(function() {
        $('#span').fadeOut('fast');
         }, 2000);</script>";
} else {
    echo "<span id='span'>Usuário não adicionado</span>";

    echo "<script>setTimeout(function() {
        $('#span').fadeOut('fast');
         }, 2000);</script>";
    }   
 }
}
}

?>
    <div class="box">
        
        <form action="inserir.php" method="post">
            <fieldset>
                <legend><b>Inserir E-mail!</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" autofocus class="inputUser" required>
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
                <br><br>
                <div class="inputBox">
                    <input type="text" name="sophia" id="sophia" class="inputUser">
                    <label for="text" class="labelInput">sophia</label>
                </div>
                
                <p>setor:</p>
                <input type="radio" id="Adm" name="setor" value="Adm" >
                <label for="Adm">Adm</label>
                <br>
                <input type="radio" id="Comercial Jaque" name="setor" value="Comercial Jaque" >
                <label for="Comercial Jaque">Comercial - Equipe Jaque</label>
                <br>
                <input type="radio" id="Comercial Wesley" name="setor" value="Comercial Wesley" >
                <label for="Comercial Wesley">Comercial - Equipe Wesley</label>
                <br>
                <br>           
                <br>                
                <input type="submit" name="submit" id="submit"> <br><br>
                    <a href="index.php" id="voltar">Voltar</a>
            </fieldset>

             
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="inserir.js"></script>
        </form>
    </div>
</body>
</html>
