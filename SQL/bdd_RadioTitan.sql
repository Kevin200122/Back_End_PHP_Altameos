

CREATE TABLE Categorie (
Id_Categorie INT PRIMARY KEY,
Nom_Categorie Varchar(50),
)


CREATE TABLE Media (
Id_Media INT PRIMARY KEY,
Titre_Media Varchar(50),
Auteur_Media Varchar(50),
Type_Media Varchar(50),
Duree_Media INT,
)

CREATE TABLE Actualite (
    Id INT PRIMARY KEY,
    Titre VARCHAR(255),
    Description TEXT,
    Contenu TEXT,
    DatePublication DATE,
    Auteur VARCHAR(255),
    Source VARCHAR(255),
    URLImage VARCHAR(255),
    URLArticle VARCHAR(255)
)

CREATE TABLE Roles (
    Id_Roles INT PRIMARY KEY,
    NomRole VARCHAR(255),
    Description TEXT,
    ID_Utilisateur INT,
    FOREIGN KEY (ID_Utilisateur) REFERENCES Utilisateurs(ID)
)




CREATE TABLE Articles (
    Id_Article INT PRIMARY KEY AUTO_INCREMENT,
    titre Varchar(50),
    contenu TEXT,
    date_creation DATETIME,
    auteur TEXT,
    categorie TEXT,
    statut TEXT,
    date_publication DATETIME,
    image_url TEXT
)

CREATE TABLE podcast(
    Id INT PRIMARY KEY,
    Titre VARCHAR(255),
    Description TEXT,
    Duree TIME,
    DatePublication DATE,
    Hotes VARCHAR(255),
    Categorie VARCHAR(255),
    Langue VARCHAR(50),
    URLImage VARCHAR(255),
    URLAudio VARCHAR(255)
)
