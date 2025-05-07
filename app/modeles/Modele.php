<?php

class Modele {
    public static function toutes() {
        $pdo = Database::connexion();
        $stmt = $pdo->query("SELECT * FROM Modele");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function trouverParId($id) {
        $pdo = Database::connexion();
        $stmt = $pdo->prepare("SELECT * FROM Modele WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function trouverOuCreer($nom, $marque_id) {
        $pdo = Database::connexion();
        $stmt = $pdo->prepare("SELECT * FROM Modele WHERE nom = ? AND marque_id = ?");
        $stmt->execute([$nom, $marque_id]);
        $modele = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$modele) {
            $stmt = $pdo->prepare("INSERT INTO Modele (nom, marque_id) VALUES (?, ?)");
            $stmt->execute([$nom, $marque_id]);
            $modele = [
                'id' => $pdo->lastInsertId(),
                'nom' => $nom,
                'marque_id' => $marque_id
            ];
        }

        return $modele;
    }
}