<?php
/**
 * Composant pour afficher les boutons d'action pour un acheteur qui a déjà réservé l'annonce
 * Ce fichier est destiné à être inclus dans certaines vues d'annonce
 * Nécessite la variable $annonce avant l'inclusion
 */
?>

<?php if (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['acheteur_id']): ?>
    <span class="btn btn-home">Dans votre panier</span>

    <a href="/annonce/supprimer-du-panier?id=<?= $annonce['id']; ?>" class="btn btn-cancel">
        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
            <path
                d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H8Z" fill="currentColor"/>
            <path
                d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12Z"
                fill="currentColor"
                fill-rule="evenodd"
                clip-rule="evenodd"
            />
        </svg>
        Retirer
    </a>
<?php endif; ?>