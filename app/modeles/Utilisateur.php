<?php

class Utilisateur {
    private static $pdo;

    public static function init() {
        self::$pdo = Database::getPdo();
    }

    public static function creer($data) {
        $stmt = self::$pdo->prepare("SELECT COUNT(*) FROM Utilisateur WHERE email = ?");
        $stmt->execute([$data['email']]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Cet email est déjà utilisé.");
        }

        $stmt = self::$pdo->prepare("
            INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe, ville, code_postal, adresse, role)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            password_hash($data['mot_de_passe'], PASSWORD_BCRYPT),
            $data['ville'] ?? '',
            $data['code_postal'] ?? null,
            $data['adresse'] ?? null,
            $data['role'] ?? 'particulier'
        ]);
    }

    public static function trouverParId($id) {
        $stmt = self::$pdo->prepare("SELECT * FROM Utilisateur WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function trouverParEmail($email) {
        $stmt = self::$pdo->prepare("SELECT * FROM Utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function modifier($id, $data) {
        $stmt = self::$pdo->prepare("
            UPDATE Utilisateur
            SET nom = ?, prenom = ?, email = ?, ville = ?, code_postal = ?, adresse = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $data['ville'],
            $data['code_postal'],
            $data['adresse'],
            $id
        ]);
    }
}