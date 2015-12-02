DROP TABLE IF EXISTS messages;
create table messages (
	id bigint(20) NOT NULL,
	title varchar(255) NULL,
	message text null,
	time_sent timestamp DEFAULT CURRENT_TIMESTAMP,
	read varchar(3) default 'No',
	from int(11) not null,
	to int(11) not null,
	service_id int not null,
	primary key(id)
);