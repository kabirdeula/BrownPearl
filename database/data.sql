USE brownpearl;

CREATE TABLE Student(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    MiddleName VARCHAR(50),
    LastName VARCHAR(50) NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    Email VARCHAR(50) UNIQUE
);

CREATE TABLE Country{
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL
}