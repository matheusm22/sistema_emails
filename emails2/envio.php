<?php
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
        .voltar{
            color: white;
            margin: auto;
            font-size: 25px;
            text-align: center;
            text-decoration: none;
        }

        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
            height: 18%;
        }
        fieldset {
            text-align: center;
        }
    </style>
    <title>Econet - Acessos</title>
</head>
<body>
    <div class="box">
        <form action="inserir.php" method="post">
            <fieldset>
                <h2><strong>Registrado com sucesso!!!</strong></h2>
        
                <a href="inserir.php" class="voltar">Voltar</a>
            

            </fieldset>
        </form>
    </div>
</body>
</html>