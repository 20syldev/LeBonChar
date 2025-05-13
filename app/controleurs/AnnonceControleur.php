<?php
require_once '../app/modeles/Annonce.php';
require_once '../app/modeles/Marque.php';
require_once '../app/modeles/Modele.php';
require_once '../app/modeles/Voiture.php';
require_once '../app/modeles/Image.php';

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

            if (!empty($_POST['annee']) && strlen($_POST['annee']) === 4) {
                $_POST['annee'] = $_POST['annee'] . '-01-01';
            }

            Annonce::creer($_POST);

            $voiture_id = Voiture::creer([
                'marque_id' => $marque_id,
                'modele_id' => $modele['id'],
                'prix' => $_POST['prix'],
                'type' => $_POST['type'],
                'energie' => $_POST['energie'],
                'kilometrage' => $_POST['kilometrage'],
                'provenance' => $_POST['provenance'],
                'annee' => $_POST['annee'],
                'mise_en_circulation' => $_POST['mise_en_circulation'],
                'premiere_main' => $_POST['premiere_main'],
                'nombre_portes' => $_POST['nombre_portes'],
                'nombre_places' => $_POST['nombre_places'],
                'couleur' => $_POST['couleur'],
                'sellerie' => $_POST['sellerie'],
                'consommation' => $_POST['consommation'],
                'categorie' => $_POST['categorie']
            ]);

            if (isset($_FILES['image_voiture']) && $_FILES['image_voiture']['error'] === UPLOAD_ERR_OK) {
                try {
                    Image::ajouterImageVoiture($_FILES['image_voiture'], $voiture_id);
                } catch (Exception $e) {
                    echo "<p style='color: red;'>Erreur image : " . $e->getMessage() . "</p>";
                }
            }

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
            if (!empty($_POST['annee']) && strlen($_POST['annee']) === 4) {
                $_POST['annee'] = $_POST['annee'] . '-01-01';
            }

            Annonce::modifier($id, $_POST);

            Voiture::modifierParAnnonceId($id, [
                'prix' => $_POST['prix'],
                'type' => $_POST['type'],
                'energie' => $_POST['energie'],
                'kilometrage' => $_POST['kilometrage'],
                'provenance' => $_POST['provenance'],
                'annee' => $_POST['annee'],
                'mise_en_circulation' => $_POST['mise_en_circulation'],
                'premiere_main' => $_POST['premiere_main'],
                'nombre_portes' => $_POST['nombre_portes'],
                'nombre_places' => $_POST['nombre_places'],
                'couleur' => $_POST['couleur'],
                'sellerie' => $_POST['sellerie'],
                'consommation' => $_POST['consommation'],
                'categorie' => $_POST['categorie']
            ]);

            $voiture = Voiture::trouverParAnnonceId($id);
            $voiture_id = $voiture['id'] ?? null;

            if ($voiture_id && isset($_FILES['image_voiture']) && !empty($_FILES['image_voiture']['name'][0])) {
                $nbImagesExistantes = count(Image::toutesParVoiture($voiture_id));
                $nbFichiers = count($_FILES['image_voiture']['name']);
                try {
                    if ($nbImagesExistantes + $nbFichiers > 3) {
                        throw new Exception("Vous ne pouvez pas avoir plus de 3 images au total.");
                    }
                    for ($i = 0; $i < $nbFichiers; $i++) {
                        if ($_FILES['image_voiture']['error'][$i] === UPLOAD_ERR_OK) {
                            $file = [
                                'name' => $_FILES['image_voiture']['name'][$i],
                                'type' => $_FILES['image_voiture']['type'][$i],
                                'tmp_name' => $_FILES['image_voiture']['tmp_name'][$i],
                                'error' => $_FILES['image_voiture']['error'][$i],
                                'size' => $_FILES['image_voiture']['size'][$i]
                            ];
                            Image::ajouterImageVoiture($file, $voiture_id);
                        }
                    }
                } catch (Exception $e) {
                    echo "<p style='color: red;'>Erreur image : " . $e->getMessage() . "</p>";
                }
            }

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