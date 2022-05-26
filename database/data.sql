
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
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO student(FirstName, MiddleName, LastName, Gender, PermanentAddress, TemporaryAddress, Mobile, Email, DOB) VALUES
('Frank', 'Lloyd', 'Wright', 'Male', 'Richland Center, Wisconsin, U.S.', 'Phoenix, Arizona, U.S.', '9887186791', 'frankwright67@gmail.com', '1867-06-08'),
('Mary','' ,'Borthwick', 'Female', 'Boone, Iowa, U.S.', 'Spring Green, Wisconsin, U.S.', '9881906186', 'maryborthwick69@gmail.com', '1869-06-19');