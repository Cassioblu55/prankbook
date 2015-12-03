DROP TABLE IF EXISTS messages;
create table messages (
<<<<<<< BEGIN MERGE CONFLICT: local copy shown first <<<<<<<<<<<<<<<
	id bigint(20) NOT NULL not null AUTO_INCREMENT,
	title varchar(255) NULL,
	message text null,
	time_sent timestamp null,
	is_read varchar(3) DEFAULT 'No',
	read_at timestamp NULL,
	is_from int(11) not null,
	is_to int(11) not null,
======= COMMON ANCESTOR content follows ============================
	id bigint(20) NOT NULL,
	id2 int(11) NOT NULL,
	title varchar(256) NOT NULL,
	user1 bigint(20) NOT NULL,
	user2 bigint(20) NOT NULL,
	message text NOT null,
	timestamp int(10) not null,
	user1read varchar(3) not null,
	user2read varchar(3) not null,
======= MERGED IN content follows ==================================
	id bigint(20) not null AUTO_INCREMENT,
	sent_from int(11) NOT NULL,
	sent_to int(11) NOT NULL,
	message text null,
	time_sent datetime null,
	is_read varchar(3) default 'No',
>>>>>>> END MERGE CONFLICT >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	service_id int not null,
	primary key(id)
);
