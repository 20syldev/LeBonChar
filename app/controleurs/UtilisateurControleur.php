<?php
require_once '../app/modeles/Utilisateur.php';

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
}