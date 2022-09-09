<?php

$campoid = filter_input(INPUT_POST, 'iddenuncia');
$camponome = 'Prefeitura';
$campoemail='prefeituracarioca@gmail.com';
$campolocaldenuncia = filter_input(INPUT_GET, 'localdenuncia');
$campodescricao = filter_input(INPUT_GET, 'descricao');
$campotipodenuncia = filter_input(INPUT_GET, 'tipodenuncia');

require 'conexao.php';

$sql = "SELECT * FROM denuncias WHERE Localdenuncia ='" . $campolocaldenuncia . "' and Descricao ='" . $campodescricao . "'";
 
$result = $conn->query($sql);

 if ($result->num_rows > 0) {
  header( ";url=../login.html" );	
  echo "Gravado com sucesso.";

//Código reutilizável para enviar emails.
require 'enviaremaildenuncia.php';

//Conteúdo do email de validação
$texto = "ATENÇÃO PREFEITURA<br> Um de nossos usuários pode ter detectado um problema que necessite da ajuda de uma força maior do que as oferecidas, pedimos que entrem em contato para discutirmos uma futura solução<br><br><br> Local da Denuncia: '"  . $campolocaldenuncia . "' <br><br>Descrição da Denúncia: '" . $campodescricao . "'<br><br><br>Atensiosamente, Equipe Tijuca Verde.<br>";



//Chamada da função no do código
enviaremail($camponome, $campoemail, 'A sociedade clama por ajuda', $texto);

} else {
//  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>