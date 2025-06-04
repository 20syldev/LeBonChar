<?php

/**
 * Classe de configuration générale de l'application
 *
 * Gère les paramètres globaux comme les sessions et l'authentification
 */
class Config {
    /**
     * Démarre une session PHP si aucune n'est active
     *
     * Vérifie l'état de la session et en démarre une nouvelle si nécessaire
     *
     * @return void
     */
    public static function session() {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    /**
     * Vérifie si l'utilisateur est autorisé à accéder à la page courante
     *
     * Redirige l'utilisateur non connecté vers la page d'accueil si la route
     * n'est pas dans la liste des routes autorisées sans connexion
     *
     * @return void
     */
    public static function auth() {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $routesAutoriseesNonConnecte = [
            '',
            'erreur',
            'profil',
            'connexion',
            'inscription',
            'annonce/detail'
        ];

        if (!isset($_SESSION['utilisateur_id']) && !in_array($uri, $routesAutoriseesNonConnecte)) {
            header('Location: /');
            exit();
        }
    }
}