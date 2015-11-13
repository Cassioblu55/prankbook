DROP TABLE IF EXISTS users;

create table users (
	id int not null AUTO_INCREMENT,
	firstname varchar(45) null,
	lastname varchar(45) null,
	email varchar(100) not null,
	salt char(16) not null,
	username varchar(255) not null,
	password char(64) not null,
	zipcode int(5) null,
	admin tinyint(1) DEFAULT '0' not null,
	primary key(id)
);