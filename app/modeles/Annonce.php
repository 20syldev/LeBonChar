<?php

/**
 * Modèle représentant les annonces de véhicules
 *
 * Cette classe gère toutes les opérations CRUD sur les annonces,
 * ainsi que les opérations spécifiques comme la réservation et la publication
 */
class Annonce {
    private static $pdo;

    /**
     * Initialise la connexion à la base de données
     *
     * Récupère l'instance PDO depuis la classe Database
     *
     * @return void
     */
    public static function init() {
        self::$pdo = Database::getPdo();
    }

    /**
     * Récupère toutes les annonces avec leur prix
     *
     * @return array Tableau associatif contenant toutes les annonces
     */
    public static function toutes() {
        $stmt = self::$pdo->query("
            SELECT a.*, v.prix
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            WHERE a.statut = 'active'
            ORDER BY a.date_publication DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère toutes les annonces réservées par un acheteur spécifique
     *
     * @param int $acheteur_id ID de l'acheteur dont on souhaite récupérer les réservations
     * @return array Tableau associatif contenant les annonces réservées
     */
    public static function toutesParAcheteur($acheteur_id) {
        $stmt = self::$pdo->prepare("
            SELECT a.*, v.prix
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            WHERE a.acheteur_id = ?
        ");
        $stmt->execute([$acheteur_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère toutes les annonces créées par un vendeur spécifique
     *
     * @param int $utilisateur_id ID du vendeur dont on souhaite récupérer les annonces
     * @return array Tableau associatif contenant les annonces du vendeur
     */
    public static function toutesParVendeur($utilisateur_id, $statut = null) {
        $sql = "
            SELECT a.*, v.prix
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            WHERE a.utilisateur_id = ?
        ";

        switch ($statut) {
            case 'active':
                $sql .= " AND a.statut = 'active' AND a.acheteur_id IS NULL";
                break;
            case 'archive':
                $sql .= " AND a.statut = 'archive'";
                break;
            case 'reserve':
                $sql .= " AND a.acheteur_id IS NOT NULL";
                break;
            default:
                break;
        }

        $stmt = self::$pdo->prepare($sql . " ORDER BY a.date_publication DESC");
        $stmt->execute([$utilisateur_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une annonce spécifique avec tous ses détails
     *
     * Inclut toutes les caractéristiques de la voiture, la marque et le modèle
     *
     * @param int $id ID de l'annonce à récupérer
     * @return array|false Tableau associatif contenant l'annonce ou false si non trouvée
     */
    public static function trouverParId($id) {
        $stmt = self::$pdo->prepare("
            SELECT a.*, v.type, v.energie, v.nombre_portes, v.nombre_places, v.sellerie, v.consommation,
                   v.premiere_main, v.provenance, v.mise_en_circulation, v.annee, v.kilometrage, v.categorie,
                   v.couleur, v.marque_id, v.modele_id, m.nom AS marque, mo.nom AS modele
            FROM Annonce a
            JOIN Voiture v ON a.voiture_id = v.id
            JOIN Marque m ON v.marque_id = m.id
            JOIN Modele mo ON v.modele_id = mo.id
            WHERE a.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Change le statut d'une annonce
     *
     * Permet d'activer ou d'archiver une annonce
     *
     * @param int $id ID de l'annonce à modifier
     * @param string $statut Nouveau statut ('active', 'archive', etc.)
     * @return void
     */
    public static function changerStatut($id, $statut) {
        if ($statut === 'archive') {
            $stmt = self::$pdo->prepare("
                UPDATE Annonce
                SET statut = ?, acheteur_id = NULL, date_reservation = NULL
                WHERE id = ?
            ");
            $stmt->execute([$statut, $id]);
        } else {
            $stmt = self::$pdo->prepare("
                UPDATE Annonce
                SET statut = ?
                WHERE id = ?
            ");
            $stmt->execute([$statut, $id]);
        }
    }

    /**
     * Crée une nouvelle annonce avec sa voiture associée
     *
     * Insère d'abord les données de la voiture puis crée l'annonce liée
     *
     * @param array $data Données de l'annonce et de la voiture
     * @return void
     */
    public static function creer($data) {
        $stmt = self::$pdo->prepare("
            INSERT
            INTO Voiture (annee, prix, kilometrage, categorie, couleur, marque_id, modele_id, type, energie, provenance, mise_en_circulation, premiere_main, nombre_portes, nombre_places, sellerie, consommation)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['annee'],
            $data['prix'],
            $data['kilometrage'],
            $data['categorie'],
            $data['couleur'],
            $data['marque_id'],
            $data['modele_id'],
            $data['type'],
            $data['energie'],
            $data['provenance'],
            $data['mise_en_circulation'],
            $data['premiere_main'],
            $data['nombre_portes'],
            $data['nombre_places'],
            $data['sellerie'],
            $data['consommation']
        ]);

        $stmt = self::$pdo->prepare("
            INSERT INTO Annonce (titre, description, utilisateur_id, voiture_id, date_publication)
            VALUES (?, ?, ?, ?, NOW())
        ");
        $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['utilisateur_id'],
            $data['voiture_id']
        ]);
    }

    /**
     * Modifie une annonce existante
     *
     * Met à jour uniquement les informations de base de l'annonce (titre et description)
     *
     * @param int $id ID de l'annonce à modifier
     * @param array $data Nouvelles données de l'annonce
     * @return void
     */
    public static function modifier($id, $data) {
        $stmt = self::$pdo->prepare("
            UPDATE Annonce
            SET titre = ?, description = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $data['titre'],
            $data['description'],
            $id
        ]);
    }

    /**
     * Incrémente le compteur de vues d'une annonce
     *
     * @param int $id ID de l'annonce dont on veut incrémenter les vues
     * @return void
     */
    public static function ajouterVue($id) {
        $stmt = self::$pdo->prepare("
            UPDATE Annonce
            SET vues = vues + 1
            WHERE id = ?
        ");
        $stmt->execute([$id]);
    }

    /**
     * Réserve une annonce pour un acheteur
     *
     * Vérifie si l'annonce est déjà réservée et si l'acheteur a déjà réservé une autre annonce
     *
     * @param int $annonce_id ID de l'annonce à réserver
     * @param int $acheteur_id ID de l'acheteur qui réserve
     * @throws Exception Si l'annonce est déjà réservée ou si l'acheteur a déjà une réservation
     * @return void
     */
    public static function ajouterAuPanier($annonce_id, $acheteur_id) {
        $stmt = self::$pdo->prepare("
            SELECT acheteur_id
            FROM Annonce
            WHERE id = ?
        ");
        $stmt->execute([$annonce_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['acheteur_id'] !== null) {
            throw new Exception("Cette annonce est déjà réservée.");
        }

        $stmt = self::$pdo->prepare("
            SELECT COUNT(*)
            FROM Annonce
            WHERE acheteur_id = ?
        ");
        $stmt->execute([$acheteur_id]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Vous ne pouvez réserver qu'une seule annonce à la fois.");
        }

        $stmt = self::$pdo->prepare("
            UPDATE Annonce
            SET acheteur_id = ?, date_reservation = NOW()
            WHERE id = ?
        ");
        $stmt->execute([$acheteur_id, $annonce_id]);
    }

    /**
     * Annule la réservation d'une annonce
     *
     * Supprime l'association entre l'annonce et l'acheteur
     *
     * @param int $annonce_id ID de l'annonce dont on veut annuler la réservation
     * @return void
     */
    public static function supprimerDuPanier($annonce_id) {
        $stmt = self::$pdo->prepare("
            UPDATE Annonce
            SET acheteur_id = NULL
            WHERE id = ?
        ");
        $stmt->execute([$annonce_id]);
    }

    /**
     * Vérifie et annule les réservations qui ont dépassé la durée maximale (3 jours)
     *
     * @return array Les annonces dont la réservation a été annulée
     */
    public static function verifierReservations() {
        $stmt = self::$pdo->prepare("
            SELECT id, titre, acheteur_id
            FROM Annonce
            WHERE acheteur_id IS NOT NULL
            AND date_reservation < DATE_SUB(NOW(), INTERVAL 3 DAY)
        ");
        $stmt->execute();
        $annoncesExpirees = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($annoncesExpirees as $annonce) {
            $stmt = self::$pdo->prepare("
                UPDATE Annonce
                SET acheteur_id = NULL, date_reservation = NULL
                WHERE id = ?
            ");
            $stmt->execute([$annonce['id']]);
        }

        return $annoncesExpirees;
    }

    /**
     * Calcule la date d'expiration d'une réservation
     *
     * @param string $date_reservation Date de réservation au format SQL
     * @return array Informations sur l'expiration (temps restant, date d'expiration)
     */
    public static function expirationReservation($date_reservation) {
        if (empty($date_reservation)) {
            return null;
        }

        $date_reservation = new DateTime($date_reservation);
        $date_expiration = clone $date_reservation;
        $date_expiration->modify('+3 days');
        $maintenant = new DateTime();

        $interval = $maintenant->diff($date_expiration);
        $heures_restantes = ($interval->days * 24) + $interval->h;

        return [
            'date_expiration' => $date_expiration->format('Y-m-d H:i:s'),
            'jours_restants' => $interval->days,
            'heures_restantes' => $heures_restantes,
            'minutes_restantes' => $interval->i,
            'expiree' => $maintenant > $date_expiration
        ];
    }
}