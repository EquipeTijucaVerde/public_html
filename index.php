<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Tijuca Verde | Home</title>
<link rel="shortcut icon" type="image/x-icon" href="/imagens/favicon.png" style="width:10px; height:5px;" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/principal1.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/denunciaform.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/carousel.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
</head>
<body>
<!-- Navbar (situado em cima) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" style="height:60px;" id="myNavbar">
    <a href="#home"><img src="imagens/logo.png" style="width:163px; height:127px;margin-top:-30px;" class="w3-bar-item w3-button w3-wide"></a>
    <!-- Links da barra de navegação do lado direito -->
    <div class="w3-right w3-hide-small">
        <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> SOBRE NÓS</a>
        <a href="#denuncia" class="w3-bar-item w3-button"><i class="fa fa-th"></i> DENÚNCIAS</a>
        <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTATO</a>
   
<?php 
//Menu só aparece para os administradores.
if (isset($_SESSION["acesso"])){ 
if($_SESSION['acesso']=="Admin"){
?>

    <li class='dropdown'><a href="javascript:void(0)" class="dropbtn"><i class="fa fa-cog" aria-hidden="true"></i> ADMINISTRAÇÃO DO SITE</a>
	<div class='dropdown-content'>
	    <a href='php/admincadastrar1.php'>CADASTRAR USUÁRIO</a>
	<a href='php/usuarioscontrolar.php?pag=1'>CONTROLAR USUÁRIOS</a>
	<a href="php/denunciascontrolar.php"><i class="fa fa-book"></i>Controlar Denuncias</a></div></li>
<?php
}}
?>
      
     <?php
if (!isset($_SESSION["acesso"])){ ?>
  <div class="w3-right w3-hide-small">
 <a href ="login.html" class="w3-bar-item w3-button">Login</a></div>
    
<?php }else{
//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];

?>
  <li class="dropdown" style="float:right">
    <a href="javascript:void(0)" class="dropbtn"><i class="fa fa-user-circle" aria-hidden="true"></i>Usuário: <?php echo $logado;?></a>
    <div class="dropdown-content">
        <a href="php/perfil.php"><i class="fa fa-user"></i> PERFIL</a>
      <a href="php/deslogar.php"><i class="fa fa-power-off"></i> Deslogar</a>
	  
    </div>
  </li>
 <?php } ?>
    </div>
    <!-- Ocultar links flutuantes à direita em telas pequenas e substituí-los por um ícone de menu -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
 
</div>
</div>
<!-- Barra lateral em telas pequenas ao clicar no ícone do menu -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Fechar ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Sobre Nós</a>
  <a href="#denuncia" onclick="w3_close()" class="w3-bar-item w3-button">Denúncias</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">Contato</a>
  <?php 
if (isset($_SESSION["acesso"])){ 
if($_SESSION['acesso']=="Admin"){
?>
	<a href="php/admincadastrar1.php" class="w3-bar-item w3-button">CADASTRAR USUÁRIO</a>
    <a href="php/usuarioscontrolar.php?pag=1" class="w3-bar-item w3-button">CONTROLAR USUÁRIOS</a>
<?php
}}
?>
      
     <?php
if (!isset($_SESSION["acesso"])){ ?>
<a href="login.html" onclick="w3_close()" class="w3-bar-item w3-button">Login</a>
    
<?php }else{
//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];

?>
  <li class="dropdown" style="width:100%">
    <a href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-user-circle" aria-hidden="true"></i>Usuário: <?php echo $logado;?></a>
    <div class="dropdown-content" style="width:100%">
      <a href="php/deslogar.php">Deslogar</a>
    </div>
  </li>
 <?php } ?>
    
</nav>

<!-- Cabeçalho com imagem de altura total -->
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators(inutil, mas n apaga --><!-- Indicators(inutil, mas n apaga --><!-- Indicators(inutil, mas n apaga -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!--Slides do carousel --><!--Slides do carousel --><!--Slides do carousel --><!--Slides do carousel -->
    <div class="carousel-inner">
      <div  id="home" class="item active">
       <a href="index.php"> <img  src="imagens/logo.png" alt="Los Angeles" style="width:100%; height:650px;"></a>
      </div>

      <div class="item">
        <a href="index.php"> <img src="imagens/logo.png" alt="Chicago" style="width:100%; height:650px;"></a>
      </div>
    
      <div class="item">
       <a href="index.php">  <img src="imagens/logo.png" alt="New york" style="width:100%; height:650px;"></a>
      </div>
    </div>

    <!--controle das setas do carousel--> <!--controle das setas do carousel--> <!--controle das setas do carousel-->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="fa fa-arrow-left" style="font-size:48px;"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="fa fa-arrow-right" style="font-size:48px;"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!-- Sobre Nós Seção -->    <!-- Sobre Nós Seção -->    <!-- Sobre Nós Seção -->    <!-- Sobre Nós Seção -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">SOBRE NÓS</h3>
  <p class="w3-center w3-large">Características do nosso projeto</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-users w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Sobre o projeto</p>
      <p>O Tijuca verde foi criado com o intuito de conscientizar os cidadãos sobre a preservação da área verde da tijuca. O SITE TIJUCA VERDE É DE CUNHO AMBIENTAL E NÃO ACEITARÁ QUALQUER OUTRO TIPO DE DENÚNCIA</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-recycle w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Reciclagem</p>
      <p>Nos preocupamos com o bem social e a conscientização sobre o meio ambiente, através da coleta e reaproveitamento correto de resíduos..</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-gift w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Recompensas</p>
      <p>Para incentivar as pessoas a relatarem os crimes ambientais criamos um sistema de recompensa .</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Suporte</p>
      <p>O site é um meio de facilitar a conexão entre o cidadão responsavel e a autoridade.</p>
    </div>
  </div>
</div>
<!-- Denúncia Seção --><!-- Denúncia Seção --><!-- Denúncia Seção --><!-- Denúncia Seção --><!-- Denúncia Seção -->
<div class="w3-container" style="padding:128px 16px" id="denuncia">
  <h3 class="w3-center">Denúncias</h3> 
  <p class="w3-center w3-large">Faça do "Meio Ambiente" o seu "Meio de Vida".
</p>
 <div class="w3-row-padding" style="margin-top:64px">
<!--Denuncia1--><!--Denuncia1--><!--Denuncia1--><!--Denuncia1--><!--Denuncia1--><!--Denuncia1--><!--Denuncia1-->
  
   <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Bueiros Entupidos</li>
		 <li class="w3-padding-16"><b>Localize bueiros entupidos, vazando ou abertos</b>
       </li>
        <li class="w3-light-grey w3-padding-20">
        
<button class="button2" onclick="document.getElementById('id01').style.display='block' " style="width:auto;">Denuncie aqui</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="php/denunciacodigo.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">Fechar</span>
      <img src="imagens/bueiros.png" alt="Avatar" class="avatar">
    </div>

    <div class="container5">
        
       <input  type="hidden" value="Bueiro entupido" name="tipodenuncia" readonly required>
        
      <label for="localdenuncia"><b>Local da denuncia</b></label>
      <input class="input2" type="text" placeholder="Onde aconteceu o ocorrido" name="localdenuncia" required>


      <label for="descricao"><b>Descrição</b></label>
      <input class="input2" type="text" placeholder="Descreva o ocorrido" name="descricao" required>
        
      <button class="button1" onclick="myFunction()" type="submit">Enviar</button>
    </div>
  </form>
</div>



        </li>
      </ul>
    </div>
<!--Denuncia2--><!--Denuncia2--><!--Denuncia2--><!--Denuncia2--><!--Denuncia2--><!--Denuncia2--><!--Denuncia2-->     
	 <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Maus Tratos aos Animais</li>
       <li class="w3-padding-16"><b>Denuncie uma agressão ou abandono</b>
       </li>
        <li class="w3-light-grey w3-padding-22">
       <button class="button2" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Denuncie aqui</button>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="php/denunciacodigo.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">Fechar</span>
      <img src="imagens/animais.png" alt="Avatar" class="avatar">
    </div>

    <div class="container5">
        
       <input  type="hidden" value="Maus tratos aos animais" name="tipodenuncia" readonly required>
        
      <label for="localdenuncia"><b>Local da denuncia</b></label>
      <input class="input2" type="text" placeholder="Onde aconteceu o ocorrido" name="localdenuncia" required>


      <label for="descricao"><b>Descrição</b></label>
      <input class="input2" type="text" placeholder="Descreva o ocorrido" name="descricao" required>
        
      <button class="button1" type="submit">Enviar</button>
    </div>
  </form>
</div>


        </li>
      </ul>
    </div>
<!--Denuncia3--><!--Denuncia3--><!--Denuncia3--><!--Denuncia3--><!--Denuncia3--><!--Denuncia3--><!--Denuncia3-->    
	 <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Focos de Incêndio</li>
      <li class="w3-padding-16"><b>Informe se é um predio, casa, arvore, etc</b>
       </li>
        <li class="w3-light-grey w3-padding-22">
<button class="button2" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Denuncie aqui</button>

<div id="id03" class="modal">
  
  <form class="modal-content animate" action="php/denunciacodigo.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">Fechar</span>
      <img src="imagens/incendios.png" alt="Avatar" class="avatar">
    </div>

    <div class="container5">
        
       <input  type="hidden" value="Focos de Incêndio" name="tipodenuncia" readonly required>
        
      <label for="localdenuncia"><b>Local da denuncia</b></label>
      <input class="input2" type="text" placeholder="Onde aconteceu o ocorrido" name="localdenuncia" required>


      <label for="descricao"><b>Descrição</b></label>
      <input class="input2" type="text" placeholder="Descreva o ocorrido" name="descricao" required>
        
      <button class="button1" type="submit">Enviar</button>
    </div>
  </form>
</div>


        </li>
      </ul>
    </div>
    <!--Denuncia4--><!--Denuncia4--><!--Denuncia4--><!--Denuncia4--><!--Denuncia4--><!--Denuncia4--><!--Denuncia4-->  
    
    	 <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Lixo Despejado de Forma Irregular</li>
     <li class="w3-padding-16"><b>Informe como foi despejado e onde foi despejado</b>
       </li>
        <li class="w3-light-grey w3-padding-22">
       <button class="button2" onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Denuncie aqui</button>

<div id="id04" class="modal">
  
  <form class="modal-content animate" action="php/denunciacodigo.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">Fechar</span>
      <img src="imagens/lixo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container5">
        
       <input  type="hidden" value="Lixo despejado de forma irregular" name="tipodenuncia" readonly required>
        
      <label for="localdenuncia"><b>Local da denuncia</b></label>
      <input class="input2" type="text" placeholder="Onde aconteceu o ocorrido" name="localdenuncia" required>


      <label for="descricao"><b>Descrição</b></label>
      <input class="input2" type="text" placeholder="Descreva o ocorrido" name="descricao" required>
        
      <button class="button1" type="submit">Enviar</button>
    </div>
  </form>
</div>


        </li>
      </ul>
    </div>
<!--Denuncia5--><!--Denuncia5--><!--Denuncia5--><!--Denuncia5--><!--Denuncia5--><!--Denuncia5--><!--Denuncia5-->  
	 <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Outros</li>
     <li class="w3-padding-16"><b>Informe os maus tratos do ocorrido</b>
       </li>
        </li>
        <li class="w3-light-grey w3-padding-22">
<button class="button2" onclick="document.getElementById('id05').style.display='block'" style="width:auto;">Denuncie aqui</button>

<div id="id05" class="modal">
  
  <form class="modal-content animate" action="php/denunciacodigo.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">Fechar</span>
      <img src="imagens/outro.png" alt="Avatar" class="avatar">
    </div>

    <div class="container5">
        
       <input  type="hidden" value="Outra" name="tipodenuncia" readonly required>
        
      <label for="localdenuncia"><b>Local da denuncia</b></label>
      <input class="input2" type="text" placeholder="Onde aconteceu o ocorrido" name="localdenuncia" required>


      <label for="descricao"><b>Descrição</b></label>
      <input class="input2" type="text" placeholder="Descreva o ocorrido" name="descricao" required>
        
      <button class="button1" type="submit">Enviar</button>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal =  document.getElementById('id01');
var modal =  document.getElementById('id02');
var modal =  document.getElementById('id03');
var modal =  document.getElementById('id04');
var modal =  document.getElementById('id05');

</script>
        </li>
      </ul>
    </div>
	</div>
</div>


    </script>
<!-- Contato Seção --><!-- Contato Seção --><!-- Contato Seção --><!-- Contato Seção --><!-- Contato Seção -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTATO</h3>
  <p class="w3-center w3-large">Nos envie uma mensagem</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Tijuca, Rio de Janeiro</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: tijucaverdeofc@gmail.com</p>
    <br>
    <form action="/php/contato.php">
      <p><input class="w3-input w3-border" type="text" name="assunto" placeholder="Assunto" required></p>
      <p><input class="w3-input w3-border" type="text"  name="menssagem"  placeholder="Menssagem" required></p>
      <p>
        <button class="w3-button w3-black" type="submit"><i class="fa fa-paper-plane"></i> ENVIAR MENSAGEM</button>
      </p>
    </form>
  </div>
</div>

<!-- Footer/Rodapé -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Voltar ao início</a>
</footer>
 
<script>

// Alterne entre mostrar e ocultar a barra lateral ao clicar no ícone do menu
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Feche a barra lateral com o botão Fechar
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
