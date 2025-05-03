<?php
function checkAuth() {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    $routesAutoriseesNonConnecte = [
        '',
        'connexion',
        'inscription',
        'annonce/detail'
    ];
    if (!isset($_SESSION['utilisateur_id']) && !in_array($uri, $routesAutoriseesNonConnecte)) {
        header('Location: /');
        exit();
    }
}