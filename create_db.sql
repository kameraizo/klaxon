CREATE DATABASE IF NOT EXISTS klaxon;
USE klaxon;
CREATE TABLE agence (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telephone VARCHAR(20) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    est_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE trajet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agence_depart_id INT NOT NULL,
    agence_arrivee_id INT NOT NULL,
    utilisateur_id INT NOT NULL,
    gdh_depart DATETIME NOT NULL,
    gdh_arrivee DATETIME NOT NULL,
    places_total INT NOT NULL,
    places_dispo INT NOT NULL,
    FOREIGN KEY (agence_depart_id) REFERENCES agence(id),
    FOREIGN KEY (agence_arrivee_id) REFERENCES agence(id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
);