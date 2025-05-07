<?php

class Annonce {
    public static function toutes() {
        $pdo = Database::connexion();
        $stmt = $pdo->query("
            SELECT a.*, v.prix
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function toutesParAcheteur($acheteur_id) {
        $pdo = Database::connexion();
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
        $pdo = Database::connexion();
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
        $pdo = Database::connexion();
        $stmt = $pdo->query("
            SELECT a.*, v.annee, v.prix, v.kilometrage, v.categorie, v.couleur,
                   m.nom AS marque, mo.nom AS modele
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            JOIN Marque m ON v.marque_id = m.id
            JOIN Modele mo ON v.modele_id = mo.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function trouverParId($id) {
        $pdo = Database::connexion();
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

    public static function changerStatut($id, $statut) {
        $pdo = Database::connexion();
        $stmt = $pdo->prepare("UPDATE Annonce SET statut = ? WHERE id = ?");
        $stmt->execute([$statut, $id]);
    }

    public static function creer($data) {
        $pdo = Database::connexion();

        $stmt = $pdo->prepare("
            INSERT INTO Voiture (annee, prix, kilometrage, categorie, couleur, marque_id, modele_id, type, energie, provenance, mise_en_circulation, premiere_main, nombre_portes, nombre_places, sellerie, consommation)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['annee'],
            $data['prix'],
            $data['kilometrage'],
            $data['categorie'],
            $data['couleur'],
            $data['marque_id'],
            $data['modele_id'],
            $data['type'],
            $data['energie'],
            $data['provenance'],
            $data['mise_en_circulation'],
            $data['premiere_main'],
            $data['nombre_portes'],
            $data['nombre_places'],
            $data['sellerie'],
            $data['consommation']
        ]);
        $voiture_id = $pdo->lastInsertId();

        $stmt = $pdo->prepare("
            INSERT INTO Annonce (titre, description, utilisateur_id, voiture_id, date_publication)
            VALUES (?, ?, ?, ?, NOW())
        ");
        $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['utilisateur_id'],
            $voiture_id
        ]);
    }

    public static function modifier($id, $data) {
        $pdo = Database::connexion();
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
        $pdo = Database::connexion();

        $stmt = $pdo->prepare("SELECT acheteur_id FROM Annonce WHERE id = ?");
        $stmt->execute([$annonce_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['acheteur_id'] !== null) {
            throw new Exception("Cette annonce est déjà réservée.");
        }

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Annonce WHERE acheteur_id = ?");
        $stmt->execute([$acheteur_id]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Vous ne pouvez réserver qu'une seule annonce à la fois.");
        }

        $stmt = $pdo->prepare("UPDATE Annonce SET acheteur_id = ? WHERE id = ?");
        $stmt->execute([$acheteur_id, $annonce_id]);
    }

    public static function supprimerDuPanier($annonce_id) {
        $pdo = Database::connexion();
        $stmt = $pdo->prepare("UPDATE Annonce SET acheteur_id = NULL WHERE id = ?");
        $stmt->execute([$annonce_id]);
    }
}