<?php

if(!empty($_GET['id']))
{
include_once('config.php');


$id = $_GET['id'];

$sqlSelect = "SELECT * FROM emails WHERE id=$id";

$result = $conexao->query($sqlSelect);

if($result->num_rows > 0)
{
    while($user_data =mysqli_fetch_assoc($result))
    {
    $nome = $user_data['nome'];
    $email = $user_data['email'];
    $setor = $user_data['setor'];
    $senha = $user_data['senha'];
  }
 
}
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
    <style>
        #volta {
            color:white;
            font-size: 20px;
        }

        #update{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
    <title>Econet - Editar E-mails</title>
</head>
<body>
     <div class="box">
        <form action="saveEdit.php" method="post">
            <fieldset>
                <legend><b>Editar E-mails!</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email?>" required>
                    <label for="text" class="labelInput">email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $senha?>" required>
                    <label for="text" class="labelInput">senha</label>
                </div>
                <br>
                <p>Setor:</p>
                <input type="radio" id="Adm" name="setor" value="Adm" <?php echo ($setor == 'Adm')? 'checked': ''?>  
                <label for="Adm">Adm</label>
                <br>
                <input type="radio" id="Comercial Jaque" name="setor" value="Comercial Jaque" <?php echo ($setor == 'ComercialJaque')? 'checked': ''?>  
                <label for="ComercialJaque">Comercial - Equipe Jaque</label>
                <br>
                <input type="radio" id="Comercial Wesley" name="setor" value="Comercial Wesley" <?php echo ($setor == 'Comercial Wesley')? 'checked': ''?>  
                <label for="Comercial Wesley">Comercial - Equipe Wesley</label>
                <br>
                <input type="radio" id="T.I" name="setor" value="T.I" <?php  echo ($setor == 'T.I')? 'checked': ''?> 
                <label for="T.I">T.I</label>
                <br>
                <input type="radio" id="Federal" name="setor" value="Federal" <?php echo ($setor == 'Federal')? 'checked':''?>  
                <label for="Federal">Federal</label>
                <br>
                <input type="radio" id="Fiscal" name="setor" value="Fiscal" <?php echo ($setor == 'Fiscal')? 'checked': ''?>  
                <label for="Fiscal">Fiscal</label>
                <br>
                <input type="radio" id="Trabalhista" name="setor" value="Trabalhista" <?php  echo ($setor == 'Trabalhista')? 'checked': ''?>
                <label for="Trabalhista">Trabalhista</label>
                <br>
                <input type="radio" id="Atendimento" name="setor" value="Atendimento" <?php echo ($setor == 'Atendimento')? 'checked': ''?>
                <label for="Atendimento">Atendimento</label>
                <br>
                
                <div class="inputBox">
                <br>
                <input type="hidden" name="id"  value="<?php echo $id ?>"> 
                <input type="submit" name="update" id="update" onclick="clicar()">

<?php
                echo(" <script>
 function  clicar () {
    alert('Registro alterado com sucesso!!!')
   }
 </script>
 ");
?>
            </fieldset>
        </form>
    </div>
</body>
</html>