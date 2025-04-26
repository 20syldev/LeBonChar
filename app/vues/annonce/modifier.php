<!DOCTYPE html>
<html lang="fr">
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