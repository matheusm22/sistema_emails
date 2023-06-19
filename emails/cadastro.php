<?php
include('config.php');

if(isset($_POST['user']) || isset($_POST['senha']) || isset($_POST['setor'])) {

    if(strlen($_POST['user']) == 0) {
        echo "<script>alert('Preencha seu usuário');</script>";
    } else if(strlen($_POST['senha']) == 0) {
      echo "<script>alert('Preencha sua senha');</script>";
    } else if(strlen($_POST['setor']) == 0) {
      echo "<script>alert('Preencha seu setor');</script>";
        
    } else {

        $user = $conexao->real_escape_string($_POST['user']);
        $senha = $conexao->real_escape_string($_POST['senha']);
        $setor = $conexao->real_escape_string($_POST['setor']);


        
        $sql_code = "INSERT INTO acessos (usuario,senha, setor) VALUES ('$user', '$senha', '$setor');";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
   
     header('location:index.php');
      }
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="download.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
">
<style>
    #entrar{
        width: 40%;
    }
</style>
    <title>Cadastro</title>
</head>
<body>
   
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://media.gazetadopovo.com.br/2022/09/02161842/econet-660x372.jpg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="cadastro.php" method="POST">
          <h3>Crie o seu usuário!!!</h3>
          
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="user" class="form-control form-control-lg" name="user"/>
            <label class="form-label" for="form1Example13" >Usuário</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="senha"  name="senha"  class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Senha</label>
          </div>
          <p>Setor:</p>
                <input type="radio" id="Adm" name="setor" value="Adm" >
                <label for="Adm">Adm</label>
                <br>
                <input type="radio" id="Comercial Jaque" name="setor" value="Comercial Jaque">
                <label for="Comercial Jaque">Comercial - Equipe Jaque</label>
                <br>
                <input type="radio" id="Comercial Wesley" name="setor" value="Comercial Wesley" >
                <label for="Comercial Wesley">Comercial - Equipe Wesley</label>
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
          <br>
          <!-- Submit button -->
          <button type="submit" class="btn btn-outline-success" id="entrar" onclick="clicar()">Cadastrar</button>
        <?php
        // ALERT DE MENSAGEM PARA O USUÁRIO 
        if(!isset($_POST['user']) || !isset($_POST['senha']) || !isset($_POST['setor'])) {
         echo(" <script>
         function  clicar () {
            alert('Houve um erro ao cadastro o usuario, tente novamente!');
            window.location.href ='cadastro.php';
          } 
          </script>
         ");
          } else {
            echo(" <script>
            function  clicar () {
              alert('Usuario cadastrado com sucesso!');
              window.location.href ='index.php';
             } 
             </script>
            ");
          }

        ?>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>