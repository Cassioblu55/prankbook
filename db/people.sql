create table people (
	id int not null AUTO_INCREMENT,
	firstname varchar(45) not null,
	lastname varchar(45) not null,
	email varchar(100) not null,
	primary key(id)
);

insert into people (firstname, lastname, email) values ("Cassio", "Hudson", "cassio-hudson@uiowa.edu");