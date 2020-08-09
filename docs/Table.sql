 CREATE TABLE IF NOT EXISTS user(
username varchar(30) PRIMARY KEY,
 password VARCHAR(30), 
 sex varchar(10), city varchar(30), email varchar(50))

CREATE TABLE IF NOT EXISTS topic(
topicid int PRIMARY KEY AUTO_INCREMENT,
subid int,
subject varchar(30),
body text,
author varchar(30),
hit varchar(30),
parent varchar(30),
date date
)

CREATE TABLE IF NOT EXISTS news(
newsid int PRIMARY KEY,
news TEXT,
date date
)

CREATE TABLE IF NOT EXISTS log(
logid int PRIMARY KEY,
event TEXT,
date date
)

CREATE TABLE IF NOT EXISTS topicrelation(
parentid int,
childid int
)

 
CREATE TABLE IF NOT EXISTS msg(
msgid int,
subject varchar(30),
author varchar(30),
status varchar(30),
body text,
date date,
owner varchar(30)
)

