create database if not exists basecrustace default character set utf8 collate utf8_general_ci;
use basecrustace;

-- --------------------------------------------------------
-- creation des tables
set foreign_key_checks = 0;

-- table role
drop table if exists role;
create table role (
	rol_id int not null auto_increment primary key,
	rol_nom varchar(100)	
)engine=innodb;

-- table utilisateur
drop table if exists utilisateur;
create table utilisateur (
	uti_id int not null auto_increment primary key,
	uti_login varchar(20) unique not null,
	uti_mdp varchar(500) not null,
	uti_role int not null
	)engine=innodb;

-- table crustace
drop table if exists crustace;
create table crustace (
    cru_id int not null auto_increment primary key,
    cru_nom varchar(500) null,
	    cru_nomlatin varchar(500) null,
		cru_description varchar(1000) null,
		cru_image varchar(500) null
) engine = innodb;

set foreign_key_checks = 1;

-- contraintes
alter table utilisateur add constraint cs1 foreign key (uti_role) references role(rol_id);

-- jeu de données role 
insert into role values (null, 'Admin');
insert into role values (null, 'Modérateur');
insert into role values (null, 'Membre');

-- Jeu de données utilisateur
insert into utilisateur values(null, "admin", "4D30745F325F5040242420AC", 1);