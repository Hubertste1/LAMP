-- Creazione del database
CREATE DATABASE IF NOT EXISTS Scuola;
USE Scuola;

-- Creazione della tabella Corsi
CREATE TABLE Corsi (
    codice_corso INT AUTO_INCREMENT PRIMARY KEY,
    nome_corso VARCHAR(255) NOT NULL
);

-- Creazione della tabella Discipline
CREATE TABLE Discipline (
    codice_disc INT AUTO_INCREMENT PRIMARY KEY,
    nome_disc VARCHAR(255) NOT NULL
);

-- Creazione della tabella Studenti
CREATE TABLE Studenti (
    matricola INT AUTO_INCREMENT PRIMARY KEY,
    cognome VARCHAR(255) NOT NULL,
    nascita DATE NOT NULL,
    FK_corso INT,
    capogruppo INT,
    FOREIGN KEY (FK_corso) REFERENCES Corsi(codice_corso) ON DELETE CASCADE
);

-- Creazione della tabella Valutazioni
CREATE TABLE Valutazioni (
    codice_val INT AUTO_INCREMENT PRIMARY KEY,
    voto INT NOT NULL,
    data_voto DATE NOT NULL,
    FK_studenti INT,
    FK_disc INT,
    FOREIGN KEY (FK_studenti) REFERENCES Studenti(matricola) ON DELETE CASCADE,
    FOREIGN KEY (FK_disc) REFERENCES Discipline(codice_disc) ON DELETE CASCADE
);

-- Popolamento della tabella Corsi
INSERT INTO Corsi (nome_corso) VALUES
('Liceo Scienze Umane'),
('Liceo Scientifico'),
('Liceo Classico');

-- Popolamento della tabella Discipline
INSERT INTO Discipline (nome_disc) VALUES
('Italiano'),
('Matematica'),
('Storia');

-- Popolamento della tabella Studenti
INSERT INTO Studenti (cognome, nascita, FK_corso, capogruppo) VALUES
('Rossi', '2018-01-01', 1, 3),
('Bianchi', '2017-05-12', 2, 2),
('Verdi', '2019-11-23', 3, 1);

-- Popolamento della tabella Valutazioni
INSERT INTO Valutazioni (voto, data_voto, FK_studenti, FK_disc) VALUES
(7, '2025-01-15', 1, 1),
(8, '2025-01-16', 2, 2),
(9, '2025-01-17', 3, 3);
