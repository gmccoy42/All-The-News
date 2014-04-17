DROP DATABASE IF EXISTS ATN_db;
CREATE DATABASE ATN_db;

USE ATN_db;

DROP TABLE IF EXISTS user;
CREATE TABLE user
(
	u_id INT auto_increment,
	uname VARCHAR(50),
	pass VARCHAR(100),
	PRIMARY KEY(u_id)
);

DROP TABLE IF EXISTS site;
CREATE TABLE site
(
	u_id INT,
	url VARCHAR(100),
	count INT,
	FOREIGN KEY (u_id) references user(u_id)
);

DROP TABLE IF EXISTS s_keys;
CREATE TABLE s_key
(
	u_id INT,
	s_key VARCHAR(100),
	FOREIGN KEY (u_id) references user(u_id)
);

DROP TABLE IF EXISTS stories;
CREATE TABLE stories
(
	u_id INT,
	title TEXT,
	des TEXT,
	link TEXT,
	s_date DATE,
	FOREIGN KEY (u_id) references user(u_id)	
);
