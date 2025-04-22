<?php
require_once '../config/database.php';

class Annonce {
    public static function toutes() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT a.*, v.prix
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function toutesParAcheteur($acheteur_id) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT a.*, v.prix
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            WHERE a.acheteur_id = ?
        ");
        $stmt->execute([$acheteur_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function toutesParVendeur($utilisateur_id) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT a.*, v.prix
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            WHERE a.utilisateur_id = ?
        ");
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function toutesAvecDetails() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT a.*, v.annee, v.prix, v.kilometrage, v.categorie, v.couleur, v.description AS voiture_description,
                   m.nom AS marque, mo.nom AS modele
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            JOIN Marque m ON v.marque_id = m.id
            JOIN Modele mo ON v.modele_id = mo.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function trouverParId($id) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT a.*, v.prix, v.annee, v.kilometrage, v.categorie, v.couleur,
                   m.nom AS marque, mo.nom AS modele
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            JOIN Marque m ON v.marque_id = m.id
            JOIN Modele mo ON v.modele_id = mo.id
            WHERE a.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function creer($data) {
        global $pdo;

        // Créer la voiture
        $stmt = $pdo->prepare("
            INSERT INTO Voiture (annee, prix, kilometrage, categorie, couleur, marque_id, modele_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['annee'],
            $data['prix'],
            $data['kilometrage'],
            $data['categorie'],
            $data['couleur'],
            $data['marque_id'],
            $data['modele_id']
        ]);
        $voiture_id = $pdo->lastInsertId();

        // Créer l'annonce
        $stmt = $pdo->prepare("
            INSERT INTO Annonce (titre, description, utilisateur_id, voiture_id)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['utilisateur_id'],
            $voiture_id
        ]);
    }

    public static function modifier($id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE Annonce
            SET titre = ?, description = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $data['titre'],
            $data['description'],
            $id
        ]);
    }

    public static function ajouterAuPanier($annonce_id, $acheteur_id) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Annonce SET acheteur_id = ? WHERE id = ?");
        $stmt->execute([$acheteur_id, $annonce_id]);
    }
}