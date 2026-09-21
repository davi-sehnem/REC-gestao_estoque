# Gestão de Estoque

## Nome do Sistema

Gestão de Estoque

## Objetivo

O sistema tem como objetivo realizar o gerenciamento de produtos de um estoque, permitindo cadastrar, visualizar, editar e excluir produtos.

Cada produto possui as seguintes informações:

- ID
- Nome
- Categoria
- Descrição
- Preço
- Quantidade
- Validade

## Tecnologias Utilizadas

- PHP
- MySQL
- HTML5
- Bootstrap 5
- XAMPP
- MySQLi
- Prepared Statements

## Requisitos para Execução

Para executar o sistema, é necessário possuir:

- XAMPP instalado
- Apache
- MySQL
- PHP
- Navegador web
- Banco de dados MySQL

## Instalação e Configuração

### 1. Instalar o XAMPP

Instale o XAMPP e inicie os serviços:

- Apache
- MySQL

### 2. Criar o banco de dados

Abra o phpMyAdmin e crie um banco de dados para o sistema.

Nome do banco:

```text
CRUD_estoque_davisehnem
```

### 3. Criar a tabela

Código da tabela:

```sql
CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    categoria VARCHAR(255),
    descrição TEXT,
    preço DECIMAL(10,2),
    quantidade INT,
    validade DATE
);
```

### 4. Configurar a conexão

configure os dados de conexão com o banco de dados:

```php
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "CRUD_estoque_davisehnem";
$port = 6608;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

?>
```

## Estrutura do Banco de Dados

O sistema utiliza a tabela `produto`, que contem:

ID, Nome, Categoria, Descrição, Preço, Quantidade e Validade.

## Funcionalidades

### Cadastrar Produto

Permite cadastrar um novo produto no estoque informando:

- Nome
- Categoria
- Descrição
- Preço
- Quantidade
- Validade

Os dados são inseridos no banco de dados utilizando Prepared Statements.

### Listar Produtos

A página principal apresenta todos os produtos cadastrados no banco de dados em uma tabela.

São exibidos:

- ID
- Nome
- Categoria
- Descrição
- Preço
- Quantidade
- Validade

### Editar Produto

Permite alterar os dados de um produto já cadastrado.

Cada produto possui um botão de edição associado ao seu ID.

A atualização é realizada utilizando Prepared Statements.

### Excluir Produto

Permite excluir um produto do estoque.

Cada produto possui um botão de exclusão associado ao seu ID e o sistema solicita uma confirmação antes da exclusão.

A exclusão é realizada utilizando Prepared Statements.

## Segurança

O sistema utiliza Prepared Statements nas operações de inserção, consulta, atualização e exclusão de dados.

Essa técnica ajuda a evitar ataques de SQL Injection, separando os comandos SQL dos valores fornecidos pelo usuário.

## Estrutura do Projeto

```text
REC-gestao_estoque/
│
├── index.php
│
├── infra/
│   └── conexao.php
│
└── public/
    ├── adicionar.php
    ├── editar.php
    └── excluir.php
```
