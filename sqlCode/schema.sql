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
    Created_by int NOT NULL, 
    PRIMARY KEY(Id_continent),
    FOREIGN KEY(Created_by) REFERENCES Users(Id_user) ON DELETE CASCADE
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
    Image varchar(255) NOT NULL,
    PRIMARY KEY(Id_pays),
    FOREIGN KEY (Id_continent) REFERENCES Continents(Id_continent) ON DELETE CASCADE,
    FOREIGN KEY(Created_by) REFERENCES Users(Id_user) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Pays_Langues (
    Id_pays int NOT NULL,
    Id_langue int NOT NULL,
    PRIMARY KEY(Id_pays, Id_langue),
    FOREIGN KEY (Id_pays) REFERENCES Pays(Id_pays) ON DELETE CASCADE,
    FOREIGN KEY (Id_langue) REFERENCES Langues(Id_langue)
);

CREATE TABLE IF NOT EXISTS Villes (
    Id_ville int NOT NULL AUTO_INCREMENT,
    Nom_ville varchar(255),
    Description_ville varchar(255),
    Type_Ville ENUM('Capital', 'Autre'),
    Image varchar(255) NOT NULL,
    Id_pays int NOT NULL,
    Created_by int NOT NULL,
    PRIMARY KEY(Id_ville),
    FOREIGN KEY (Id_pays) REFERENCES Pays(Id_pays) ON DELETE CASCADE,
    FOREIGN KEY(Created_by) REFERENCES Users(Id_user) ON DELETE CASCADE
);