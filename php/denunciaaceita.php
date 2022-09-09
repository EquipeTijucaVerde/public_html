 <?php
session_start(); 

//Verifica o acesso.
require 'acessoadm.php';
 
//Faz a leitura do dado passado pelo link.
$campoid = filter_input(INPUT_GET, 'iddenuncia');
$campostatus = filter_input(INPUT_GET, 'status');
 
//Faz a conexão com o BD.
require 'conexao.php';

if($campostatus=="Aguardando"){

// Bloquear usuário o registro com o id
$sql = "UPDATE denuncias SET Status='Aprovada' WHERE iddenuncia=$campoid";

}else {

 $sql = "UPDATE denuncias SET Status='Aprovada' WHERE iddenuncia=$campoid";   
}
//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Usuário bloqueado";
  
  include 'log.php';
  
   header('Location: denunciascontrolar.php'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 