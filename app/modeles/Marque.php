<?php

class Marque {
    private static $pdo;

    public static function init() {
        self::$pdo = Database::getPdo();
    }

    public static function toutes() {
        $stmt = self::$pdo->query("SELECT * FROM Marque");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function trouverParId($id) {
        $stmt = self::$pdo->prepare("SELECT * FROM Marque WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function trouverOuCreer($nom) {
        $nom_normalise = strtolower(trim($nom));

        $stmt = self::$pdo->prepare("SELECT * FROM Marque WHERE LOWER(nom) = ?");
        $stmt->execute([$nom_normalise]);
        $marque = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$marque) {
            $stmt = self::$pdo->prepare("INSERT INTO Marque (nom) VALUES (?)");
            $stmt->execute([ucfirst($nom_normalise)]);
            $marque = [
                'id' => self::$pdo->lastInsertId(),
                'nom' => ucfirst($nom_normalise)
            ];
        }

        return $marque;
    }
}