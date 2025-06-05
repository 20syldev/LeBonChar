<?php
/**
 * Composant pour afficher l'indication qu'une annonce est déjà réservée
 * Ce fichier est destiné à être inclus dans les vues d'annonce
 * Nécessite les variables $annonce avant l'inclusion
 */
?>

<?php if ($annonce['acheteur_id'] !== null): ?>
    <span class="btn btn-home">
        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
            <path
                d="M7.99988 6C7.99988 3.79086 9.79074 2 11.9999 2H16.9999C19.209 2 20.9999 3.79086 20.9999 6V16.0514C20.9999 17.6802 19.157 18.626 17.8337 17.6762L15.9999 16.3601V20.0514C15.9999 21.6802 14.157 22.626 12.8337 21.6762L9.49988 19.2835L6.16603 21.6762C4.84275 22.626 2.99988 21.6802 2.99988 20.0514V10C2.99988 7.79086 4.79074 6 6.99988 6H7.99988ZM9.99988 6C9.99988 4.89543 10.8953 4 11.9999 4H16.9999C18.1044 4 18.9999 4.89543 18.9999 6V16.0514L15.9999 13.8983V10C15.9999 7.79086 14.209 6 11.9999 6H9.99988ZM6.99988 8C5.89531 8 4.99988 8.89543 4.99988 10V20.0514L8.33373 17.6587C9.0307 17.1585 9.96906 17.1585 10.666 17.6587L13.9999 20.0514V10C13.9999 8.89543 13.1044 8 11.9999 8H6.99988Z" fill="currentColor"/>
        </svg>
        Annonce déjà réservée
    </span>
<?php endif; ?>