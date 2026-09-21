<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Estoque</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
</head>

<body class="m-3">

    <h2>Gestão de Estoque</h2>

    <button type="button"
        class="btn btn-outline-primary"
        onclick="window.location.href='public/adicionar.php'">
        Cadastrar Produto
    </button>

    <br><br>

    <h2>Lista de Estoque</h2>

    <table class="table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Validade</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php

            include 'infra/conexao.php';

            $sql = "SELECT * FROM produto";
            $resultado = $conn->query($sql);

            while ($produto = $resultado->fetch_assoc()) {
            ?>

                <tr>

                    <td><?php echo $produto['id']; ?></td>

                    <td><?php echo $produto['nome']; ?></td>

                    <td><?php echo $produto['categoria']; ?></td>

                    <td><?php echo $produto['descrição']; ?></td>

                    <td><?php echo $produto['preço']; ?></td>

                    <td><?php echo $produto['quantidade']; ?></td>

                    <td><?php echo $produto['validade']; ?></td>

                    <td>

                        <!-- EDITAR -->
                        <a href="public/editar.php?id=<?php echo $produto['id']; ?>"
                            class="btn btn-outline-primary">
                            Editar
                        </a>

                        <!-- EXCLUIR -->
                        <a href="public/excluir.php?id=<?php echo $produto['id']; ?>"
                            class="btn btn-outline-danger"
                            onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php
            }

            ?>

        </tbody>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrVwcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
    </script>

</body>

</html>