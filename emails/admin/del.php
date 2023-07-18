<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
    <style>
        body{
            background-image:url(fundo_econet.png);
            background-position:0px -50px;
            background-size:cover;
            color: white;
            text-align: center;
            overflow: hidden;
        }

       a {
        position: relative;
        left: 20px;
        top: 50px;
       }
       p {
        position: relative;
        left: 20px;
        top: 50px;
        font-size: 25px;

       }

    </style>
    <title>Document</title>
</head>
<body>
<?php 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

echo '<p font-size=24px;>Deseja realmente apagar este registro?</p>';

echo "<a class='btn btn-lg btn-success' href='delete.php?id=$id'>Sim</a>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";

echo "<a class='btn btn-lg btn-danger' href='index.php'>Não</a>";

?>  
</body>
</html>

