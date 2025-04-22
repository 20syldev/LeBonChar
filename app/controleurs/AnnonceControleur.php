<?php
require_once '../app/modeles/Annonce.php';
require_once '../app/modeles/Marque.php';
require_once '../app/modeles/Modele.php';
require_once '../app/modeles/Voiture.php';

class AnnonceControleur {
    public function accueil() {
        $annonces = Annonce::toutes();
        require_once '../app/vues/annonce/accueil.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $annonce = Annonce::trouverParId($id);
            require_once '../app/vues/annonce/detail.php';
        } else {
            echo "Annonce introuvable.";
        }
    }

    public function vendre() {
        if (!isset($_SESSION['utilisateur_id'])) {
            header('Location: /connexion');
            exit();
        }

        $utilisateur_id = $_SESSION['utilisateur_id'];
        $annonces = Annonce::toutesParVendeur($utilisateur_id);
        require_once '../app/vues/annonce/vendre.php';
    }

    public function nouveau() {
        if (!isset($_SESSION['utilisateur_id'])) die("Erreur : Vous devez être connecté pour créer une annonce.");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marque_id = $_POST['marque_id'] ?? null;
            $nouvelle_marque = trim($_POST['nouvelle_marque'] ?? '');
            $modele = trim($_POST['modele'] ?? '');

            if (!empty($nouvelle_marque)) {
                $marque = Marque::trouverOuCreer($nouvelle_marque);
                $marque_id = $marque['id'];
            }

            if (!$marque_id) die("Erreur : Vous devez sélectionner ou saisir une marque.");
            if (empty($modele)) die("Erreur : Vous devez saisir un modèle.");

            $modele = Modele::trouverOuCreer($modele, $marque_id);

            $_POST['marque_id'] = $marque_id;
            $_POST['modele_id'] = $modele['id'];
            $_POST['utilisateur_id'] = $_SESSION['utilisateur_id'];
            Annonce::creer($_POST);

            header('Location: /');
        } else {
            require_once '../app/vues/annonce/nouveau.php';
        }
    }

    public function modifier() {
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            // Met à jour l'annonce
            Annonce::modifier($id, $_POST);

            // Met à jour la voiture associée
            Voiture::modifierParAnnonceId($id, [
                'prix' => $_POST['prix'],
                'annee' => $_POST['annee'],
                'kilometrage' => $_POST['kilometrage'],
                'categorie' => $_POST['categorie'],
                'couleur' => $_POST['couleur']
            ]);

            header('Location: /');
        } elseif ($id) {
            // Charge l'annonce et la voiture associée pour modification
            $annonce = Annonce::trouverParId($id);
            $voiture = Voiture::trouverParAnnonceId($id);
            require_once '../app/vues/annonce/modifier.php';
        } else {
            echo "Annonce introuvable.";
        }
    }

    public function archiver() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            global $pdo;
            $stmt = $pdo->prepare("UPDATE Annonce SET statut = 'archived' WHERE id = ?");
            $stmt->execute([$id]);
            header('Location: /');
        } else {
            echo "Erreur : ID d'annonce manquant.";
        }
    }

    public function ajouterAuPanier() {
        $acheteur_id = $_SESSION['utilisateur_id'] ?? null;
        $annonce_id = $_GET['id'] ?? null;

        if ($acheteur_id && $annonce_id) {
            Annonce::ajouterAuPanier($annonce_id, $acheteur_id);
            header('Location: /compte');
        } else {
            echo "Erreur : impossible d'ajouter au panier.";
        }
    }
}