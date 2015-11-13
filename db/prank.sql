DROP TABLE IF EXISTS prank;
create table prank (
	id int not null AUTO_INCREMENT,
	approval_status varchar(45) DEFAULT 'Pending',
	price int(5) not null,
	prank_name varchar(100) not null,
	description varchar(255) null,
	operating_range char(64) null,
	zipcode int(5) null,
	user_id INT NOT NULL,
	admin_id INT NULL,
	primary key(id)
);