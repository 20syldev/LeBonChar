<?php
require_once '../app/controleurs/AnnonceControleur.php';
require_once '../app/controleurs/UtilisateurControleur.php';
require_once '../app/controleurs/AuthControleur.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$query = $_GET;

if ($uri === '') {
    (new AnnonceControleur())->accueil();
} elseif ($uri === 'annonce/nouveau') {
    (new AnnonceControleur())->nouveau();
} elseif ($uri === 'annonce/modifier' && isset($query['id'])) {
    (new AnnonceControleur())->modifier();
} elseif ($uri === 'annonce/archiver' && isset($query['id'])) {
    (new AnnonceControleur())->archiver();
} elseif ($uri === 'annonce/detail' && isset($query['id'])) {
    (new AnnonceControleur())->detail();
} elseif ($uri === 'annonce/ajouter-au-panier' && isset($query['id'])) {
    (new AnnonceControleur())->ajouterAuPanier();
} elseif ($uri === 'annonce/supprimer-du-panier' && isset($query['id'])) {
    (new AnnonceControleur())->supprimerDuPanier();
} elseif ($uri === 'inscription') {
    (new AuthControleur())->inscription();
} elseif ($uri === 'connexion') {
    (new AuthControleur())->connexion();
} elseif ($uri === 'deconnexion') {
    (new AuthControleur())->deconnexion();
} elseif ($uri === 'compte') {
    (new UtilisateurControleur())->compte();
} elseif ($uri === 'modifier') {
    (new UtilisateurControleur())->modifier();
} elseif ($uri === 'vendre') {
    (new AnnonceControleur())->vendre();
} else {
    header('Location: /');
    exit;
}