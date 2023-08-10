<?php

include_once('config.php');

if(!empty($_GET['id']))
{

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
    $sophia = $user_data['sophia'];
    $senha = $user_data['senha'];

    }
 }
}

if (isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sophia = $_POST['sophia'];
        $setor = $_POST['setor'];
    
        $sqlUpdate = "UPDATE emails SET nome='$nome',email='$email', senha='$senha',
        setor='$setor', sophia='$sophia', ativo ='Sim' WHERE id='$id'";
        $result = $conexao->query($sqlUpdate);
     
        
        echo "<p class='p' style='color: white; font-size: 22px;'>Editado!</p>";

        echo "<script>setTimeout(function() {
            $('#p').fadeOut('fast');
          }, 2000);</script>";

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
            font-size: 23px;
            text-decoration:  none;

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

        .caixa{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
            height: 60%;
        }

        #update:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
    <title>Econet - Editar Registros</title>
</head>
<body>
    <a href="index.php" id="volta">Voltar</a>
     <div class="caixa">
        <form action="edita.php" method="post">
            <fieldset>
                <legend><b>Editar Registros!</b></legend>
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
                <br><br>
                <div class="inputBox">
                    <input type="text" name="sophia" id="sophia" class="inputUser" value="<?php echo $sophia?>" required>
                    <label for="text" class="labelInput">sophia</label>
                </div>
                
                <p>Setor:</p>
                <input type="radio" id="Adm" name="setor" value="Adm" <?php echo ($setor == 'Adm')? 'checked': ''?>  
                <label for="Adm">Adm</label>
                <br>
                <input type="radio" id="Comercial Jaque" name="setor" value="Comercial Jaque" <?php echo ($setor == 'Comercial Jaque')? 'checked': ''?>  
                <label for="Comercial Jaque">Comercial - Equipe Jaque</label>
                <br>
                <input type="radio" id="Comercial Wesley" name="setor" value="Comercial Wesley" <?php echo ($setor == 'Comercial Wesley')? 'checked': ''?>  
                <label for="Comercial Wesley">Comercial - Equipe Wesley</label>
                <br>
                <br>
                <div class="inputBox">
                <br>
                <input type="hidden" name="id"  value="<?php echo $id ?>"> 
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>
</html>