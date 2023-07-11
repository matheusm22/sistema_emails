<?php
if(!empty($_GET['id']))
{
include_once('config.php');

$id = $_GET['id'];

$sqlSelect = "SELECT * FROM emails WHERE id=$id";

$result = $conexao->query($sqlSelect);

if($result->num_rows > 0)
{
    //$sqlUpdate = "UPDATE emails SET ativo= 'SIM' WHERE id='$id'";
    // $sqlUpdate = "DELETE FROM emails WHERE id = 133";

    $sqlUpdate = "UPDATE emails SET ativo= 'Não' WHERE id=$id";
    $resultUpdate = $conexao->query($sqlUpdate);
  }
 
}
 
   header('location:index.php');
?>
