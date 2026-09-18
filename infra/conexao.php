<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "CRUD_estoque_davisehnem";
$conn = new mysqli($host,$user,$pass,$db);
$port = 6608;

if($conn->connect_error){
    die("Erro na conexão");
}
?>