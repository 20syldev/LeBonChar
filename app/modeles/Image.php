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
     * Ajoute une image de voiture
     *
     * @param array $file Tableau contenant les informations sur le fichier téléchargé
     * @param int $voiture_id ID de la voiture à laquelle associer l'image
     * @throws Exception Si le type de fichier n'est pas supporté ou si l'upload échoue
     * @return string Nom du fichier image créé
     */
    public static function ajouterImage($file, $voiture_id) {
        $targetDir = '../public/images/';
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'png', 'webp'];

        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Type de fichier non supporté. Types autorisés : jpg, png, webp.");
        }

        $fileName = bin2hex(random_bytes(10)) . '.' . $fileExtension;
        $targetFile = $targetDir . $fileName;

        // Vérifier si le fichier existe déjà
        if (file_exists($targetFile)) unlink($targetFile);

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            // Vérifier le nombre d'images pour cette voiture
            $stmt = self::$pdo->prepare("
                SELECT COUNT(*)
                FROM Image
                WHERE voiture_id = ?
            ");
            $stmt->execute([$voiture_id]);
            if ($stmt->fetchColumn() >= 3) {
                unlink($targetFile);
                throw new Exception("Vous ne pouvez pas ajouter plus de 3 images pour cette voiture.");
            }

            // Ajouter la nouvelle image de voiture
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
     * Modifie une image existante (voiture ou profil)
     *
     * @param string $type Type d'image ('profil' ou 'voiture')
     * @param array $file Tableau contenant les informations sur le nouveau fichier
     * @param int $id ID de l'image (pour voiture) ou de l'utilisateur (pour profil)
     * @param array $options Options supplémentaires (prénom et nom pour profil)
     * @throws Exception Si le type de fichier n'est pas supporté ou si l'upload échoue
     * @return string Nom du nouveau fichier image
     */
    public static function modifierImage($type, $file, $id, $options = []) {
        $targetDir = '../public/images/';
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'png', 'webp'];

        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception("Type de fichier non supporté. Types autorisés : jpg, png, webp.");
        }

        // Génération du nom de fichier selon le type
        $fileName = '';
        if ($type === 'profil' && isset($options['prenom']) && isset($options['nom'])) {
            $fileName = strtolower(substr($options['prenom'], 0, 1)) . strtolower($options['nom']) . bin2hex(random_bytes(10)) . '.' . $fileExtension;
        } else {
            $fileName = bin2hex(random_bytes(10)) . '.' . $fileExtension;
        }

        $targetFile = $targetDir . $fileName;

        // Récupérer les informations sur l'ancienne image
        if ($type === 'profil') {
            $stmt = self::$pdo->prepare("
                SELECT url
                FROM Image
                WHERE utilisateur_id = ?
                AND voiture_id IS NULL
                LIMIT 1
            ");
            $stmt->execute([$id]);
        } else if ($type === 'voiture') {
            $stmt = self::$pdo->prepare("
                SELECT url
                FROM Image
                WHERE id = ?
            ");
            $stmt->execute([$id]);
        }
        $oldImage = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($type === 'voiture' && !$oldImage) {
            throw new Exception("Image introuvable.");
        }

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            // Supprimer l'ancien fichier physique s'il existe
            if ($oldImage && !empty($oldImage['url']) && $oldImage['url'] !== 'defaut.png' && file_exists($targetDir . $oldImage['url'])) {
                unlink($targetDir . $oldImage['url']);
            }

            if ($type === 'profil') {
                if ($oldImage) {
                    // Mise à jour de la photo de profil existante
                    $stmt = self::$pdo->prepare("
                        UPDATE Image
                        SET url = ?, type = ?
                        WHERE utilisateur_id = ?
                        AND voiture_id IS NULL
                    ");
                    $stmt->execute([$fileName, $fileExtension, $id]);
                } else {
                    // Création d'une nouvelle photo de profil si elle n'existe pas
                    $stmt = self::$pdo->prepare("
                        INSERT
                        INTO Image (url, type, utilisateur_id)
                        VALUES (?, ?, ?)
                    ");
                    $stmt->execute([$fileName, $fileExtension, $id]);
                }
            } else if ($type === 'voiture') {
                // Mise à jour de l'image de voiture
                $stmt = self::$pdo->prepare("
                    UPDATE Image
                    SET url = ?, type = ?
                    WHERE id = ?
                ");
                $stmt->execute([$fileName, $fileExtension, $id]);
            }
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