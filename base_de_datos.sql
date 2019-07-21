create database multiproductos;
use tiendaphp;

create table productos(
	id int not null auto_increment primary key,
	nombre varchar(255),
	precio double
);

insert into productos (nombre,precio) values ("Huawei",10),("Motorola",20),("Nokia",25),("Samsung",15),("Iphone",5),("Xiaomi",100),("Lenovo",50),("Blackberry",50);

