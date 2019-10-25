drop database if exists db_autoTranslateChat;
create database db_autoTranslateChat;

use db_autoTranslateChat;

create table tb_user(
cd_user int not null auto_increment primary key,
nm_user varchar(200) not null,
dt_nascimento date not null,
nm_login varchar(30) not null unique unique,
nm_password varchar(10) not null,
img_user varchar(300) not null,
txt_bio longtext not null,
id_pais int not null,
foreign key (id_pais) references tb_paises (cd_paises)
);
create table tb_msg(
cd_msg int not null auto_increment primary key,
txt_msg longtext not null,
id_origem int not null,
id_destino int not null,
foreign key (id_origem) references tb_user (cd_user)
);
create table tb_paises(
cd_pais int not null auto_increment primary key,
nm_pais varchar(150) not null unique,
sg_lingua varchar(5) not null,
img_bandeira varchar(255)  not null
);