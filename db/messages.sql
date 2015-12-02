DROP TABLE IF EXISTS messages;
create table messages (
	id bigint(20) NOT NULL not null AUTO_INCREMENT,
	title varchar(255) NULL,
	message text null,
	time_sent timestamp null,
	is_read varchar(3) DEFAULT 'No',
	read_at timestamp NULL,
	is_from int(11) not null,
	is_to int(11) not null,
	service_id int not null,
	primary key(id)
);
