--CRIAÇÃO DO BANCO DAS TABELAS E BANCO A SEREM UTILIZADOS

CREATE DATABASE telalogincrud
DEFAULT CHARACTER SET utf8 
DEFAULT COLLATE utf8_general_ci;


USE telalogincrud;

CREATE TABLE usuarios(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200), 
    telefone VARCHAR(30),
    email VARCHAR(40),
    senha VARCHAR(32)
)DEFAULT charset = utf8; /*setando as configurações de caracteres especiais no banco*/
