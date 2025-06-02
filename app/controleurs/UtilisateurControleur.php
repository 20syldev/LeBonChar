<?php
require_once '../app/modeles/Utilisateur.php';
require_once '../app/modeles/Image.php';

/**
 * Contrôleur gérant les actions liées aux utilisateurs
 *
 * Ce contrôleur gère l'affichage et la modification des informations de compte,
 * le changement de mot de passe et la gestion des photos de profil
 */
class UtilisateurControleur {
    /**
     * Affiche la page de compte utilisateur
     *
     * Récupère les informations de l'utilisateur connecté et affiche sa page de profil
     * Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion
     *
     * @return void
     */
    public function compte() {
        $id = $_SESSION['utilisateur_id'] ?? null;
        if ($id) {
            $utilisateur = Utilisateur::trouverParId($id);
            $annonces = Annonce::toutesParVendeur($id);
            $panier = Annonce::toutesParAcheteur($id);

            $images = [];
            foreach ($annonces as $annonce) {
                $images[$annonce['id']] = Image::toutesParVoiture($annonce['voiture_id']);
            }

            require_once '../app/vues/utilisateur/compte.php';
        } else {
            header('Location: /connexion');
        }
    }

    /**
     * Gère la modification des informations du profil utilisateur
     *
     * Si la méthode est POST, traite les données soumises et met à jour le profil
     * Sinon, affiche le formulaire de modification
     *
     * @return void
     */
    public function modifier() {
        $id = $_SESSION['utilisateur_id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            Utilisateur::modifier($id, $_POST);
            header('Location: /compte');
        } elseif ($id) {
            $utilisateur = Utilisateur::trouverParId($id);
            require_once '../app/vues/utilisateur/modifier.php';
        } else {
            header('Location: /connexion');
        }
    }

    /**
     * Gère la modification du mot de passe utilisateur
     *
     * Vérifie que l'ancien mot de passe est correct puis applique diverses validations
     * sur le nouveau mot de passe avant de l'enregistrer
     *
     * @return void
     */
    public function modifierMotDePasse() {
        $id = $_SESSION['utilisateur_id'] ?? null;
        if (!$id) {
            header('Location: /connexion');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mot_de_passe_actuel = $_POST['mot_de_passe_actuel'] ?? '';
            $nouveau_mot_de_passe = $_POST['nouveau_mot_de_passe'] ?? '';
            $confirmer_mot_de_passe = $_POST['confirmer_mot_de_passe'] ?? '';

            $utilisateur = Utilisateur::trouverParId($id);

            // Validation
            if (!password_verify($mot_de_passe_actuel, $utilisateur['mot_de_passe'])) {
                $_SESSION['erreur'] = 'Le mot de passe actuel est incorrect.';
                header('Location: /mot-de-passe');
                exit;
            }

            if ($nouveau_mot_de_passe !== $confirmer_mot_de_passe) {
                $_SESSION['erreur'] = 'Les nouveaux mots de passe ne correspondent pas.';
                header('Location: /mot-de-passe');
                exit;
            }

            if (strlen($nouveau_mot_de_passe) < 8) {
                $_SESSION['erreur'] = 'Le mot de passe doit contenir au moins 8 caractères.';
                header('Location: /mot-de-passe');
                exit;
            }

            if (!preg_match('/[A-Z]/', $nouveau_mot_de_passe) ||
                !preg_match('/[a-z]/', $nouveau_mot_de_passe) ||
                !preg_match('/[0-9]/', $nouveau_mot_de_passe) ||
                !preg_match('/[\W_]/', $nouveau_mot_de_passe)) {
                $_SESSION['erreur'] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.';
                header('Location: /mot-de-passe');
                exit;
            }

            try {
                Utilisateur::modifierMotDePasse($id, $nouveau_mot_de_passe);
                $_SESSION['message'] = 'Votre mot de passe a été modifié avec succès.';
                header('Location: /compte');
                exit;
            } catch (Exception $e) {
                $_SESSION['erreur'] = 'Une erreur est survenue lors de la modification du mot de passe: ' . $e->getMessage();
                header('Location: /mot-de-passe');
                exit;
            }
        } else {
            $utilisateur = Utilisateur::trouverParId($id);
            require_once '../app/vues/utilisateur/mot-de-passe.php';
        }
    }

    /**
     * Gère le téléchargement et la modification de la photo de profil
     *
     * Vérifie le fichier téléchargé, traite l'image et l'associe au profil de l'utilisateur
     *
     * @return void
     */
    public function modifierPhotoProfil() {
        $id = $_SESSION['utilisateur_id'] ?? null;
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/compte';

        if (!$id) {
            $_SESSION['erreur'] = 'Vous devez être connecté pour modifier votre photo de profil.';
            header('Location: /connexion');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['photo_profil'])) {
            $_SESSION['erreur'] = 'Aucune photo sélectionnée.';
            header('Location: ' . $redirect);
            exit;
        }

        // Vérification de l'erreur d'upload
        if ($_FILES['photo_profil']['error'] !== UPLOAD_ERR_OK) {
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => "La taille du fichier dépasse la limite autorisée par le serveur.",
                UPLOAD_ERR_FORM_SIZE => "La taille du fichier dépasse la limite autorisée par le formulaire.",
                UPLOAD_ERR_PARTIAL => "Le fichier n'a été que partiellement téléchargé.",
                UPLOAD_ERR_NO_FILE => "Aucun fichier n'a été téléchargé.",
                UPLOAD_ERR_NO_TMP_DIR => "Dossier temporaire manquant.",
                UPLOAD_ERR_CANT_WRITE => "Échec d'écriture du fichier sur le disque.",
                UPLOAD_ERR_EXTENSION => "Téléchargement arrêté par extension.",
            ];

            $errorMessage = $errorMessages[$_FILES['photo_profil']['error']] ?? 'Erreur inconnue lors du téléchargement.';
            $_SESSION['erreur'] = $errorMessage;
            header('Location: ' . $redirect);
            exit;
        }

        try {
            $utilisateur = Utilisateur::trouverParId($id);
            $prenom = $utilisateur['prenom'] ?? '';
            $nom = $utilisateur['nom'] ?? '';

            $photo = Image::ajouterPhotoProfil($_FILES['photo_profil'], $id, $prenom, $nom);
            $_SESSION['message'] = 'Votre photo de profil a été modifiée avec succès.';
            header('Location: /compte');
            exit;
        } catch (Exception $e) {
            $_SESSION['erreur'] = 'Erreur lors de la modification de la photo de profil : ' . $e->getMessage();
            header('Location: ' . $redirect);
            exit;
        }
    }
}