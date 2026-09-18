<?php

include '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];

    $sql = "INSERT INTO produto (nome, categoria, descricao, preco, quantidade, validade) VALUES ('$nome', '$categoria', '$descricao', '$preco', '$quantidade', '$validade')";
    if ($conn->query($sql) === TRUE) {
        echo "Novo cliente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Usuario</title>
</head>
<body>
    <h2>Adicionar Novo Cliente</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>
        <label for="email">Categoria:</label>
        <input type="email" id="email" name="email">
        <br><br>
        <label for="telefone">Descrição:</label>
        <input type="text" id="telefone" name="telefone">
        <br><br>
        <label for="endereco">Preco:</label>
        <input type="text" id="endereco" name="endereco">
        <br><br>
        <label for="endereco">Quantidade:</label>
        <input type="text" id="endereco" name="endereco">
        <br><br>
        <label for="endereco">Validade:</label>
        <input type="text" id="endereco" name="endereco">
        <br><br>
        <button type="submit">Cadastrar Produto</button>
    </form> 
    <br>  
    <button type="button" onclick="window.location.href='../../index.php'">Voltar</button>
</body>
</html>