<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= htmlspecialchars($annonce['titre']); ?> - LeBonChar</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <!-- Contenu de la page -->
    <div class="container">

        <!-- Titre de l'annonce -->
        <h1 class="page-title"><?= htmlspecialchars($annonce['titre']); ?></h1>

        <!-- Navigation -->
        <div class="nav">

            <!-- Boutons à gauche -->
            <div class="nav-left">

                <a href="javascript:history.back()" class="btn btn-back">
                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M19 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Retour
                </a>

                <a href="/" class="btn btn-home">
                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path
                            d="M12.2796 3.71579C12.097 3.66261 11.903 3.66261 11.7203 3.71579C11.6678 3.7311 11.5754 3.7694 11.3789 3.91817C11.1723 4.07463 10.9193 4.29855 10.5251 4.64896L5.28544 9.3064C4.64309 9.87739 4.46099 10.0496 4.33439 10.24C4.21261 10.4232 4.12189 10.6252 4.06588 10.8379C4.00765 11.0591 3.99995 11.3095 3.99995 12.169V17.17C3.99995 18.041 4.00076 18.6331 4.03874 19.0905C4.07573 19.536 4.14275 19.7634 4.22513 19.9219C4.41488 20.2872 4.71272 20.5851 5.07801 20.7748C5.23658 20.8572 5.46397 20.9242 5.90941 20.9612C6.36681 20.9992 6.95893 21 7.82995 21H7.99995V18C7.99995 15.7909 9.79081 14 12 14C14.2091 14 16 15.7909 16 18V21H16.17C17.041 21 17.6331 20.9992 18.0905 20.9612C18.5359 20.9242 18.7633 20.8572 18.9219 20.7748C19.2872 20.5851 19.585 20.2872 19.7748 19.9219C19.8572 19.7634 19.9242 19.536 19.9612 19.0905C19.9991 18.6331 20 18.041 20 17.17V12.169C20 11.3095 19.9923 11.0591 19.934 10.8379C19.878 10.6252 19.7873 10.4232 19.6655 10.24C19.5389 10.0496 19.3568 9.87739 18.7145 9.3064L13.4748 4.64896C13.0806 4.29855 12.8276 4.07463 12.621 3.91817C12.4245 3.7694 12.3321 3.7311 12.2796 3.71579ZM11.1611 1.79556C11.709 1.63602 12.2909 1.63602 12.8388 1.79556C13.2189 1.90627 13.5341 2.10095 13.8282 2.32363C14.1052 2.53335 14.4172 2.81064 14.7764 3.12995L20.0432 7.81159C20.0716 7.83679 20.0995 7.86165 20.1272 7.88619C20.6489 8.34941 21.0429 8.69935 21.3311 9.13277C21.5746 9.49916 21.7561 9.90321 21.8681 10.3287C22.0006 10.832 22.0004 11.359 22 12.0566C22 12.0936 22 12.131 22 12.169V17.212C22 18.0305 22 18.7061 21.9543 19.2561C21.9069 19.8274 21.805 20.3523 21.5496 20.8439C21.1701 21.5745 20.5744 22.1701 19.8439 22.5496C19.3522 22.805 18.8274 22.9069 18.256 22.9543C17.706 23 17.0305 23 16.2119 23H15.805C15.7972 23 15.7894 23 15.7814 23C15.6603 23 15.5157 23.0001 15.3883 22.9895C15.2406 22.9773 15.0292 22.9458 14.8085 22.8311C14.5345 22.6888 14.3111 22.4654 14.1688 22.1915C14.0542 21.9707 14.0227 21.7593 14.0104 21.6116C13.9998 21.4843 13.9999 21.3396 13.9999 21.2185L14 18C14 16.8954 13.1045 16 12 16C10.8954 16 9.99995 16.8954 9.99995 18L9.99996 21.2185C10 21.3396 10.0001 21.4843 9.98949 21.6116C9.97722 21.7593 9.94572 21.9707 9.83107 22.1915C9.68876 22.4654 9.46538 22.6888 9.19142 22.8311C8.9707 22.9458 8.75929 22.9773 8.6116 22.9895C8.48423 23.0001 8.33959 23 8.21847 23C8.21053 23 8.20268 23 8.19495 23H7.78798C6.96944 23 6.29389 23 5.74388 22.9543C5.17253 22.9069 4.64769 22.805 4.15605 22.5496C3.42548 22.1701 2.8298 21.5745 2.4503 20.8439C2.19492 20.3523 2.09305 19.8274 2.0456 19.2561C1.99993 18.7061 1.99994 18.0305 1.99995 17.212L1.99995 12.169C1.99995 12.131 1.99993 12.0936 1.99992 12.0566C1.99955 11.359 1.99928 10.832 2.1318 10.3287C2.24383 9.90321 2.42528 9.49916 2.66884 9.13277C2.95696 8.69935 3.35105 8.34941 3.87272 7.8862C3.90036 7.86165 3.92835 7.83679 3.95671 7.81159L9.22354 3.12996C9.58274 2.81064 9.89467 2.53335 10.1717 2.32363C10.4658 2.10095 10.781 1.90627 11.1611 1.79556Z"
                            fill="currentColor"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                        />
                    </svg>
                    Accueil
                </a>

            </div>

            <!-- Boutons à droite -->
            <div class="nav-right">

                <?php if ($annonce['acheteur_id'] !== null): ?>

                    <?php if (isset($_SESSION['utilisateur_id']) && $annonce['acheteur_id'] === $_SESSION['utilisateur_id']): ?>

                        <span class="btn btn-home">Dans votre panier</span>

                        <a href="/annonce/supprimer-du-panier?id=<?= $annonce['id']; ?>" class="btn btn-cancel">
                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H8Z" fill="currentColor"/>
                                <path
                                    d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12Z"
                                    fill="currentColor"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            Retirer
                        </a>

                    <?php else: ?>

                        <span class="btn btn-home">
                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path d="M7.99988 6C7.99988 3.79086 9.79074 2 11.9999 2H16.9999C19.209 2 20.9999 3.79086 20.9999 6V16.0514C20.9999 17.6802 19.157 18.626 17.8337 17.6762L15.9999 16.3601V20.0514C15.9999 21.6802 14.157 22.626 12.8337 21.6762L9.49988 19.2835L6.16603 21.6762C4.84275 22.626 2.99988 21.6802 2.99988 20.0514V10C2.99988 7.79086 4.79074 6 6.99988 6H7.99988ZM9.99988 6C9.99988 4.89543 10.8953 4 11.9999 4H16.9999C18.1044 4 18.9999 4.89543 18.9999 6V16.0514L15.9999 13.8983V10C15.9999 7.79086 14.209 6 11.9999 6H9.99988ZM6.99988 8C5.89531 8 4.99988 8.89543 4.99988 10V20.0514L8.33373 17.6587C9.0307 17.1585 9.96906 17.1585 10.666 17.6587L13.9999 20.0514V10C13.9999 8.89543 13.1044 8 11.9999 8H6.99988Z" fill="currentColor"/>
                            </svg>
                            Réservée par un autre utilisateur
                        </span>

                    <?php endif; ?>

                <?php elseif ($_SESSION['utilisateur_id'] !== $annonce['utilisateur_id']): ?>

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
                        Réserver
                    </a>

                <?php endif; ?>

            </div>

        </div>

        <?php require_once '../app/vues/composants/messages.php'; ?>

        <!-- Galerie d'images -->
        <div class="car-gallery">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $img): ?>
                    <img
                        src="/images/<?= htmlspecialchars($img['url']); ?>"
                        onerror="this.onerror=null;this.src='/images/defaut.png';"
                        alt="<?= htmlspecialchars($annonce['titre']); ?>"
                    />
                <?php endforeach; ?>
            <?php else: ?>
                <img src="/images/defaut.png" alt="Image par défaut" onerror="this.style.display = 'none'" />
            <?php endif; ?>
        </div>

        <!-- Prix et description -->
        <div class="card mb-lg">
            <div class="card-content">
                <h2 class="card-price"><?= number_format($voiture['prix'], 0, ',', ' '); ?> €</h2>
                <div class="car-description">
                    <?= nl2br(htmlspecialchars($annonce['description'])); ?>
                </div>
            </div>
        </div>

        <!-- Spécifications techniques -->
        <div class="car-details">
            <!-- Caractéristiques principales -->
            <div class="car-spec">
                <h3>Caractéristiques principales</h3>
                <ul class="car-spec-list">
                    <li class="car-spec-item">
                        <span class="car-spec-label">Année</span>
                        <span><?= date('Y', strtotime($annonce['annee'])); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Kilométrage</span>
                        <span><?= number_format($annonce['kilometrage'], 0, ',', ' '); ?> km</span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Catégorie</span>
                        <span><?= htmlspecialchars($annonce['categorie']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Couleur</span>
                        <span><?= htmlspecialchars($annonce['couleur']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Marque</span>
                        <span><?= htmlspecialchars($annonce['marque']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Modèle</span>
                        <span><?= htmlspecialchars($annonce['modele']); ?></span>
                    </li>
                </ul>
            </div>

            <!-- Caractéristiques techniques -->
            <div class="car-spec">
                <h3>Caractéristiques techniques</h3>
                <ul class="car-spec-list">
                    <li class="car-spec-item">
                        <span class="car-spec-label">Type</span>
                        <span><?= htmlspecialchars($annonce['type']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Énergie</span>
                        <span><?= htmlspecialchars($annonce['energie']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Nombre de portes</span>
                        <span><?= htmlspecialchars($annonce['nombre_portes']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Nombre de places</span>
                        <span><?= htmlspecialchars($annonce['nombre_places']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Sellerie</span>
                        <span><?= htmlspecialchars($annonce['sellerie']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Consommation</span>
                        <span><?= htmlspecialchars($annonce['consommation']); ?> L/100km</span>
                    </li>
                </ul>
            </div>

            <!-- Informations complémentaires -->
            <div class="car-spec">
                <h3>Informations complémentaires</h3>
                <ul class="car-spec-list">
                    <li class="car-spec-item">
                        <span class="car-spec-label">Première main</span>
                        <span><?= $annonce['premiere_main'] ? 'Oui' : 'Non'; ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Provenance</span>
                        <span><?= htmlspecialchars($annonce['provenance']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Mise en circulation</span>
                        <span><?= htmlspecialchars($annonce['mise_en_circulation']); ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Actions disponibles -->
        <div class="nav mt-lg">

            <?php if ($annonce['statut'] === 'archive'): ?>

                <span class="btn btn-home">Annonce archivée</span>

                <?php if (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                    <a href="/annonce/archiver?id=<?= $annonce['id']; ?>&action=desarchiver" class="btn btn-secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path d="M12 3C12.2652 3 12.5195 3.10536 12.7071 3.29289L16.7071 7.29289C17.0976 7.68342 17.0976 8.31658 16.7071 8.70711C16.3166 9.09763 15.6834 9.09763 15.2929 8.70711L13 6.41421L13 15C13 15.5523 12.5523 16 12 16C11.4477 16 11 15.5523 11 15L11 6.41421L8.70708 8.70711C8.31656 9.09763 7.68339 9.09763 7.29287 8.70711C6.90235 8.31658 6.90234 7.68342 7.29287 7.29289L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3Z" fill="currentColor"/>
                            <path d="M3.99998 14C4.55226 14 4.99998 14.4477 4.99998 15C4.99998 15.9772 5.00482 16.3198 5.05762 16.5853C5.29434 17.7753 6.22463 18.7056 7.41471 18.9424C7.68015 18.9952 8.02273 19 8.99998 19H15C15.9772 19 16.3198 18.9952 16.5852 18.9424C17.7753 18.7056 18.7056 17.7753 18.9423 16.5853C18.9951 16.3198 19 15.9772 19 15C19 14.4477 19.4477 14 20 14C20.5523 14 21 14.4477 21 15C21 15.0392 21 15.0777 21 15.1157C21.0002 15.9334 21.0003 16.4906 20.9039 16.9755C20.5094 18.9589 18.9589 20.5094 16.9754 20.9039C16.4906 21.0004 15.9333 21.0002 15.1158 21C15.0777 21 15.0391 21 15 21H8.99998C8.96081 21 8.92222 21 8.8842 21C8.06661 21.0002 7.50932 21.0004 7.02452 20.9039C5.04107 20.5094 3.49058 18.9589 3.09605 16.9755C2.99962 16.4906 2.99975 15.9334 2.99996 15.1158C2.99997 15.0777 2.99998 15.0392 2.99998 15C2.99998 14.4477 3.44769 14 3.99998 14Z" fill="currentColor"/>
                        </svg>
                        Désarchiver l'annonce
                    </a>
                <?php endif; ?>

            <?php else: ?>

                <?php if ($annonce['acheteur_id'] !== null): ?>

                    <?php if (isset($_SESSION['utilisateur_id']) && $annonce['acheteur_id'] === $_SESSION['utilisateur_id']): ?>

                        <span class="btn btn-home">Annonce réservée par vous</span>

                        <a href="/annonce/supprimer-du-panier?id=<?= $annonce['id']; ?>" class="btn btn-cancel">
                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H8Z" fill="currentColor"/>
                                <path
                                    d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12Z"
                                    fill="currentColor"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            Annuler ma réservation
                        </a>

                    <?php else: ?>

                        <span class="btn btn-home">
                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path d="M7.99988 6C7.99988 3.79086 9.79074 2 11.9999 2H16.9999C19.209 2 20.9999 3.79086 20.9999 6V16.0514C20.9999 17.6802 19.157 18.626 17.8337 17.6762L15.9999 16.3601V20.0514C15.9999 21.6802 14.157 22.626 12.8337 21.6762L9.49988 19.2835L6.16603 21.6762C4.84275 22.626 2.99988 21.6802 2.99988 20.0514V10C2.99988 7.79086 4.79074 6 6.99988 6H7.99988ZM9.99988 6C9.99988 4.89543 10.8953 4 11.9999 4H16.9999C18.1044 4 18.9999 4.89543 18.9999 6V16.0514L15.9999 13.8983V10C15.9999 7.79086 14.209 6 11.9999 6H9.99988ZM6.99988 8C5.89531 8 4.99988 8.89543 4.99988 10V20.0514L8.33373 17.6587C9.0307 17.1585 9.96906 17.1585 10.666 17.6587L13.9999 20.0514V10C13.9999 8.89543 13.1044 8 11.9999 8H6.99988Z" fill="currentColor"/>
                            </svg>
                            Annonce déjà réservée
                        </span>

                    <?php endif; ?>

                <?php elseif ($_SESSION['utilisateur_id'] !== $annonce['utilisateur_id']): ?>

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

                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>

                    <span class="btn btn-home">Vous êtes le vendeur</span>

                    <a href="/annonce/modifier?id=<?= $annonce['id']; ?>" class="btn btn-secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M20.5337 3.3916C20.2236 3.08142 19.9559 2.81378 19.7193 2.60738C19.4702 2.39007 19.2019 2.1918 18.876 2.05679C18.1409 1.75231 17.3149 1.75231 16.5799 2.05679C16.2539 2.1918 15.9856 2.39007 15.7365 2.60738C15.4999 2.81378 15.2323 3.08141 14.9221 3.39159L8.93751 9.37615C8.52251 9.79078 8.20882 10.1042 7.97173 10.477C7.77111 10.7924 7.61569 11.1344 7.51002 11.4929C7.38514 11.9167 7.35534 12.3591 7.31592 12.9444L7.1842 14.8876C7.17485 15.0247 7.16396 15.1845 7.16666 15.3246C7.16974 15.4838 7.18962 15.7203 7.30999 15.9677C7.45687 16.2697 7.70083 16.5137 8.00282 16.6606C8.25029 16.7809 8.48679 16.8008 8.64598 16.8039C8.78602 16.8066 8.94585 16.7957 9.08298 16.7863L11.0261 16.6546C11.6114 16.6152 12.0539 16.5854 12.4776 16.4605C12.8362 16.3549 13.1782 16.1994 13.4936 15.9988C13.8664 15.7617 14.1798 15.448 14.5944 15.033L20.579 9.04845C20.8891 8.73829 21.1568 8.47067 21.3632 8.23405C21.5805 7.98491 21.7788 7.71662 21.9138 7.39069C22.2182 6.65561 22.2182 5.82968 21.9138 5.09459C21.7788 4.76867 21.5805 4.50038 21.3632 4.25124C21.1568 4.01464 20.8892 3.74704 20.579 3.43691L20.5337 3.3916ZM18.1106 3.90455C18.1522 3.92179 18.2324 3.96437 18.4046 4.11458C18.5836 4.27072 18.803 4.48928 19.1421 4.82843C19.4813 5.16758 19.6998 5.3869 19.856 5.56591C20.0062 5.73813 20.0488 5.81835 20.066 5.85996C20.1675 6.10499 20.1675 6.3803 20.066 6.62533C20.0488 6.66694 20.0062 6.74716 19.856 6.91938C19.7482 7.04288 19.6108 7.18558 19.4245 7.37359L16.597 4.54602C16.785 4.35976 16.9277 4.22231 17.0512 4.11458C17.2234 3.96437 17.3036 3.92179 17.3452 3.90455C17.5903 3.80306 17.8656 3.80306 18.1106 3.90455ZM15.1823 5.9598L18.0107 8.78823L13.2465 13.5525C12.7366 14.0624 12.5842 14.207 12.4202 14.3112C12.2625 14.4116 12.0915 14.4893 11.9122 14.5421C11.7258 14.597 11.5167 14.6168 10.7973 14.6655L9.19649 14.7741L9.30502 13.1732C9.3538 12.4538 9.37351 12.2447 9.42845 12.0583C9.48128 11.879 9.55899 11.708 9.6593 11.5503C9.76359 11.3863 9.90816 11.234 10.418 10.7241L15.1823 5.9598Z"
                                fill="currentColor"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                            />
                            <path
                                d="M11.0055 2C9.61949 1.99999 8.51721 1.99999 7.62839 2.0738C6.71811 2.14939 5.94253 2.30755 5.23415 2.67552C4.1383 3.24478 3.24477 4.1383 2.67552 5.23416C2.30755 5.94253 2.14939 6.71811 2.0738 7.6284C1.99999 8.51721 1.99999 9.61949 2 11.0055V12.9945C1.99999 14.3805 1.99999 15.4828 2.0738 16.3716C2.14939 17.2819 2.30755 18.0575 2.67552 18.7659C3.24477 19.8617 4.1383 20.7552 5.23415 21.3245C5.94253 21.6925 6.71811 21.8506 7.62839 21.9262C8.5172 22 9.61946 22 11.0054 22H13.0438C14.4068 22 15.4909 22 16.3654 21.9286C17.261 21.8554 18.0247 21.7023 18.7239 21.346C19.8529 20.7708 20.7708 19.8529 21.346 18.7239C21.7023 18.0247 21.8554 17.261 21.9286 16.3654C22 15.4909 22 14.4069 22 13.0439V13C22 12.4477 21.5523 12 21 12C20.4477 12 20 12.4477 20 13C20 14.4166 19.9992 15.419 19.9352 16.2026C19.8721 16.9745 19.7527 17.4457 19.564 17.816C19.1805 18.5686 18.5686 19.1805 17.816 19.564C17.4457 19.7527 16.9745 19.8721 16.2026 19.9352C15.419 19.9992 14.4166 20 13 20H11.05C9.60949 20 8.59025 19.9992 7.79391 19.9331C7.00955 19.8679 6.53142 19.7446 6.1561 19.5497C5.42553 19.1702 4.82985 18.5745 4.45035 17.8439C4.25538 17.4686 4.13208 16.9905 4.06694 16.2061C4.0008 15.4097 4 14.3905 4 12.95V11.05C4 9.60949 4.0008 8.59026 4.06694 7.79392C4.13208 7.00955 4.25538 6.53142 4.45035 6.15611C4.82985 5.42553 5.42553 4.82985 6.1561 4.45035C6.53142 4.25539 7.00955 4.13208 7.79391 4.06694C8.59025 4.00081 9.60949 4 11.05 4H12C12.5523 4 13 3.55229 13 3C13 2.44772 12.5523 2 12 2L11.0055 2Z"
                                fill="currentColor"
                            />
                        </svg>
                        Modifier l'annonce
                    </a>

                    <a href="/annonce/archiver?id=<?= $annonce['id']; ?>&action=archiver" class="btn btn-cancel">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M8 12C8 11.4477 8.44772 11 9 11H15C15.5523 11 16 11.4477 16 12C16 12.5523 15.5523 13 15 13H9C8.44772 13 8 12.5523 8 12Z"
                                fill="currentColor"
                            />
                            <path
                                d="M4 3C2.89543 3 2 3.89543 2 5V7C2 8.10457 2.89543 9 4 9L4 18C4 19.6569 5.34315 21 7 21H17C18.6569 21 20 19.6569 20 18V9C21.1046 9 22 8.10457 22 7V5C22 3.89543 21.1046 3 20 3H4ZM18 9H6V18C6 18.5523 6.44772 19 7 19H17C17.5523 19 18 18.5523 18 18V9ZM20 7V5H4V7H20Z"
                                fill="currentColor"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                            />
                        </svg>
                        Archiver l'annonce
                    </a>

                <?php endif; ?>

            <?php endif; ?>

        </div>

        <!-- Informations de contact du vendeur -->
        <!-- <div class="card mt-lg">
            <div class="card-content">
                <h2 class="form-title">Contact vendeur</h2>
                <p>Pour toute information complémentaire, veuillez contacter le vendeur.</p>
                <?php if (isset($_SESSION['utilisateur_id'])): ?>
                    <p class="mt-lg">
                        <a href="/contact?annonce_id=<?= $annonce['id']; ?>" class="btn btn-secondary">
                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="2"/>
                                <path d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Contacter le vendeur
                        </a>
                    </p>
                <?php else: ?>
                    <p class="mt-lg">
                        <a href="/connexion" class="btn btn-primary">Connectez-vous pour contacter le vendeur</a>
                    </p>
                <?php endif; ?>
            </div>
        </div> -->
    </div>
</body>
</html>