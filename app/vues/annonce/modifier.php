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
    <h1>Modifier l'annonce</h1>
    <?php if (empty($annonce)): ?>
        <p>Annonce introuvable.</p>
    <?php elseif ($annonce['statut'] === 'archive'): ?>
        <p>Cette annonce est archivée et ne peut pas être modifiée.</p>
        <a href="/annonce/archiver?id=<?php echo $annonce['id']; ?>&action=desarchiver">
            <svg width="16" height="16" viewBox="0 0 24 24" xmls="http://www.w3.org/2000/svg" fill="none">
                <path d="M12 3C12.2652 3 12.5195 3.10536 12.7071 3.29289L16.7071 7.29289C17.0976 7.68342 17.0976 8.31658 16.7071 8.70711C16.3166 9.09763 15.6834 9.09763 15.2929 8.70711L13 6.41421L13 15C13 15.5523 12.5523 16 12 16C11.4477 16 11 15.5523 11 15L11 6.41421L8.70708 8.70711C8.31656 9.09763 7.68339 9.09763 7.29287 8.70711C6.90235 8.31658 6.90234 7.68342 7.29287 7.29289L11.2929 3.29289C11.4804 3.10536 11.7348 3 12 3ZM3.99998 14C4.55226 14 4.99998 14.4477 4.99998 15C4.99998 15.9772 5.00482 16.3198 5.05762 16.5853C5.29434 17.7753 6.22463 18.7056 7.41471 18.9424C7.68015 18.9952 8.02273 19 8.99998 19H15C15.9772 19 16.3198 18.9952 16.5852 18.9424C17.7753 18.7056 18.7056 17.7753 18.9423 16.5853C18.9951 16.3198 19 15.9772 19 15C19 14.4477 19.4477 14 20 14C20.5523 14 21 14.4477 21 15C21 15.0392 21 15.0777 21 15.1157C21.0002 15.9334 21.0003 16.4906 20.9039 16.9755C20.5094 18.9589 18.9589 20.5094 16.9754 20.9039C16.4906 21.0004 15.9333 21.0002 15.1158 21C15.0777 21 15.0391 21 15 21H8.99998C8.96081 21 8.92222 21 8.8842 21C8.06661 21.0002 7.50932 21.0004 7.02452 20.9039C5.04107 20.5094 3.49058 18.9589 3.09605 16.9755C2.99962 16.4906 2.99975 15.9334 2.99996 15.1158C2.99997 15.0777 2.99998 15.0392 2.99998 15C2.99998 14.4477 3.44769 14 3.99998 14Z"/>
            </svg>
        </a>
    <?php else: ?>
        <form action="/annonce/modifier?id=<?php echo $annonce['id']; ?>" method="POST">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?php echo $annonce['titre']; ?>" required>

            <label for="description">Description :</label>
            <textarea id="description" name="description" required><?php echo $annonce['description']; ?></textarea>

            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" step="0.01" value="<?php echo $voiture['prix']; ?>" required>

            <label for="annee">Année :</label>
            <input type="number" id="annee" name="annee" value="<?php echo $voiture['annee']; ?>" required>

            <label for="kilometrage">Kilométrage :</label>
            <input type="number" id="kilometrage" name="kilometrage" value="<?php echo $voiture['kilometrage']; ?>" required>

            <label for="categorie">Catégorie :</label>
            <select id="categorie" name="categorie">
                <option value="berline" <?php echo $voiture['categorie'] === 'berline' ? 'selected' : ''; ?>>Berline</option>
                <option value="SUV" <?php echo $voiture['categorie'] === 'SUV' ? 'selected' : ''; ?>>SUV</option>
                <option value="utilitaire" <?php echo $voiture['categorie'] === 'utilitaire' ? 'selected' : ''; ?>>Utilitaire</option>
                <option value="sport" <?php echo $voiture['categorie'] === 'sport' ? 'selected' : ''; ?>>Sport</option>
                <option value="autre" <?php echo $voiture['categorie'] === 'autre' ? 'selected' : ''; ?>>Autre</option>
            </select>

            <label for="couleur">Couleur :</label>
            <input type="text" id="couleur" name="couleur" value="<?php echo $voiture['couleur']; ?>" required>

            <button type="submit">Modifier</button>
        </form>
    <?php endif; ?>
</body>
</html>