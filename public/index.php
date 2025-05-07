<?php
require_once '../app/modeles/Database.php';
require_once '../app/modeles/Config.php';
require_once '../app/modeles/Routeur.php';

Config::session();
Config::auth();
Routeur::gerer();