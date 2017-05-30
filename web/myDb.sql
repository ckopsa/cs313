CREATE TABLE IF NOT EXISTS participant
(
id SERIAL PRIMARY KEY NOT NULL,
username VARCHAR(50) NOT NULL UNIQUE,
email VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
location VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS event
(
id SERIAL PRIMARY KEY NOT NULL,
title VARCHAR(50) NOT NULL,
host INT NOT NULL REFERENCES participant(id),
location VARCHAR(100) NOT NULL,
eTime TIME NOT NULL,
eDate DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS enrollment
(
id SERIAL PRIMARY KEY NOT NULL,
userId INT NOT NULL REFERENCES participant(id),
eventId INT NOT NULL REFERENCES event(id)
);

INSERT INTO participant(username, email, password, location) VALUES ('coljamkop',
'coljamkop@gmail.com', 'password123', 'Rexburg, ID');

INSERT INTO participant(username, email, password, location) VALUES ('wampum',
'kopsak2@gmail.com', 'password123', 'Tuscon, AZ');

INSERT INTO participant(username, email, password, location) VALUES ('kopsac',
'kopsac2@gmail.com', 'password123', 'Paradise, CA');

INSERT INTO event(title, host, location, eTime, eDate) VALUES ('LAN Party', 1,
'Centre Square 3317',  '11:00PM', '2017-5-14');

INSERT INTO enrollment(userId, eventId) VALUES (1, 1);

SELECT username from participant WHERE id = (select host FROM event);

SELECT title, (SELECT username from participant WHERE id = e.host) as "host", location FROM event e;
