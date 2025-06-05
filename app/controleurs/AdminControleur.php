<?php

require_once '../app/modeles/Annonce.php';

class AdminControleur {
    /**
     * Affiche la page des statistiques
     *
     * @return void
     */
    public function stats() {
        $startDate = $_GET['start_date'] ?? date('Y-m-d', strtotime('-7 days'));
        $endDate = $_GET['end_date'] ?? date('Y-m-d');

        $stats = $this->getStatistics($startDate, $endDate);

        require_once '../app/vues/admin/stats.php';
    }

    /**
     * Affiche le tableau de bord de l'administration
     *
     * @return void
     */
    public function dashboard() {
        require_once '../app/vues/admin/dashboard.php';
    }

    /**
     * Récupère les statistiques des ventes et réservations
     *
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    private function getStatistics($startDate, $endDate) {
        return [
            'sales' => Annonce::compterVentes($startDate, $endDate),
            'reservations' => Annonce::compterReservations($startDate, $endDate),
            'start_date' => $startDate,
            'end_date' => $endDate
        ];
    }
}