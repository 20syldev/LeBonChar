<?php
require_once '../config/database.php';

class Marque {
    public static function toutes() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Marque");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function trouverParId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Marque WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function trouverOuCreer($nom) {
        global $pdo;

        $nom_normalise = strtolower(trim($nom));

        $stmt = $pdo->prepare("SELECT * FROM Marque WHERE LOWER(nom) = ?");
        $stmt->execute([$nom_normalise]);
        $marque = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$marque) {
            $stmt = $pdo->prepare("INSERT INTO Marque (nom) VALUES (?)");
            $stmt->execute([ucfirst($nom_normalise)]);
            $marque = [
                'id' => $pdo->lastInsertId(),
                'nom' => ucfirst($nom_normalise)
            ];
        }

        return $marque;
    }
}