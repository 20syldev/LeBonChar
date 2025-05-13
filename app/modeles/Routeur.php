<?php
require_once '../app/controleurs/AnnonceControleur.php';
require_once '../app/controleurs/UtilisateurControleur.php';
require_once '../app/controleurs/AuthControleur.php';

class Routeur {
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
            case ($uri === 'modifier-photo-profil'):
                (new UtilisateurControleur())->modifierPhotoProfil();
                break;
            default:
                header('Location: /');
                exit;
        }
    }
}