<?php

/**
 * Classe de gestion de la connexion à la base de données
 *
 * Établit et maintient une connexion PDO unique à la base de données MySQL
 * en utilisant le pattern Singleton
 */
class Database {
    private static $pdo;

    /**
     * Initialise les variables d'environnement depuis le fichier .env
     */
    public static function init() {
        foreach (@file(__DIR__ . '/../../.env') ?: [] as $l) {
            if ($l[0] !== '#' && str_contains($l, '=')) putenv(trim($l));
        }
    }

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
        self::init();

        if (self::$pdo === null) {
            if (getenv('PRODUCTION') === 'true') {
                $host = getenv('DB_HOST');
                $dbname = getenv('DB_NAME');
                $username = getenv('DB_USER');
                $password = getenv('DB_PASSWORD');
                $port = getenv('DB_PORT');
            } else {
                $host = 'localhost';
                $dbname = 'lebonchar';
                $username = 'root';
                $password = 'password';
                $port = '3306';
            }

            try {
                $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
                self::$pdo = new PDO($dsn, $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $_SESSION['erreur'] = "Erreur de connexion à la base de données";
                error_log("Erreur PDO : " . $e->getMessage());
                header('Location: /erreur');
                exit;
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
