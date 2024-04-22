drop database if exists notitas;
create database notitas;
use notitas;

create table users(
	id int primary key auto_increment,
    nom varchar(30) not null,
    ap_pat varchar(30) not null,
    ap_mat varchar(30) not null,
    correo varchar(50) not null,
    passwd varchar(255) not null
);

create table notitas(
	id int primary key auto_increment,
    titulo varchar(15) not null,
    notita varchar(255) not null,
    id_usr int not null,
    foreign key (id_usr) references users(id)
);