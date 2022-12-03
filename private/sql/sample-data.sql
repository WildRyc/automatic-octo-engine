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

SELECT * FROM users;
