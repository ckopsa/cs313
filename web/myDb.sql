CREATE DATABASE pug;

CREATE TABLE IF NOT EXISTS "user"
(
id SERIAL PRIMARY KEY NOT NULL,
username VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
location VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS event
(
id SERIAL PRIMARY KEY NOT NULL,
title VARCHAR(50) NOT NULL,
host INT NOT NULL REFERENCES "user"(id),
location VARCHAR(100) NOT NULL,
"date" DATE NOT NULL,
"time" TIME NOT NULL
);

CREATE TABLE IF NOT EXISTS enrollment
(
id SERIAL PRIMARY KEY NOT NULL,
userId INT NOT NULL REFERENCES "user"(id),
eventId INT NOT NULL REFERENCES event(id)
);

--INSERT INTO "user"(username, email, password, location) VALUES ('coljamkop',
--'coljamkop@gmail.com', 'password123', 'Rexburg, ID');

--INSERT INTO event(title, host, location, "date", "time") VALUES ('LAN Party', 1,
--'Centre Square 3317', '2017-5-14', '11:00PM');

--INSERT INTO enrollment(userId, eventId) VALUES (1, 1);
