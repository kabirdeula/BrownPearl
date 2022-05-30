
CREATE TABLE student(
    RegNo INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(25) NOT NULL,
    MiddleName VARCHAR(25),
    LastName VARCHAR(25) NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    PermanentAddress VARCHAR(100) NOT NULL,
    TemporaryAddress VARCHAR(100) NOT NULL,
    Mobile VARCHAR(10) UNIQUE NOT NULL,
    Email VARCHAR(25) UNIQUE NOT NULL,
    DOB DATE NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ProfilePhoto VARCHAR(50),
    FatherName VARCHAR(75) NOT NULL,
    FatherOccupation VARCHAR(50) NOT NULL,
    FatherMobile VARCHAR(10) UNIQUE NOT NULL,
    MotherName VARCHAR(75) NOT NULL,
    MotherOccupation VARCHAR(50) NOT NULL,
    MotherMobile VARCHAR(10) UNIQUE NOT NULL,
    GuardianName VARCHAR(75),
    GuardianOccupation VARCHAR(50),
    GuardianMobile VARCHAR(10) UNIQUE,
    SpouseName VARCHAR(75),
    SpouseOccupation VARCHAR(50),
    SpouseMobile VARCHAR(10) UNIQUE
);

CREATE TABLE users(
    UserID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(16) NOT NULL,
    UserType VARCHAR(10) NOT NULL,
    CreatedAt DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO student(FirstName, MiddleName, LastName, Gender, PermanentAddress, TemporaryAddress, Mobile, Email, DOB) VALUES
('Frank', 'Lloyd', 'Wright', 'Male', 'Richland Center, Wisconsin, U.S.', 'Phoenix, Arizona, U.S.', '9887186791', 'frankwright67@gmail.com', '1867-06-08'),
('Mary','' ,'Borthwick', 'Female', 'Boone, Iowa, U.S.', 'Spring Green, Wisconsin, U.S.', '9881906186', 'maryborthwick69@gmail.com', '1869-06-19');

INSERT INTO father VALUES
(1, 'William', 'Cary', 'Wright', 'Musician', 'Massachusetts', '9881825190'),
(2, 'Marcus', 'Smith', 'Borthwick', 'Engineer', 'Boone', '9880912518');

INSERT INTO mother VALUES
(1, 'Anna', 'Llyod', 'Jones', 'Teacher', 'Wisconsin', '9818391923'),
(2, 'Almira', 'A.', 'Borthwick', 'Engineer', 'Boone', '9818391898');

INSERT INTO users(Username, Password, UserType) VALUES
('admin', 'admin', 'admin');