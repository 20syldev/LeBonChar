<?php

/**
 * Modèle représentant les véhicules mis en vente
 *
 * Cette classe gère toutes les opérations liées aux véhicules :
 * création, modification, suppression et récupération des données
 */
class Voiture {
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
     * Récupère les données d'une voiture à partir de l'ID de son annonce
     *
     * @param int $annonce_id ID de l'annonce associée à la voiture
     * @return array|false Tableau associatif contenant les données de la voiture ou false si non trouvée
     */
    public static function trouverParAnnonceId($annonce_id) {
        $stmt = self::$pdo->prepare("
            SELECT v.*
            FROM Voiture v
            JOIN Annonce a ON v.id = a.voiture_id
            WHERE a.id = ?
        ");
        $stmt->execute([$annonce_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crée une nouvelle voiture
     *
     * Enregistre toutes les caractéristiques techniques du véhicule
     *
     * @param array $data Données de la nouvelle voiture
     * @return string ID de la voiture créée
     */
    public static function creer($data) {
        $pdo = self::$pdo;
        $stmt = $pdo->prepare("
            INSERT
            INTO Voiture (marque_id, modele_id, prix, type, energie, kilometrage, provenance, annee, mise_en_circulation, premiere_main, nombre_portes, nombre_places, couleur, sellerie, consommation, categorie)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['marque_id'],
            $data['modele_id'],
            $data['prix'],
            $data['type'],
            $data['energie'],
            $data['kilometrage'],
            $data['provenance'],
            $data['annee'],
            $data['mise_en_circulation'],
            $data['premiere_main'],
            $data['nombre_portes'],
            $data['nombre_places'],
            $data['couleur'],
            $data['sellerie'],
            $data['consommation'],
            $data['categorie']
        ]);
        return $pdo->lastInsertId();
    }

    /**
     * Modifie les données d'une voiture à partir de l'ID de son annonce
     *
     * @param int $annonce_id ID de l'annonce associée à la voiture
     * @param array $data Nouvelles données de la voiture
     * @return void
     */
    public static function modifierParAnnonceId($annonce_id, $data) {
        $stmt = self::$pdo->prepare("
            SELECT voiture_id
            FROM Annonce
            WHERE id = ?
        ");
        $stmt->execute([$annonce_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) return false;

        $voiture_id = $result['voiture_id'];

        $validFields = [
            'prix', 'type', 'energie', 'kilometrage', 'provenance',
            'annee', 'mise_en_circulation', 'premiere_main',
            'nombre_portes', 'nombre_places', 'couleur', 'sellerie',
            'consommation', 'categorie', 'marque_id', 'modele_id'
        ];

        $fields = [];
        $params = [];

        foreach ($data as $field => $value) {
            if (in_array($field, $validFields) && $value !== null) {
                $fields[] = "$field = ?";
                $params[] = $value;
            }
        }

        if (empty($fields)) return false;

        $params[] = $voiture_id;

        $stmt = self::$pdo->prepare("
            UPDATE Voiture
            SET " . implode(", ", $fields) . "
            WHERE id = ?
        ");

        return $stmt->execute($params);
    }
}