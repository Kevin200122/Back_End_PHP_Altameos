CREATE TABLE Utilisateur (

)

CREATE TABLE Categorie (

)

CREATE TABLE Utilisateur_Role (
Administrateur Varchar(50),
Utilisateur Varchar(50),
)

CREATE TABLE Media (

)

CREATE TABLE Actualite (
    ID INT PRIMARY KEY,
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
    ID INT PRIMARY KEY,
    NomRole VARCHAR(255),
    Description TEXT,
    ID_Utilisateur INT,
    FOREIGN KEY (ID_Utilisateur) REFERENCES Utilisateurs(ID)
)




CREATE TABLE Articles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre TEXT,
    contenu TEXT,
    date_creation DATETIME,
    auteur TEXT,
    categorie TEXT,
    statut TEXT,
    date_publication DATETIME,
    image_url TEXT
)

CREATE TABLE podcast(
    ID INT PRIMARY KEY,
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
