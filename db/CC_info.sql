create table cc_info (
	cc_id int not null AUTO_INCREMENT,
	cc_number varchar(45) not null,
	cc_last varchar(4) not null,
	security varchar(3) not null,
	salt char(16) not null,
	billing_address varchar(45) not null,
	expiration_date int(4) not null,
	user_id INT NOT NULL,
	primary key(cc_id)
);