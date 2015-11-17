DROP TABLE IF EXISTS messages;
create table messages (
	id bigint(20) NOT NULL,
	id2 int(11) NOT NULL,
	title varchar(256) NOT NULL,
	user1 bigint(20) NOT NULL,
	user2 bigint(20) NOT NULL,
	message text NOT null,
	timestamp int(10) not null,
	user1read varchar(3) not null,
	user2read varchar(3) not null,
	service_id int not null,
	primary key(id)
);