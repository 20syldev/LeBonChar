<?php
require_once '../app/controleurs/Database.php';
require_once '../app/controleurs/Config.php';
require_once '../app/controleurs/Routeur.php';

Config::session();
Config::auth();

Database::connexion();

Annonce::init();
Image::init();
Marque::init();
Modele::init();
Utilisateur::init();
Voiture::init();

Annonce::verifierReservations();

Routeur::init();
?>

<!-- <script type="text/javascript" src="/js/theme.js"></script> -->