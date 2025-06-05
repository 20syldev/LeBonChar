<?php

require_once '../app/modeles/Annonce.php';
require_once '../app/modeles/Marque.php';
require_once '../app/modeles/Modele.php';
require_once '../app/modeles/Voiture.php';
require_once '../app/modeles/Image.php';
require_once '../app/modeles/Utilisateur.php';

/**
 * Contrôleur gérant les annonces de véhicules
 *
 * Ce contrôleur gère toutes les opérations liées aux annonces :
 * affichage, création, modification, archivage, gestion des images, etc.
 */
class AnnonceControleur {
    /**
     * Affiche la page d'accueil avec toutes les annonces
     *
     * Récupère toutes les annonces et leurs images associées
     * pour les afficher sur la page d'accueil
     *
     * @return void
     */
    public function accueil() {
        $annonces = Annonce::toutes();
        $images = [];

        if (empty($annonces) && !isset($_SESSION['utilisateur_id'])) header('Location: /connexion');

        foreach ($annonces as $a => $annonce) {
            $voiture = Voiture::trouverParAnnonceId($annonce['id']);
            $images[$annonce['id']] = Image::toutesParVoiture($annonce['voiture_id']);

            if ($voiture) {
                foreach ($voiture as $k => $v) {
                    if ($k !== 'id') $annonces[$a][$k] = $v;
                }

                if (!empty($voiture['marque_id'])) {
                    $marque = Marque::trouverParId($voiture['marque_id']);
                    if ($marque) $annonces[$a]['marque'] = $marque['nom'];
                }

                if (!empty($voiture['modele_id'])) {
                    $modele = Modele::trouverParId($voiture['modele_id']);
                    if ($modele) $annonces[$a]['modele'] = $modele['nom'];
                }
            }
        }

        require_once '../app/vues/annonce/accueil.php';
    }

    /**
     * Affiche le détail d'une annonce spécifique
     *
     * Récupère les détails d'une annonce, sa voiture associée et ses images
     * Incrémente le compteur de vues de l'annonce
     *
     * @return void
     */
    public function detail() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            Annonce::ajouterVue($id);

            $annonce = Annonce::trouverParId($id);
            $voiture = Voiture::trouverParAnnonceId($id);
            $images = Image::toutesParVoiture($annonce['voiture_id']);

            $expiration = null;
            if (!empty($annonce['date_reservation'])) {
                $expiration = Annonce::expirationReservation($annonce['date_reservation']);
            }

            require_once '../app/vues/annonce/detail.php';
        } else {
            header('Location: /');
        }
    }

    /**
     * Affiche les annonces du vendeur connecté
     *
     * Récupère toutes les annonces créées par l'utilisateur connecté
     * et leurs images associées
     *
     * @return void
     */
    public function vendre() {
        $id = $_SESSION['utilisateur_id'] ?? null;
        $statut = $_GET['statut'] ?? 'active';

        $annonces = Annonce::toutesParVendeur($id, $statut);

        $images = [];
        $acheteurs = [];
        $expirations = [];

        foreach ($annonces as $annonce) {
            $images[$annonce['id']] = Image::toutesParVoiture($annonce['voiture_id']);

            if (!empty($annonce['acheteur_id'])) {
                $acheteur = Utilisateur::trouverParId($annonce['acheteur_id']);
                if ($acheteur) $acheteurs[$annonce['acheteur_id']] = $acheteur;

                if (!empty($annonce['date_reservation'])) {
                    $expirations[$annonce['id']] = Annonce::expirationReservation($annonce['date_reservation']);
                }
            }
        }

        require_once '../app/vues/annonce/vendre.php';
    }

    /**
     * Gère la création d'une nouvelle annonce
     *
     * Si la méthode est POST, traite les données soumises et crée l'annonce et la voiture
     * Sinon, affiche le formulaire de création d'annonce
     *
     * @return void
     */
    public function nouveau() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marque_id = $_POST['marque_id'] ?? null;
            $nouvelle_marque = trim($_POST['nouvelle_marque'] ?? '');
            $modele = trim($_POST['modele'] ?? '');

            if (!empty($nouvelle_marque)) {
                $marque = Marque::trouverOuCreer($nouvelle_marque);
                $marque_id = $marque['id'];
            }

            if (!$marque_id) {
                $_SESSION['erreur'] = 'Vous devez sélectionner ou saisir une marque.';
                header('Location: /annonce/nouveau');
                exit;
            }

            if (empty($modele)) {
                $_SESSION['erreur'] = 'Vous devez saisir un modèle.';
                header('Location: /annonce/nouveau');
                exit;
            }

            $modele = Modele::trouverOuCreer($modele, $marque_id);

            $_POST['marque_id'] = $marque_id;
            $_POST['modele_id'] = $modele['id'];
            $_POST['utilisateur_id'] = $_SESSION['utilisateur_id'] ?? null;

            if (!empty($_POST['annee']) && strlen($_POST['annee']) === 4) {
                $_POST['annee'] = $_POST['annee'] . '-01-01';
            }

            try {
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

                $_POST['voiture_id'] = $voiture_id;

                Annonce::creer($_POST);

                $imagesAjoutees = 0;
                $erreursImages = [];

                if ($voiture_id && isset($_FILES['image_voiture']) && !empty($_FILES['image_voiture']['name'][0])) {
                    $nbFichiers = count($_FILES['image_voiture']['name']);
                    for ($i = 0; $i < $nbFichiers; $i++) {
                        if ($_FILES['image_voiture']['error'][$i] === UPLOAD_ERR_OK) {
                            $file = [
                                'name' => $_FILES['image_voiture']['name'][$i],
                                'type' => $_FILES['image_voiture']['type'][$i],
                                'tmp_name' => $_FILES['image_voiture']['tmp_name'][$i],
                                'error' => $_FILES['image_voiture']['error'][$i],
                                'size' => $_FILES['image_voiture']['size'][$i]
                            ];
                            try {
                                Image::ajouterImage($file, $voiture_id);
                                $imagesAjoutees++;
                            } catch (Exception $e) {
                                $erreursImages[] = $e->getMessage();
                            }
                        }
                    }
                }

                $_SESSION['message'] = 'Votre annonce a été créée avec succès.';

                if (!empty($erreursImages)) $_SESSION['erreur'] = 'Problème avec certaines images : ' . implode(', ', $erreursImages);

                header('Location: /vendre');
                exit;
            } catch (Exception $e) {
                $_SESSION['erreur'] = 'Erreur lors de la création de l\'annonce : ' . $e->getMessage();
                header('Location: /annonce/nouveau');
                exit;
            }
        } else {
            $marques = Marque::toutes();
            require_once '../app/vues/annonce/nouveau.php';
        }
    }

    /**
     * Gère la modification d'une annonce existante
     *
     * Si la méthode est POST, traite les données soumises et met à jour l'annonce et la voiture
     * Sinon, affiche le formulaire de modification avec les données actuelles
     *
     * @return void
     */
    public function modifier() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['erreur'] = 'ID d\'annonce manquant.';
            header('Location: /vendre');
            exit;
        }

        $annonce = Annonce::trouverParId($id);
        if (!$annonce) {
            $_SESSION['erreur'] = 'Annonce introuvable.';
            header('Location: /vendre');
            exit;
        }

        if ($annonce['statut'] === 'archive') {
            $_SESSION['erreur'] = 'Vous ne pouvez pas modifier une annonce archivée.';
            header('Location: /vendre');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $marque_id = $_POST['marque_id'] ?? null;
                $nouvelle_marque = trim($_POST['nouvelle_marque'] ?? '');

                if ($marque_id === 'autre' && !empty($nouvelle_marque)) {
                    $marque = Marque::trouverOuCreer($nouvelle_marque);
                    $marque_id = $marque['id'];
                }

                if (!is_numeric($marque_id) || $marque_id === 'autre') {
                    $_SESSION['erreur'] = 'Vous devez sélectionner ou saisir une marque valide.';
                    header('Location: /annonce/modifier?id=' . $id);
                    exit;
                }

                $modele_id = $_POST['modele_id'] ?? null;
                $nouveau_modele = trim($_POST['modele'] ?? '');

                if ($modele_id === 'autre' && !empty($nouveau_modele)) {
                    $modele = Modele::trouverOuCreer($nouveau_modele, $marque_id);
                    $modele_id = $modele['id'];
                }

                if (!is_numeric($modele_id) || $modele_id === 'autre') {
                    $_SESSION['erreur'] = 'Vous devez sélectionner ou saisir un modèle valide.';
                    header('Location: /annonce/modifier?id=' . $id);
                    exit;
                }

                if (!empty($_POST['annee']) && strlen($_POST['annee']) === 4) {
                    $_POST['annee'] = $_POST['annee'] . '-01-01';
                }

                Annonce::modifier($id, $_POST);

                $_POST['marque_id'] = $marque_id;
                $_POST['modele_id'] = $modele_id;

                Voiture::modifierParAnnonceId($id, [
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
                    'categorie' => $_POST['categorie'],
                    'marque_id' => $marque_id,
                    'modele_id' => $modele_id
                ]);

                $voiture = Voiture::trouverParAnnonceId($id);
                $voiture_id = $voiture['id'] ?? null;

                $imagesAjoutees = 0;
                $erreursImages = [];

                if ($voiture_id && isset($_FILES['image_voiture']) && !empty($_FILES['image_voiture']['name'][0])) {
                    $nbFichiers = count($_FILES['image_voiture']['name']);
                    for ($i = 0; $i < $nbFichiers; $i++) {
                        if ($_FILES['image_voiture']['error'][$i] === UPLOAD_ERR_OK) {
                            $file = [
                                'name' => $_FILES['image_voiture']['name'][$i],
                                'type' => $_FILES['image_voiture']['type'][$i],
                                'tmp_name' => $_FILES['image_voiture']['tmp_name'][$i],
                                'error' => $_FILES['image_voiture']['error'][$i],
                                'size' => $_FILES['image_voiture']['size'][$i]
                            ];
                            try {
                                Image::ajouterImage($file, $voiture_id);
                                $imagesAjoutees++;
                            } catch (Exception $e) {
                                $erreursImages[] = $e->getMessage();
                            }
                        }
                    }
                }

                $_SESSION['message'] = 'L\'annonce a été modifiée avec succès.';

                if ($imagesAjoutees > 0) {
                    $_SESSION['message'] .= ' ' . $imagesAjoutees . ' image(s) ajoutée(s).';
                }

                if (!empty($erreursImages)) {
                    $_SESSION['erreur'] = 'Problème avec certaines images : ' . implode(', ', $erreursImages);
                }

                header('Location: /annonce/detail?id=' . $id);
                exit;
            } catch (Exception $e) {
                $_SESSION['erreur'] = 'Erreur lors de la modification de l\'annonce : ' . $e->getMessage();
                header('Location: /annonce/modifier?id=' . $id);
                exit;
            }
        } else {
            $voiture = Voiture::trouverParAnnonceId($id);
            $images = Image::toutesParVoiture($annonce['voiture_id']);
            $marques = Marque::toutes();
            $modeles = Modele::trouverParMarqueId($voiture['marque_id']);

            require_once '../app/vues/annonce/modifier.php';
        }
    }

    /**
     * Gère l'archivage ou le désarchivage d'une annonce
     *
     * Change le statut d'une annonce entre "active" et "archive"
     *
     * @return void
     */
    public function archiver() {
        $id = $_GET['id'] ?? null;
        $action = $_GET['action'] ?? 'archiver';
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/vendre?statut=archive';

        if ($id) {
            try {
                $nouvStatut = $action === 'desarchiver' ? 'active' : 'archive';
                Annonce::changerStatut($id, $nouvStatut);

                $_SESSION['message'] = ($action === 'desarchiver')
                    ? 'L\'annonce a été désarchivée avec succès.'
                    : 'L\'annonce a été archivée avec succès.';

                header('Location: ' . $redirect);
                exit;
            } catch (Exception $e) {
                $_SESSION['erreur'] = 'Une erreur est survenue : ' . $e->getMessage();
                header('Location: ' . $redirect);
                exit;
            }
        } else {
            $_SESSION['erreur'] = 'ID d\'annonce manquant.';
            header('Location: ' . $redirect);
            exit;
        }
    }

    /**
     * Ajoute une annonce au panier de l'utilisateur (réservation)
     *
     * Associe l'ID de l'acheteur à l'annonce pour la réserver
     *
     * @return void
     */
    public function ajouterAuPanier() {
        $acheteur_id = $_SESSION['utilisateur_id'] ?? null;
        $annonce_id = $_GET['id'] ?? null;
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/compte';

        if (!$acheteur_id) {
            $_SESSION['erreur'] = 'Vous devez être connecté pour réserver un véhicule.';
            header('Location: /connexion');
            exit;
        }

        if (!$annonce_id) {
            $_SESSION['erreur'] = 'Aucune annonce sélectionnée.';
            header('Location: /');
            exit;
        }

        try {

            Annonce::ajouterAuPanier($annonce_id, $acheteur_id);
            $_SESSION['message'] = 'Le véhicule a été ajouté à votre panier. Cette réservation expirera dans 3 jours.';
            header('Location: ' . $redirect);
            exit;
        } catch (Exception $e) {
            $_SESSION['erreur'] = $e->getMessage();
            header('Location: ' . $redirect);
            exit;
        }
    }

    /**
     * Supprime une annonce du panier de l'utilisateur (annulation de réservation)
     *
     * Retire l'association entre l'acheteur et l'annonce pour annuler la réservation
     *
     * @return void
     */
    public function supprimerDuPanier() {
        $acheteur_id = $_SESSION['utilisateur_id'] ?? null;
        $annonce_id = $_GET['id'] ?? null;
        $redirect = $_SERVER['HTTP_REFERER'] ?? '/compte';

        if (!$acheteur_id) {
            $_SESSION['erreur'] = 'Vous devez être connecté pour effectuer cette action.';
            header('Location: /connexion');
            exit;
        }

        if (!$annonce_id) {
            $_SESSION['erreur'] = 'Aucune annonce sélectionnée.';
            header('Location: ' . $redirect);
            exit;
        }

        try {
            $annonce = Annonce::trouverParId($annonce_id);
            if ($annonce['acheteur_id'] === $acheteur_id) {
                Annonce::supprimerDuPanier($annonce_id);
                $_SESSION['message'] = 'La réservation a été annulée avec succès.';
                header('Location: ' . $redirect);
                exit;
            } else {
                $_SESSION['erreur'] = 'Vous ne pouvez pas supprimer une réservation qui ne vous appartient pas.';
                header('Location: ' . $redirect);
                exit;
            }
        } catch (Exception $e) {
            $_SESSION['erreur'] = 'Une erreur est survenue : ' . $e->getMessage();
            header('Location: ' . $redirect);
            exit;
        }
    }

    /**
     * Ajoute des images à une annonce existante
     *
     * Vérifie et traite les nouvelles images à associer à la voiture de l'annonce
     * tout en respectant la limite maximale de 3 images par voiture
     *
     * @return void
     */
    public function ajouterImage() {
        $annonce_id = $_GET['id'] ?? null;

        if (!$annonce_id) {
            $_SESSION['erreur'] = 'ID d\'annonce manquant.';
            header('Location: /vendre');
            exit;
        }

        $annonce = Annonce::trouverParId($annonce_id);
        if (!$annonce) {
            $_SESSION['erreur'] = 'Annonce introuvable.';
            header('Location: /vendre');
            exit;
        }

        $voiture_id = $annonce['voiture_id'];
        $nbImages = count(Image::toutesParVoiture($voiture_id));
        $maxImages = 3;
        $imagesAjoutees = 0;
        $erreurs = [];

        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $i => $tmpName) {
                if ($nbImages >= $maxImages) {
                    $_SESSION['erreur'] = 'Nombre maximum d\'images atteint (3 maximum).';
                    break;
                }

                if (!empty($tmpName) && $_FILES['images']['error'][$i] === UPLOAD_ERR_OK) {
                    $file = [
                        'name' => $_FILES['images']['name'][$i],
                        'type' => $_FILES['images']['type'][$i],
                        'tmp_name' => $tmpName,
                        'error' => $_FILES['images']['error'][$i],
                        'size' => $_FILES['images']['size'][$i],
                    ];
                    try {
                        Image::ajouterImage($file, $voiture_id);
                        $nbImages++;
                        $imagesAjoutees++;
                    } catch (Exception $e) {
                        $erreurs[] = $e->getMessage();
                    }
                }
            }
        }

        if ($imagesAjoutees > 0) {
            $_SESSION['message'] = 'Images ajoutées avec succès (' . $imagesAjoutees . ').';
        }

        if (!empty($erreurs)) {
            $_SESSION['erreur'] = 'Erreurs lors de l\'ajout de certaines images : ' . implode(', ', $erreurs);
        }

        header('Location: /annonce/detail?id=' . $annonce_id);
        exit;
    }

    /**
     * Modifie une image existante d'une annonce
     *
     * Remplace une image existante par une nouvelle image téléchargée
     *
     * @return void
     */
    public function modifierImage() {
        $image_id = $_GET['id'] ?? null;
        $annonce_id = $_GET['annonce_id'] ?? null;

        if (!$image_id || !$annonce_id) {
            $_SESSION['erreur'] = 'Paramètres manquants pour la modification de l\'image.';
            header('Location: /vendre');
            exit;
        }

        $annonce = Annonce::trouverParId($annonce_id);
        if (!$annonce) {
            $_SESSION['erreur'] = 'Annonce introuvable.';
            header('Location: /vendre');
            exit;
        }

        $image = Image::trouverParId($image_id);
        if (!$image) {
            $_SESSION['erreur'] = 'Image introuvable.';
            header('Location: /annonce/modifier?id=' . $annonce_id);
            exit;
        }

        if (!isset($_FILES['nouvelle_image']) || $_FILES['nouvelle_image']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['erreur'] = 'Aucune image sélectionnée ou erreur lors du téléchargement.';
            header('Location: /annonce/modifier?id=' . $annonce_id);
            exit;
        }

        if ($_FILES['nouvelle_image']['size'] > 10 * 1024 * 1024) {
            $_SESSION['erreur'] = 'La taille de l\'image ne doit pas dépasser 10 Mo.';
            header('Location: /annonce/modifier?id=' . $annonce_id);
            exit;
        }

        try {
            $file = [
                'name' => $_FILES['nouvelle_image']['name'],
                'type' => $_FILES['nouvelle_image']['type'],
                'tmp_name' => $_FILES['nouvelle_image']['tmp_name'],
                'error' => $_FILES['nouvelle_image']['error'],
                'size' => $_FILES['nouvelle_image']['size']
            ];

            Image::modifierImage('voiture', $file, $image_id);
            $_SESSION['message'] = 'L\'image a été modifiée avec succès.';
            header('Location: /annonce/detail?id=' . $annonce_id);
            exit;
        } catch (Exception $e) {
            $_SESSION['erreur'] = 'Erreur lors de la modification de l\'image : ' . $e->getMessage();
            header('Location: /annonce/modifier?id=' . $annonce_id);
            exit;
        }
    }

    /**
     * Supprime une image d'une annonce
     *
     * Supprime le fichier physique et la référence en base de données
     *
     * @return void
     */
    public function supprimerImage() {
        $image_id = $_GET['id'] ?? null;
        $annonce_id = $_GET['annonce_id'] ?? null;

        if (!$image_id || !$annonce_id) {
            $_SESSION['erreur'] = 'Paramètres manquants pour la suppression de l\'image.';
            header('Location: /vendre');
            exit;
        }

        try {
            $image = Image::trouverParId($image_id);
            if ($image && $image['url']) {
                $targetDir = '../public/images/';
                $filePath = $targetDir . $image['url'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            Image::supprimerImageVoiture($image_id);
            $_SESSION['message'] = 'L\'image a été supprimée avec succès.';
        } catch (Exception $e) {
            $_SESSION['erreur'] = 'Erreur lors de la suppression de l\'image : ' . $e->getMessage();
        }

        header('Location: /annonce/modifier?id=' . $annonce_id);
        exit;
    }
}