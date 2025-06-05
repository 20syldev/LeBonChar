<?php
/**
 * Composant pour afficher les boutons d'action pour un acheteur potentiel
 * Ce fichier est destiné à être inclus dans certaines vues d'annonce
 * Nécessite la variable $annonce avant l'inclusion
 */
?>

<?php if ($annonce['acheteur_id'] === null): ?>
    <a href="<?= isset($_SESSION['utilisateur_id']) ? '/annonce/ajouter-au-panier?id=' . $annonce['id'] : '/connexion' ?>" class="btn btn-primary">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
            <path
                d="M4 6C4 3.79086 5.79086 2 8 2H9C9.55228 2 10 2.44772 10 3C10 3.55228 9.55228 4 9 4H8C6.89543 4 6 4.89543 6 6V20.0568L10.8375 16.6014C11.5329 16.1047 12.4671 16.1047 13.1625 16.6014L18 20.0568V13C18 12.4477 18.4477 12 19 12C19.5523 12 20 12.4477 20 13V20.0568C20 21.6836 18.1613 22.6298 16.8375 21.6843L12 18.2289L7.16248 21.6843C5.83874 22.6298 4 21.6836 4 20.0568V6Z"
                fill="currentColor"
            />
            <path
                d="M17 3C17 2.44772 16.5523 2 16 2C15.4477 2 15 2.44772 15 3V5H13C12.4477 5 12 5.44772 12 6C12 6.55228 12.4477 7 13 7H15V9C15 9.55228 15.4477 10 16 10C16.5523 10 17 9.55228 17 9V7H19C19.5523 7 20 6.55228 20 6C20 5.44772 19.5523 5 19 5H17V3Z"
                fill="currentColor"
            />
        </svg>
        Réserver ce véhicule
    </a>
<?php endif; ?>