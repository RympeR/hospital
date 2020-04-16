create database test;
DROP TABLE IF EXISTS student;
CREATE TABLE student(
    full_name char(50) primary key not null,
    date_of_birth date not null,
    home_address char(50) not null,
    address_of_residence char(50) not null,
    year_of_receipt date not null,
    type_of_training ENUM('first_type', 'second_type', 'third_type') not null,
    the_department varchar(100) not null,
    specialty char(50) not null,
    group_ char(50) default 'first' not null ,
    numer_gradebook int not null,
    deduction enum('type 1', 'type 2', 'type 3') not null
    );
    
DROP TABLE IF EXISTS faculty;
CREATE TABLE faculty (
    id int AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL
);


ALTER TABLE student ADD test_column char(50) not null;
ALTER TABLE student drop column test_column;

INSERT INTO student(full_name, date_of_birth, home_address, address_of_residence, year_of_receipt, 
    type_of_training, the_department, specialty, group_, numer_gradebook, deduction) VALUES
    ('test1', '2010-12-13', 'home1', 'address1', '2020-09-12', 'first_type', 'department1', 'sepcialty1', 'group1', 1, 'type 1'),
    ('test11', '2011-12-13', 'home12', 'address11', '2020-10-13', 'second_type', 'department12', 'sepcialty11', 'group19', 12, 'type 2'),
    ('test12', '2012-12-13', 'home11', 'address12', '2020-09-14', 'second_type', 'department13', 'sepcialty12', 'group18', 13, 'type 1'),
    ('test13', '2013-12-13', 'home13', 'address13', '2020-08-15', 'third_type', 'department14', 'sepcialty13', 'group17', 14, 'type 3'),
    ('test14', '2014-12-13', 'home14', 'address14', '2020-07-16', 'first_type', 'department15', 'sepcialty14', 'group16', 15, 'type 1'),
    ('test15', '2015-12-13', 'home15', 'address15', '2020-06-17', 'third_type', 'department16', 'sepcialty15', 'group15', 16, 'type 2'),
    ('test16', '2016-12-13', 'home16', 'address16', '2020-05-18', 'third_type', 'department17', 'sepcialty16', 'group14', 17, 'type 2'),
    ('test17', '2017-12-13', 'home17', 'address17', '2020-04-19', 'first_type', 'department18', 'sepcialty17', 'group13', 18, 'type 2'),
    ('test18', '2018-12-13', 'home18', 'address18', '2020-03-10', 'second_type', 'department19', 'sepcialty18', 'group11', 19, 'type 1'),
    ('test19', '2019-12-13', 'home19', 'address19', '2020-02-19', 'first_type', 'department10', 'sepcialty19', 'group12', 10, 'type 3');

INSERT INTO student(full_name, date_of_birth, home_address, address_of_residence, year_of_receipt, 
    type_of_training, the_department, specialty, group_, numer_gradebook, deduction) VALUES
    ('test20', '2010-12-14', 'home21', 'address21', '2020-09-13', 'first_type', 'department21', 'sepcialty21', 'group21', 21, 'type 1');

delete from student where full_name = 'test20';

update student set numer_gradebook = numer_gradebook + 5 where full_name = 'test1';
--Drop table student;
--drop database test;