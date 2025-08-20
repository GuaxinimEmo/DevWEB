DROP DATABASE IF exists projeto01;
create database if not exists projeto01;
use projeto01;
create table Usuario
(
	id int auto_increment,
    nome varchar(50),
    email varchar(50),
    senha varchar(50),
    telefone varchar (30),
    curso varchar(2),    
    primary key (id)
);