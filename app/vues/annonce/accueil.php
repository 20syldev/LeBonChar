<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Accueil</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
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
                    <?php echo htmlspecialchars(number_format($annonce['prix'], 2, ',', ' ')); ?> €
                </a>
                <?php if ($annonce['acheteur_id'] !== null): ?>
                    <?php if ($annonce['acheteur_id'] === $_SESSION['utilisateur_id']): ?>
                        <a href="/annonce/supprimer-du-panier?id=<?php echo $annonce['id']; ?>" style="color: red;">Supprimer du panier</a>
                    <?php else: ?>
                        <span style="color: red;">Réservé</span>
                    <?php endif; ?>
                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] !== $annonce['utilisateur_id']): ?>
                    <a href="/annonce/ajouter-au-panier?id=<?php echo $annonce['id']; ?>">Ajouter au panier</a>
                <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
                    <a href="/annonce/modifier?id=<?php echo $annonce['id']; ?>" title="Modifier">
                        <img src="/public/images/edit-icon.png" alt="Modifier" style="width: 16px; height: 16px;">
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>