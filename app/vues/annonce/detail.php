<!-- filepath: c:\Users\Utilisateur\Documents\Sylvain\Github\Repositories\LeBonChar\app\vues\annonces\detail.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de l'annonce</title>
</head>
<body>
    <h1><?php echo $annonce['titre']; ?></h1>
    <p>Prix : <?php echo $annonce['prix']; ?> €</p>
    <p>Description : <?php echo $annonce['description']; ?></p>

    <h2>Détails de la voiture</h2>
    <p>Année : <?php echo $annonce['annee']; ?></p>
    <p>Kilométrage : <?php echo $annonce['kilometrage']; ?> km</p>
    <p>Catégorie : <?php echo $annonce['categorie']; ?></p>
    <p>Couleur : <?php echo $annonce['couleur']; ?></p>
    <p>Marque : <?php echo $annonce['marque']; ?></p>
    <p>Modèle : <?php echo $annonce['modele']; ?></p>
    <p>Description : <?php echo $annonce['voiture_description']; ?></p>

    <a href="/annonce/ajouter-au-panier?id=<?php echo $annonce['id']; ?>">Ajouter au panier</a>
</body>
</html>