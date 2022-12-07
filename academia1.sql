-- NÃO esquecer de retirar esse comando,
-- Quando o aplicativo estiver completo:
DROP DATABASE IF EXISTS academia1;

CREATE DATABASE academia1 CHARACTER SET utf8 COLLATE utf8_general_ci;

USE academia1;

CREATE TABLE addres (
	zipcode VARCHAR (255) NOT NULL PRIMARY KEY,
	street VARCHAR (255) NOT NULL,
	district VARCHAR (255) NOT NULL,
	city VARCHAR (255) NOT NULL,
	state VARCHAR (255) NOT NULL
);

CREATE TABLE student (
    sid INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    cellphone VARCHAR (255) NOT NULL,
    document VARCHAR (255) NOT NULL,
    birth VARCHAR (255) NOT NULL,
    zipcode VARCHAR (255) NOT NULL,
    housenumber SMALLINT NOT NULL,
    complement VARCHAR (255) NOT NULL,
    sdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    photo VARCHAR (255),

    FOREIGN KEY (zipcode) REFERENCES addres (zipcode)
);

CREATE TABLE employee (
    eid INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    cellphone VARCHAR (255) NOT NULL,
    document VARCHAR (255) NOT NULL,
    birth VARCHAR (255) NOT NULL,
    zipcode VARCHAR (255) NOT NULL,
    housenumber SMALLINT NOT NULL,
    complement VARCHAR (255) NOT NULL,
    edate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    photo VARCHAR (255),

    FOREIGN KEY (zipcode) REFERENCES addres (zipcode)
);

CREATE TABLE teacher (
    tid INT PRIMARY KEY AUTO_INCREMENT,
    availability VARCHAR (255) NOT NULL,
    eid INT,

    FOREIGN KEY (eid) REFERENCES employee (eid)
);