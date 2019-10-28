drop database if exists db_autoTranslateChat;
create database db_autoTranslateChat;

use db_autoTranslateChat;

create table tb_paises(
cd_pais int not null auto_increment primary key,
nm_pais varchar(150) not null unique,
sg_lingua varchar(5) not null
);
create table tb_user(
cd_user int not null auto_increment primary key,
nm_user varchar(200) not null,
dt_nascimento date not null,
nm_login varchar(30) not null unique,
nm_status enum('Online','Offline'),
nm_password varchar(32) not null,
img_user varchar(300) not null,
txt_bio longtext not null,
id_pais int not null,
foreign key (id_pais) references tb_paises (cd_pais)
);
create table tb_msg(
cd_msg int not null auto_increment primary key,
txt_msg longtext not null,
dt_msg time not null,
id_origem int not null,
id_destino int not null,
foreign key (id_origem) references tb_user (cd_user)
);
create table tb_amizades(
cd_amizade int not null auto_increment primary key,
id_adicionou int not null,
id_adicionado int not null,
foreign key (id_adicionou) references tb_user (cd_user),
foreign key (id_adicionado) references tb_user (cd_user)
);
select * from tb_user where cd_user in ( select id_adicionado from tb_amizades where id_adicionou != 1 and id_adicionado != 1);
select * from tb_user;
insert into tb_paises values(null,"brasil","pt"),(null,"estado unidos","en"),(null,"peru","es");
insert into tb_amizades values(null,1,2);