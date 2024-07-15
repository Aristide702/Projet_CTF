create database if not exists baseresto default character set utf8 collate utf8_general_ci;
use baseresto;

-- --------------------------------------------------------
-- creation des tables
set foreign_key_checks = 0;

-- table profil
drop table if exists profil;
create table profil (
	pro_id int not null auto_increment primary key,
	pro_libelle varchar(100)	
)engine=innodb;

-- table utilisateur
drop table if exists utilisateur;
create table utilisateur (
	uti_id int not null auto_increment primary key,
	uti_login varchar(20) unique not null,
	uti_mdp varchar(500) not null,
	uti_profil int not null
	)engine=innodb;

-- table plat
drop table if exists plat;
create table plat (
    pla_id int not null auto_increment primary key,
    pla_nom varchar(500) not null,
	pla_calorie int not null,
    pla_prix float not null
) engine = innodb;

set foreign_key_checks = 1;

-- contraintes
alter table utilisateur add constraint cs1 foreign key (uti_profil) references profil(pro_id);

-- jeu de données profil 
insert into profil values (null, 'Admin');
insert into profil values (null, 'Modérateur');
insert into profil values (null, 'Membre');

-- Jeu de données plat
insert into plat values(null, "Blanquette de veau", 600, 13.40);
insert into plat values(null, "Endives au jambon", 850, 12.50);
insert into plat values(null, "Hamburger maison", 1150, 14.90);
insert into plat values(null, "Croqu-monsieur gratiné", 920, 12.50);
insert into plat values(null, "Travers de porc tex-mex", 1000, 17.80);
insert into plat values(null, "Salade au lard", 750, 14.20);
insert into plat values(null, "Choucroûte du chef", 930, 18.80);
insert into plat values(null, "Colin d'Alaska", 570, 16.50);
insert into plat values(null, "Couscous merguez", 930, 18.30);