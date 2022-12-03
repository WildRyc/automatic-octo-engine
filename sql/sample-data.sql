INSERT INTO schools VALUES
( 1, "Algonquin College", "algonquinlive.com"),
( 2, "University of Ottawa", "uottawa.ca"),
( 3, "Carleton University", "carleton.ca");

INSERT INTO users VALUES
(1, "Renato", "Simoes", "simo0138@algonquinlive.com", "Password", sysdate(), sysdate(), null, null, 1);

INSERT INTO classes values
(1, 1, "CST8285", "Web Programming", sysdate(), 1);

INSERT INTO courses values
(1,1);

SELECT * FROM users;