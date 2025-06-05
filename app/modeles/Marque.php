<?php

/**
 * Modèle représentant les marques de véhicules
 *
 * Cette classe gère les opérations liées aux marques de véhicules :
 * récupération, création et normalisation des noms de marque
 */
class Marque {
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
     * Récupère toutes les marques de véhicules
     *
     * @return array Tableau associatif contenant toutes les marques
     */
    public static function toutes() {
        $stmt = self::$pdo->query("SELECT * FROM Marque");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une marque par son ID
     *
     * @param int $id ID de la marque à récupérer
     * @return array|null Tableau associatif contenant les données de la marque ou null si non trouvée
     */
    public static function trouverParId($id) {
        $stmt = self::$pdo->prepare("SELECT * FROM Marque WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une marque existante ou en crée une nouvelle si inexistante
     *
     * Normalise le nom de la marque (minuscules, sans espaces superflus),
     * recherche si elle existe déjà et la crée sinon
     *
     * @param string $nom Nom de la marque recherchée ou à créer
     * @return array Tableau associatif contenant les données de la marque
     */
    public static function trouverOuCreer($nom) {
        $nom_normalise = strtolower(trim($nom));

        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Marque
            WHERE LOWER(nom) = ?
        ");
        $stmt->execute([$nom_normalise]);
        $marque = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$marque) {
            $stmt = self::$pdo->prepare("
                INSERT
                INTO Marque (nom)
                VALUES (?)
            ");
            $stmt->execute([ucfirst($nom_normalise)]);
            $marque = [
                'id' => self::$pdo->lastInsertId(),
                'nom' => ucfirst($nom_normalise)
            ];
        }

        return $marque;
    }
}