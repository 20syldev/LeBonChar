<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Liste des annonces</h1>

    <div>
        <?php if (isset($_SESSION['utilisateur_id'])): ?>
            <a href="/annonce/nouveau">Créer une annonce</a>
            <a href="/vendre">Vendre</a>
            <a href="/compte">Mon compte</a>
            <a href="/deconnexion">Se déconnecter</a>
        <?php else: ?>
            <a href="/connexion">Se connecter</a>
            <a href="/inscription">S'inscrire</a>
        <?php endif; ?>
    </div>

    <ul>
        <?php foreach ($annonces as $annonce): ?>
            <li>
                <a href="/annonce/detail?id=<?php echo $annonce['id']; ?>">
                    <?php echo htmlspecialchars($annonce['titre']); ?> -
                    <?php echo isset($annonce['prix']) ? htmlspecialchars($annonce['prix']) . ' €' : 'Prix non disponible'; ?>
                </a>
                <?php if (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                    <a href="/annonce/modifier?id=<?php echo $annonce['id']; ?>" title="Modifier">
                        <img src="/public/images/edit-icon.png" alt="Modifier" style="width: 16px; height: 16px;">
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>