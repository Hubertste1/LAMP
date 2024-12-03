-- Creazione del database
CREATE DATABASE IF NOT EXISTS videoteca;
USE videoteca;

-- Creazione della tabella Regista
CREATE TABLE Regista (
    ID_Regista INT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50),
    Data_di_nascita DATE
);

-- Creazione della tabella Attore
CREATE TABLE Attore (
    ID_Attore INT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50),
    Data_di_nascita DATE
);

-- Creazione della tabella Produttore
CREATE TABLE Produttore (
    ID_Produttore INT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50),
    Data_di_nascita DATE
);

-- Creazione della tabella Categoria
CREATE TABLE Categoria (
    ID_Categoria INT PRIMARY KEY,
    Nome_categoria VARCHAR(50)
);

-- Creazione della tabella Film
CREATE TABLE Film (
    ID_Film INT PRIMARY KEY,
    ID_Regista INT,
    ID_Produttore INT,
    ID_Categoria INT,
    FOREIGN KEY (ID_Regista) REFERENCES Regista(ID_Regista),
    FOREIGN KEY (ID_Produttore) REFERENCES Produttore(ID_Produttore),
    FOREIGN KEY (ID_Categoria) REFERENCES Categoria(ID_Categoria)
);

-- Creazione della tabella Film_Attore
CREATE TABLE Film_Attore (
    ID_Film INT,
    ID_Attore INT,
    PRIMARY KEY (ID_Film, ID_Attore),
    FOREIGN KEY (ID_Film) REFERENCES Film(ID_Film),
    FOREIGN KEY (ID_Attore) REFERENCES Attore(ID_Attore)
);

-- Creazione della tabella Cliente
CREATE TABLE Cliente (
    ID_Cliente INT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50)
);

-- Creazione della tabella Acquisto
CREATE TABLE Acquisto (
    ID_Acquisto INT PRIMARY KEY,
    ID_Film INT,
    ID_Cliente INT,
    FOREIGN KEY (ID_Film) REFERENCES Film(ID_Film),
    FOREIGN KEY (ID_Cliente) REFERENCES Cliente(ID_Cliente)
);

-- Inserimento dati nella tabella Regista
INSERT INTO Regista (ID_Regista, Nome, Cognome, Data_di_nascita)
VALUES
(1, 'Christopher', 'Nolan', '1970-07-30'),
(2, 'Quentin', 'Tarantino', '1963-03-27');

-- Inserimento dati nella tabella Attore
INSERT INTO Attore (ID_Attore, Nome, Cognome, Data_di_nascita)
VALUES
(1, 'Leonardo', 'DiCaprio', '1974-11-11'),
(2, 'Joseph', 'Gordon-Levitt', '1981-02-17'),
(3, 'Samuel', 'L. Jackson', '1948-12-21');

-- Inserimento dati nella tabella Produttore
INSERT INTO Produttore (ID_Produttore, Nome, Cognome, Data_di_nascita)
VALUES
(1, 'Emma', 'Thomas', '1971-12-09'),
(2, 'Lawrence', 'Bender', '1957-10-17');

-- Inserimento dati nella tabella Categoria
INSERT INTO Categoria (ID_Categoria, Nome_categoria)
VALUES
(1, 'Azione'),
(2, 'Drammatico'),
(3, 'Thriller');

-- Inserimento dati nella tabella Film
INSERT INTO Film (ID_Film, ID_Regista, ID_Produttore, ID_Categoria)
VALUES
(1, 1, 1, 1),
(2, 2, 2, 2);

-- Inserimento dati nella tabella Film_Attore
INSERT INTO Film_Attore (ID_Film, ID_Attore)
VALUES
(1, 1),
(1, 2),
(2, 3);

-- Inserimento dati nella tabella Cliente
INSERT INTO Cliente (ID_Cliente, Nome, Cognome)
VALUES
(1, 'Marco', 'Rossi'),
(2, 'Luca', 'Bianchi');

-- Inserimento dati nella tabella Acquisto
INSERT INTO Acquisto (ID_Acquisto, ID_Film, ID_Cliente)
VALUES
(1, 1, 1),
(2, 2, 2);
