<?php

include '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $descrição = $_POST['descrição'];
    $preço = $_POST['preço'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];

    $sql = "INSERT INTO produto (nome, categoria, descrição, preço, quantidade, validade)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssss",
        $nome,
        $categoria,
        $descrição,
        $preço,
        $quantidade,
        $validade
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "Novo produto cadastrado com sucesso!";
    } else {
        echo "Erro: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Produto</title>
</head>

<body>

    <h2>Adicionar Novo Produto</h2>

    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria">

        <br><br>

        <label for="descrição">Descrição:</label>
        <input type="text" id="descrição" name="descrição">

        <br><br>

        <label for="preço">Preço:</label>
        <input type="text" id="preço" name="preço">

        <br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="text" id="quantidade" name="quantidade">

        <br><br>

        <label for="validade">Validade:</label>
        <input type="date" id="validade" name="validade">

        <br><br>

        <button type="submit">Cadastrar Produto</button>

    </form>

    <br>

    <button type="button" onclick="window.location.href='../index.php'">
        Voltar
    </button>

</body>

</html>