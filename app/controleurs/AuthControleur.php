<?php
require_once '../app/modeles/Utilisateur.php';

class AuthControleur {
    public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                Utilisateur::creer($_POST);
                header('Location: /connexion');
            } catch (Exception $e) {
                echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
                require_once '../app/vues/utilisateur/inscription.php';
            }
        } else {
            require_once '../app/vues/utilisateur/inscription.php';
        }
    }

    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $utilisateur = Utilisateur::trouverParEmail($_POST['email']);
            if ($utilisateur && password_verify($_POST['mot_de_passe'], $utilisateur['mot_de_passe'])) {
                $_SESSION['utilisateur_id'] = $utilisateur['id'];
                header('Location: /');
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            require_once '../app/vues/utilisateur/connexion.php';
        }
    }

    public function deconnexion() {
        session_destroy();
        header('Location: /');
        exit();
    }
}