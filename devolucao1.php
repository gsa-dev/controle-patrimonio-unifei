<!DOCTYPE html>
<html>
<title>Controle de Patrimonio ECO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"><style>
.w3-sidenav a {padding:16px;font-weight:bold}
.button {
    background-color: #e60000;
    border: none;
    color: white;
    padding: 8px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #e60000;
}

.button1:hover {
    background-color: #e60000;
    color: white;
}
</style>
<body>
<?php
session_start();
if(empty($_SESSION["id_usuario"]) && empty($_SESSION["senha"])){
	header("Location:login.php");
}
$id = $_SESSION["id_usuario"];
$senha = $_SESSION["senha"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "controle_lab_eco_bd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT senha FROM usuario WHERE id=$id";
$result = $conn->query($sql);
$dados_usuario = $result->fetch_assoc();

if(empty($dados_usuario)){
	header("Location:login.php");
}
else{
	$compara = strcmp($senha,$dados_usuario["senha"]);
	if($compara == 0){
		
	}
	else{
		header("Location:login.php");
	}
}

$conn->close();
?>

<nav class="w3-sidenav w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:3;width:250px;">
  <a href="javascript:void(0)" onclick="w3_close()" 
  class="w3-indigo w3-hide-large w3-closenav w3-large">Fechar <i class="fa fa-remove"></i></a>
  <a href="pagina_principal.php">Emprestimo</a>
  <a href="devolucao1.php" class="w3-light-grey w3-medium">Devolução</a>
  <a href="consulta1.php">Consulta</a>
    <a href="index.php">Sair</a>
</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"></div>

<div class="w3-main" style="margin-left:250px;">

<div id="myTop" class="w3-top w3-container w3-padding-16 w3-indigo w3-large">
  <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
  <span id="myIntro" class="w3-hide w3-indigo">Controle de Patrimonio ECO</span>
</div>

<header class="w3-container w3-indigo w3-padding-16" style="padding-left:32px">
  <h1 class="w3-xxxlarge w3-padding-16">Controle de Patrimonio ECO</h1>
</header>

<div class="w3-container w3-padding-32" style="padding-left:32px">

<br>
<?php if(@$_SESSION["devolvido"]==1){
	$_SESSION["devolvido"]=0; ?>
	<p style="text-align:center"><b><ins>Dados cadastrados com sucesso!</ins></b></p>
<?php	}else if(@$_SESSION["devolvido"]==2){
	$_SESSION["devolvido"]=0; ?>
	<p style="text-align:center"><b><ins>Nao foi possivel cadastrar a devolucao!</ins></b></p>
<?php	}
?>
<br>

<h2 style="text-align:center">Devolução</h2>
<form class="w3-container" action="devolucao2.php" method="post">
      <div class="w3-section">
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Digite o numero de serie do item" name="nSerie" required>
        <button class="w3-btn-block w3-section w3-padding button button1" type="submit">Buscar</button>
      </div>
    </form>

<br><br>

<footer class="w3-container w3-indigo w3-padding-32" style="padding-left:32px">
   <p>Copyright - Engenharia da Computação</p>  
   <p>Universidade Federal de Itajubá - campus Itabira</p>
</footer>
     
</div>

<script>
// Open and close the sidenav on medium and small screens
function w3_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
    document.getElementsByClassName("w3-overlay")[0].style.display = "block";
}
function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
    document.getElementsByClassName("w3-overlay")[0].style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("myTop").classList.add("w3-card-4");
        document.getElementById("myIntro").classList.add("w3-show-inline-block");
    } else {
        document.getElementById("myIntro").classList.remove("w3-show-inline-block");
        document.getElementById("myTop").classList.remove("w3-card-4");
    }
}

// Accordions
function myAccordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
    }
}
</script>
     
</body>
</html> 
