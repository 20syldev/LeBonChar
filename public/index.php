<?php
require_once '../app/modeles/Database.php';
require_once '../app/modeles/Config.php';
require_once '../app/modeles/Routeur.php';

Config::session();
Config::auth();

Database::connexion();

Annonce::init();
Image::init();
Marque::init();
Modele::init();
Utilisateur::init();
Voiture::init();

Routeur::init();