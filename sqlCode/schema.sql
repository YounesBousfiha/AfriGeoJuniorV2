-- SQL Code pour Cree Base de Données, tableux et definir la relation entre eux


CREATE DATABASE IF NOT EXISTS GeoJuniorV2;

USE GeoJuniorV2;


CREATE Users IF NOT EXISTS (
    Id_user int NOT NULL AUTO_INCREMENT,
    Nom varchar(255) NOT NULL,
    Prenom varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Role int NOT NULL,
    Token varchar(255) NULL,
    PRIMARY KEY(Id_user)
);

CREATE Roles IF NOT EXISTS (
    Id_role int NOT NULL AUTO_INCREMENT,
    Role_name varchar(20),
    PRIMARY KEY(Id_role)
);


CREATE Continents IF NOT EXISTS (
    Id_continent int NOT NULL AUTO_INCREMENT,
    Continent_name varchar(255) NOT NULL UNIQUE,
    Count_pays int default 0,
    PRIMARY KEY(Id_continent)
);

CREATE Langues IF NOT EXISTS (
    Id_langue int NOT NULL AUTO_INCREMENT,
    Langue_nom varchar(255) NOT NULL,
    PRIMARY KEY(Id_langue)
);

CREATE Pays IF NOT EXISTS (
    Id_pays int NOT NULL AUTO_INCREMENT,
    Nom_pays varchar(255) NOT NULL UNIQUE,
    Population int NOT NULL,
    Id_continent int NOT NULL,
    PRIMARY KEY(Id_pays),
    FOREIGN KEY (Id_continent) REFERENCES Continents(Id_continent)
);

CREATE Villes IF NOT EXISTS (
    Id_ville int NOT NULL AUTO_INCREMENT,
    Nom_ville varchar(255),
    Description_ville varchar(255),
    Type_Ville ENUM('Capital', 'Autre'),
    Id_pays int NOT NULL,
    PRIMARY KEY(Id_ville),
    FOREIGN KEY (Id_pays) REFERENCES Pays(Id_pays)
);