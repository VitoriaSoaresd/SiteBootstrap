-- NÃO esquecer de retirar esse comando,
-- Quando o aplicativo estiver completo:
DROP DATABASE IF EXISTS academia1;

CREATE DATABASE academia1 CHARACTER SET utf8 COLLATE utf8_general_ci;

USE academia1;

--CREATE TABLE addres (
	-- zipcode VARCHAR (255) NOT NULL PRIMARY KEY,
	-- street VARCHAR (255) NOT NULL,
	-- district VARCHAR (255) NOT NULL,
	-- city VARCHAR (255) NOT NULL,
	-- state VARCHAR (255) NOT NULL
-- );-- 

-- INSERT INTO addres (
    -- zipcode,
    -- street,
    -- district,
    -- city,
    -- state
-- ) VALUES (
    -- '01020-345',
    -- 'Rua Gangorra',
    -- 'Verdinho',
    -- 'Rio de Janeiro',
    -- 'RJ'
-- ), (
    -- '12345-678',
    -- 'Rua Girassol',
    -- 'Fazenda',
    -- 'Rio de Janeiro',
    -- 'RJ'
-- );

CREATE TABLE student (
    sid INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    password VARCHAR (255) NOT NULL,
    cellphone VARCHAR (255) NOT NULL,
    cpf VARCHAR (255) NOT NULL,
    rg VARCHAR (255) NOT NULL,
    birth VARCHAR (255) NOT NULL,
    sex VARCHAR (255)NOT NULL,
    zipcode VARCHAR (255) NOT NULL,
    housenumber SMALLINT NOT NULL,
    complement VARCHAR (255) NOT NULL,
    sdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    photo VARCHAR (255),

    -- FOREIGN KEY (zipcode) REFERENCES addres (zipcode)
);

INSERT INTO student (
    sid, 
    name, 
    email,
    password, 
    cellphone, 
    cpf,
    rg, 
    birth,
    sex, 
    zipcode, 
    housenumber,
    complement,
    photo
) VALUES (
    '1',
    'Nina Norevalga',
    'nina@nininha.com',
    '123',
    '(21) 123456789',
    '2299',
    '88945612',
    '1997-07-14',
    'F',
    '01020-345',
    '03',
    'apto 144',
    'https://randomuser.me/api/portraits/women/17.jpg'
), (
    '2',
    'Lula Molusco',
    'fenda@dobiquine.com',
    '456',
    '(21) 987654321',
    '7259',
    '62134985',
    '2001-01-29',
    'M',
    '12345-678',
    '1476',
    'fundos',
    'https://randomuser.me/api/portraits/men/3.jpg'
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

INSERT INTO employee (
    eid,
    name,
    email,
    cellphone,
    document,
    birth,
    zipcode,
    housenumber,
    complement,
    photo
) VALUES (
    '1',
    'Adolfo Lindofo',
    'adolfo@lindofo.com',
    '(21) 999987777',
    '4789',
    '1992-09-17',
    '01020-345',
    '1560',
    'Travessa Lírios',
    'https://randomuser.me/api/portraits/men/19.jpg'
), (
    '2',
    'Wandinha Addams',
    'wand@addams.com',
    '(21) 987654321',
    '1567',
    '2002-10-31',
    '12345-678',
    '6667',
    'fundos',
    'https://randomuser.me/api/portraits/women/18.jpg'
), (
    '3',
    'Diana Ianna',
    'diana@realeza.com',
    '(21) 223345566',
    '2100',
    '1989-04-22',
    '12345-678',
    '120',
    'Sobrado',
    'https://randomuser.me/api/portraits/women/8.jpg'
);

CREATE TABLE teacher (
    tid INT PRIMARY KEY AUTO_INCREMENT,
    availability VARCHAR (255) NOT NULL,
    eid INT,

    FOREIGN KEY (eid) REFERENCES employee (eid)
);

INSERT INTO teacher (
    tid,
    availability,
    eid
) VALUES (
    '1',
    'segunda e sexta o dia todo',
    '3'
), (
    '2',
    'terca, quarta e quinta somente a tarde',
    '1'
);

CREATE TABLE activity (
    aid INT PRIMARY KEY AUTO_INCREMENT,
    nameactivity VARCHAR (255) NOT NULL,
    description VARCHAR (255) NOT NULL
);

INSERT INTO activity (
    aid,
    nameactivity,
    description
) VALUES (
    '1',
    'Jumpp',
    'atividade realizada pulando em um trampolim'
), (
    '2',
    'Spinning',
    'atividade realizada em uma bicicleta com subidas'
);

CREATE TABLE enableteacher (
    etid INT PRIMARY KEY AUTO_INCREMENT,
    aid INTEGER NOT NULL,
    tid INTEGER NOT NULL,

    FOREIGN KEY (aid) REFERENCES activity (aid),
    FOREIGN KEY (tid) REFERENCES teacher (tid)
);

CREATE TABLE class (
    cid INT PRIMARY KEY AUTO_INCREMENT,
    dateclass DATE NOT NULL,
    hour VARCHAR (255) NOT NULL,
    tid INTEGER NOT NULL,
    aid INTEGER NOT NULL,

    FOREIGN KEY (tid) REFERENCES teacher (tid),
    FOREIGN KEY (aid) REFERENCES activity (aid)
);

CREATE TABLE studentclass (
    tlclass INTEGER PRIMARY KEY AUTO_INCREMENT,
    sid INT NOT NULL,
    aid INT NOT NULL,

    FOREIGN KEY (sid) REFERENCES student (sid),
    FOREIGN KEY (aid) REFERENCES activity (aid)
);

CREATE TABLE product (
    productcode INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (255) NOT NULL,
    color VARCHAR (255) NOT NULL,
    cost DOUBLE NOT NULL,
    size CHAR(2) NOT NULL,
    amount INTEGER NOT NULL
);

CREATE TABLE sale (
    sid INT PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    cost DOUBLE NOT NULL,
    amount INTEGER NOT NULL,
    productcode INTEGER NOT NULL,
    eid INTEGER NOT NULL,

    FOREIGN KEY (productcode) REFERENCES product (productcode),
    FOREIGN KEY (eid) REFERENCES employee (eid)
);

