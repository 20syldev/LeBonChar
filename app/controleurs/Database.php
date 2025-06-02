<?php

/**
 * Classe de gestion de la connexion à la base de données
 *
 * Établit et maintient une connexion PDO unique à la base de données MySQL
 * en utilisant le pattern Singleton
 */
class Database {
    private $host = 'localhost';
    private $dbname = 'lebonchar';
    private $username = 'root';
    private $password = 'password';
    private static $pdo;

    /**
     * Établit une connexion à la base de données si elle n'existe pas déjà
     *
     * Crée une nouvelle instance PDO avec les paramètres de connexion
     * et configure les options de PDO pour la gestion des erreurs
     *
     * @return PDO L'instance de connexion à la base de données
     * @throws PDOException Si la connexion échoue
     */
    public static function connexion() {
        if (self::$pdo === null) {
            $host = 'localhost';
            $dbname = 'lebonchar';
            $username = 'root';
            $password = 'password';
            try {
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                self::$pdo = new PDO($dsn, $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }

    /**
     * Récupère l'instance PDO existante
     *
     * Fournit un accès à l'instance PDO partagée pour exécuter des requêtes
     *
     * @return PDO|null L'instance de connexion à la base de données ou null si non initialisée
     */
    public static function getPdo() {
        return self::$pdo;
    }
}
