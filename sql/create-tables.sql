-- inspired by https://github.com/tutorials24x7/quiz-database-mysql/blob/master/quiz.sql


CREATE DATABASE IF NOT EXISTS quizbud;
ALTER DATABASE quizbud default character set utf8mb4 COLLATE utf8mb4_unicode_ci;
use quizbud;

DROP TABLES IF EXISTS users, quizes, questions, classes, schools, attempts, answers, attempts_answers, courses ;




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
registrationDate DATETIME NOT NULL,
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
creation datetime not null,
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
created DATETIME not null,
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
creation datetime not null,
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
creation datetime not null,
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
creation datetime not null,
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
creation datetime not null,
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

    




    