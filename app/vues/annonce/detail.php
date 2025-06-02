<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php echo htmlspecialchars($annonce['titre']); ?> - LeBonChar</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <div class="container">

        <!-- Navigation -->
        <div class="navigation">
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
                        d="M12.2796 3.71579C12.097 3.66261 11.903 3.66261 11.7203 3.71579C11.6678 3.7311 11.5754 3.7694 11.3789 3.91817C11.1723 4.07463 10.9193 4.29855 10.5251 4.64896L5.28544 9.3064C4.64309 9.87739 4.46099 10.0496 4.33439 10.24C4.21261 10.4232 4.12189 10.6252 4.06588 10.8379C4.00765 11.0591 3.99995 11.3095 3.99995 12.169V17.17C3.99995 18.041 4.00076 18.6331 4.03874 19.0905C4.07573 19.536 4.14275 19.7634 4.22513 19.9219C4.41488 20.2872 4.71272 20.5851 5.07801 20.7748C5.23658 20.8572 5.46397 20.9242 5.90941 20.9612C6.36681 20.9992 6.95893 21 7.82995 21H7.99995V18C7.99995 15.7909 9.79081 14 12 14C14.2091 14 16 15.7909 16 18V21H16.17C17.041 21 17.6331 20.9992 18.0905 20.9612C18.5359 20.9242 18.7633 20.8572 18.9219 20.7748C19.2872 20.5851 19.585 20.2872 19.7748 19.9219C19.8572 19.7634 19.9242 19.536 19.9612 19.0905C19.9991 18.6331 20 18.041 20 17.17V12.169C20 11.3095 19.9923 11.0591 19.934 10.8379C19.878 10.6252 19.7873 10.4232 19.6655 10.24C19.5389 10.0496 19.3568 9.87739 18.7145 9.3064L13.4748 4.64896C13.0806 4.29855 12.8276 4.07463 12.621 3.91817C12.4245 3.7694 12.3321 3.7311 12.2796 3.71579Z"
                        fill="currentColor"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                    />
                </svg>
                Accueil
            </a>
        </div>

        <?php require_once '../app/vues/composants/messages.php'; ?>

        <!-- Titre de l'annonce -->
        <h1 class="page-title"><?php echo htmlspecialchars($annonce['titre']); ?></h1>

        <!-- Galerie d'images -->
        <div class="car-gallery">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $img): ?>
                    <img
                        src="/images/<?php echo htmlspecialchars($img['url']); ?>"
                        onerror="this.onerror=null;this.src='/images/defaut.png';"
                        alt="<?php echo htmlspecialchars($annonce['titre']); ?>"
                    />
                <?php endforeach; ?>
            <?php else: ?>
                <img src="/images/defaut.png" alt="Image par défaut" onerror="this.style.display = 'none'" />
            <?php endif; ?>
        </div>

        <!-- Prix et description -->
        <div class="card mb-lg">
            <div class="card-content">
                <h2 class="card-price"><?php echo number_format($voiture['prix'], 0, ',', ' '); ?> €</h2>
                <div class="car-description">
                    <?php echo nl2br(htmlspecialchars($annonce['description'])); ?>
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
                        <span><?php echo date('Y', strtotime($annonce['annee'])); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Kilométrage</span>
                        <span><?php echo number_format($annonce['kilometrage'], 0, ',', ' '); ?> km</span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Catégorie</span>
                        <span><?php echo htmlspecialchars($annonce['categorie']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Couleur</span>
                        <span><?php echo htmlspecialchars($annonce['couleur']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Marque</span>
                        <span><?php echo htmlspecialchars($annonce['marque']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Modèle</span>
                        <span><?php echo htmlspecialchars($annonce['modele']); ?></span>
                    </li>
                </ul>
            </div>

            <!-- Caractéristiques techniques -->
            <div class="car-spec">
                <h3>Caractéristiques techniques</h3>
                <ul class="car-spec-list">
                    <li class="car-spec-item">
                        <span class="car-spec-label">Type</span>
                        <span><?php echo htmlspecialchars($annonce['type']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Énergie</span>
                        <span><?php echo htmlspecialchars($annonce['energie']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Nombre de portes</span>
                        <span><?php echo htmlspecialchars($annonce['nombre_portes']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Nombre de places</span>
                        <span><?php echo htmlspecialchars($annonce['nombre_places']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Sellerie</span>
                        <span><?php echo htmlspecialchars($annonce['sellerie']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Consommation</span>
                        <span><?php echo htmlspecialchars($annonce['consommation']); ?> L/100km</span>
                    </li>
                </ul>
            </div>

            <!-- Informations complémentaires -->
            <div class="car-spec">
                <h3>Informations complémentaires</h3>
                <ul class="car-spec-list">
                    <li class="car-spec-item">
                        <span class="car-spec-label">Première main</span>
                        <span><?php echo $annonce['premiere_main'] ? 'Oui' : 'Non'; ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Provenance</span>
                        <span><?php echo htmlspecialchars($annonce['provenance']); ?></span>
                    </li>
                    <li class="car-spec-item">
                        <span class="car-spec-label">Mise en circulation</span>
                        <span><?php echo htmlspecialchars($annonce['mise_en_circulation']); ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Actions disponibles -->
        <div class="navigation mt-lg">
            <?php if ($annonce['statut'] === 'archive'): ?>
                <span class="btn btn-home">Annonce archivée</span>
                <?php if (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                    <a href="/annonce/archiver?id=<?php echo $annonce['id']; ?>&action=desarchiver" class="btn btn-secondary">
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
                        <a href="/annonce/supprimer-du-panier?id=<?php echo $annonce['id']; ?>" class="btn btn-cancel">
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
                                <path d="M9.78799 3H14.212C15.0305 2.99999 15.7061 2.99998 16.2561 3.04565C16.8274 3.0931 17.3523 3.19496 17.8439 3.45035C18.5745 3.82985 19.1702 4.42553 19.5497 5.1561C19.805 5.64774 19.9069 6.17258 19.9544 6.74393C20 7.29393 20 7.96946 20 8.78798V17.6227C20 18.5855 20 19.3755 19.9473 19.9759C19.8975 20.5418 19.7878 21.2088 19.348 21.6916C18.8075 22.2847 18.0153 22.5824 17.218 22.4919C16.5691 22.4182 16.0473 21.9884 15.6372 21.5953C15.2022 21.1783 14.6819 20.5837 14.0479 19.8591L13.6707 19.428C13.2362 18.9314 12.9521 18.6081 12.7167 18.3821C12.4887 18.1631 12.3806 18.1107 12.3262 18.0919C12.1148 18.019 11.8852 18.019 11.6738 18.0919C11.6194 18.1107 11.5113 18.1631 11.2833 18.3821C11.0479 18.6081 10.7638 18.9314 10.3293 19.428L9.95209 19.8591C9.31809 20.5837 8.79784 21.1782 8.36276 21.5953C7.95272 21.9884 7.43089 22.4182 6.78196 22.4919C5.9847 22.5824 5.19246 22.2847 4.65205 21.6916C4.21218 21.2088 4.10248 20.5418 4.05275 19.9759C3.99997 19.3755 3.99998 18.5855 4 17.6227V8.78799C3.99999 7.96947 3.99998 7.29393 4.04565 6.74393C4.0931 6.17258 4.19496 5.64774 4.45035 5.1561C4.82985 4.42553 5.42553 3.82985 6.1561 3.45035C6.64774 3.19496 7.17258 3.0931 7.74393 3.04565C8.29393 2.99998 8.96947 2.99999 9.78799 3Z" fill="currentColor"/>
                            </svg>
                            Annonce déjà réservée
                        </span>
                    <?php endif; ?>
                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] !== $annonce['utilisateur_id']): ?>
                    <a href="/annonce/ajouter-au-panier?id=<?php echo $annonce['id']; ?>" class="btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M1 3C1 2.44772 1.44772 2 2 2C3.62481 2 5.06733 3.03971 5.58114 4.58114L5.72076 5L18.03 5C18.6859 4.99998 19.2437 4.99996 19.6951 5.04029C20.165 5.08226 20.6347 5.17512 21.064 5.43584C21.6667 5.80183 22.1211 6.36838 22.3477 7.03605C22.5091 7.51168 22.4978 7.99036 22.4369 8.45816C22.3783 8.90755 22.2573 9.45209 22.115 10.0924L21.8088 11.4704C21.664 12.1218 21.5435 12.6641 21.4106 13.1043C21.2716 13.5649 21.1006 13.9803 20.8231 14.36C20.4058 14.931 19.8446 15.3812 19.1967 15.6646C18.7658 15.8532 18.3232 15.93 17.8434 15.9658C17.3849 16 16.8295 16 16.1621 16H10.8379C10.1705 16 9.61512 16 9.15656 15.9658C8.67678 15.93 8.23421 15.8532 7.80328 15.6646C7.15536 15.3812 6.59418 14.931 6.17692 14.36C5.89941 13.9803 5.72844 13.5649 5.58939 13.1043C5.45649 12.6641 5.33602 12.1219 5.19125 11.4704L4.035 6.26729L3.68377 5.21359C3.44219 4.48885 2.76395 4 2 4C1.44772 4 1 3.55228 1 3Z"
                                fill="currentColor"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                            />
                            <path d="M11 19C11 20.1046 10.1046 21 9 21C7.89543 21 7 20.1046 7 19C7 17.8954 7.89543 17 9 17C10.1046 17 11 17.8954 11 19Z" fill="currentColor"/>
                            <path d="M18 21C19.1046 21 20 20.1046 20 19C20 17.8954 19.1046 17 18 17C16.8954 17 16 17.8954 16 19C16 20.1046 16.8954 21 18 21Z" fill="currentColor"/>
                        </svg>
                        Réserver ce véhicule
                    </a>
                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                    <span class="btn btn-home">Vous êtes le vendeur</span>
                    <a href="/annonce/modifier?id=<?php echo $annonce['id']; ?>" class="btn btn-secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path d="M20.5337 3.3916C20.2236 3.08142 19.9559 2.81378 19.7193 2.60738C19.4702 2.39007 19.2019 2.1918 18.876 2.05679C18.1409 1.75231 17.3149 1.75231 16.5799 2.05679C16.2539 2.1918 15.9856 2.39007 15.7365 2.60738C15.4999 2.81378 15.2323 3.08141 14.9221 3.39159L8.93751 9.37615C8.52251 9.79078 8.20882 10.1042 7.97173 10.477C7.77111 10.7924 7.61569 11.1344 7.51002 11.4929C7.38514 11.9167 7.35534 12.3591 7.31592 12.9444L7.1842 14.8876C7.17485 15.0247 7.16396 15.1845 7.16666 15.3246C7.16974 15.4838 7.18962 15.7203 7.30999 15.9677C7.45687 16.2697 7.70083 16.5137 8.00282 16.6606C8.25029 16.7809 8.48679 16.8008 8.64598 16.8039C8.78602 16.8066 8.94585 16.7957 9.08298 16.7863L11.0261 16.6546C11.6114 16.6152 12.0539 16.5854 12.4776 16.4605C12.8362 16.3549 13.1782 16.1994 13.4936 15.9988C13.8664 15.7617 14.1798 15.448 14.5944 15.033L20.579 9.04845C20.8891 8.73829 21.1568 8.47067 21.3632 8.23405C21.5805 7.98491 21.7788 7.71662 21.9138 7.39069C22.2182 6.65561 22.2182 5.82968 21.9138 5.09459C21.7788 4.76867 21.5805 4.50038 21.3632 4.25124C21.1568 4.01464 20.8892 3.74704 20.579 3.43691L20.5337 3.3916Z" fill="currentColor"/>
                            <path d="M11.0055 2C9.61949 1.99999 8.51721 1.99999 7.62839 2.0738C6.71811 2.14939 5.94253 2.30755 5.23415 2.67552C4.1383 3.24478 3.24477 4.1383 2.67552 5.23416C2.30755 5.94253 2.14939 6.71811 2.0738 7.6284C1.99999 8.51721 1.99999 9.61949 2 11.0055V12.9945C1.99999 14.3805 1.99999 15.4828 2.0738 16.3716C2.14939 17.2819 2.30755 18.0575 2.67552 18.7659C3.24477 19.8617 4.1383 20.7552 5.23415 21.3245C5.94253 21.6925 6.71811 21.8506 7.62839 21.9262C8.5172 22 9.61946 22 11.0054 22H13.0438C14.4068 22 15.4909 22 16.3654 21.9286C17.261 21.8554 18.0247 21.7023 18.7239 21.346C19.8529 20.7708 20.7708 19.8529 21.346 18.7239C21.7023 18.0247 21.8554 17.261 21.9286 16.3654C22 15.4909 22 14.4069 22 13.0439V13C22 12.4477 21.5523 12 21 12C20.4477 12 20 12.4477 20 13C20 14.4166 19.9992 15.419 19.9352 16.2026C19.8721 16.9745 19.7527 17.4457 19.564 17.816C19.1805 18.5686 18.5686 19.1805 17.816 19.564C17.4457 19.7527 16.9745 19.8721 16.2026 19.9352C15.419 19.9992 14.4166 20 13 20H11.05C9.60949 20 8.59025 19.9992 7.79391 19.9331C7.00955 19.8679 6.53142 19.7446 6.1561 19.5497C5.42553 19.1702 4.82985 18.5745 4.45035 17.8439C4.25538 17.4686 4.13208 16.9905 4.06694 16.2061C4.0008 15.4097 4 14.3905 4 12.95V11.05C4 9.60949 4.0008 8.59026 4.06694 7.79392C4.13208 7.00955 4.25538 6.53142 4.45035 6.15611C4.82985 5.42553 5.42553 4.82985 6.1561 4.45035C6.53142 4.25539 7.00955 4.13208 7.79391 4.06694C8.59025 4.00081 9.60949 4 11.05 4H12C12.5523 4 13 3.55229 13 3C13 2.44772 12.5523 2 12 2L11.0055 2Z" fill="currentColor"/>
                        </svg>
                        Modifier l'annonce
                    </a>
                    <a href="/annonce/archiver?id=<?php echo $annonce['id']; ?>&action=archiver" class="btn btn-cancel">
                        <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path d="M3 6.2C3 5.07989 3 4.51984 3.21799 4.09202C3.40973 3.71569 3.71569 3.40973 4.09202 3.21799C4.51984 3 5.07989 3 6.2 3H17.8C18.9201 3 19.4802 3 19.908 3.21799C20.2843 3.40973 20.5903 3.71569 20.782 4.09202C21 4.51984 21 5.07989 21 6.2V6.5C21 7.88071 19.8807 9 18.5 9H5.5C4.11929 9 3 7.88071 3 6.5V6.2Z" fill="currentColor"/>
                            <path d="M3.31375 10.0722C3.53669 9.81839 3.90353 9.79379 4.15735 10.0167C4.85535 10.6276 5.75528 11 6.75 11H17.25C18.2447 11 19.1446 10.6276 19.8426 10.0167C20.0965 9.79379 20.4633 9.81839 20.6862 10.0722C20.9092 10.3261 20.8846 10.6929 20.6307 10.9158C19.6914 11.7356 18.4788 12.25 17.25 12.25H6.75C5.52122 12.25 4.30861 11.7356 3.36929 10.9158C3.11547 10.6929 3.0908 10.3261 3.31375 10.0722Z" fill="currentColor"/>
                            <path d="M5 11.25V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H15.8C16.9201 21 17.4802 21 17.908 20.782C18.2843 20.5903 18.5903 20.2843 18.782 19.908C19 19.4802 19 18.9201 19 17.8V11.25C17.8999 12.0764 16.5465 12.75 15 12.75H9C7.45345 12.75 6.10012 12.0764 5 11.25Z" fill="currentColor"/>
                        </svg>
                        Archiver l'annonce
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Informations de contact du vendeur -->
        <div class="card mt-lg">
            <div class="card-content">
                <h2 class="form-title">Contact vendeur</h2>
                <p>Pour toute information complémentaire, veuillez contacter le vendeur.</p>
                <?php if (isset($_SESSION['utilisateur_id'])): ?>
                    <p class="mt-lg">
                        <a href="/contact?annonce_id=<?php echo $annonce['id']; ?>" class="btn btn-secondary">
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
        </div>
    </div>
</body>
</html>