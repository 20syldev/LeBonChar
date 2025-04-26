<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Mes annonces en vente</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
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
                        <?php echo htmlspecialchars(number_format($annonce['prix'], 2, ',', ' ')); ?> €
                    </a>
                    <a href="/annonce/modifier?id=<?php echo $annonce['id']; ?>" title="Modifier">
                        <img src="/public/images/edit-icon.png" alt="Modifier" style="width: 16px; height: 16px;">
                    </a>
                    <a href="/annonce/supprimer-du-panier?id=<?php echo $annonce['id']; ?>&redirect=/vendre" title="Supprimer" onclick="return confirm('Supprimer du panier ?');">
                        <img src="/public/images/delete-icon.png" alt="Supprimer" style="width: 16px; height: 16px;">
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Vous n'avez pas d'annonces en vente.</p>
    <?php endif; ?>
</body>
</html>