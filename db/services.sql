create table services(
	service_id int not null AUTO_INCREMENT,
	date_requested varchar(8) not null,
	prank_id INT NOT NULL,
	prank_status int(1) not null,
	price int(45) not null,
	comments varchar(255) null,
	service_address varchar(255) not null,
	cc_id INT NOT NULL,
	user_id INT NOT NULL,
	primary key(service_id)
);
