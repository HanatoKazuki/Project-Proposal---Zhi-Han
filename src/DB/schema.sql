CREATE DATABASE if NOT EXISTS financial_db;
use financial_db;

CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(225) NOT NULL,
    email varchar(225) NOT NULL UNIQUE,
    password varchar(225) NOT NULL,
    role varchar(50) NOT NULL default 'user',
    language enum('BM', 'ENG', "CN") default 'ENG'
);

CREATE TABLE goals(
    goalID int AUTO_INCREMENT PRIMARY KEY,
    userID int NOT NULL,
    goalAmount int NOT NULL,
    currentGoalAmount int NOT NULL
);

CREATE TABLE balance(
    balanceID int AUTO_INCREMENT PRIMARY KEY,
    balanceAmount int NOT NULL,
    userID int NOT NULL,
    currencySymbol enum('MYR', 'RMB', '$', '¥') default 'MYR'
);

create TABLE income(
    id int AUTO_INCREMENT PRIMARY KEY,
    userID int NOT NULL,
    totalIncome int default 0,
    income int NOT NULL
);

create TABLE expense(
    id int AUTO_INCREMENT PRIMARY KEY,
    userID int not null,
    totalExpense int default 0,
    expense int NOT NULL
);

create TABLE transactions(
    id int AUTO_INCREMENT PRIMARY KEY,
    userID int not null
);

-- use financial_db;

INSERT INTO users(name,email,password,role)values('Kazuki','kz@gmail.com','$2y$10$nEQu4NLHAfSDjfO8dciaIeJEsDZzasQuKbFXvWyxE.d0Yv/NOwOta','admin'); -- pass = 123
INSERT INTO users(name,email,password,role)values('Tatrix','example@gmail.com','$2y$10$U4HnHOhsl2UzeY1ooqElReqD8F2mhb0K7Q5O2iNillbvP.Y0..rR6','editor'); -- pass = 5555
INSERT INTO users(name,email,password,role)values('John','john@gmail.com','$2y$10$zSkb6PEPomaI4qddtXq5s.AkRk7ULeEt6jq2aW6dChVUmNPQq7EzK','user'); -- pass = 9984

use financial_db;
drop DATABASE financial_db;
drop TABLE users;