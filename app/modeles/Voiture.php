<?php
require_once '../config/database.php';

class Voiture {
    // Récupérer une voiture par l'ID de l'annonce
    public static function trouverParAnnonceId($annonce_id) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT v.*
            FROM Voiture v
            JOIN Annonce a ON v.id = a.voiture_id
            WHERE a.id = ?
        ");
        $stmt->execute([$annonce_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Modifier le prix d'une voiture par l'ID de l'annonce
    public static function modifierParAnnonceId($annonce_id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE Voiture
            SET prix = ?, annee = ?, kilometrage = ?, categorie = ?, couleur = ?
            WHERE id = (SELECT voiture_id FROM Annonce WHERE id = ?)
        ");
        $stmt->execute([
            $data['prix'],
            $data['annee'],
            $data['kilometrage'],
            $data['categorie'],
            $data['couleur'],
            $annonce_id
        ]);
    }

    // Ajouter une nouvelle voiture
    public static function creer($data) {
        global $pdo;
        $stmt = $pdo->prepare("
            INSERT INTO Voiture (marque_id, modele_id, annonce_id, prix)
            VALUES (?, ?, ?, ?)
            ");
        $stmt->execute([
            $data['marque_id'],
            $data['modele_id'],
            $data['annonce_id'],
            $data['prix']
        ]);
        return $pdo->lastInsertId();
    }

    // Supprimer une voiture par l'ID de l'annonce
    public static function supprimerParAnnonceId($annonce_id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Voiture WHERE annonce_id = ?");
        $stmt->execute([$annonce_id]);
    }
}