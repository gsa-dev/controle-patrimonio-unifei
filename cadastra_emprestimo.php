<?php

session_start();
$id_usuario = $_SESSION["id_usuario"];
$id_patrimonio = $_SESSION["id_patrimonio"];
$nome = $_POST["nome"];
$data =  date('Y-m-d');
$condicoes = $_POST["condicoes"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "controle_lab_eco_bd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$verifica_emprestimo = mysqli_query($conn, "SELECT * FROM emprestimo WHERE id_patrimonio = $id_patrimonio");

if (mysqli_num_rows($verifica_emprestimo) == 0) {

    $sql3 = "INSERT INTO emprestimo (ide,id_usuario, id_patrimonio, nome, data, emprestado, condicoes) VALUES (0,$id_usuario, $id_patrimonio, '$nome' , '$data', 1, '$condicoes')";
    mysqli_query($conn, $sql3);
    $_SESSION["cadastrado"] = 1;
    echo("<script type='text/javascript'> alert('Item Emprestado!'); location.href='pagina_principal.php';</script>");
} else {
    while ($p = mysqli_fetch_array($verifica_emprestimo)) {

        if (isset($p["id_patrimonio"]) && $p["emprestado"] == 0) {
            echo("<script type='text/javascript'> alert('Item Emprestado!'); location.href='pagina_principal.php';</script>");

            mysqli_query($conn, "update emprestimo set emprestado = 1  ");
        } 
    }
}









$conn->close();
?>
