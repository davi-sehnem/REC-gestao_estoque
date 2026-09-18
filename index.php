<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Estoque</title>
</head>

<body>
    <h2>Gestão de Estoque</h2>

    <button type="button" onclick="window.location.href='public/adicionar.php'">Cadastrar Produto</button>
    <button type="button" onclick="window.location.href='public/editar.php'">Editar Produto</button>
    <button type="button" onclick="window.location.href='public/excluir.php'">Excluir</button>

    <br>
    <h2>Lista de Estoque</h2>

    <table>
        <th>ID</th>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Validade</th>
        <?php
        include 'infra/conexao.php';
        $sql = "SELECT * FROM produto";
        $produto = $conn->query($sql);
        while ($produto = $produto->fetch_assoc()) {
        ?>

            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['categoria']; ?></td>
                <td><?php echo $produto['descricao']; ?></td>
                <td><?php echo $produto['preco']; ?></td>
                <td><?php echo $produto['quantidade']; ?></td>
                <td><?php echo $produto['validade']; ?></td>
                <td>
                    <button type="button" onclick="window.location.href='public/clientes/edit_cliente.php?id=<?php echo $cliente['id']; ?>'">Editar</button>
                    <button type="button" onclick="if (confirm('Tem certeza que deseja excluir este cliente?')) { window.location.href='public/clientes/delete_cliente.php?id=<?php echo $cliente['id']; ?>'; }">Excluir</button>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>

</body>

</html>