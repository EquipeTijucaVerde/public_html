<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:../login.html');
  exit;
}

// Dados do Formulário
$campotipodenuncia = $_POST["tipodenuncia"];
$campolocaldenuncia = $_POST["localdenuncia"];
$campodescricao = $_POST["descricao"];
 
//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "INSERT INTO denuncias(tipodenuncia, localdenuncia, descricao, usuario_id, status) VALUES('$campotipodenuncia ', '$campolocaldenuncia', '$campodescricao', '" . $_SESSION['id'] . "', 'Aguardando')";

include 'logdenuncia.php';

 if($conn->query($sql) === TRUE){
      header( "refresh:2;url=../index.php" );
     echo"Enviado" ; 
 } else {
    header("refresh:2;url=../index.php"); //Redireciona para o form
    echo "Errooooooor" . $sql . "<br>" . $conn->error;
}
//Fecha a conexão.
$conn->close();
?> 