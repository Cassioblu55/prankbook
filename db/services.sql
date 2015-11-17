DROP TABLE IF EXISTS services;
create table services(
	id int not null AUTO_INCREMENT,
	date_requested varchar(8) null,
	prank_id INT NOT NULL,
	prank_status int(1) null,
	price int(45) null,
	comments varchar(255) null,
	service_address varchar(255) null,
	cc_id INT NOT NULL,
	user_id INT NOT NULL,
	primary key(id)
);
