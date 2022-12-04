-- inspired by https://github.com/tutorials24x7/quiz-database-mysql/blob/master/quiz.sql


CREATE DATABASE IF NOT EXISTS quizbud;
ALTER DATABASE quizbud default character set utf8mb4 COLLATE utf8mb4_unicode_ci;
use quizbud;

DROP TABLES IF EXISTS users, quizes, questions, classes, schools, attempts, answers, attempts_answers, courses ;

create user 'demo'@'localhost' identified by 'password';
GRANT ALL PRIVILEGES on quizbud.* to 'demo'@'localhost';


CREATE TABLE schools (
id bigint not null auto_increment,
schoolname varchar(200) not null,
domainname varchar(100) not null,
PRIMARY KEY (id)
);

CREATE TABLE users (
id BIGINT NOT NULL AUTO_INCREMENT,
firstname VARCHAR(50),
lastname VARCHAR(50),
email VARCHAR(319),
password VARCHAR(32) not null,
registrationDate DATETIME DEFAULT current_timestamp,
lastOnline DATETIME null default null,
profileSummary tinytext null default null,
profileLongtext text null default null,
school BIGINT not null,
PRIMARY KEY (id),
UNIQUE INDEX unique_email (email ASC),
CONSTRAINT fk_users_school
FOREIGN KEY(school)
REFERENCES schools(id)
ON delete no action
on update no action
);

CREATE TABLE classes (
id bigint not null auto_increment,
schoolid bigint not null,
classcode varchar(30) not null,
classname varchar(100) not null,
creation datetime DEFAULT current_timestamp,
createdby bigint not null,
PRIMARY KEY (id),
CONSTRAINT fk_classes_schoolid
	foreign key (schoolid)
    REFERENCES quizbud.schools (id),
CONSTRAINT fk_classes_createdby
	foreign key (createdby)
    references Users(id)
    on delete no action
    on update no action);


CREATE TABLE quizes (
id bigint not null auto_increment,
userID bigint not null,
created DATETIME DEFAULT current_timestamp,
content text null default null,
active tinyint not null default 0,
primary key (id),
constraint fk_quiz_user
	foreign key (userID)
    references users(id)
    on delete no action
    on update no action);
    
CREATE TABLE questions (
id bigint not null auto_increment,
classid bigint not null,
type varchar(25) not null,
active tinyint not null default 0,
userid bigint not null, -- person who created the question
creation datetime DEFAULT current_timestamp,
updated datetime not null,
store text null default null,
primary key (id),
constraint fk_question_class
	foreign key (classid)
    references quizbud.classes (id),
constraint fk_question_userid
	foreign key (userid)
    references quizbud.users (id)
    on delete no action
    on update no action);
    
CREATE TABLE answers (
id bigint not null auto_increment,
questionid bigint not null,
active tinyint not null default 0,
correct tinyint not null default 0,
creation datetime DEFAULT current_timestamp,
updated datetime not null,
store text null default null,
primary key (id),
constraint fk_answer_question
	foreign key (questionid)
    references quizbud.questions (id)
    on delete no action
    on update no action);

CREATE TABLE attempts (
id bigint not null auto_increment,
userid bigint not null,
quizid bigint not null,
currentStatus smallint not null default 0,
mark smallint not null default 0,
creation datetime DEFAULT current_timestamp,
started datetime not null,
finished datetime not null,
primary key (id),
constraint fk_attempts_user
	foreign key (userid)
    references users(id),
constraint fk_attempts_quiz
	foreign key (quizid)
    references quizes (id)
    on delete no action
    on update no action);

CREATE TABLE attempts_answers (
id bigint not null auto_increment,
attemptid bigint not null,
questionid bigint not null,
answerid bigint not null,
active tinyint not null default 0,
creation datetime DEFAULT current_timestamp,
store text null default null,
primary key (id),
constraint fk_attempts_answers_attempt
	foreign key (attemptid)
    references quizbud.attempts (id),
constraint fk_attempts_answers_question
	foreign key (questionid)
    references quizbud.questions (id),
constraint fk_attempts_answers_answer
	foreign key (answerid)
    references quizbud.answers (id)
    on delete no action
    on update no action);
    
CREATE TABLE courses (
userid BIGINT,
classid BIGINT,
PRIMARY KEY (userid, classid),
constraint fk_courses_userid
	foreign key (userid)
    references quizbud.users (id),
constraint fk_courses_classid
	foreign key (classid)
    references quizbud.classes (id)
    on delete no action
    on update no action);

   INSERT INTO schools VALUES
( 1, "Algonquin College", "algonquinlive.com"),
( 2, "University of Ottawa", "uottawa.ca"),
( 3, "Carleton University", "carleton.ca"),
( 4, "Herzing College", "herzing.ca"),
( 5, "College La Cite", "collegelacite.ca"),
( 6, "Dominican University College", "dominicanu.ca"),
( 7, "Saint-Paul University", "ustpaul.ca");

INSERT INTO users VALUES
(1, "Renato", "Simoes", "simo0138@algonquinlive.com", "Password", sysdate(), sysdate(), null, null, 1),
(2, "Kyle", "Ryc", "ryc00001@algonquinlive.com", "Password", sysdate(), sysdate(), null, null, 1),
(3, "Jordan", "Chen", "chen0874@algonquinlive.com", "Password", sysdate(), sysdate(), null, null, 1),
(4, "Ren", "Amamiya", "amam0001@uottawa.ca", "Password", sysdate(), sysdate(), null, null, 2),
(5, "Ryuji", "Sakamoto", "saka0002@uottawa.ca", "Password", sysdate(), sysdate(), null, null, 2),
(6, "Ann", "Takamaki", "taka0003@uottawa.ca", "Password", sysdate(), sysdate(), null, null, 2),
(7, "Yusuke", "Kitagawa", "kita0004@carleton.ca", "Password", sysdate(), sysdate(), null, null, 3),
(8, "Futaba", "Sakura", "saku0005@carleton.ca", "Password", sysdate(), sysdate(), null, null, 3),
(9, "Haru", "Okamura", "okam0006@carleton.ca", "Password", sysdate(), sysdate(), null, null, 3),
(10, "Makoto", "Niijima", "niij0007@herzing.ca", "Password", sysdate(), sysdate(), null, null, 4),
(11, "Goro", "Akechi", "akec0008@herzing.ca", "Password", sysdate(), sysdate(), null, null, 4),
(12, "Kasumi", "Yoshizawa", "yoshi0009@herzing.ca", "Password", sysdate(), sysdate(), null, null, 4),
(13, "Chris", "Redfield", "redf0010@collegelacite.ca", "Password", sysdate(), sysdate(), null, null, 5),
(14, "Leon", "Kennedy", "kenn0011@collegelacite.ca", "Password", sysdate(), sysdate(), null, null, 5),
(15, "Albert", "Whesker", "whesk0012@collegelacite.ca", "Password", sysdate(), sysdate(), null, null, 5),
(16, "Jill", "Valentine", "vale0013@dominicanu.ca", "Password", sysdate(), sysdate(), null, null, 6),
(17, "Claire", "Redfield", "redf0014@dominicanu.ca", "Password", sysdate(), sysdate(), null, null, 6),
(18, "Ethan", "Winters", "wint0015@dominicanu.ca", "Password", sysdate(), sysdate(), null, null, 6),
(19, "Jake", "Muller", "mull0016@ustpaul.ca", "Password", sysdate(), sysdate(), null, null, 7),
(20, "Ada", "Wong", "wong0017@ustpaul.ca", "Password", sysdate(), sysdate(), null, null, 7),
(21, "Rebecca", "Chambers", "chamb0018@ustpaul.ca", "Password", sysdate(), sysdate(), null, null, 7);

INSERT INTO classes values
(1, 1, "CST8285", "Web Programming", sysdate(), 1),
(2, 1, "CST8284", "Object Oriented Programming", sysdate(), 1),
(3, 1, "CST8102", "Operating Systems Fund", sysdate(), 1),
(4, 2, "CST23855", "Database Systems", sysdate(), 1),
(5, 2, "MAT8001C", "Technical Mathematics", sysdate(), 2),
(6, 3, "ENL1813T", "Communications I", sysdate(), 2),
(7, 3, "CST8116", "Intro to Computer Programming", sysdate(), 2),
(8, 3, "CST8101", "Computer Essentials", sysdate(), 2),
(9, 4, "CST8215", "Introduction to Database", sysdate(), 3),
(10, 4, "LAW1303", "Immigration Law", sysdate(), 3),
(11, 4, "LAW1301", "Alternative Dispute Resolution", sysdate(), 3),
(12, 5, "LAW1302", "Ethics and Professional Responsibility", sysdate(), 3),
(13, 5, "LAW1308", "Legal Accounting", sysdate(), 3),
(14, 5, "LAW1304", "Advocacy", sysdate(), 4);

INSERT INTO courses values
(1,1),
(1,2),
(1,3),
(1,4),
(2,5),
(2,6),
(2,7),
(2,8),
(3,9),
(3,10),
(3,11),
(3,12),
(3,13),
(4,14); 




    