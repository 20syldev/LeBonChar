<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Modifier l'annonce</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Modifier l'annonce</h1>
        <?php if (empty($annonce)): ?>
            <p>Annonce introuvable.</p>
        <?php elseif ($annonce['statut'] === 'archive'): ?>
            <p>Cette annonce est archivée et ne peut pas être modifiée.</p>
            <a href="/annonce/archiver?id=<?php echo $annonce['id']; ?>&action=desarchiver" class="btn btn-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" xmls="http://www.w3.org/2000/svg" fill="none">
                    <path d="M12 3C12.2652 3 12.5195 3.10536 12.7071 3.29289L16.7071 7.29289C17.0976 7.68342 17.0976 8.31658 16.7071 8.70711C16.3166 9.09763 15.6834 9.09763 15.2929 8.70711L13 6.41421L13 15C13 15.5523 12.5523 16 12 16C11.4477 16 11 15.5523 11 15L11 6.41421L8.70708 8.70711C8.31656 9.09763 7.68339 9.09763 7.29287 8.70711C6.90235 8.31658 6.90234 7.68342 7.29287 7.29289L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3ZM3.99998 14C4.55226 14 4.99998 14.4477 4.99998 15C4.99998 15.9772 5.00482 16.3198 5.05762 16.5853C5.29434 17.7753 6.22463 18.7056 7.41471 18.9424C7.68015 18.9952 8.02273 19 8.99998 19H15C15.9772 19 16.3198 18.9952 16.5852 18.9424C17.7753 18.7056 18.7056 17.7753 18.9423 16.5853C18.9951 16.3198 19 15.9772 19 15C19 14.4477 19.4477 14 20 14C20.5523 14 21 14.4477 21 15C21 15.0392 21 15.0777 21 15.1157C21.0002 15.9334 21.0003 16.4906 20.9039 16.9755C20.5094 18.9589 18.9589 20.5094 16.9754 20.9039C16.4906 21.0004 15.9333 21.0002 15.1158 21C15.0777 21 15.0391 21 15 21H8.99998C8.96081 21 8.92222 21 8.8842 21C8.06661 21.0002 7.50932 21.0004 7.02452 20.9039C5.04107 20.5094 3.49058 18.9589 3.09605 16.9755C2.99962 16.4906 2.99975 15.9334 2.99996 15.1158C2.99997 15.0777 2.99998 15.0392 2.99998 15C2.99998 14.4477 3.44769 14 3.99998 14Z"/>
                </svg>
            </a>
        <?php else: ?>
            <form action="/annonce/modifier?id=<?php echo $annonce['id']; ?>" method="POST" class="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titre">Titre :</label>
                    <input type="text" id="titre" name="titre" value="<?php echo $annonce['titre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" required><?php echo $annonce['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="prix">Prix :</label>
                    <input type="number" id="prix" name="prix" step="0.01" value="<?php echo $voiture['prix']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="annee">Année :</label>
                    <input type="number" id="annee" name="annee" value="<?php echo isset($voiture['annee']) ? date('Y', strtotime($voiture['annee'])) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="kilometrage">Kilométrage :</label>
                    <input type="number" id="kilometrage" name="kilometrage" value="<?php echo $voiture['kilometrage']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie :</label>
                    <input type="text" id="categorie" name="categorie" value="<?php echo $voiture['categorie']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="couleur">Couleur :</label>
                    <input type="text" id="couleur" name="couleur" value="<?php echo $voiture['couleur']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="type">Type :</label>
                    <select id="type" name="type" required>
                        <option value="Manuelle" <?php echo $voiture['type'] === 'Manuelle' ? 'selected' : ''; ?>>Manuelle</option>
                        <option value="Séquentielle" <?php echo $voiture['type'] === 'Séquentielle' ? 'selected' : ''; ?>>Séquentielle</option>
                        <option value="Automatique" <?php echo $voiture['type'] === 'Automatique' ? 'selected' : ''; ?>>Automatique</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="energie">Énergie :</label>
                    <input type="text" id="energie" name="energie" value="<?php echo $voiture['energie']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="provenance">Provenance :</label>
                    <input type="text" id="provenance" name="provenance" value="<?php echo $voiture['provenance']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="mise_en_circulation">Mise en circulation :</label>
                    <input type="date" id="mise_en_circulation" name="mise_en_circulation" value="<?php echo $voiture['mise_en_circulation']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="premiere_main">Première main :</label>
                    <select id="premiere_main" name="premiere_main" required>
                        <option value="oui" <?php echo $voiture['premiere_main'] === 'oui' ? 'selected' : ''; ?>>Oui</option>
                        <option value="non" <?php echo $voiture['premiere_main'] === 'non' ? 'selected' : ''; ?>>Non</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre_portes">Nombre de portes :</label>
                    <input type="number" id="nombre_portes" name="nombre_portes" value="<?php echo $voiture['nombre_portes']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nombre_places">Nombre de places :</label>
                    <input type="number" id="nombre_places" name="nombre_places" value="<?php echo $voiture['nombre_places']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="sellerie">Sellerie :</label>
                    <input type="text" id="sellerie" name="sellerie" value="<?php echo $voiture['sellerie']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="consommation">Consommation (L/100km) :</label>
                    <input type="number" id="consommation" name="consommation" step="0.1" value="<?php echo $voiture['consommation']; ?>" required>
                </div>

                <?php
                    $images = Image::toutesParVoiture($annonce['voiture_id']);
                    $nbImages = count($images);
                ?>
                <div class="form-group">
                    <label>Images actuelles :</label>
                    <div style="display: flex; gap: 12px;">
                        <?php if (!empty($images)): ?>
                            <?php foreach ($images as $img): ?>
                                <img src="/images/<?php echo htmlspecialchars($img['url']); ?>" alt="Photo voiture" style="width: 100px; height: 75px; object-fit: cover; border-radius: 6px;">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <img src="/images/defaut.png" alt="Aucune image" style="width: 100px; height: 75px; object-fit: cover; border-radius: 6px;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image_voiture">Ajouter des images (1 à 3 images au total) :</label>
                    <input
                        type="file"
                        id="image_voiture"
                        name="image_voiture[]"
                        accept=".png,.jpg,.webp,image/png,image/jpg,image/webp"
                        multiple
                        <?php if ($nbImages == 0) echo 'required'; ?>
                        <?php if ($nbImages >= 3) echo 'disabled'; ?>
                    >
                    <small>
                        <?php if ($nbImages == 0): ?>
                            Vous devez ajouter au moins 1 image (PNG, JPG, JPEG ou WEBP).
                        <?php elseif ($nbImages < 3): ?>
                            Vous pouvez ajouter jusqu'à <?php echo 3 - $nbImages; ?> image(s) supplémentaire(s).
                        <?php else: ?>
                            Nombre maximum d'images atteint (3).
                        <?php endif; ?>
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        <?php endif; ?>

        <div class="navigation" style="margin-top: 20px;">
            <a href="javascript:history.back()" class="btn btn-back">← Retour</a>
            <a href="/" class="btn btn-home">
                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path
                        d="M12.2796 3.71579C12.097 3.66261 11.903 3.66261 11.7203 3.71579C11.6678 3.7311 11.5754 3.7694 11.3789 3.91817C11.1723 4.07463 10.9193 4.29855 10.5251 4.64896L5.28544 9.3064C4.64309 9.87739 4.46099 10.0496 4.33439 10.24C4.21261 10.4232 4.12189 10.6252 4.06588 10.8379C4.00765 11.0591 3.99995 11.3095 3.99995 12.169V17.17C3.99995 18.041 4.00076 18.6331 4.03874 19.0905C4.07573 19.536 4.14275 19.7634 4.22513 19.9219C4.41488 20.2872 4.71272 20.5851 5.07801 20.7748C5.23658 20.8572 5.46397 20.9242 5.90941 20.9612C6.36681 20.9992 6.95893 21 7.82995 21H7.99995V18C7.99995 15.7909 9.79081 14 12 14C14.2091 14 16 15.7909 16 18V21H16.17C17.041 21 17.6331 20.9992 18.0905 20.9612C18.5359 20.9242 18.7633 20.8572 18.9219 20.7748C19.2872 20.5851 19.585 20.2872 19.7748 19.9219C19.8572 19.7634 19.9242 19.536 19.9612 19.0905C19.9991 18.6331 20 18.041 20 17.17V12.169C20 11.3095 19.9923 11.0591 19.934 10.8379C19.878 10.6252 19.7873 10.4232 19.6655 10.24C19.5389 10.0496 19.3568 9.87739 18.7145 9.3064L13.4748 4.64896C13.0806 4.29855 12.8276 4.07463 12.621 3.91817C12.4245 3.7694 12.3321 3.7311 12.2796 3.71579ZM11.1611 1.79556C11.709 1.63602 12.2909 1.63602 12.8388 1.79556C13.2189 1.90627 13.5341 2.10095 13.8282 2.32363C14.1052 2.53335 14.4172 2.81064 14.7764 3.12995L20.0432 7.81159C20.0716 7.83679 20.0995 7.86165 20.1272 7.88619C20.6489 8.34941 21.0429 8.69935 21.3311 9.13277C21.5746 9.49916 21.7561 9.90321 21.8681 10.3287C22.0006 10.832 22.0004 11.359 22 12.0566C22 12.0936 22 12.131 22 12.169V17.212C22 18.0305 22 18.7061 21.9543 19.2561C21.9069 19.8274 21.805 20.3523 21.5496 20.8439C21.1701 21.5745 20.5744 22.1701 19.8439 22.5496C19.3522 22.805 18.8274 22.9069 18.256 22.9543C17.706 23 17.0305 23 16.2119 23H15.805C15.7972 23 15.7894 23 15.7814 23C15.6603 23 15.5157 23.0001 15.3883 22.9895C15.2406 22.9773 15.0292 22.9458 14.8085 22.8311C14.5345 22.6888 14.3111 22.4654 14.1688 22.1915C14.0542 21.9707 14.0227 21.7593 14.0104 21.6116C13.9998 21.4843 13.9999 21.3396 13.9999 21.2185L14 18C14 16.8954 13.1045 16 12 16C10.8954 16 9.99995 16.8954 9.99995 18L9.99996 21.2185C10 21.3396 10.0001 21.4843 9.98949 21.6116C9.97722 21.7593 9.94572 21.9707 9.83107 22.1915C9.68876 22.4654 9.46538 22.6888 9.19142 22.8311C8.9707 22.9458 8.75929 22.9773 8.6116 22.9895C8.48423 23.0001 8.33959 23 8.21847 23C8.21053 23 8.20268 23 8.19495 23H7.78798C6.96944 23 6.29389 23 5.74388 22.9543C5.17253 22.9069 4.64769 22.805 4.15605 22.5496C3.42548 22.1701 2.8298 21.5745 2.4503 20.8439C2.19492 20.3523 2.09305 19.8274 2.0456 19.2561C1.99993 18.7061 1.99994 18.0305 1.99995 17.212L1.99995 12.169C1.99995 12.131 1.99993 12.0936 1.99992 12.0566C1.99955 11.359 1.99928 10.832 2.1318 10.3287C2.24383 9.90321 2.42528 9.49916 2.66884 9.13277C2.95696 8.69935 3.35105 8.34941 3.87272 7.8862C3.90036 7.86165 3.92835 7.83679 3.95671 7.81159L9.22354 3.12996C9.58274 2.81064 9.89467 2.53335 10.1717 2.32363C10.4658 2.10095 10.781 1.90627 11.1611 1.79556Z"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>
        </div>
    </div>
</body>
</html>