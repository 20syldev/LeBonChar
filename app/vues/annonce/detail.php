<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Détail de l'annonce</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <h1><?php echo $annonce['titre']; ?></h1>
    <p>Prix : <?php echo number_format($annonce['prix'], 2, ',', ' '); ?> €</p>
    <p>Description : <?php echo $annonce['description']; ?></p>

    <h2>Détails de la voiture</h2>
    <p>Année : <?php echo $annonce['annee']; ?></p>
    <p>Kilométrage : <?php echo $annonce['kilometrage']; ?> km</p>
    <p>Catégorie : <?php echo $annonce['categorie']; ?></p>
    <p>Couleur : <?php echo $annonce['couleur']; ?></p>
    <p>Marque : <?php echo $annonce['marque']; ?></p>
    <p>Modèle : <?php echo $annonce['modele']; ?></p>

    <?php if ($annonce['acheteur_id'] !== null): ?>
        <?php if ($annonce['acheteur_id'] === $_SESSION['utilisateur_id']): ?>
            <a href="/annonce/supprimer-du-panier?id=<?php echo $annonce['id']; ?>" style="color: red;">Supprimer du panier</a>
        <?php else: ?>
            <p style="color: red;">Réservé</p>
        <?php endif; ?>
    <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] !== $annonce['utilisateur_id']): ?>
        <a href="/annonce/ajouter-au-panier?id=<?php echo $annonce['id']; ?>">Ajouter au panier</a>
    <?php elseif (isset($_SESSION['utilisateur_id']) && $_SESSION['utilisateur_id'] === $annonce['utilisateur_id']): ?>
        <a href="/annonce/modifier?id=<?php echo $annonce['id']; ?>">Modifier l'annonce</a>
    <?php endif; ?>
</body>
</html>