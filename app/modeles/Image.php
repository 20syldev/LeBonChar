<?php
require_once '../config/database.php';

class Image {
    public static function toutesParVoiture($voiture_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Image WHERE voiture_id = ?");
        $stmt->execute([$voiture_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function trouverPhotoProfil($utilisateur_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Image WHERE utilisateur_id = ? AND voiture_id IS NULL LIMIT 1");
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function ajouter($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Image (url, type, utilisateur_id, voiture_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['url'], $data['type'], $data['utilisateur_id'], $data['voiture_id']]);
    }

    public static function ajouterPhotoProfil($file, $utilisateur_id, $prenom, $nom) {
        $targetDir = '../public/images/';
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'png', 'webp'];

        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Type de fichier non supporté. Types autorisés : jpg, png, webp.");
        }

        $fileName = $utilisateur_id . '-' . strtolower(substr($prenom, 0, 1)) . strtolower($nom) . '.' . $fileExtension;
        $targetFile = $targetDir . $fileName;

        if (file_exists($targetFile)) unlink($targetFile);

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            global $pdo;

            $stmt = $pdo->prepare("DELETE FROM Image WHERE utilisateur_id = ? AND voiture_id IS NULL");
            $stmt->execute([$utilisateur_id]);

            $stmt = $pdo->prepare("INSERT INTO Image (url, type, utilisateur_id) VALUES (?, ?, ?)");
            $stmt->execute([$fileName, $fileExtension, $utilisateur_id]);
            return $fileName;
        }

        throw new Exception("Erreur lors de l'upload de l'image.");
    }

    public static function ajouterImageVoiture($file, $voiture_id) {
        $targetDir = '../public/images/';
        $fileName = uniqid() . '_' . basename($file['name']);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            global $pdo;

            $stmt = $pdo->prepare("SELECT COUNT(*) FROM Image WHERE voiture_id = ?");
            $stmt->execute([$voiture_id]);
            if ($stmt->fetchColumn() >= 3) {
                throw new Exception("Vous ne pouvez pas ajouter plus de 3 images pour cette voiture.");
            }

            $stmt = $pdo->prepare("INSERT INTO Image (url, type, voiture_id) VALUES (?, ?, ?)");
            $stmt->execute([$fileName, $file['type'], $voiture_id]);
            return $fileName;
        }
        throw new Exception("Erreur lors de l'upload de l'image.");
    }
}