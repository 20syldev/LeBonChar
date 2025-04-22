<?php
require_once '../config/database.php';

class Image {
    public static function toutesParVoiture($voiture_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Image WHERE voiture_id = ?");
        $stmt->execute([$voiture_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ajouter($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Image (url, type, voiture_id) VALUES (?, ?, ?)");
        $stmt->execute([$data['url'], $data['type'], $data['voiture_id']]);
    }
}