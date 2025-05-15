-- DROP DATABASE IF EXISTS ES06;
CREATE DATABASE IF NOT EXISTS ES06;
USE ES06; SHOW DATABASES;


-- DROP USER IF EXISTS ES06_user@localhost;
CREATE USER IF NOT EXISTS ES06_user@localhost IDENTIFIED BY 'mia_password';
-- ALTER USER ES06_user@localhost IDENTIFIED BY 'nuova_password';
SELECT user, host FROM mysql.user;
GRANT SELECT, INSERT, UPDATE, DELETE ON ES06.* TO ES06_user@localhost;
-- GRANT ALL ON ES06.* TO ES06_user@localhost;
SHOW GRANTS FOR ES06_user@localhost;

-- DROP TABLE IF EXISTS utente;
CREATE TABLE IF NOT EXISTS utente (
  UserID INT NOT NULL AUTO_INCREMENT ,
  Username VARCHAR(64) NOT NULL UNIQUE,
  Password VARCHAR(64) NOT NULL ,
  PRIMARY KEY (UserID)
) ENGINE=InnoDB AUTO_INCREMENT=1000;
SHOW TABLES; 
SHOW CREATE TABLE utente;

INSERT INTO utente (UserID, Username, Password 
) VALUES (NULL, 'utente', 'prova');

INSERT INTO utente VALUES 
(NULL, 'mrossi', '123'),
(NULL, 'admin', 'admin');
-- Modifico il programma sql in modo tale da poter inserire la registrazione con email
ALTER TABLE utente 
ADD Email VARCHAR(255) UNIQUE AFTER Password;

UPDATE utente SET Email = 'utente@example.com' WHERE Username = 'utente';
UPDATE utente SET Email = 'mrossi@example.com' WHERE Username = 'mrossi';
UPDATE utente SET Email = 'admin@example.com' WHERE Username = 'admin';

SELECT * FROM utente;