
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

INSERT INTO brownpearl.student(FirstName, MiddleName, LastName, Gender, PermanentAddress, TemporaryAddress, Mobile, Email, DOB, FatherName, FatherOccupation, FatherMobile, MotherName, MotherOccupation, MotherMobile, GuardianName, GuardianOccupation, GuardianMobile, SpouseName, SpouseOccupation, SpouseMobile) VALUES 
('Naruto', '', 'Uzumaki', 'male', 'Chetrapati', 'Chetrapati', '9885140147', 'narutouzumaki@gmail.com', '1995-08-12', 'Minato Namikaze', 'Hokage', '9884159805', 'Kushina Uzumaki', 'Housewife', '9894838559', '', '', '', '', '', '');

INSERT INTO users(Username, Password, UserType) VALUES
('admin', 'admin', 'admin');