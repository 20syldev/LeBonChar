<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Annonces de voitures - LeBonChar</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <!-- Contenu de la page -->
    <div class="container">

        <!-- En-tête de la page -->
        <h1 class="page-title">Découvrez nos annonces automobiles</h1>

        <!-- Navigation -->
        <div class="nav">

            <!-- Si l'utilisateur est connecté -->
            <?php if (isset($_SESSION['utilisateur_id'])): ?>

                <!-- Bouton à gauche -->
                <div class="nav-left">

                    <!-- Bouton création d'annonce -->
                    <a href="/annonce/nouveau" class="btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M5 12H19"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M12 5L12 19"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        Créer une annonce
                    </a>

                </div>

                <!-- Boutons à droite -->
                <div class="nav-right">

                    <!-- Boutons de la page de vente -->
                    <a href="/vendre" class="btn btn-home">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M8.00005 9C8.55233 9 9.00005 8.55228 9.00005 8C9.00005 7.44772 8.55233 7 8.00005 7C7.44776 7 7.00005 7.44772 7.00005 8C7.00005 8.55228 7.44776 9 8.00005 9Z"
                                fill="currentColor"
                            />
                            <path
                                d="M12.1635 2.05864C11.6504 1.962 11.1228 2.00288 10.4302 2.05655L7.49854 2.2821C6.80865 2.33516 6.23449 2.37931 5.76481 2.4522C5.27385 2.52839 4.82331 2.64559 4.39819 2.88284C3.76237 3.23769 3.23773 3.76232 2.88289 4.39814C2.64563 4.82326 2.52844 5.2738 2.45225 5.76476C2.37936 6.23444 2.3352 6.8086 2.28214 7.49849L2.05659 10.4301C2.00292 11.1228 1.96204 11.6504 2.05869 12.1635C2.14036 12.597 2.2945 13.0137 2.51464 13.396C2.77515 13.8484 3.14954 14.2224 3.64107 14.7134L8.65467 19.7269C9.16802 20.2403 9.59268 20.665 9.96589 20.9856C10.3535 21.3187 10.7457 21.5938 11.2112 21.7632C12.0788 22.0789 13.0298 22.0789 13.8974 21.7632C14.3629 21.5938 14.7551 21.3187 15.1427 20.9856C15.5159 20.665 15.9406 20.2403 16.4539 19.7269L19.727 16.4539C20.2403 15.9405 20.665 15.5158 20.9857 15.1426C21.3187 14.755 21.5938 14.3628 21.7632 13.8973C22.079 13.0298 22.079 12.0787 21.7632 11.2112C21.5938 10.7457 21.3187 10.3535 20.9857 9.96584C20.665 9.59262 20.2403 9.16794 19.7269 8.65458L14.7134 3.64103C14.2225 3.1495 13.8485 2.7751 13.396 2.51459C13.0137 2.29445 12.597 2.14031 12.1635 2.05864ZM10.4701 4.05943C11.327 3.99351 11.5732 3.98263 11.7933 4.02408C12.006 4.06415 12.2105 4.13978 12.3981 4.2478C12.5921 4.35952 12.772 4.52802 13.3797 5.13578L18.2859 10.042C18.8329 10.589 19.2033 10.9603 19.4687 11.2692C19.7274 11.5702 19.8313 11.751 19.8838 11.8952C20.0388 12.3209 20.0388 12.7876 19.8838 13.2133C19.8313 13.3575 19.7274 13.5382 19.4687 13.8393C19.2033 14.1482 18.8329 14.5195 18.2859 15.0665L15.0666 18.2859C14.5196 18.8328 14.1482 19.2032 13.8393 19.4687C13.5383 19.7273 13.3575 19.8313 13.2133 19.8838C12.7876 20.0387 12.321 20.0387 11.8953 19.8838C11.751 19.8313 11.5703 19.7273 11.2693 19.4687C10.9603 19.2032 10.589 18.8328 10.042 18.2859L5.13583 13.3797C4.52807 12.7719 4.35957 12.592 4.24785 12.398C4.13983 12.2104 4.0642 12.006 4.02412 11.7932C3.98268 11.5732 3.99356 11.327 4.05948 10.47L4.27333 7.68986C4.33007 6.95232 4.36897 6.45566 4.42859 6.07147C4.48624 5.69996 4.55341 5.50883 4.62932 5.37281C4.80344 5.06082 5.06087 4.80339 5.37286 4.62928C5.50888 4.55336 5.7 4.4862 6.07151 4.42854C6.45571 4.36892 6.95237 4.33002 7.6899 4.27329L10.4701 4.05943Z"
                                fill="currentColor"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                            />
                        </svg>
                        Mes annonces
                    </a>

                    <!-- Bouton de compte -->
                    <a href="/compte" class="btn btn-home">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5ZM7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM7.45609 16.7264C6.40184 17.1946 6 17.7858 6 18.5C6 18.7236 6.03976 18.8502 6.09728 18.942C6.15483 19.0338 6.29214 19.1893 6.66219 19.3567C7.45312 19.7145 9.01609 20 12 20C14.9839 20 16.5469 19.7145 17.3378 19.3567C17.7079 19.1893 17.8452 19.0338 17.9027 18.942C17.9602 18.8502 18 18.7236 18 18.5C18 17.7858 17.5982 17.1946 16.5439 16.7264C15.4614 16.2458 13.8722 16 12 16C10.1278 16 8.53857 16.2458 7.45609 16.7264ZM6.64442 14.8986C8.09544 14.2542 10.0062 14 12 14C13.9938 14 15.9046 14.2542 17.3556 14.8986C18.8348 15.5554 20 16.7142 20 18.5C20 18.9667 19.9148 19.4978 19.5973 20.0043C19.2798 20.5106 18.7921 20.8939 18.1622 21.1789C16.9531 21.7259 15.0161 22 12 22C8.98391 22 7.04688 21.7259 5.83781 21.1789C5.20786 20.8939 4.72017 20.5106 4.40272 20.0043C4.08524 19.4978 4 18.9667 4 18.5C4 16.7142 5.16516 15.5554 6.64442 14.8986Z"
                                fill="currentColor"
                            />
                        </svg>
                        Mon compte
                    </a>

                    <!-- Bouton de déconnexion -->
                    <a href="/deconnexion" class="btn btn-cancel">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M2 6.5C2 4.01472 4.01472 2 6.5 2H12C14.2091 2 16 3.79086 16 6V7C16 7.55228 15.5523 8 15 8C14.4477 8 14 7.55228 14 7V6C14 4.89543 13.1046 4 12 4H6.5C5.11929 4 4 5.11929 4 6.5V17.5C4 18.8807 5.11929 20 6.5 20H12C13.1046 20 14 19.1046 14 18V17C14 16.4477 14.4477 16 15 16C15.5523 16 16 16.4477 16 17V18C16 20.2091 14.2091 22 12 22H6.5C4.01472 22 2 19.9853 2 17.5V6.5ZM18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289L22.7071 11.2929C23.0976 11.6834 23.0976 12.3166 22.7071 12.7071L19.7071 15.7071C19.3166 16.0976 18.6834 16.0976 18.2929 15.7071C17.9024 15.3166 17.9024 14.6834 18.2929 14.2929L19.5858 13L11 13C10.4477 13 10 12.5523 10 12C10 11.4477 10.4477 11 11 11L19.5858 11L18.2929 9.70711C17.9024 9.31658 17.9024 8.68342 18.2929 8.29289Z"
                                fill="currentColor"/>
                        </svg>
                        Déconnexion
                    </a>

                </div>

            <!-- Si l'utilisateur n'est pas connecté -->
            <?php else: ?>

                <!-- Bouton à gauche -->
                <div class="nav-left">

                    <!-- Bouton LeBonChar -->
                    <a href="/" class="btn btn-home">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M3 11H4.04548M4.04548 11H19.9545M4.04548 11C4.05661 10.9485 4.06977 10.8975 4.08496 10.8471C4.12122 10.7268 4.17242 10.6111 4.27539 10.3795L5.82165 6.90039C6.12737 6.21253 6.28048 5.8684 6.5221 5.61621C6.73568 5.39329 6.99764 5.223 7.28809 5.11837C7.61667 5 7.99336 5 8.74609 5H15.2536C16.0063 5 16.3833 5 16.7119 5.11837C17.0024 5.223 17.264 5.39329 17.4775 5.61621C17.719 5.86823 17.8718 6.21208 18.1771 6.899L19.7296 10.3921C19.8289 10.6154 19.8794 10.729 19.915 10.8471C19.9301 10.8975 19.9433 10.9485 19.9545 11M4.04548 11C4.03302 11.0576 4.0231 11.1158 4.01572 11.1743C4 11.299 4 11.4257 4 11.6792V17M19.9545 11H21M19.9545 11C19.967 11.0576 19.977 11.1158 19.9844 11.1743C20 11.2982 20 11.4242 20 11.6746V17.0001M20 17.0001L16 17.0001M20 17.0001V17.9999C20 19.1045 19.1046 20 18 20C16.8954 20 16 19.1046 16 18V17.0001M16 17.0001L8 17M8 17H4M8 17V18C8 19.1046 7.10457 20 6 20C4.89543 20 4 19.1046 4 18V17"
                                stroke="currentColor"
                                stroke-width="2"
                            />
                        </svg>
                        LeBonChar
                    </a>

                </div>

                <!-- Boutons à droite -->
                <div class="nav-right">

                    <!-- Bouton de connexion -->
                    <a href="/connexion" class="btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M15 19C15 16.7909 12.3137 15 9 15C5.68629 15 3 16.7909 3 19M21 10L17 14L15 12M9 12C6.79086 12 5 10.2091 5 8C5 5.79086 6.79086 4 9 4C11.2091 4 13 5.79086 13 8C13 10.2091 11.2091 12 9 12Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        Se connecter
                    </a>

                    <!-- Bouton d'inscription -->
                    <a href="/inscription" class="btn btn-home">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M15 19C15 16.7909 12.3137 15 9 15C5.68629 15 3 16.7909 3 19M19 16V13M19 13V10M19 13H16M19 13H22M9 12C6.79086 12 5 10.2091 5 8C5 5.79086 6.79086 4 9 4C11.2091 4 13 5.79086 13 8C13 10.2091 11.2091 12 9 12Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        S'inscrire
                    </a>

                </div>

            <?php endif; ?>
        </div>

        <!-- Composant des messages -->
        <?php require_once '../app/vues/composants/messages.php'; ?>

        <!-- S'il n'y a pas d'annonces -->
        <?php if (empty($annonces)): ?>

            <div class="card">
                <div class="card-content text-center">
                    <div class="mt-lg mb-lg">
                        <svg width="64" height="64" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M7 9L17 9"
                                stroke="var(--indigo)"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M7 12L13 12"
                                stroke="var(--indigo)"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M21 13V7C21 5.11438 21 4.17157 20.4142 3.58579C19.8284 3 18.8856 3 17 3H7C5.11438 3 4.17157 3 3.58579 3.58579C3 4.17157 3 5.11438 3 7V13C3 14.8856 3 15.8284 3.58579 16.4142C4.17157 17 5.11438 17 7 17H9H9.02322C9.31982 17 9.5955 17.1528 9.75269 17.4043L11.864 20.7824C11.9268 20.8829 12.0732 20.8829 12.136 20.7824L14.2945 17.3288C14.4223 17.1242 14.6465 17 14.8877 17H15H17C18.8856 17 19.8284 17 20.4142 16.4142C21 15.8284 21 14.8856 21 13Z"
                                stroke="var(--indigo)"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>

                    <h2 class="form-title">Aucune annonce disponible pour le moment.</h2>

                    <p class="mb-lg">Revenez plus tard pour découvrir de nouvelles annonces.</p>
                </div>
            </div>

        <!-- S'il y a des annonces -->
        <?php else: ?>

            <!-- Affichage des annonces en liste -->
            <ul class="car-list">
                <?php foreach ($annonces as $annonce): ?>

                    <?php
                        $imgUrl = !empty($images[$annonce['id']]) ? htmlspecialchars($images[$annonce['id']][0]['url']) : 'defaut.png';
                        $statusClass = '';
                        $statusText = '';

                        if ($annonce['acheteur_id'] !== null) {
                            $statusClass = 'car-item-reserved';
                            $statusText = 'Réservée';
                        }
                    ?>

                    <li class="car-item <?= $statusClass; ?>">

                        <!-- Image de la voiture -->
                        <img
                            class="car-item-img"
                            src="/images/<?= htmlspecialchars($imgUrl); ?>"
                            onerror="this.onerror=null;this.src='/images/defaut.png';"
                            alt="<?= htmlspecialchars($annonce['titre']); ?>"
                        />

                        <!-- Contenu de l'annonce -->
                        <div class="car-item-content">

                            <!-- Statut de l'annonce -->
                            <?php if (!empty($statusText)): ?>
                                <div class="car-item-status"><?= $statusText; ?></div>
                            <?php endif; ?>

                            <!-- Titre de l'annonce -->
                            <h3 class="car-item-title">
                                <?= htmlspecialchars($annonce['titre']); ?>
                            </h3>

                            <!-- Prix de la voiture -->
                            <p class="car-item-price">
                                <?= number_format($annonce['prix'], 0, ',', ' '); ?> €
                            </p>

                            <!-- Détails de la voiture -->
                            <div class="car-item-details">

                                <!-- Marque et modèle -->
                                <?php if (!empty($annonce['marque']) && !empty($annonce['modele'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path
                                                d="M3 11H4.04548M4.04548 11H19.9545M4.04548 11C4.05661 10.9485 4.06977 10.8975 4.08496 10.8471C4.12122 10.7268 4.17242 10.6111 4.27539 10.3795L5.82165 6.90039C6.12737 6.21253 6.28048 5.8684 6.5221 5.61621C6.73568 5.39329 6.99764 5.223 7.28809 5.11837C7.61667 5 7.99336 5 8.74609 5H15.2536C16.0063 5 16.3833 5 16.7119 5.11837C17.0024 5.223 17.264 5.39329 17.4775 5.61621C17.719 5.86823 17.8718 6.21208 18.1771 6.899L19.7296 10.3921C19.8289 10.6154 19.8794 10.729 19.915 10.8471C19.9301 10.8975 19.9433 10.9485 19.9545 11M4.04548 11C4.03302 11.0576 4.0231 11.1158 4.01572 11.1743C4 11.299 4 11.4257 4 11.6792V17M19.9545 11H21M19.9545 11C19.967 11.0576 19.977 11.1158 19.9844 11.1743C20 11.2982 20 11.4242 20 11.6746V17.0001M20 17.0001L16 17.0001M20 17.0001V17.9999C20 19.1045 19.1046 20 18 20C16.8954 20 16 19.1046 16 18V17.0001M16 17.0001L8 17M8 17H4M8 17V18C8 19.1046 7.10457 20 6 20C4.89543 20 4 19.1046 4 18V17"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            />
                                        </svg>
                                        <?= htmlspecialchars($annonce['marque'] . ' ' . $annonce['modele']); ?>
                                    </span>
                                <?php endif; ?>

                                <!-- Année -->
                                <?php if (!empty($annonce['annee'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path
                                                d="M8 1C8.55229 1 9 1.44772 9 2V3.00228C9.29723 2.99999 9.61798 3 9.96449 3H14.0355C14.382 3 14.7028 2.99999 15 3.00228V2C15 1.44772 15.4477 1 16 1C16.5523 1 17 1.44772 17 2V3.12459C17.3192 3.17902 17.621 3.25947 17.9134 3.3806C19.1386 3.88807 20.1119 4.86144 20.6194 6.08658C20.8305 6.59628 20.9181 7.13456 20.9596 7.74331C21 8.33531 21 9.06272 21 9.96448V13.6035C21 14.7056 21 15.5944 20.9403 16.3138C20.8788 17.0547 20.7487 17.7049 20.4371 18.3049C19.9627 19.2181 19.2181 19.9627 18.3049 20.4371C17.7049 20.7487 17.0547 20.8788 16.3138 20.9403C15.5944 21 14.7056 21 13.6035 21H10.3965C9.29444 21 8.40557 21 7.68616 20.9403C6.94535 20.8788 6.29513 20.7487 5.69513 20.4371C4.78191 19.9627 4.03731 19.2181 3.56293 18.3049C3.25126 17.7049 3.12125 17.0547 3.05972 16.3138C2.99998 15.5944 2.99999 14.7056 3 13.6035V9.96449C2.99999 9.06273 2.99999 8.33531 3.04038 7.74331C3.08191 7.13456 3.16948 6.59628 3.3806 6.08658C3.88807 4.86144 4.86144 3.88807 6.08658 3.3806C6.37901 3.25947 6.68085 3.17902 7 3.12459V2C7 1.44772 7.44772 1 8 1ZM7 5.17476C6.94693 5.19142 6.89798 5.20929 6.85195 5.22836C6.11687 5.53284 5.53284 6.11687 5.22836 6.85195C5.135 7.07733 5.07033 7.37254 5.03574 7.87945C5.01452 8.19046 5.0059 8.55351 5.00239 9H18.9976C18.9941 8.55351 18.9855 8.19046 18.9643 7.87945C18.9297 7.37254 18.865 7.07733 18.7716 6.85195C18.4672 6.11687 17.8831 5.53284 17.1481 5.22836C17.102 5.20929 17.0531 5.19142 17 5.17476V6C17 6.55228 16.5523 7 16 7C15.4477 7 15 6.55228 15 6V5.00239C14.7059 5.00009 14.3755 5 14 5H10C9.62448 5 9.29413 5.00009 9 5.00239V6C9 6.55228 8.55229 7 8 7C7.44772 7 7 6.55228 7 6V5.17476ZM19 11H5V13.56C5 14.7158 5.0008 15.5214 5.05286 16.1483C5.10393 16.7632 5.19909 17.116 5.33776 17.3829C5.62239 17.9309 6.06915 18.3776 6.61708 18.6622C6.88403 18.8009 7.23678 18.8961 7.85168 18.9471C8.47856 18.9992 9.28423 19 10.44 19H13.56C14.7158 19 15.5214 18.9992 16.1483 18.9471C16.7632 18.8961 17.116 18.8009 17.3829 18.6622C17.9309 18.3776 18.3776 17.9309 18.6622 17.3829C18.8009 17.116 18.8961 16.7632 18.9471 16.1483C18.9992 15.5214 19 14.7158 19 13.56V11ZM13 16C13 15.4477 13.4477 15 14 15H16C16.5523 15 17 15.4477 17 16C17 16.5523 16.5523 17 16 17H14C13.4477 17 13 16.5523 13 16Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <?= date('Y', strtotime($annonce['annee'])); ?>
                                    </span>
                                <?php endif; ?>

                                <!-- Kilométrage -->
                                <?php if (!empty($annonce['kilometrage'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path
                                                d="M16 13L19 16M19 16L16 19M19 16H5M8 11L5 8M5 8L8 5M5 8H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <?= number_format($annonce['kilometrage'], 0, ',', ' '); ?> km
                                    </span>
                                <?php endif; ?>

                                <!-- Énergie -->
                                <?php if (!empty($annonce['energie'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path
                                                d="M6 14L13 2V10H18L11 22V14H6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <?= htmlspecialchars($annonce['energie']); ?>
                                    </span>
                                <?php endif; ?>

                            </div>

                            <!-- Description courte -->
                            <?php if (!empty($annonce['description'])): ?>
                                <p class="car-item-description">
                                    <?= htmlspecialchars(substr($annonce['description'], 0, 150)); ?>...
                                </p>
                            <?php endif; ?>

                            <!-- Boutons d'action -->
                            <div class="car-item-actions">

                                <!-- Ouvrir la page de détail -->
                                <a href="/annonce/detail?id=<?= $annonce['id']; ?>" class="btn btn-secondary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                        <path
                                            d="M9 6C9 4.34315 7.65685 3 6 3H4C2.34315 3 1 4.34315 1 6V8C1 9.65685 2.34315 11 4 11H6C7.65685 11 9 9.65685 9 8V6ZM7 6C7 5.44772 6.55228 5 6 5H4C3.44772 5 3 5.44772 3 6V8C3 8.55228 3.44772 9 4 9H6C6.55228 9 7 8.55228 7 8V6Z"
                                            fill="currentColor"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                        />
                                        <path
                                            d="M9 16C9 14.3431 7.65685 13 6 13H4C2.34315 13 1 14.3431 1 16V18C1 19.6569 2.34315 21 4 21H6C7.65685 21 9 19.6569 9 18V16ZM7 16C7 15.4477 6.55228 15 6 15H4C3.44772 15 3 15.4477 3 16V18C3 18.5523 3.44772 19 4 19H6C6.55228 19 7 18.5523 7 18V16Z"
                                            fill="currentColor"
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                        />
                                        <path
                                            d="M11 7C11 6.44772 11.4477 6 12 6H22C22.5523 6 23 6.44772 23 7C23 7.55228 22.5523 8 22 8H12C11.4477 8 11 7.55228 11 7Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M11 17C11 16.4477 11.4477 16 12 16H22C22.5523 16 23 16.4477 23 17C23 17.5523 22.5523 18 22 18H12C11.4477 18 11 17.5523 11 17Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                    Voir détail
                                </a>

                                <!-- Si l'utilisateur est connecté et que l'annonce n'est pas réservée -->
                                <?php if ($annonce['acheteur_id'] !== null && isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['acheteur_id']): ?>

                                    <?php require_once '../app/vues/composants/acheteur-reserve.php'; ?>

                                <!-- Sinon si l'utilisateur est connecté mais n'est pas l'acheteur -->
                                <?php elseif ($annonce['acheteur_id'] === null && isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] !== $annonce['utilisateur_id']): ?>

                                    <?php require_once '../app/vues/composants/acheteur.php'; ?>

                                <!-- Sinon si l'utilisateur est connecté et que c'est son annonce -->
                                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>

                                    <?php require_once '../app/vues/composants/vendeur.php'; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>

        <?php endif; ?>

    </div>
</body>
</html>