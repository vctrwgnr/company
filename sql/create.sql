DROP DATABASE IF EXISTS firmaNeu;
CREATE DATABASE firmaNeu;
USE firmaNeu;

# DDL
CREATE TABLE employee
(
    id        int(11)       NOT NULL,
    firstName varchar(45)   NOT NULL,
    lastName  varchar(45)   NOT NULL,
    gender    varchar(10)   NOT NULL,
    salary    decimal(6, 2) NOT NULL
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4;
CREATE TABLE car
(
    id          int(11)     NOT NULL,
    numberPlate varchar(45) NOT NULL,
    maker       varchar(45) NOT NULL,
    type        varchar(45) NOT NULL
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4;
CREATE TABLE rental
(
    id         int      NOT NULL,
    employeeId INT      NOT NULL,
    carId      INT      NOT NULL,
    startDate  DATETIME NOT NULL,
    endDate    DATETIME NULL
);

#DML
INSERT INTO employee
VALUES (1, 'Peter', 'Pan', 'männlich', 2001.22);
INSERT INTO employee
VALUES (2, 'Claudia', 'Clein', 'weiblich', 3009.22);
INSERT INTO car
VALUES (1, 'B-BQ 1', 'BMW', '333i');
INSERT INTO car
VALUES (2, 'B-BQ 12', 'VW', 'Golf');
INSERT INTO rental
VALUES (1, 1, 1, '2024-10-21 09:00:03', '2024-10-21 12:03:12');
INSERT INTO rental
VALUES (2, 1, 2, '2024-10-03 19:00:03', '2024-10-05 06:00:03');

# CONSTRAINTS
ALTER TABLE employee
    ADD PRIMARY KEY (id);
ALTER TABLE employee MODIFY COLUMN id INT AUTO_INCREMENT;

ALTER TABLE car
    ADD PRIMARY KEY (id);
ALTER TABLE car MODIFY COLUMN id INT AUTO_INCREMENT;

ALTER TABLE rental
    ADD PRIMARY KEY (id);
ALTER TABLE rental MODIFY COLUMN id INT AUTO_INCREMENT;
ALTER TABLE rental
    ADD FOREIGN KEY (employeeId) REFERENCES employee (id);
ALTER TABLE rental
    ADD FOREIGN KEY (carId) REFERENCES car (id);
