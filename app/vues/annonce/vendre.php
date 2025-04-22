<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes annonces en vente</title>
</head>
<body>
    <h1>Mes annonces en vente</h1>

    <a href="/annonce/nouveau">Créer une nouvelle annonce</a>
    <a href="/">Retour à l'accueil</a>

    <?php if (!empty($annonces)): ?>
        <ul>
            <?php foreach ($annonces as $annonce): ?>
                <li>
                    <a href="/annonce/detail?id=<?php echo $annonce['id']; ?>">
                        <?php echo htmlspecialchars($annonce['titre']); ?> -
                        <?php echo htmlspecialchars($annonce['prix']); ?> €
                    </a>
                    <a href="/annonce/modifier?id=<?php echo $annonce['id']; ?>" title="Modifier">
                        <img src="/public/images/edit-icon.png" alt="Modifier" style="width: 16px; height: 16px;">
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune annonce en vente pour le moment.</p>
    <?php endif; ?>
</body>
</html>