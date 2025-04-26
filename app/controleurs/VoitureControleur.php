<?php
require_once '../app/modeles/Voiture.php';

class VoitureControleur {
    public function detail() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $voiture = Voiture::trouverParId($id);
            require_once '../app/vues/annonce/detail.php';
        } else {
            echo "Voiture introuvable.";
        }
    }
}