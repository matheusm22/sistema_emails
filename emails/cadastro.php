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
    
    if(strlen($matricula) != 4){ 
        
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
    <title>Cadastro</title>
</head>
<body>
    <fieldset>
        <legend>Cadastre-se</legend>
        <form action="" method="post">
            <label for="">Usuário:</label>
            <input type="text" name="usuario" placeholder="digite seu usuário"> <br> <br>
            <label for="">Senha:</label> &nbsp;&nbsp;
            <input type="password" name="senha" placeholder="digite sua senha"><br><br>
            <label for="">Matricula:</label> &nbsp;&nbsp;
            <input type="text" name="matricula" placeholder="digite sua senha"><br><br>
            <select name="setor" id="">
              <option select>Selecione o seu setor:</option>
              <option value="adm">Adm</option>
              <option value="Comercial Jaque">Comercial Jaque</option>
              <option value="Comercial Wesley">Comercial Wesley</option>
            </select><br><br>
            <input type="submit" value="Enviar" name="submit">   
        </form>
    </fieldset>
    
</body>
</html>