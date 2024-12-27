-- Insertion pour la table Continents
INSERT INTO Continents (Continent_name, Created_by) VALUES ('Europe', 4);
INSERT INTO Continents (Continent_name, Created_by) VALUES ('Asie', 4);

-- Insertion pour la table Pays
INSERT INTO Pays (Nom_pays, Population, Id_continent, Created_by, Image) VALUES ('France', 67000000, 2, 4, 'france.png');
INSERT INTO Pays (Nom_pays, Population, Id_continent, Created_by, Image) VALUES ('Allemagne', 83000000, 2, 4, 'allemagne.png');
INSERT INTO Pays (Nom_pays, Population, Id_continent, Created_by, Image) VALUES ('Chine', 1400000000, 3, 4, 'chine.png');

-- Insertion pour la table Villes
INSERT INTO Villes (Nom_ville, Description_ville, Type_Ville, Image, Id_pays, Created_by) VALUES ('Paris', 'Capitale de la France', 'Capital', 'paris.png', 1, 4);
INSERT INTO Villes (Nom_ville, Description_ville, Type_Ville, Image, Id_pays, Created_by) VALUES ('Berlin', 'Capitale de lAllemagne', 'Capital', 'berlin.png', 2, 4);
INSERT INTO Villes (Nom_ville, Description_ville, Type_Ville, Image, Id_pays, Created_by) VALUES ('Pékin', 'Capitale de la Chine', 'Capital', 'pekin.png', 3, 4);