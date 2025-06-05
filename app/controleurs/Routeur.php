<?php

require_once '../app/controleurs/AdminControleur.php';
require_once '../app/controleurs/AnnonceControleur.php';
require_once '../app/controleurs/AuthControleur.php';
require_once '../app/controleurs/UtilisateurControleur.php';

/**
 * Classe de routage de l'application
 *
 * Analyse l'URL demandée et dirige la requête vers le contrôleur
 * et la méthode appropriés
 */
class Routeur {
    /**
     * Initialise le routeur et traite la demande entrante
     *
     * Analyse l'URI, extrait les paramètres de requête et appelle
     * le contrôleur correspondant à la route demandée
     *
     * @return void
     */
    public static function init() {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $query = $_GET;

        switch (true) {
            case ($uri === ''):
                (new AnnonceControleur())->accueil();
                break;
            case ($uri === 'annonce/nouveau'):
                (new AnnonceControleur())->nouveau();
                break;
            case ($uri === 'annonce/modifier' && isset($query['id'])):
                (new AnnonceControleur())->modifier();
                break;
            case ($uri === 'annonce/archiver' && isset($query['id'])):
                (new AnnonceControleur())->archiver();
                break;
            case ($uri === 'annonce/detail' && isset($query['id'])):
                (new AnnonceControleur())->detail();
                break;
            case ($uri === 'annonce/ajouter-au-panier' && isset($query['id'])):
                (new AnnonceControleur())->ajouterAuPanier();
                break;
            case ($uri === 'annonce/supprimer-du-panier' && isset($query['id'])):
                (new AnnonceControleur())->supprimerDuPanier();
                break;
            case ($uri === 'annonce/ajouter-image' && isset($query['id'])):
                (new AnnonceControleur())->ajouterImage();
                break;
            case ($uri === 'annonce/modifier-image' && isset($query['id']) && isset($query['annonce_id'])):
                (new AnnonceControleur())->modifierImage();
                break;
            case ($uri === 'annonce/supprimer-image' && isset($query['id']) && isset($query['annonce_id'])):
                (new AnnonceControleur())->supprimerImage();
                break;
            case ($uri === 'vendre'):
                (new AnnonceControleur())->vendre();
                break;
            case ($uri === 'inscription'):
                (new AuthControleur())->inscription();
                break;
            case ($uri === 'connexion'):
                (new AuthControleur())->connexion();
                break;
            case ($uri === 'deconnexion'):
                (new AuthControleur())->deconnexion();
                break;
            case ($uri === 'compte'):
                (new UtilisateurControleur())->compte();
                break;
            case ($uri === 'modifier'):
                (new UtilisateurControleur())->modifier();
                break;
            case ($uri === 'modifier-profil'):
                (new UtilisateurControleur())->modifierPhotoProfil();
                break;
            case ($uri === 'mot-de-passe'):
                (new UtilisateurControleur())->modifierMotDePasse();
                break;
            case ($uri === 'profil'):
                (new UtilisateurControleur())->profil();
                break;
            case ($uri === 'dashboard' || $uri === 'stats'):
                if (isset($_SESSION['utilisateur_id'])) {
                    $utilisateur = Utilisateur::trouverParId($_SESSION['utilisateur_id']);

                    if ($utilisateur && $utilisateur['role'] === 'admin') {
                        if ($uri === 'stats') (new AdminControleur())->stats();
                        else (new AdminControleur())->dashboard();
                    } else {
                        header('Location: /');
                        exit;
                    }
                } else {
                    header('Location: /');
                    exit;
                }
                break;
            case ($uri === 'erreur'):
                (new AuthControleur())->erreur();
                break;
            default:
                header('Location: /');
                exit;
        }
    }
}