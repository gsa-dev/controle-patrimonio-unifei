<!DOCTYPE html>
<html>
<title>Controle de Patrimonio ECO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body>
<?php 
session_start();
$_SESSION["id_usuario"] = NULL;
$_SESSION["senha"] = NULL;
?>
<header class="w3-container w3-indigo">
  <h1>Controle de Patrimonio ECO</h1>
</header>

<div class="w3-container w3-half w3-margin-top">

<form class="w3-container w3-card-4"
action="pagina_principal.php" method="POST">


<p>
<input class="w3-input" type="text" name="id" style="width:90%" required>
<label class="w3-label w3-validate" style="color:black">ID</label></p>
<p>
<input class="w3-input" type="password" name="senha" style="width:90%" required>
<label class="w3-label w3-validate" style="color:black">Senha</label></p>

<p>
<button class="w3-btn w3-section w3-ripple" style="background-color:#e60000"> Entrar </button></p>

</form>

</div>

</body>
</html> 
