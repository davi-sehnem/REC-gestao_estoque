<?php

include '../infra/conexao.php';

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

// BUSCAR PRODUTO
$sql = "SELECT * FROM produto WHERE id = $id";
$resultado = $conn->query($sql);

$produto = $resultado->fetch_assoc();

if (!$produto) {
    die("Produto não encontrado.");
}

// EDITAR PRODUTO
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
        } else {
            echo "Erro ao atualizar o produto: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }
}
?>