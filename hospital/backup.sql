drop TABLE if EXISTS hospital_info;
create table hospital_info(
	fid int AUTO_INCREMENT PRIMARY KEY,
	hospital_name varchar(50),
	address_ varchar(50),
	city varchar(50),
	state_ varchar(50),
	zip_code varchar(50),
	county_name varchar(50),
	phone_number varchar(50),
	hospital_type varchar(50),
	hosp_ownership varchar(50),
	emerg_services varchar(50),
	EHRs_criteria varchar(50),
	rating varchar(50),
	rating_footnote varchar(50),
	mortality_comparsion varchar(50),
	mortality_footnote varchar(50),
	readmission_comparsion varchar(50),
	readmission_footnote varchar(50),
	patient_comparsion varchar(50),
	patient_footnote varchar(50),
	effectiveness_comparsion varchar(50),
	effectiveness_footnote varchar(50),
	timeliness_comparsion varchar(50),
	timeliness_footnote varchar(50),
	efficient_comparsion varchar(50),
	efficient_footnote varchar(50),
	location varchar(50),
	coords varchar(50)
);
drop table if exists comments;
create table comments(
	id int AUTO_INCREMENT PRIMARY KEY,
	hospital varchar(50),
	name varchar(50) not null,
	email varchar(50) not null,
	ip varchar(50) not null,
	user_agent varchar(50) not null,
    comment varchar(100) not null
);
create table state_description(
	state varchar(2) PRIMARY KEY,
        description varchar(150) default ''
);
create table county_description(
	county varchar(50) PRIMARY KEY,
        description varchar(150) default ''
);
create table city_description(
	city varchar(50) PRIMARY KEY,
        description varchar(150) default ''
);

INSERT INTO state_description (state)
    SELECT DISTINCT hospital_info.state_
    FROM hospital_info;
INSERT INTO county_description (county)
    SELECT DISTINCT hospital_info.county_name
    FROM hospital_info;
INSERT INTO city_description (city)
    SELECT DISTINCT hospital_info.city
    FROM hospital_info;

--pharm
create table state_description_pharmacy(
	state varchar(2) PRIMARY KEY,
        description varchar(150) default ''
);
create table county_description_pharmacy(
	county varchar(50) PRIMARY KEY,
        description varchar(150) default ''
);
create table city_description_pharmacy(
	city varchar(50) PRIMARY KEY,
        description varchar(150) default ''
);
INSERT INTO state_description_pharmacy (state)
    SELECT DISTINCT pharmacy.STATE
    FROM pharmacy;
INSERT INTO county_description_pharmacy (county)
    SELECT DISTINCT pharmacy.COUNTY
    FROM pharmacy;
INSERT INTO city_description_pharmacy (city)
    SELECT DISTINCT pharmacy.CITY
    FROM pharmacy;

create table comments_pharmacy(
	id int AUTO_INCREMENT PRIMARY KEY,
	pharmacy varchar(50),
	name varchar(50) not null,
	email varchar(50) not null,
	ip varchar(50) not null,
	user_agent varchar(50) not null,
    comment varchar(100) not null
);
DROP TABLE IF EXISTS pills;
create table pills(
	id int AUTO_INCREMENT primary KEY,
	pill_name varchar(50) not null,
	city VARCHAR(50) not null,
	description VARCHAR(200),
	amount int default 0,
	price int default 0
);
create table comments_pill( 
	id int AUTO_INCREMENT PRIMARY KEY, 
	pill varchar(50), 
	name varchar(50) not null, 
	email varchar(50) not null, 
	ip varchar(50) not null, 
	user_agent varchar(50) not null, 
	comment varchar(100) not null );
INSERT INTO pills (pill_name, city) VALUES('test','ANCHORAGE');

alter TABLE comments_pill add COLUMN date_c date ;
alter TABLE comments_pharmacy add COLUMN date_c date ;
alter TABLE comments add COLUMN date_c date ;
