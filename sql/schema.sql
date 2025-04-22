CREATE TABLE Utilisateur (
    id INT AUTO_INCREMENT,
    nom VARCHAR (255) NOT NULL,
    prenom VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    mot_de_passe VARCHAR (255) NOT NULL,
    ville VARCHAR (255) NOT NULL,
    code_postal VARCHAR (5),
    adresse TEXT,
    role ENUM ('admin', 'utilisateur') NOT NULL DEFAULT 'utilisateur',
    PRIMARY KEY (id),
    UNIQUE (email)
);

CREATE TABLE Marque (
    id INT AUTO_INCREMENT,
    nom VARCHAR (255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Modele (
    id INT AUTO_INCREMENT,
    nom VARCHAR (255) NOT NULL,
    marque_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (marque_id) REFERENCES Marque (id)
);

CREATE TABLE Voiture (
    id INT AUTO_INCREMENT,
    annee INT NOT NULL,
    prix DECIMAL (10,2) NOT NULL,
    kilometrage INT NOT NULL,
    categorie ENUM ('berline', 'SUV', 'utilitaire', 'sport', 'autre') NOT NULL DEFAULT 'autre',
    couleur VARCHAR (20) NOT NULL,
    marque_id INT NOT NULL,
    modele_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (marque_id) REFERENCES Marque (id),
    FOREIGN KEY (modele_id) REFERENCES Modele (id)
);

CREATE TABLE Image (
    id INT AUTO_INCREMENT,
    url TEXT NOT NULL,
    type ENUM ('jpg', 'png', 'webp') NOT NULL,
    voiture_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (voiture_id) REFERENCES Voiture (id)
);

CREATE TABLE Annonce (
    id INT AUTO_INCREMENT,
    titre VARCHAR (255) NOT NULL,
    description TEXT NOT NULL,
    statut ENUM ('active', 'vendue') NOT NULL DEFAULT 'active',
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_achat DATETIME NULL,
    voiture_id INT NOT NULL,
    utilisateur_id INT,
    acheteur_id INT,
    PRIMARY KEY (id),
    UNIQUE (voiture_id),
    FOREIGN KEY (voiture_id) REFERENCES Voiture (id),
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur (id),
    FOREIGN KEY (acheteur_id) REFERENCES Utilisateur (id)
);
