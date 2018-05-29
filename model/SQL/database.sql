DROP DATABASE chamados;
CREATE DATABASE chamados;
USE chamados;


CREATE TABLE usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(255),
	login VARCHAR(255),
	senha VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE tecnicos (
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(255),
	login VARCHAR(255),
	senha VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE chamados(
	id INT NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(255),
	status INT NOT NULL,
	id_usuario INT,
	id_tecnico INT,
	PRIMARY KEY (id)
);

CREATE USER 'adminchamados'@'localhost' IDENTIFIED BY 'supersenha';
GRANT ALL PRIVILEGES ON chamados.* TO 'adminchamados'@'localhost';

INSERT INTO tecnicos(nome) VALUES('Zenilde Siqueira');
INSERT INTO tecnicos(nome,senha) VALUES('admin','admin')







