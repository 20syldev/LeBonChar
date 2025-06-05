<?php
/**
 * Composant pour le bouton de changement de thème
 * Ce fichier est destiné à être inclus dans les vues
 */

?>

<button type="button" class="btn btn-home theme-toggle" disabled>

    <!-- Icône soleil (mode clair) -->
    <svg class="theme-light-icon hidden" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
        <path
            d="M12 4V2M12 20V22M6.41421 6.41421L5 5M17.728 17.728L19.1422 19.1422M4 12H2M20 12H22M17.7285 6.41421L19.1427 5M6.4147 17.728L5.00049 19.1422M12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12C17 14.7614 14.7614 17 12 17Z"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        />
    </svg>

    <!-- Icône lune (mode sombre) -->
    <svg class="theme-dark-icon hidden" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
        <path
            d="M9 6C9 10.9706 13.0294 15 18 15C18.9093 15 19.787 14.8655 20.6144 14.6147C19.4943 18.3103 16.0613 20.9999 12 20.9999C7.02944 20.9999 3 16.9707 3 12.0001C3 7.93883 5.69007 4.50583 9.38561 3.38574C9.13484 4.21311 9 5.09074 9 6Z"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"/>
        />
    </svg>

    <!-- Icône auto (mode automatique) -->
    <svg class="theme-auto-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
        <path
            d="M14 16H19V21M10 8H5V3M19.4176 9.0034C18.8569 7.61566 17.9181 6.41304 16.708 5.53223C15.4979 4.65141 14.0652 4.12752 12.5723 4.02051C11.0794 3.9135 9.58606 4.2274 8.2627 4.92661C6.93933 5.62582 5.83882 6.68254 5.08594 7.97612M4.58203 14.9971C5.14272 16.3848 6.08146 17.5874 7.29157 18.4682C8.50169 19.3491 9.93588 19.8723 11.4288 19.9793C12.9217 20.0863 14.4138 19.7725 15.7371 19.0732C17.0605 18.374 18.1603 17.3175 18.9131 16.0239"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        />
    </svg>

    Thème
</button>