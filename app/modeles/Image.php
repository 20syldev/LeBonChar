<?php

/**
 * Modèle représentant les images (voitures et profils utilisateurs)
 *
 * Cette classe gère toutes les opérations liées aux images :
 * téléchargement, modification, suppression et récupération
 */
class Image {
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
     * Récupère toutes les images d'une voiture
     *
     * @param int $voiture_id ID de la voiture dont on veut récupérer les images
     * @return array Tableau associatif contenant toutes les images de la voiture
     */
    public static function toutesParVoiture($voiture_id) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Image
            WHERE voiture_id = ?
        ");
        $stmt->execute([$voiture_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une image par son ID
     *
     * @param int $image_id ID de l'image à récupérer
     * @return array|false Tableau associatif contenant l'image ou false si non trouvée
     */
    public static function trouverParId($image_id) {
        $stmt = self::$pdo->prepare("
            SELECT *
            FROM Image
            WHERE id = ?
        ");
        $stmt->execute([$image_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère la photo de profil d'un utilisateur
     *
     * @param int $utilisateur_id ID de l'utilisateur dont on veut récupérer la photo
     * @return array|false Tableau associatif contenant la photo de profil ou false si non trouvée
     */
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

    /**
     * Ajoute ou met à jour la photo de profil d'un utilisateur
     *
     * Supprime l'ancienne photo si elle existe, puis télécharge et enregistre la nouvelle
     *
     * @param array $file Tableau contenant les informations sur le fichier téléchargé
     * @param int $utilisateur_id ID de l'utilisateur concerné
     * @param string $prenom Prénom de l'utilisateur (pour nommer le fichier)
     * @param string $nom Nom de l'utilisateur (pour nommer le fichier)
     * @throws Exception Si le type de fichier n'est pas supporté ou si l'upload échoue
     * @return string Nom du fichier image créé
     */
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

    /**
     * Ajoute une image à une voiture
     *
     * Vérifie que le nombre maximum d'images n'est pas dépassé (3 par voiture)
     *
     * @param array $file Tableau contenant les informations sur le fichier téléchargé
     * @param int $voiture_id ID de la voiture à laquelle ajouter l'image
     * @throws Exception Si le type de fichier n'est pas supporté, si le nombre max d'images est atteint ou si l'upload échoue
     * @return string Nom du fichier image créé
     */
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

    /**
     * Modifie une image de voiture existante
     *
     * Supprime l'ancienne image et la remplace par la nouvelle
     *
     * @param int $image_id ID de l'image à modifier
     * @param array $file Tableau contenant les informations sur le nouveau fichier
     * @throws Exception Si le type de fichier n'est pas supporté, si l'image n'existe pas ou si l'upload échoue
     * @return string Nom du nouveau fichier image
     */
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

    /**
     * Supprime une image de voiture
     *
     * Supprime l'entrée de la base de données (le fichier physique est géré séparément)
     *
     * @param int $image_id ID de l'image à supprimer
     * @return void
     */
    public static function supprimerImageVoiture($image_id) {
        $stmt = self::$pdo->prepare("
            DELETE
            FROM Image
            WHERE id = ?
        ");
        $stmt->execute([$image_id]);
    }
}