create database roubardados;
use roubardados;

create table dadosroubados(
	idRoubado int not null auto_increment primary key,
    nome varchar(100) not null,
    idade int not null,
    cpf varchar(14) not null
);