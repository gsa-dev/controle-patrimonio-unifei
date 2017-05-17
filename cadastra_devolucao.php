<?php
session_start();

$id_usuario = $_SESSION["id_usuario"];
$x= $_GET["id_p"];
//$item = $_POST["item"];
//$nSerie = $_POST["nSerie"];
//$data = $_POST["data"];
$condicoes = $_POST["condicoes"];
$id_patrimonio = $_POST["nID"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "controle_lab_eco_bd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}


            echo("<script type='text/javascript'> alert('Item DEvolvido!'); location.href='pagina_principal.php';</script>");

            mysqli_query($conn, "update emprestimo set emprestado = 0 , condicoes= '$condicoes' WHERE id_patrimonio=$x  ");

$conn->close();

?>
