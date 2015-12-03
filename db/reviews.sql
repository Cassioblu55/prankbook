DROP TABLE IF EXISTS reviews;
create table reviews (
	id int not null AUTO_INCREMENT,
	rating int(5) null,
	comments varchar(255) null,
	service_id INT NOT NULL,
	user_id INT NOT NULL,
	primary key(id)
);