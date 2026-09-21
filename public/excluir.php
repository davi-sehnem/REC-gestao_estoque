<?php

include "../infra/conexao.php";

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$sql = "DELETE FROM produto WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: ../index.php");
    exit();
}

echo "Erro ao excluir produto: " . mysqli_stmt_error($stmt);

mysqli_stmt_close($stmt);
?>