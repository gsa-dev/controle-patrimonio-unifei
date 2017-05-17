<?php

session_start();
$id_usuario = $_SESSION["id_usuario"];
$id_patrimonio = $_SESSION["id_patrimonio"];
$nome = $_POST["nome"];
$data = date('d/m/y');
$condicoes = $_POST["condicoes"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "controle_lab_eco_bd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
    $sql = "INSERT INTO emprestimo (ide,id_usuario, id_patrimonio, nome, data, emprestado, condicoes) VALUES (0,$id_usuario, $id_patrimonio, $data, 1, '$condicoes')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["cadastrado"] = 1;
    }
?>