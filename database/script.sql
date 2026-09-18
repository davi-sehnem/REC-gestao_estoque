CREATE DATABASE IF NOT EXISTS CRUD_estoque_davisehnem;

USE CRUD_estoque_davisehnem;

CREATE TABLE IF NOT EXISTS produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    descrição VARCHAR(255) NOT NULL,
    preço VARCHAR(255) NOT NULL,
    quantidade VARCHAR(255) NOT NULL,
    validade DATE(255) NOT NULL
);

