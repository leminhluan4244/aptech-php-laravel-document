CREATE DATABASE test01;
USE test01;

CREATE TABLE customer (
    name varchar(50) NOT NULL,
    gender varchar(1) NOT NULL,
    bill int(10) NOT NULL,
    year int(10) NOT NULL,
    PRIMARY KEY (name)
)

INSERT INTO customer (name, gender, bill, `year`) VALUES ('Paul', 'm', 10000, 1998);
INSERT INTO customer (name, gender, bill, `year`) VALUES ('Tyron', 'm', 5000, 1992);
INSERT INTO customer (name, gender, bill, `year`) VALUES ('Hans', 'm', 25000, 1994);
INSERT INTO customer (name, gender, bill, `year`) VALUES ('Erin', 'f', 12000, 1997);
INSERT INTO customer (name, gender, bill, `year`) VALUES ('Vinn', 'f', 2000, 2000);