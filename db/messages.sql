DROP TABLE IF EXISTS messages;
create table messages (
	id int not null AUTO_INCREMENT,
	reply varchar(255) null,
	message varchar(255) null,
	service_id int not null,
	primary key(id)
);