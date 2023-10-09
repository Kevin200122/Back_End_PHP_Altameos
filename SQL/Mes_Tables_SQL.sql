CREATE TABLE clip (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_categorie INT,
    Auteur VARCHAR(30),
    emplacement TEXT,
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id)
);

CREATE TABLE Video (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(30),
    contenu BLOB,
    emplacement VARCHAR(255),
    id_categorie INT,
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id)
);

CREATE TABLE Categorie (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    Titre VARCHAR(30),
    contenu TEXT,
    Nom_de_la_categorie VARCHAR(30)
);

