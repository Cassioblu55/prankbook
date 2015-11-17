create table cc_info (
	id int not null AUTO_INCREMENT,
	cc_number char(16)  null,
	cc_last INT(4)  null,
	security INT(3)  null,
	billing_address varchar(255) not null,
	expiration_date char(4) null,
	user_id INT(11) NOT NULL,
	primary key(id)
);