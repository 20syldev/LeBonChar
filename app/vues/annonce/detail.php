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
                        <path
                            d="M19 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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

                <?php if ($annonce['statut'] === 'archive'): ?>

                    <?php if (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                        <?php require_once '../app/vues/composants/vendeur.php'; ?>
                    <?php else: ?>
                        <span class="btn btn-home">Annonce archivée</span>
                    <?php endif; ?>

                <?php elseif ($annonce['acheteur_id'] !== null): ?>

                    <?php if (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['acheteur_id']): ?>
                        <?php require_once '../app/vues/composants/acheteur-reserve.php'; ?>
                    <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                        <?php require_once '../app/vues/composants/vendeur.php'; ?>
                    <?php else: ?>
                        <?php require_once '../app/vues/composants/reserve.php'; ?>
                    <?php endif; ?>

                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                    <?php require_once '../app/vues/composants/vendeur.php'; ?>
                <?php else: ?>
                    <?php require_once '../app/vues/composants/acheteur.php'; ?>
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

        <!-- Informations de contact du vendeur -->
        <!-- <div class="card mt-lg">
            <div class="card-content">
                <h2 class="form-title">Contact vendeur</h2>
                <p>Pour toute information complémentaire, veuillez contacter le vendeur.</p>
                <?php if (isset($_SESSION['utilisateur_id'])): ?>
                    <p class="mt-lg">
                        <a href="/contact?annonce_id=<?= $annonce['id']; ?>" class="btn btn-secondary">
                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="2"/>
                                <path
                                    d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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