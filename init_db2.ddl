CREATE DATABASE otms;

USE otms;


CREATE TABLE complex(
	id INT AUTO_INCREMENT,
	city VARCHAR(20) NOT NULL,
	name VARCHAR(20) NOT NULL,
	address VARCHAR(50) NOT NULL,
	phone_num VARCHAR(20) NOT NULL,

	PRIMARY KEY(id)
);

CREATE TABLE theatre(
	id INT AUTO_INCREMENT,
	complex INT,
	theatre_num INT NOT NULL,
	screen_size CHAR NOT NULL,
	num_seats INT NOT NULL,

	PRIMARY KEY(id),
	FOREIGN KEY(complex) REFERENCES complex(id)
);

CREATE TABLE supplier(
	id INT AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	address VARCHAR(40),
	phone_num VARCHAR(20) NOT NULL,
	contact_name VARCHAR(20),

	PRIMARY KEY(id)
);

CREATE TABLE movie(
	id INT AUTO_INCREMENT,
	supplier INT,
	title VARCHAR(50) NOT NULL,
	rating VARCHAR(2) NOT NULL,
	running_time TIME(2) NOT NULL,
	director VARCHAR(20) NOT NULL,
	prod_cpny VARCHAR(20) NOT NULL,

	PRIMARY KEY(id),
	FOREIGN KEY(supplier) REFERENCES supplier(id)
);


CREATE TABLE actor(
	id INT AUTO_INCREMENT,
	name VARCHAR(30) NOT NULL,
	sex CHAR,
	age INT,

	PRIMARY KEY(id)
);

CREATE TABLE user(
	account_no INT AUTO_INCREMENT,
	password VARCHAR(20) NOT NULL,
	fname VARCHAR(20) NOT NULL,
	lname VARCHAR(20) NOT NULL,
	is_admin BOOLEAN NOT NULL DEFAULT 0,
	email VARCHAR(20) NOT NULL,
	cc_number VARCHAR(19),
	cc_expiry VARCHAR(4),

	PRIMARY KEY(account_no)
);

CREATE TABLE now_playing(
	complex INT,
	movie INT,
	start_date DATE NOT NULL,
	end_date DATE NOT NULL,

	PRIMARY KEY(complex, movie),
	FOREIGN KEY(complex) REFERENCES complex(id),
	FOREIGN KEY(movie) REFERENCES movie(id)
);

CREATE TABLE showing(
	id INT AUTO_INCREMENT,
	theatre INT,
	movie INT,
	start_time DATETIME NOT NULL,
	seats_left INT NOT NULL,

	PRIMARY KEY(id),
	FOREIGN KEY(theatre) REFERENCES theatre(id),
	FOREIGN KEY(movie) REFERENCES movie(id)
);

CREATE TABLE stars_in(
	actor INT,
	movie INT,

	PRIMARY KEY(actor, movie),
	FOREIGN KEY(actor) REFERENCES actor(id),
	FOREIGN KEY(movie) REFERENCES movie(id)
);

CREATE TABLE reviews(
	user INT,
	movie INT,
	rating INT NOT NULL,
	content TEXT,
	time_reviewed DATETIME NOT NULL,

	PRIMARY KEY(user, movie),
	FOREIGN KEY(user) REFERENCES user(account_no),
	FOREIGN KEY(movie) REFERENCES movie(id)
);

CREATE TABLE reserves(
	user INT,
	showing INT,
	num_seats INT NOT NULL,

	PRIMARY KEY(user, showing),
	FOREIGN KEY(user) REFERENCES user(account_no),
	FOREIGN KEY(showing) REFERENCES showing(id)
);
