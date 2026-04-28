create database mvcBiblioteca;
use mvcBiblioteca;

CREATE TABLE livro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) null,
    descrição VARCHAR(100) null,
    preço double null,
	custo double null,
	imposto double null,
    created_at timestamp null,
    updated_at timestamp null
);

select * from livro;
select * from editora;
select * from detalheLivro;


CREATE TABLE editora (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255) NULL,
    CNPJ int NULL,
    país varchar(255) NULL,
    cidade varchar(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE detalheLivro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao varchar(255) NULL,
    nome varchar(255) NULL,
    preço double null,
    autor varchar(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

ALTER TABLE livro
ADD COLUMN editora_id INT NULL,
ADD CONSTRAINT fk_livro_editora
FOREIGN KEY (editora_id)
REFERENCES editora(id)
ON DELETE SET NULL;

ALTER TABLE detalheLivro
ADD COLUMN livro_id INT NULL,
ADD CONSTRAINT fk_livro_detalhe
FOREIGN KEY (livro_id)
REFERENCES livro(id)
ON DELETE SET NULL;