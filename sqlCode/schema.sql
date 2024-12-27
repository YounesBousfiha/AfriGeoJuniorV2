-- SQL Code pour Cree Base de Données, tableux et definir la relation entre eux


CREATE DATABASE IF NOT EXISTS GeoJuniorV2;

USE GeoJuniorV2;



CREATE TABLE IF NOT EXISTS Roles (
    Id_role int NOT NULL AUTO_INCREMENT,
    Role_name varchar(20),
    PRIMARY KEY(Id_role)
);

CREATE TABLE IF NOT EXISTS Users(
    Id_user int NOT NULL AUTO_INCREMENT,
    Nom varchar(255) NOT NULL,
    Prenom varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Id_role int NOT NULL,
    Token varchar(255) NULL,
    PRIMARY KEY(Id_user),
    FOREIGN KEY(id_role) REFERENCES Roles(Id_role)
    
);

CREATE TABLE IF NOT EXISTS Continents (
    Id_continent int NOT NULL AUTO_INCREMENT,
    Continent_name varchar(255) NOT NULL UNIQUE,
    Count_pays int default 0,
    Created_by int NOT NULL, 
    PRIMARY KEY(Id_continent),
    FOREIGN KEY(Created_by) REFERENCES Users(Id_user)
);

CREATE TABLE IF NOT EXISTS Langues (
    Id_langue int NOT NULL AUTO_INCREMENT,
    Langue_nom varchar(255) NOT NULL,
    PRIMARY KEY(Id_langue)
);

CREATE TABLE IF NOT EXISTS Pays (
    Id_pays int NOT NULL AUTO_INCREMENT,
    Nom_pays varchar(255) NOT NULL UNIQUE,
    Population int NOT NULL,
    Id_continent int NOT NULL,
    Created_by int NOT NULL,
    PRIMARY KEY(Id_pays),
    FOREIGN KEY (Id_continent) REFERENCES Continents(Id_continent),
    FOREIGN KEY(Created_by) REFERENCES Users(Id_user)
);

CREATE TABLE IF NOT EXISTS Pays_Langues (
    Id int NOT NULL,
    Id_pays int NOT NULL,
    Id_langue int NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY (Id_pays) REFERENCES Pays(Id_pays),
    FOREIGN KEY (Id_langue) REFERENCES Langues(Id_langue)
);

CREATE TABLE IF NOT EXISTS Villes (
    Id_ville int NOT NULL AUTO_INCREMENT,
    Nom_ville varchar(255),
    Description_ville varchar(255),
    Type_Ville ENUM('Capital', 'Autre'),
    Id_pays int NOT NULL,
    Created_by int NOT NULL,
    PRIMARY KEY(Id_ville),
    FOREIGN KEY (Id_pays) REFERENCES Pays(Id_pays),
    FOREIGN KEY(Created_by) REFERENCES Users(Id_user)
);

-- Nombre de villes par pays.
SELECT pays.nom, COUNT(*) 
FROM ville, pays 
WHERE pays.id_pays = ville.id_pays GROUP BY pays.nom;

-- Nombre de pays par continent.
SELECT continent.nom, count(*) 
FROM continent, pays 
WHERE continent.id_continent = pays.id_continent GROUP BY continent.nom;

-- Le continent ayant la plus grande population.
-- -- premiere creer une vue avec les continent et leur population total
CREATE VIEW continent_population as SELECT continent.nom, SUM(population) AS 'Population' 
FROM continent, pays 
WHERE continent.id_continent = pays.id_continent GROUP BY continent.nom;
-- -- requte pour selectioner le pays avec la grande poulation
select * fROM continent_population where population = (select MAX(population) from continent_population);

-- La ville la plus peuplée par continent.