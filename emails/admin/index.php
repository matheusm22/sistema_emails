<?php

// SESSÃO RESPONSÁVEL PELO LOGIN
session_start();

// Limpara o buffer de redirecionamento
ob_start();

include_once('config.php');

// Incluir o arquivo para validar e recuperar dados do token
include_once ('validar_token.php');

// Chamar a função validar o token, se a função retornar FALSE significa que o token é inválido e acessa o IF
if (!validarToken()) {
    // Criar a mensagem de erro e atribuir para variável global
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    // Redireciona o o usuário para o arquivo index.php
    header("Location: /emails/index.php");

    // Pausar o processamento da página
    exit();
}


    if (($_SESSION['setor'] != 'adm')) {
        session_destroy();
        header('Location:/emails/index.php');
   
} else {
   
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM emails WHERE  id = '$data' or nome LIKE '%$data%'
         or setor LIKE '%$data%' or ativo LIKE '%$data%' ORDER BY nome ASC";
    }
    else
    {
        $sql = "SELECT * FROM emails  ORDER BY nome ASC ";
    }
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
    <title>ECONET - ADM</title>
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
           background-image: linear-gradient(to right, #D51037  15%, #E34E6C ,  #F074B6 );
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
    <br>
    <div class="d-flex">
    <a href="sair.php" class="btn btn-danger  me-2">Sair</a> &nbsp; &nbsp;
    <a href="/emails/lista.php" class="btn btn-warning">Painel W</a> &nbsp;&nbsp;
   <a href="/emails/lista2.php" class="btn btn-success">Painel J</a>
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
                    <th scope="col">Senha</th>
                    <th scope="col">Sophia</th>
                    <th scope="col">Equipe</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Data da atualização</th>
                    <th scope="col">Data da criação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if($result->num_rows == 0)
                    {
                        echo '<td colspan="8">';
                        echo "Nenhum registro encontrado, tente novamente!!!</td>";
                    }  

                    while($user_data = mysqli_fetch_assoc($result)) {

                        $data_atua = explode(' ', $user_data['dta_atualizacao']); 
                          
                        $hora1 = $data_atua[1]; 
                        //Espaço na hora de imprimir
                        $space = ' '; 
                        
                        //'2023-05-26'  Transforma a data em um array também 
                        $data_atualiza = explode('-',  $data_atua[0]);
                        //Inverte o array que está [2023,05,26] para [26,05,2023] 
                        $data_atualiza = array_reverse($data_atualiza); 
                        // Junta o array com o delimitador / para uma string 
                        $data_atualiza = implode('/', $data_atualiza);

                         // Separa as duas partes em um array, explode separada em um array toda vez que encontrar a ocorrencia, no caso ali espaço
                          $data = explode(' ', $user_data['dta_criacao']); 
                          
                          $hora = $data[1]; 
                          //Espaço na hora de imprimir
                          $space = ' '; 
                          
                          //'2023-05-26'  Transforma a data em um array também 
                          $data_criacao = explode('-',  $data[0]);
                          //Inverte o array que está [2023,05,26] para [26,05,2023] 
                          $data_criacao = array_reverse($data_criacao); 
                          // Junta o array com o delimitador / para uma string 
                          $data_criacao = implode('/', $data_criacao); 
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['senha']."</td>";
                        echo "<td>".$user_data['sophia']."</td>";
                        echo "<td>".$user_data['setor']."</td>";
                        echo "<td>".$user_data['ativo']."</td>";
                        echo "<td>". $data_atualiza .$space . substr($hora1, 0, 5) ."</td>";
                        echo "<td>". $data_criacao .$space . substr($hora, 0, 5) ."</td>";
                        echo "<td>
                        <a class='btn btn-info' href='edita.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                      </svg> 
                      </a> 
                       <a class='btn btn-danger' href='del.php?id=$user_data[id]'>
                       <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
</a>
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
        window.location ='index.php?search='+search.value;
     }         

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function deletar () {     
          alert('Registro removido com sucesso');
        }

    

</script>
</html>