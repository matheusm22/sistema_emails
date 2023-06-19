<?php
    session_start();
    include_once('config.php');

     //print_r($_SESSION);
    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['senha']) == true) )
    {
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        unset($_SESSION['setor']);

        header('Location: index.php');
    }
    $logado = $_SESSION['user'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM emails WHERE (id ='$data' or nome LIKE '%$data%') 
        and setor = 'Comercial Wesley' and ativo = 'Sim' ORDER BY nome ASC";
       
    }
    else
    {
        $set = $_SESSION['setor'];
        $sql = "SELECT * FROM emails WHERE setor = 'Comercial Wesley' 
        and ativo = 'Sim' ORDER BY nome ASC limit 13";
    }
    if(empty($_SESSION['setor'])) {
        $sql = "SELECT * FROM emails WHERE setor = 'Comercial Wesley' 
        and ativo = 'Sim' ORDER BY nome ASC limit 13";
    }

    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="download.ico" type="image/x-icon">
    <title>Registros</title>
    <style>
          body{
            background-image:url(fundo_econet.png);
            background-position:0px -50px;
            background-size:cover;
            color: white;
            text-align: center;
        }

        table td{
               border:none !important;
        }
        
        .table-bg{
            background-image: linear-gradient(to right,#E70808 30%,#E78608, #E1D209);
            border-radius: 15px 15px 15px 15px;
        }
        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }

        .d-flex{
            padding-right: 20px;
        }
        
    </style>
</head>
<body>
    </nav>
    <br>
   <div class="d-flex">
    <a href="sair.php" class="btn btn-danger me-2">Sair</a>
   </div>
   <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Senha <a href='lista.php?id=$user_data[id]'>
                    <svg id='Flat' xmlns='http://www.w3.org/2000/svg' width='40px' height='25px' viewBox='0 0 256 256'>
                    <path d='M230.8877,162.8125a7.99959,7.99959,0,1,1-13.85547,8L198.6499,138.97412a123.56028,123.56028,0,0,1-35.28808,16.27832l5.813,32.96436a8.00173,8.00173,0,0,1-6.48925,9.26855,8.13106,8.13106,0,0,1-1.39942.12207,8.00278,8.00278,0,0,1-7.86914-6.61133l-5.71826-32.42724a136.26072,136.26072,0,0,1-39.4873-.01367l-5.71729,32.42724a8.00272,8.00272,0,0,1-7.86914,6.61231,8.12,8.12,0,0,1-1.39844-.12207,8.00124,8.00124,0,0,1-6.49023-9.26758l5.81445-32.978A123.57956,123.57956,0,0,1,57.3064,138.94531l-18.49,32.02539a7.99959,7.99959,0,1,1-13.85547-8l19.49731-33.77a147.761,147.761,0,0,1-18.68188-19.29834A7.99972,7.99972,0,1,1,38.22168,99.84766a128.70627,128.70627,0,0,0,21.24561,20.92285c.06274.04492.12011.09424.18115.14062A109.59068,109.59068,0,0,0,128,144a109.58952,109.58952,0,0,0,68.3374-23.07861c.05225-.03955.10156-.08155.15528-.11963a128.72532,128.72532,0,0,0,21.28466-20.9541,7.99973,7.99973,0,0,1,12.44532,10.05468,147.78919,147.78919,0,0,1-18.72144,19.333Z'/>
                    </svg></th>
                    <th scope="col">Sophia</th>
                    <th scope="col">Data da Criação</th>
                   
                 
                    
                    

                </tr>
            </thead>
            <tbody>
        <?php

            if($result->num_rows == 0)
            {
                echo '<td colspan="6">';
                echo "Nenhum registro encontrado, tente novamente!!!</td>";
            }  
                    while($user_data = mysqli_fetch_assoc($result)) {
                        // Separa as duas partes em um array, explode separada em um array toda vez que encontrar a ocorrencia, no caso ali espaço
                        $data = explode(' ', $user_data['dta_criacao']); 
                          
                        $hora = $data[1]; 
                        //Espaço na hora de imprimir
                        $space = ' '; 

                        $fechado = '********';
                        $ss = $user_data['senha'];
                        $sop = $user_data['sophia'];
                        
                        //'2023-05-26'  Transforma a data em um array também 
                        $dataCorreta = explode('-',  $data[0]);
                        //Inverte o array que está [2023,05,26] para [26,05,2023] 
                        $dataCorreta = array_reverse($dataCorreta); 
                        // Junta o array com o delimitador / para uma string 
                        $dataCorreta = implode('/', $dataCorreta); 
                      echo "<tr>";
                      echo "<td>".$user_data['id']."</td>";
                      echo "<td>".$user_data['nome']."</td>";
                      echo "<td>".$user_data['email']."</td>";
                      echo "<td>".$ss."</td>";
                      echo "<td>".$sop."</td>";
                      echo "<td>". $dataCorreta .$space . $hora ."</td>";
                      echo "<td>
                      
                    </td>";          
             }
             
             ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');
     function searchData()
     {
        window.location ='visualiza.php?search='+search.value;
     }         

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'visualiza.php?search='+search.value;
    }
    

</script>
</html>