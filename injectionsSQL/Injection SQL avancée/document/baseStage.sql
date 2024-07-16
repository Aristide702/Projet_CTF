create database if not exists baseStage default character set utf8 collate utf8_general_ci;
use baseStage;

set foreign_key_checks =0;

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
	uti_nom varchar(100) not null,
  uti_prenom varchar(100) not null,
	uti_profil int not null
	)engine=innodb;

set foreign_key_checks =1;

-- contraintes
alter table utilisateur add constraint cs1 foreign key (uti_profil) references profil(pro_id);

-- jeu de données utilisateur
insert into utilisateur values (null, 'Admin', '\'LeM0T2p@$$k1dÉchiRe\'', 'jean', 'Admin', 1);

-- jeu de données profil 
insert into profil values (null, 'Admin');
insert into profil values (null, 'Modérateur');
insert into profil values (null, 'Membre');
