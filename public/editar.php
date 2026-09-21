<?php

include '../infra/conexao.php';

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;


$sql = "SELECT * FROM produto WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$produto = $resultado->fetch_assoc();

mysqli_stmt_close($stmt);

if (!$produto) {
    die("Produto não encontrado.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $novo_nome = $_POST["nome"] ?? "";
    $novo_categoria = $_POST["categoria"] ?? "";
    $novo_descrição = $_POST["descrição"] ?? "";
    $novo_preço = $_POST["preço"] ?? "";
    $novo_quantidade = $_POST["quantidade"] ?? "";
    $novo_validade = $_POST["validade"] ?? "";

    if (
        !empty($novo_nome) &&
        !empty($novo_categoria) &&
        !empty($novo_descrição) &&
        !empty($novo_preço) &&
        !empty($novo_quantidade) &&
        !empty($novo_validade)
    ) {

        $sql = "UPDATE produto 
                SET nome = ?, 
                    categoria = ?, 
                    descrição = ?, 
                    preço = ?, 
                    quantidade = ?, 
                    validade = ? 
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssssssi",
            $novo_nome,
            $novo_categoria,
            $novo_descrição,
            $novo_preço,
            $novo_quantidade,
            $novo_validade,
            $id
        );

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../index.php");
            exit();
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>

    <h2>Editar produto</h2>

    <form action="editar.php?id=<?php echo $id; ?>" method="POST">

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>">

        <br><br>

        <label for="categoria">Categoria</label>
        <input type="text" name="categoria" value="<?php echo $produto['categoria']; ?>">

        <br><br>

        <label for="descrição">Descrição</label>
        <input type="text" name="descrição" value="<?php echo $produto['descrição']; ?>">

        <br><br>

        <label for="preço">Preço</label>
        <input type="text" name="preço" value="<?php echo $produto['preço']; ?>">

        <br><br>

        <label for="quantidade">Quantidade</label>
        <input type="text" name="quantidade" value="<?php echo $produto['quantidade']; ?>">

        <br><br>

        <label for="validade">Validade</label>
        <input type="text" name="validade" value="<?php echo $produto['validade']; ?>">

        <br><br>

        <button type="submit">Enviar</button>

    </form>

    <br>

    <button type="button" onclick="window.location.href='../index.php'">
        Voltar
    </button>

</body>

</html>