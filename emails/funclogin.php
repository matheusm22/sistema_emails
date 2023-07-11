<?php
    session_start();
     //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['senha']) && $_POST['user'])
    {
        // Acessa
        include_once('config.php');
        $user = $_POST['user'];
        $senha = $_POST['senha'];
       // $setor = $_POST['setor'];

        // print_r('user: ' . $user);
        // print_r('<br>');
        // print_r('senha: ' . $senha);
        // print_r('<br>');
        // print_r('setor: ' . $setor);
        // print_r('<br>');
        
         $sql = mysqli_query($conexao, "SELECT * FROM acessos WHERE usuario = '$user' and senha = '$senha' 
         limit 1");
        

       //usar isso aqui para CADASTRAR OS userS NÃO ESQUECER!!! 
      // $sql = mysqli_query($conexao, "INSERT INTO usuarios(user,senha) VALUES ('$user','$senha')");        

        // print_r($sql);
        // print_r($sql);

       
        if(mysqli_num_rows($sql) < 1)
        {

            unset($_SESSION['user']);
            unset($_SESSION['senha']);
            //unset($_SESSION['setor']);
            
            echo("
            <script> 
        
                alert('Usuário inválido ou senha incorreta!')
           
                    window.location.href = 'index.php';
            </script>");
        
            //header('Location: login.php');

        }
        else
        {
            $dadosUsuario = mysqli_fetch_assoc($sql); 
            
            $_SESSION['user'] = $dadosUsuario['user'];
            $_SESSION['senha'] = $dadosUsuario['senha'];
            $_SESSION['setor']= $dadosUsuario['setor']; 
           
        switch ($_SESSION['setor']) {
            case 'Comercial Wesley':
            header('Location: lista.php');
             break;  
          
              case 'Comercial Jaque':
            header('Location: lista2.php');
             break; 
             
             default: 
            header('Location: /emails/admin/index.php');
        }
    }
    }
    else
    {
        // não acessa
      echo("
    <script> 

        alert('Usuário inválido ou senha incorreta!')
   
            window.location.href = 'lista.php';
    </script>");

        
    }
?>