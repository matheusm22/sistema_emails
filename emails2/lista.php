<?php
    session_start();
    include_once('config.php');

     //print_r($_SESSION);
    
    // $logado = $_SESSION['user'];
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
    <title>ECONET - Registros</title>
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
    
        #oculta-input{
            border: none;
            outline: none;
            background-color: transparent;
            width:60px;
        }
        
    </style>
</head>
<body>
    </nav>
    <br>
   <div class="d-flex">
    <a href="sair.php" class="btn btn-danger btn-lg me-2">Sair</a>
   </div>
   <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-danger">
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
                    <th scope="col">Senha <a href='visualiza.php?id=$user_data[id]'>
                      <svg xmlns='http://www.w3.org/2000/svg' color='white' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-eye'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'></path><circle cx='12' cy='12' r='3'></circle></svg></th>
                    
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
                      echo "<td><input type='password' id='oculta-input' readonly value='$ss'></td>";
                      echo "<td><input type='password' id='oculta-input' readonly value='$sop'></td>";
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