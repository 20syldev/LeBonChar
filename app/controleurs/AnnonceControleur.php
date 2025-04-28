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
        if ($id) {
            $annonce = Annonce::trouverParId($id);
            if ($annonce['statut'] === 'archive') {
                echo "Erreur : Vous ne pouvez pas modifier une annonce archivée.";
                return;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            Annonce::modifier($id, $_POST);

            Voiture::modifierParAnnonceId($id, [
                'prix' => $_POST['prix'],
                'annee' => $_POST['annee'],
                'kilometrage' => $_POST['kilometrage'],
                'categorie' => $_POST['categorie'],
                'couleur' => $_POST['couleur']
            ]);

            header('Location: /');
        } elseif ($id) {
            $voiture = Voiture::trouverParAnnonceId($id);
            require_once '../app/vues/annonce/modifier.php';
        } else {
            echo "Annonce introuvable.";
        }
    }

    public function archiver() {
        $id = $_GET['id'] ?? null;
        $action = $_GET['action'] ?? 'archiver';

        if ($id) {
            $nouvStatut = $action === 'desarchiver' ? 'active' : 'archive';
            Annonce::changerStatut($id, $nouvStatut);

            $redirect = $_SERVER['HTTP_REFERER'] ?? '/';
            header("Location: $redirect");
        } else {
            echo "Erreur : ID d'annonce manquant.";
        }
    }

    public function ajouterAuPanier() {
        $acheteur_id = $_SESSION['utilisateur_id'] ?? null;
        $annonce_id = $_GET['id'] ?? null;
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/compte';

        if ($acheteur_id && $annonce_id) {
            try {
                Annonce::ajouterAuPanier($annonce_id, $acheteur_id);
                header("Location: $redirect");
            } catch (Exception $e) {
                echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
            }
        } else {
            echo "Erreur : impossible d'ajouter au panier.";
        }
    }

    public function supprimerDuPanier() {
        $acheteur_id = $_SESSION['utilisateur_id'] ?? null;
        $annonce_id = $_GET['id'] ?? null;
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/compte';

        if ($acheteur_id && $annonce_id) {
            try {
                $annonce = Annonce::trouverParId($annonce_id);
                if ($annonce['acheteur_id'] === $acheteur_id) {
                    Annonce::supprimerDuPanier($annonce_id);
                    header("Location: $redirect");
                    exit();
                } else {
                    echo "Erreur : Vous ne pouvez pas supprimer une réservation qui ne vous appartient pas.";
                }
            } catch (Exception $e) {
                echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
            }
        } else {
            echo "Erreur : impossible de supprimer du panier.";
        }
    }
}