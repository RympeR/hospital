create table hospital_info(
	hospital_name varchar(50) PRIMARY KEY,
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

