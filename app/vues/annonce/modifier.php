<?php
    if (empty($annonce)) header('Location: /vendre');
?>
<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $annonce['titre'] ?> - Modification</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Modifier l'annonce</h1>

        <div class="nav">
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

        <?php require_once '../app/vues/composants/messages.php'; ?>

        <?php if (empty($annonce)): ?>
            <div class="card">
                <div class="card-content">
                    <p class="text-center">Annonce introuvable.</p>
                    <div class="nav mt-lg">
                        <a href="/vendre" class="btn btn-secondary">Voir mes annonces</a>
                    </div>
                </div>
            </div>
        <?php elseif ($annonce['statut'] === 'archive'): ?>
            <div class="card">
                <div class="card-content">
                    <div class="text-center mb-lg">
                        <svg width="64" height="64" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M3 6.2C3 5.07989 3 4.51984 3.21799 4.09202C3.40973 3.71569 3.71569 3.40973 4.09202 3.21799C4.51984 3 5.07989 3 6.2 3H17.8C18.9201 3 19.4802 3 19.908 3.21799C20.2843 3.40973 20.5903 3.71569 20.782 4.09202C21 4.51984 21 5.07989 21 6.2V6.5C21 7.88071 19.8807 9 18.5 9H5.5C4.11929 9 3 7.88071 3 6.5V6.2Z" fill="var(--dark-gray)"/>
                            <path
                                d="M3.31375 10.0722C3.53669 9.81839 3.90353 9.79379 4.15735 10.0167C4.85535 10.6276 5.75528 11 6.75 11H17.25C18.2447 11 19.1446 10.6276 19.8426 10.0167C20.0965 9.79379 20.4633 9.81839 20.6862 10.0722C20.9092 10.3261 20.8846 10.6929 20.6307 10.9158C19.6914 11.7356 18.4788 12.25 17.25 12.25H6.75C5.52122 12.25 4.30861 11.7356 3.36929 10.9158C3.11547 10.6929 3.0908 10.3261 3.31375 10.0722Z" fill="var(--dark-gray)"/>
                            <path
                                d="M5 11.25V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H15.8C16.9201 21 17.4802 21 17.908 20.782C18.2843 20.5903 18.5903 20.2843 18.782 19.908C19 19.4802 19 18.9201 19 17.8V11.25C17.8999 12.0764 16.5465 12.75 15 12.75H9C7.45345 12.75 6.10012 12.0764 5 11.25Z" fill="var(--dark-gray)"/>
                        </svg>
                        <h2 class="form-title">Cette annonce est archivée</h2>
                        <p>Une annonce archivée ne peut pas être modifiée. Vous devez d'abord la désarchiver.</p>
                    </div>
                    <div class="nav">
                        <a href="/annonce/archiver?id=<?= $annonce['id']; ?>&action=desarchiver" class="btn btn-primary">
                            <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M12 3C12.2652 3 12.5195 3.10536 12.7071 3.29289L16.7071 7.29289C17.0976 7.68342 17.0976 8.31658 16.7071 8.70711C16.3166 9.09763 15.6834 9.09763 15.2929 8.70711L13 6.41421L13 15C13 15.5523 12.5523 16 12 16C11.4477 16 11 15.5523 11 15L11 6.41421L8.70708 8.70711C8.31656 9.09763 7.68339 9.09763 7.29287 8.70711C6.90235 8.31658 6.90234 7.68342 7.29287 7.29289L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M3.99998 14C4.55226 14 4.99998 14.4477 4.99998 15C4.99998 15.9772 5.00482 16.3198 5.05762 16.5853C5.29434 17.7753 6.22463 18.7056 7.41471 18.9424C7.68015 18.9952 8.02273 19 8.99998 19H15C15.9772 19 16.3198 18.9952 16.5852 18.9424C17.7753 18.7056 18.7056 17.7753 18.9423 16.5853C18.9951 16.3198 19 15.9772 19 15C19 14.4477 19.4477 14 20 14C20.5523 14 21 14.4477 21 15C21 15.0392 21 15.0777 21 15.1157C21.0002 15.9334 21.0003 16.4906 20.9039 16.9755C20.5094 18.9589 18.9589 20.5094 16.9754 20.9039C16.4906 21.0004 15.9333 21.0002 15.1158 21C15.0777 21 15.0391 21 15 21H8.99998C8.96081 21 8.92222 21 8.8842 21C8.06661 21.0002 7.50932 21.0004 7.02452 20.9039C5.04107 20.5094 3.49058 18.9589 3.09605 16.9755C2.99962 16.4906 2.99975 15.9334 2.99996 15.1158C2.99997 15.0777 2.99998 15.0392 2.99998 15C2.99998 14.4477 3.44769 14 3.99998 14Z"
                                    fill="currentColor"
                                />
                            </svg>
                            Désarchiver l'annonce
                        </a>
                        <a href="/annonce/detail?id=<?= $annonce['id']; ?>" class="btn btn-secondary">Voir l'annonce</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Formulaire de modification -->
            <div class="card">
                <div class="card-content">
                    <form action="/annonce/modifier?id=<?= $annonce['id']; ?>" method="POST" class="form" enctype="multipart/form-data">

                        <!-- Informations générales -->
                        <h2 class="form-title">Informations générales</h2>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-lg);">
                            <div class="form-group">
                                <label for="titre">Titre :</label>
                                <input type="text" id="titre" name="titre" value="<?= $annonce['titre']; ?>" placeholder="Un titre attractif pour votre annonce" required>
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix :</label>
                                <input type="number" id="prix" name="prix" step="0.01" value="<?= $voiture['prix']; ?>" placeholder="Prix en euros" required>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-lg);">
                            <div class="form-group">
                                <label for="marque_id">Marque :</label>
                                <select id="marque_id" name="marque_id" onchange="nouvelleMarque()" required>
                                    <option value="">Sélectionnez une marque</option>
                                    <?php foreach ($marques as $marque): ?>
                                        <option value="<?= $marque['id']; ?>" <?= ($voiture['marque_id'] === $marque['id']) ? 'selected' : ''; ?>>
                                            <?= $marque['nom']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                    <option value="autre">Autre</option>
                                </select>
                                <div id="nouvelle_marque_container" class="form-group" style="display: none; margin-top: var(--space-sm);">
                                    <label for="nouvelle_marque">Nouvelle marque :</label>
                                    <input type="text" id="nouvelle_marque" name="nouvelle_marque" placeholder="Saisissez le nom de la marque">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modele_id">Modèle :</label>
                                <select id="modele_id" name="modele_id" onchange="nouveauModele()" required>
                                    <option value="">Sélectionnez un modèle</option>
                                    <?php if (isset($modeles)): ?>
                                        <?php foreach ($modeles as $modele): ?>
                                            <option value="<?= $modele['id']; ?>" <?= ($voiture['modele_id'] === $modele['id']) ? 'selected' : ''; ?>>
                                                <?= $modele['nom']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <option value="autre">Autre</option>
                                </select>
                                <div id="nouveau_modele_container" class="form-group" style="display: none; margin-top: var(--space-sm);">
                                    <label for="modele">Nouveau modèle :</label>
                                    <input type="text" id="modele" name="modele" placeholder="Saisissez le nom du modèle">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea id="description" name="description" placeholder="Décrivez votre véhicule, son état, ses points forts..." required><?= $annonce['description']; ?></textarea>
                        </div>

                        <h2 class="form-title mt-lg">Caractéristiques principales</h2>
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: var(--space-md);">
                            <div class="form-group">
                                <label for="annee">Année :</label>
                                <input type="number" id="annee" name="annee" value="<?= isset($voiture['annee']) ? date('Y', strtotime($voiture['annee'])) : ''; ?>" placeholder="<?= date('Y'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="kilometrage">Kilométrage :</label>
                                <input type="number" id="kilometrage" name="kilometrage" value="<?= $voiture['kilometrage']; ?>" placeholder="En kilomètres" required>
                            </div>
                            <div class="form-group">
                                <label for="categorie">Catégorie :</label>
                                <select id="categorie" name="categorie" required>
                                    <option value="">Sélectionnez une catégorie</option>
                                    <option value="Berline" <?= $voiture['categorie'] === 'Berline' ? 'selected' : ''; ?>>Berline</option>
                                    <option value="SUV" <?= $voiture['categorie'] === 'SUV' ? 'selected' : ''; ?>>SUV</option>
                                    <option value="Citadine" <?= $voiture['categorie'] === 'Citadine' ? 'selected' : ''; ?>>Citadine</option>
                                    <option value="Break" <?= $voiture['categorie'] === 'Break' ? 'selected' : ''; ?>>Break</option>
                                    <option value="Coupé" <?= $voiture['categorie'] === 'Coupé' ? 'selected' : ''; ?>>Coupé</option>
                                    <option value="Cabriolet" <?= $voiture['categorie'] === 'Cabriolet' ? 'selected' : ''; ?>>Cabriolet</option>
                                    <option value="Monospace" <?= $voiture['categorie'] === 'Monospace' ? 'selected' : ''; ?>>Monospace</option>
                                    <option value="Utilitaire" <?= $voiture['categorie'] === 'Utilitaire' ? 'selected' : ''; ?>>Utilitaire</option>
                                    <option value="Sport" <?= $voiture['categorie'] === 'Sport' ? 'selected' : ''; ?>>Sport</option>
                                    <option value="Autre" <?= $voiture['categorie'] === 'Autre' ? 'selected' : ''; ?>>Autre</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md);">
                            <div class="form-group">
                                <label for="couleur">Couleur :</label>
                                <input type="text" id="couleur" name="couleur" value="<?= $voiture['couleur']; ?>" placeholder="Ex: Noir, Blanc, Rouge..." required>
                            </div>
                            <div class="form-group">
                                <label for="energie">Énergie :</label>
                                <select id="energie" name="energie" required>
                                    <option value="">Sélectionnez une énergie</option>
                                    <option value="Essence" <?= $voiture['energie'] === 'Essence' ? 'selected' : ''; ?>>Essence</option>
                                    <option value="Diesel" <?= $voiture['energie'] === 'Diesel' ? 'selected' : ''; ?>>Diesel</option>
                                    <option value="Hybride" <?= $voiture['energie'] === 'Hybride' ? 'selected' : ''; ?>>Hybride</option>
                                    <option value="Électrique" <?= $voiture['energie'] === 'Électrique' ? 'selected' : ''; ?>>Électrique</option>
                                    <option value="GPL" <?= $voiture['energie'] === 'GPL' ? 'selected' : ''; ?>>GPL</option>
                                    <option value="Bioéthanol" <?= $voiture['energie'] === 'Bioéthanol' ? 'selected' : ''; ?>>Bioéthanol</option>
                                    <option value="Autre" <?= $voiture['energie'] === 'Autre' ? 'selected' : ''; ?>>Autre</option>
                                </select>
                            </div>
                        </div>

                        <!-- Caractéristiques techniques -->
                        <h2 class="form-title mt-lg">Caractéristiques techniques</h2>
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: var(--space-md);">
                            <div class="form-group">
                                <label for="type">Type de boîte :</label>
                                <select id="type" name="type" required>
                                    <option value="Manuelle" <?= $voiture['type'] === 'Manuelle' ? 'selected' : ''; ?>>Manuelle</option>
                                    <option value="Séquentielle" <?= $voiture['type'] === 'Séquentielle' ? 'selected' : ''; ?>>Séquentielle</option>
                                    <option value="Automatique" <?= $voiture['type'] === 'Automatique' ? 'selected' : ''; ?>>Automatique</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre_portes">Nombre de portes :</label>
                                <select id="nombre_portes" name="nombre_portes" required>
                                    <option value="">Sélectionnez</option>
                                    <option value="2" <?= $voiture['nombre_portes'] == '2' ? 'selected' : ''; ?>>2</option>
                                    <option value="3" <?= $voiture['nombre_portes'] == '3' ? 'selected' : ''; ?>>3</option>
                                    <option value="4" <?= $voiture['nombre_portes'] == '4' ? 'selected' : ''; ?>>4</option>
                                    <option value="5" <?= $voiture['nombre_portes'] == '5' ? 'selected' : ''; ?>>5</option>
                                    <option value="6" <?= $voiture['nombre_portes'] == '6' ? 'selected' : ''; ?>>6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre_places">Nombre de places :</label>
                                <select id="nombre_places" name="nombre_places" required>
                                    <option value="">Sélectionnez</option>
                                    <option value="2" <?= $voiture['nombre_places'] == '2' ? 'selected' : ''; ?>>2</option>
                                    <option value="3" <?= $voiture['nombre_places'] == '3' ? 'selected' : ''; ?>>3</option>
                                    <option value="4" <?= $voiture['nombre_places'] == '4' ? 'selected' : ''; ?>>4</option>
                                    <option value="5" <?= $voiture['nombre_places'] == '5' ? 'selected' : ''; ?>>5</option>
                                    <option value="6" <?= $voiture['nombre_places'] == '6' ? 'selected' : ''; ?>>6</option>
                                    <option value="7" <?= $voiture['nombre_places'] == '7' ? 'selected' : ''; ?>>7</option>
                                    <option value="8" <?= $voiture['nombre_places'] == '8' ? 'selected' : ''; ?>>8</option>
                                    <option value="9" <?= $voiture['nombre_places'] == '9' ? 'selected' : ''; ?>>9</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md);">
                            <div class="form-group">
                                <label for="sellerie">Sellerie :</label>
                                <select id="sellerie" name="sellerie" required>
                                    <option value="">Sélectionnez</option>
                                    <option value="Tissu" <?= $voiture['sellerie'] === 'Tissu' ? 'selected' : ''; ?>>Tissu</option>
                                    <option value="Cuir" <?= $voiture['sellerie'] === 'Cuir' ? 'selected' : ''; ?>>Cuir</option>
                                    <option value="Alcantara" <?= $voiture['sellerie'] === 'Alcantara' ? 'selected' : ''; ?>>Alcantara</option>
                                    <option value="Mixte" <?= $voiture['sellerie'] === 'Mixte' ? 'selected' : ''; ?>>Mixte</option>
                                    <option value="Autre" <?= $voiture['sellerie'] === 'Autre' ? 'selected' : ''; ?>>Autre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="consommation">Consommation (L/100km) :</label>
                                <input type="number" id="consommation" name="consommation" step="0.1" value="<?= $voiture['consommation']; ?>" placeholder="Ex: 5.5" required>
                            </div>
                        </div>

                        <!-- Informations complémentaires -->
                        <h2 class="form-title mt-lg">Informations complémentaires</h2>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md);">
                            <div class="form-group">
                                <label for="provenance">Provenance :</label>
                                <input type="text" id="provenance" name="provenance" value="<?= $voiture['provenance']; ?>" placeholder="Ex: France, Allemagne..." required>
                            </div>
                            <div class="form-group">
                                <label for="mise_en_circulation">Mise en circulation :</label>
                                <input type="date" id="mise_en_circulation" name="mise_en_circulation" value="<?= $voiture['mise_en_circulation']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="premiere_main">Première main :</label>
                            <select id="premiere_main" name="premiere_main" required>
                                <option value="oui" <?= $voiture['premiere_main'] === 'oui' ? 'selected' : ''; ?>>Oui</option>
                                <option value="non" <?= $voiture['premiere_main'] === 'non' ? 'selected' : ''; ?>>Non</option>
                            </select>
                        </div>

                        <div class="nav mt-lg">
                            <button type="submit" class="btn btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                    <path
                                        d="M19.7071 6.29289C20.0976 6.68342 20.0976 7.31658 19.7071 7.70711L10.4142 17C9.63316 17.7811 8.36683 17.781 7.58579 17L3.29289 12.7071C2.90237 12.3166 2.90237 11.6834 3.29289 11.2929C3.68342 10.9024 4.31658 10.9024 4.70711 11.2929L9 15.5858L18.2929 6.29289C18.6834 5.90237 19.3166 5.90237 19.7071 6.29289Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                Enregistrer les modifications
                            </button>
                            <a href="/annonce/detail?id=<?= $annonce['id']; ?>" class="btn btn-home">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Section des images -->
            <div class="card mt-lg">
                <div class="card-content">
                    <h2 class="form-title">Gestion des images</h2>

                    <?php if (!empty($images)): ?>
                        <p class="mb-lg">Vous pouvez cliquer sur une image pour la modifier ou sur le bouton de suppression pour la retirer.</p>
                        <div class="car-gallery">
                            <?php foreach ($images as $img): ?>
                                <div class="car-image-container">
                                    <form method="post" enctype="multipart/form-data" action="/annonce/modifier-image?id=<?= $img['id']; ?>&annonce_id=<?= $annonce['id']; ?>">
                                        <label class="car-image-edit" title="Cliquez pour modifier cette image">
                                            <img
                                                src="/images/<?= htmlspecialchars($img['url']); ?>"
                                                onerror="this.onerror=null;this.src='/images/defaut.png';"
                                                alt="Image de la voiture"
                                            />
                                            <span class="car-image-overlay">
                                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                                    <path
                                                        d="M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579L20.4142 7.58579C21.1953 8.36683 21.1953 9.63316 20.4142 10.4142L11.4142 19.4142C11.0391 19.7893 10.5304 20 10 20H6C4.89543 20 4 19.1046 4 18V14C4 13.4696 4.21071 12.9609 4.58579 12.5858L13.5858 3.58579Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path
                                                        d="M12 6L18 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <input type="file" name="nouvelle_image" accept=".jpg,.png,.webp" style="display:none;" onchange="this.form.submit()">
                                        </label>
                                    </form>
                                    <form method="post" action="/annonce/supprimer-image?id=<?= $img['id']; ?>&annonce_id=<?= $annonce['id']; ?>">
                                        <button type="submit" class="btn btn-cancel car-image-delete" title="Supprimer cette image">
                                            <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                                <path
                                                    d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout d'images -->
                    <?php if (count($images) < 3): ?>
                        <div class="car-image-upload mt-lg">
                            <form method="post" enctype="multipart/form-data" action="/annonce/ajouter-image?id=<?= $annonce['id']; ?>">
                                <label class="car-image-dropzone">
                                    <svg width="48" height="48" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                        <path
                                            d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Ajouter des images (<?= 3 - count($images); ?> restantes)</span>
                                    <p>Formats acceptés : JPG, PNG, WEBP</p>
                                    <input type="file" name="images[]" accept=".jpg,.png,.webp" multiple style="display:none;" onchange="this.form.submit()" <?= count($images) === 0 ? 'required' : ''; ?>>
                                </label>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script type="text/javascript" src="/js/utils.js"></script>
</body>
</html>