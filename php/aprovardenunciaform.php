<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a leitura do dado passado pelo link.
$campoiddenuncia = $_GET["Iddenuncia"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM denuncias WHERE Iddenuncia = $campoiddenuncia";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../css/form2.css">
        <link rel="stylesheet" href="../css/topnav.css">
		<link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="../imagens/favicon.png" style="width=10px; height:5px;" />
        <title>Editar Usuário</title>
        <style>
    body {
  background-image: url("../imagens/papelDeParede1.jpg");
  background-size: 1366px 768px;
  
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  
        }
        </style>
    </head>
    <body>
<ul>
  <li><a href="/index.php">Tela Principal</a></li>

<?php 
//Menu só aparece para os administradores.
if($_SESSION['acesso']=="Admin"){
  
	echo "<li><a href='usuarioscontrolar.php?pag=1'>Controlar Usuário</a></li>";
}  
?>
</ul>
        <form action="aprovardenuncia.php" method="post">
		
			<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../imagens/logo.png);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
						
	             <h3>Editar Usuário Id: <?php echo $row["Id_Usuario"]; ?></h3>
	                    <input type="hidden" name="iddenuncia" value="<?php echo $row["Iddenuncia"]; ?>">
	        <input type="text" name="status" value="<?php echo $row["Status"]; ?>" placeholder="Status" required>
	        
            <input type="text" name="localdenuncia" value="<?php echo $row["Localdenuncia"]; ?>" placeholder="Local da denuncia" required>		
            <input type="text" name="descricao" value="<?php echo $row["Descricao"]; ?>" placeholder="Descrição do ocorrido" required>	     
            <input type="submit" value="enviar">
	                  
	                  </form>
		         
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
          
    </body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: ../index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 