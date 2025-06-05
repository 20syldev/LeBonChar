<?php

require_once '../app/modeles/Utilisateur.php';

/**
 * Contrôleur gérant l'authentification des utilisateurs
 *
 * Ce contrôleur gère l'inscription, la connexion et la déconnexion des utilisateurs
 */
class AuthControleur {
    /**
     * Gère l'inscription d'un nouvel utilisateur
     *
     * Si la méthode est POST, valide et traite les données du formulaire d'inscription
     * Sinon, affiche le formulaire d'inscription
     *
     * @return void
     */
    public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Validation des données
                if (empty($_POST['email']) || empty($_POST['mot_de_passe']) || empty($_POST['nom']) || empty($_POST['prenom'])) {
                    $_SESSION['erreur'] = 'Tous les champs obligatoires doivent être remplis.';
                    require_once '../app/vues/utilisateur/inscription.php';
                    return;
                }

                Utilisateur::creer($_POST);
                $_SESSION['message'] = 'Compte créé avec succès. Vous pouvez maintenant vous connecter.';
                header('Location: /connexion');
                exit;
            } catch (Exception $e) {
                $_SESSION['erreur'] = $e->getMessage();
                require_once '../app/vues/utilisateur/inscription.php';
            }
        } else {
            require_once '../app/vues/utilisateur/inscription.php';
        }
    }

    /**
     * Gère la connexion d'un utilisateur
     *
     * Si la méthode est POST, vérifie les identifiants fournis et connecte l'utilisateur
     * Sinon, affiche le formulaire de connexion
     *
     * @return void
     */
    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $mot_de_passe = $_POST['mot_de_passe'] ?? '';

            if (empty($email) || empty($mot_de_passe)) {
                $_SESSION['erreur'] = 'Veuillez saisir votre email et votre mot de passe.';
                header('Location: /connexion');
                exit;
            }

            $utilisateur = Utilisateur::trouverParEmail($email);

            if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
                $_SESSION['utilisateur_id'] = $utilisateur['id'];
                $_SESSION['message'] = 'Connexion réussie. Bienvenue ' . $utilisateur['prenom'] . ' !';
                header('Location: /');
                exit;
            } else {
                $_SESSION['erreur'] = 'Identifiants incorrects. Veuillez réessayer.';
                header('Location: /connexion?email=' . urlencode($email));
                exit;
            }
        } else {
            require_once '../app/vues/utilisateur/connexion.php';
        }
    }

    /**
     * Déconnecte l'utilisateur actuellement connecté
     *
     * Détruit la session et redirige vers la page d'accueil
     *
     * @return void
     */
    public function deconnexion() {
        session_destroy();
        header('Location: /');
        exit();
    }

    /**
     * Affiche la page d'erreur
     */
    public function erreur() {
        $message = $_SESSION['erreur'] ?? null;
        error_log('Erreur : ' . $message);
        require_once '../app/vues/composants/erreur.php';
        unset($_SESSION['erreur']);
    }
}