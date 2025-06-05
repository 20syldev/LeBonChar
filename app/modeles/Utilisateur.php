<?php

/**
 * Modèle représentant les utilisateurs de l'application
 *
 * Cette classe gère toutes les opérations liées aux utilisateurs :
 * création de compte, authentification, modification de profil, etc.
 */
class Utilisateur {
    private static $pdo;

    /**
     * Initialise la connexion à la base de données
     *
     * Récupère l'instance PDO depuis la classe Database
     *
     * @return void
     */
    public static function init() {
        self::$pdo = Database::getPdo();
    }

    /**
     * Récupère un utilisateur par son ID
     *
     * @param int $id ID de l'utilisateur à récupérer
     * @return array|false Tableau associatif contenant les données de l'utilisateur ou false si non trouvé
     */
    public static function trouverParId($id) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Utilisateur
            WHERE id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un utilisateur par son email
     *
     * Utilisé principalement pour l'authentification
     *
     * @param string $email Email de l'utilisateur à récupérer
     * @return array|false Tableau associatif contenant les données de l'utilisateur ou false si non trouvé
     */
    public static function trouverParEmail($email) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Utilisateur
            WHERE email = ?
        ");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crée un nouvel utilisateur dans la base de données
     *
     * Vérifie d'abord que l'email n'est pas déjà utilisé,
     * puis hache le mot de passe et enregistre les données
     *
     * @param array $data Données du nouvel utilisateur
     * @throws Exception Si l'email est déjà utilisé
     * @return void
     */
    public static function creer($data) {
        $stmt = self::$pdo->prepare("
            SELECT COUNT(*)
            FROM Utilisateur
            WHERE email = ?
        ");
        $stmt->execute([$data['email']]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Cet email est déjà utilisé.");
        }

        $stmt = self::$pdo->prepare("
            INSERT
            INTO Utilisateur (nom, prenom, email, mot_de_passe, ville, code_postal, adresse, role)
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

    /**
     * Modifie les informations d'un utilisateur existant
     *
     * Met à jour toutes les informations de profil sauf le mot de passe
     *
     * @param int $id ID de l'utilisateur à modifier
     * @param array $data Nouvelles données de l'utilisateur
     * @return void
     */
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

    /**
     * Modifie le mot de passe d'un utilisateur
     *
     * Hache le nouveau mot de passe avant de l'enregistrer
     *
     * @param int $id ID de l'utilisateur dont on veut modifier le mot de passe
     * @param string $nouveauMotDePasse Nouveau mot de passe non haché
     * @return void
     */
    public static function modifierMotDePasse($id, $nouveauMotDePasse) {
        $stmt = self::$pdo->prepare("
            UPDATE Utilisateur
            SET mot_de_passe = ?
            WHERE id = ?
        ");
        $stmt->execute([
            password_hash($nouveauMotDePasse, PASSWORD_BCRYPT),
            $id
        ]);
    }

    /**
     * Vérifie si un utilisateur est un professionnel
     *
     * @param array $utilisateur Données de l'utilisateur à vérifier
     * @return bool True si l'utilisateur est un professionnel, sinon False
     */
    public static function estPro($utilisateur) {
        return isset($utilisateur['role']) && $utilisateur['role'] === 'professionnel';
    }
}