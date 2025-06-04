<?php

/**
 * Modèle représentant les modèles de véhicules
 *
 * Cette classe gère les opérations liées aux modèles de véhicules :
 * récupération, création et association avec les marques
 */
class Modele {
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
     * Récupère tous les modèles de véhicules
     *
     * @return array Liste de tous les modèles
     */
    public static function tous() {
        $stmt = self::$pdo->query("
            SELECT *
            FROM Modele
            ORDER BY marque_id, nom
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un modèle par son ID
     *
     * @param int $id ID du modèle à récupérer
     * @return array|null Tableau associatif contenant les données du modèle ou null si non trouvé
     */
    public static function trouverParId($id) {
        $stmt = self::$pdo->prepare("SELECT * FROM Modele WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère tous les modèles d'une marque donnée
     *
     * @param int $marque_id Identifiant de la marque
     * @return array Liste des modèles de cette marque
     */
    public static function trouverParMarqueId($marque_id) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Modele
            WHERE marque_id = :marque_id
            ORDER BY nom
        ");
        $stmt->execute(['marque_id' => $marque_id]);
        return $stmt->fetchAll();
}

    /**
     * Récupère un modèle existant ou en crée un nouveau si inexistant
     *
     * Recherche le modèle par son nom et sa marque associée,
     * et le crée s'il n'existe pas
     *
     * @param string $nom Nom du modèle recherché ou à créer
     * @param int $marque_id ID de la marque associée au modèle
     * @return array Tableau associatif contenant les données du modèle
     */
    public static function trouverOuCreer($nom, $marque_id) {
        $pdo = self::$pdo;
        $stmt = $pdo->prepare("
            SELECT *
            FROM Modele
            WHERE nom = ?
            AND marque_id = ?
        ");
        $stmt->execute([$nom, $marque_id]);
        $modele = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$modele) {
            $stmt = $pdo->prepare("
                INSERT
                INTO Modele (nom, marque_id)
                VALUES (?, ?)
            ");
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