<?php

class Image {
    private static $pdo;

    // Connexion base de données
    public static function init() {
        self::$pdo = Database::getPdo();
    }

    // - - - - - - - - - - Récupération des images - - - - - - - - - - //

    // Récupérer une image par son ID
    public static function trouverParId($voiture_id) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Image
            WHERE id = ?
        ");
        $stmt->execute([$voiture_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les images d'une voiture
    public static function toutesParVoiture($voiture_id) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Image
            WHERE voiture_id = ?
        ");
        $stmt->execute([$voiture_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer la photo de profil d'un utilisateur
    public static function trouverPhotoProfil($utilisateur_id) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Image
            WHERE utilisateur_id = ?
            AND voiture_id IS NULL
            LIMIT 1
        ");
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // - - - - - - - - - - Ajout d'une image - - - - - - - - - - //

    // Ajouter une photo de profil
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
            $stmt = self::$pdo->prepare("
                DELETE
                FROM Image
                WHERE utilisateur_id = ?
                AND voiture_id IS NULL
            ");
            $stmt->execute([$utilisateur_id]);

            $stmt = self::$pdo->prepare("
                INSERT
                INTO Image (url, type, utilisateur_id)
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$fileName, $fileExtension, $utilisateur_id]);
            return $fileName;
        }

        throw new Exception("Erreur lors de l'upload de l'image.");
    }

    // Ajouter entre 1 et 3 images à une voiture
    public static function ajouterImageVoiture($file, $voiture_id) {
        $targetDir = '../public/images/';
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'png', 'webp'];

        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Type de fichier non supporté. Types autorisés : jpg, png, webp.");
        }

        $fileName = bin2hex(random_bytes(10)) . '.' . $fileExtension;
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $stmt = self::$pdo->prepare("
                SELECT COUNT(*)
                FROM Image
                WHERE voiture_id = ?
            ");
            $stmt->execute([$voiture_id]);
            if ($stmt->fetchColumn() >= 3) {
                throw new Exception("Vous ne pouvez pas ajouter plus de 3 images pour cette voiture.");
            }

            $stmt = self::$pdo->prepare("
                INSERT
                INTO Image (url, type, voiture_id)
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$fileName, $fileExtension, $voiture_id]);
            return $fileName;
        }
        throw new Exception("Erreur lors de l'upload de l'image.");
    }

    // - - - - - - - - - - Gestion des images de voiture - - - - - - - - - - //

    // Modifier une image de voiture
    public static function modifierImageVoiture($image_id, $file) {
        $targetDir = '../public/images/';
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'png', 'webp'];

        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Type de fichier non supporté. Types autorisés : jpg, png, webp.");
        }

        $stmt = self::$pdo->prepare("
            SELECT url
            FROM Image
            WHERE id = ?
        ");
        $stmt->execute([$image_id]);
        $oldImage = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$oldImage) throw new Exception("Image introuvable.");

        $fileName = bin2hex(random_bytes(10)) . '.' . $fileExtension;
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            if ($oldImage['url'] && file_exists($targetDir . $oldImage['url'])) {
                unlink($targetDir . $oldImage['url']);
            }
            $stmt = self::$pdo->prepare("
                UPDATE Image
                SET url = ?, type = ?
                WHERE id = ?
            ");
            $stmt->execute([$fileName, $fileExtension, $image_id]);
            return $fileName;
        }

        throw new Exception("Erreur lors de l'upload de l'image.");
    }

    // Supprimer une image de voiture
    public static function supprimerImageVoiture($voiture_id) {
        $stmt = self::$pdo->prepare("
            DELETE
            FROM Image
            WHERE id = ?
        ");
        $stmt->execute([$voiture_id]);
    }
}