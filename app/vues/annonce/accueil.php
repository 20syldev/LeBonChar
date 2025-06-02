<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>LeBonChar - Annonces de voitures</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <!-- Contenu de la page -->
    <div class="container">

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
                            <path d="M12 4C12.5523 4 13 4.44772 13 5V19C13 19.5523 12.5523 20 12 20C11.4477 20 11 19.5523 11 19V5C11 4.44772 11.4477 4 12 4Z" fill="currentColor"/>
                            <path d="M5 12C5 11.4477 5.44772 11 6 11H18C18.5523 11 19 11.4477 19 12C19 12.5523 18.5523 13 18 13H6C5.44772 13 5 12.5523 5 12Z" fill="currentColor"/>
                        </svg>
                        Créer une annonce
                    </a>

                </div>

                <!-- Boutons à droite -->
                <div class="nav-right">

                    <!-- Boutons de la page de vente -->
                    <a href="/vendre" class="btn btn-home">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path d="M8.00005 9C8.55233 9 9.00005 8.55228 9.00005 8C9.00005 7.44772 8.55233 7 8.00005 7C7.44776 7 7.00005 7.44772 7.00005 8C7.00005 8.55228 7.44776 9 8.00005 9Z" fill="currentColor"/>
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
                            <path d="M12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5ZM7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM7.45609 16.7264C6.40184 17.1946 6 17.7858 6 18.5C6 18.7236 6.03976 18.8502 6.09728 18.942C6.15483 19.0338 6.29214 19.1893 6.66219 19.3567C7.45312 19.7145 9.01609 20 12 20C14.9839 20 16.5469 19.7145 17.3378 19.3567C17.7079 19.1893 17.8452 19.0338 17.9027 18.942C17.9602 18.8502 18 18.7236 18 18.5C18 17.7858 17.5982 17.1946 16.5439 16.7264C15.4614 16.2458 13.8722 16 12 16C10.1278 16 8.53857 16.2458 7.45609 16.7264ZM6.64442 14.8986C8.09544 14.2542 10.0062 14 12 14C13.9938 14 15.9046 14.2542 17.3556 14.8986C18.8348 15.5554 20 16.7142 20 18.5C20 18.9667 19.9148 19.4978 19.5973 20.0043C19.2798 20.5106 18.7921 20.8939 18.1622 21.1789C16.9531 21.7259 15.0161 22 12 22C8.98391 22 7.04688 21.7259 5.83781 21.1789C5.20786 20.8939 4.72017 20.5106 4.40272 20.0043C4.08524 19.4978 4 18.9667 4 18.5C4 16.7142 5.16516 15.5554 6.64442 14.8986Z" fill="currentColor"/>
                        </svg>
                        Mon compte
                    </a>

                    <!-- Bouton de déconnexion -->
                    <a href="/deconnexion" class="btn btn-cancel">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path d="M2 6.5C2 4.01472 4.01472 2 6.5 2H12C14.2091 2 16 3.79086 16 6V7C16 7.55228 15.5523 8 15 8C14.4477 8 14 7.55228 14 7V6C14 4.89543 13.1046 4 12 4H6.5C5.11929 4 4 5.11929 4 6.5V17.5C4 18.8807 5.11929 20 6.5 20H12C13.1046 20 14 19.1046 14 18V17C14 16.4477 14.4477 16 15 16C15.5523 16 16 16.4477 16 17V18C16 20.2091 14.2091 22 12 22H6.5C4.01472 22 2 19.9853 2 17.5V6.5ZM18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289L22.7071 11.2929C23.0976 11.6834 23.0976 12.3166 22.7071 12.7071L19.7071 15.7071C19.3166 16.0976 18.6834 16.0976 18.2929 15.7071C17.9024 15.3166 17.9024 14.6834 18.2929 14.2929L19.5858 13L11 13C10.4477 13 10 12.5523 10 12C10 11.4477 10.4477 11 11 11L19.5858 11L18.2929 9.70711C17.9024 9.31658 17.9024 8.68342 18.2929 8.29289Z" fill="currentColor"/>
                        </svg>
                        Déconnexion
                    </a>

                </div>

            <?php else: ?>

                <div class="nav-right">

                    <!-- Bouton de connexion -->
                    <a href="/connexion" class="btn btn-primary">Se connecter</a>

                    <!-- Bouton d'inscription -->
                    <a href="/inscription" class="btn btn-home">S'inscrire</a>

                </div>

            <?php endif; ?>
        </div>

        <!-- Inclusion du composant de messages -->
        <?php require_once '../app/vues/composants/messages.php'; ?>

        <?php if (empty($annonces)): ?>
            <?php if (!isset($_SESSION['utilisateur_id'])) header('Location: /connexion'); ?>
            <div class="text-center mt-lg mb-lg">
                <p>Aucune annonce disponible pour le moment.</p>
            </div>
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

                    <li class="car-item <?php echo $statusClass; ?>">
                        <!-- Image de la voiture -->
                        <img
                            class="car-item-img"
                            src="/images/<?php echo $imgUrl; ?>"
                            onerror="this.onerror=null;this.src='/images/defaut.png';"
                            alt="<?php echo htmlspecialchars($annonce['titre']); ?>"
                        />

                        <!-- Contenu de l'annonce -->
                        <div class="car-item-content">
                            <?php if (!empty($statusText)): ?>
                                <div class="car-item-status"><?php echo $statusText; ?></div>
                            <?php endif; ?>

                            <h3 class="car-item-title">
                                <?php echo htmlspecialchars($annonce['titre']); ?>
                            </h3>

                            <p class="car-item-price">
                                <?php echo number_format($annonce['prix'], 0, ',', ' '); ?> €
                            </p>

                            <div class="car-item-details">
                                <!-- Marque et modèle -->
                                <?php if (!empty($annonce['marque']) && !empty($annonce['modele'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path d="M16.5 3C14.0147 3 12 5.01472 12 7.5V13.5C12 15.9853 14.0147 18 16.5 18C18.9853 18 21 15.9853 21 13.5V7.5C21 5.01472 18.9853 3 16.5 3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                            <path d="M12 8H8.5C5.46243 8 3 10.4624 3 13.5C3 16.5376 5.46243 19 8.5 19H12V8Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                        </svg>
                                        <?php echo htmlspecialchars($annonce['marque'] . ' ' . $annonce['modele']); ?>
                                    </span>
                                <?php endif; ?>

                                <!-- Année -->
                                <?php if (!empty($annonce['annee'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path d="M15 4V2M15 4V6M15 4H10.5M3 10V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V10H3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3 10V6C3 4.89543 3.89543 4 5 4H7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7 2V6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M21 10V6C21 4.89543 20.1046 4 19 4H18.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <?php echo date('Y', strtotime($annonce['annee'])); ?>
                                    </span>
                                <?php endif; ?>

                                <!-- Kilométrage -->
                                <?php if (!empty($annonce['kilometrage'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            <path d="M16.5 12L12 12L8.5 8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <?php echo number_format($annonce['kilometrage'], 0, ',', ' '); ?> km
                                    </span>
                                <?php endif; ?>

                                <!-- Énergie -->
                                <?php if (!empty($annonce['energie'])): ?>
                                    <span class="card-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path d="M15 7.40012L10.5019 12L15 16.5994" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                        <?php echo htmlspecialchars($annonce['energie']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Description courte -->
                            <?php if (!empty($annonce['description'])): ?>
                                <p class="car-item-description">
                                    <?php echo htmlspecialchars(substr($annonce['description'], 0, 150)); ?>...
                                </p>
                            <?php endif; ?>

                            <!-- Boutons d'action -->
                            <div class="car-item-actions">
                                <a href="/annonce/detail?id=<?php echo $annonce['id']; ?>" class="btn btn-secondary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                        <path d="M12 5C8.24261 5 5.43602 7.4404 3.76737 9.43934C2.51635 10.9394 2.51635 13.0606 3.76737 14.5607C5.43602 16.5596 8.24261 19 12 19C15.7574 19 18.564 16.5596 20.2326 14.5607C21.4837 13.0606 21.4837 10.9394 20.2326 9.43934C18.564 7.4404 15.7574 5 12 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Voir détail
                                </a>

                                <?php if ($annonce['acheteur_id'] !== null): ?>
                                    <?php if (isset($_SESSION['utilisateur_id']) && $annonce['acheteur_id'] === $_SESSION['utilisateur_id']): ?>
                                        <a href="/annonce/supprimer-du-panier?id=<?php echo $annonce['id']; ?>" class="btn btn-cancel">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                                <path d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H8Z" fill="currentColor"/>
                                                <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"/>
                                            </svg>
                                            Annuler
                                        </a>
                                    <?php endif; ?>
                                <?php elseif (!isset($_SESSION['utilisateur_id']) || $_SESSION['utilisateur_id'] !== $annonce['utilisateur_id']): ?>
                                    <a href="<?= isset($_SESSION['utilisateur_id']) ? '/annonce/ajouter-au-panier?id=' . $annonce['id'] : '/connexion' ?>" class="btn btn-primary">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path d="M8 1C8.55229 1 9 1.44772 9 2V3.00228C9.29723 2.99999 9.61798 3 9.96449 3H14.0355C14.382 3 14.7028 2.99999 15 3.00228V2C15 1.44772 15.4477 1 16 1C16.5523 1 17 1.44772 17 2V3.12459C17.3192 3.17902 17.621 3.25947 17.9134 3.3806C19.1386 3.88807 20.1119 4.86144 20.6194 6.08658C20.8305 6.59628 20.9181 7.13456 20.9596 7.74331C21 8.33531 21 9.06272 21 9.96448V13.6035C21 14.7056 21 15.5944 20.9403 16.3138C20.8788 17.0547 20.7487 17.7049 20.4371 18.3049C19.9627 19.2181 19.2181 19.9627 18.3049 20.4371C17.7049 20.7487 17.0547 20.8788 16.3138 20.9403C15.5944 21 14.7056 21 13.6035 21H10.3965C9.29444 21 8.40557 21 7.68616 20.9403C6.94535 20.8788 6.29513 20.7487 5.69513 20.4371C4.78191 19.9627 4.03731 19.2181 3.56293 18.3049C3.25126 17.7049 3.12125 17.0547 3.05972 16.3138C2.99998 15.5944 2.99999 14.7056 3 13.6035V9.96449C2.99999 9.06273 2.99999 8.33531 3.04038 7.74331C3.08191 7.13456 3.16948 6.59628 3.3806 6.08658C3.88807 4.86144 4.86144 3.88807 6.08658 3.3806C6.37901 3.25947 6.68085 3.17902 7 3.12459V2C7 1.44772 7.44772 1 8 1ZM7 5.17476C6.94693 5.19142 6.89798 5.20929 6.85195 5.22836C6.11687 5.53284 5.53284 6.11687 5.22836 6.85195C5.135 7.07733 5.07033 7.37254 5.03574 7.87945C5.01452 8.19046 5.0059 8.55351 5.00239 9H18.9976C18.9941 8.55351 18.9855 8.19046 18.9643 7.87945C18.9297 7.37254 18.865 7.07733 18.7716 6.85195C18.4672 6.11687 17.8831 5.53284 17.1481 5.22836C17.102 5.20929 17.0531 5.19142 17 5.17476V6C17 6.55228 16.5523 7 16 7C15.4477 7 15 6.55228 15 6V5.00239C14.7059 5.00009 14.3755 5 14 5H10C9.62448 5 9.29413 5.00009 9 5.00239V6C9 6.55228 8.55229 7 8 7C7.44772 7 7 6.55228 7 6V5.17476ZM19 11H5V13.56C5 14.7158 5.0008 15.5214 5.05286 16.1483C5.10393 16.7632 5.19909 17.116 5.33776 17.3829C5.62239 17.9309 6.06915 18.3776 6.61708 18.6622C6.88403 18.8009 7.23678 18.8961 7.85168 18.9471C8.47856 18.9992 9.28423 19 10.44 19H13.56C14.7158 19 15.5214 18.9992 16.1483 18.9471C16.7632 18.8961 17.116 18.8009 17.3829 18.6622C17.9309 18.3776 18.3776 17.9309 18.6622 17.3829C18.8009 17.116 18.8961 16.7632 18.9471 16.1483C18.9992 15.5214 19 14.7158 19 13.56V11ZM13 16C13 15.4477 13.4477 15 14 15H16C16.5523 15 17 15.4477 17 16C17 16.5523 16.5523 17 16 17H14C13.4477 17 13 16.5523 13 16Z" fill="currentColor"/>
                                        </svg>
                                        Réserver
                                    </a>
                                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                                    <div class="btn-group">
                                        <a href="/annonce/modifier?id=<?php echo $annonce['id']; ?>" class="btn btn-home">
                                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                                <path d="M20.5337 3.3916C20.2236 3.08142 19.9559 2.81378 19.7193 2.60738C19.4702 2.39007 19.2019 2.1918 18.876 2.05679C18.1409 1.75231 17.3149 1.75231 16.5799 2.05679C16.2539 2.1918 15.9856 2.39007 15.7365 2.60738C15.4999 2.81378 15.2323 3.08141 14.9221 3.39159L8.93751 9.37615C8.52251 9.79078 8.20882 10.1042 7.97173 10.477C7.77111 10.7924 7.61569 11.1344 7.51002 11.4929C7.38514 11.9167 7.35534 12.3591 7.31592 12.9444L7.1842 14.8876C7.17485 15.0247 7.16396 15.1845 7.16666 15.3246C7.16974 15.4838 7.18962 15.7203 7.30999 15.9677C7.45687 16.2697 7.70083 16.5137 8.00282 16.6606C8.25029 16.7809 8.48679 16.8008 8.64598 16.8039C8.78602 16.8066 8.94585 16.7957 9.08298 16.7863L11.0261 16.6546C11.6114 16.6152 12.0539 16.5854 12.4776 16.4605C12.8362 16.3549 13.1782 16.1994 13.4936 15.9988C13.8664 15.7617 14.1798 15.448 14.5944 15.033L20.579 9.04845C20.8891 8.73829 21.1568 8.47067 21.3632 8.23405C21.5805 7.98491 21.7788 7.71662 21.9138 7.39069C22.2182 6.65561 22.2182 5.82968 21.9138 5.09459C21.7788 4.76867 21.5805 4.50038 21.3632 4.25124C21.1568 4.01464 20.8892 3.74704 20.579 3.43691L20.5337 3.3916Z" fill="currentColor"/>
                                            </svg>
                                            Modifier
                                        </a>
                                        <a href="/annonce/archiver?id=<?php echo $annonce['id']; ?>&action=archiver" class="btn btn-cancel">
                                            <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                                <path d="M3 6.2C3 5.07989 3 4.51984 3.21799 4.09202C3.40973 3.71569 3.71569 3.40973 4.09202 3.21799C4.51984 3 5.07989 3 6.2 3H17.8C18.9201 3 19.4802 3 19.908 3.21799C20.2843 3.40973 20.5903 3.71569 20.782 4.09202C21 4.51984 21 5.07989 21 6.2V6.5C21 7.88071 19.8807 9 18.5 9H5.5C4.11929 9 3 7.88071 3 6.5V6.2Z" fill="currentColor"/>
                                                <path d="M5 11.25V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H15.8C16.9201 21 17.4802 21 17.908 20.782C18.2843 20.5903 18.5903 20.2843 18.782 19.908C19 19.4802 19 18.9201 19 17.8V11.25C17.8999 12.0764 16.5465 12.75 15 12.75H9C7.45345 12.75 6.10012 12.0764 5 11.25Z" fill="currentColor"/>
                                                <path d="M3.31375 10.0722C3.53669 9.81839 3.90353 9.79379 4.15735 10.0167C4.85535 10.6276 5.75528 11 6.75 11H17.25C18.2447 11 19.1446 10.6276 19.8426 10.0167C20.0965 9.79379 20.4633 9.81839 20.6862 10.0722C20.9092 10.3261 20.8846 10.6929 20.6307 10.9158C19.6914 11.7356 18.4788 12.25 17.25 12.25H6.75C5.52122 12.25 4.30861 11.7356 3.36929 10.9158C3.11547 10.6929 3.0908 10.3261 3.31375 10.0722Z" fill="currentColor"/>
                                            </svg>
                                            Archiver
                                        </a>
                                    </div>
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