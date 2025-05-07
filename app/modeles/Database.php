<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'lebonchar';
    private $username = 'root';
    private $password = 'password';
    private static $pdo;

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
}
