<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "CRUD_estoque_davisehnem";
$port = 6608;

$conn = new mysqli($host,$user,$pass,$db,$port);

if($conn->connect_error){
    die("Erro na conexão");
}
?>