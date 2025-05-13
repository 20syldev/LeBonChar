<?php
require_once '../app/modeles/Utilisateur.php';
require_once '../app/modeles/Image.php';

class UtilisateurControleur {
    public function compte() {
        $id = $_SESSION['utilisateur_id'] ?? null;
        if ($id) {
            $utilisateur = Utilisateur::trouverParId($id);
            require_once '../app/vues/utilisateur/compte.php';
        } else {
            header('Location: /connexion');
        }
    }

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

    public function modifierPhotoProfil() {
        $id = $_SESSION['utilisateur_id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id && isset($_FILES['photo_profil'])) {
            try {
                $utilisateur = Utilisateur::trouverParId($id);
                $prenom = $utilisateur['prenom'] ?? '';
                $nom = $utilisateur['nom'] ?? '';

                $photo = Image::ajouterPhotoProfil($_FILES['photo_profil'], $id, $prenom, $nom);
                header('Location: /compte');
            } catch (Exception $e) {
                echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
            }
        } else {
            header('Location: /compte');
        }
    }
}