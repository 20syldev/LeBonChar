<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon compte</title>
</head>
<body>
    <h1>Mon compte</h1>
    <p>Nom : <?php echo $utilisateur['nom']; ?></p>
    <p>Prénom : <?php echo $utilisateur['prenom']; ?></p>
    <p>Email : <?php echo $utilisateur['email']; ?></p>
    <p>Ville : <?php echo $utilisateur['ville']; ?></p>
    <p>Code postal : <?php echo $utilisateur['code_postal']; ?></p>
    <p>Adresse : <?php echo $utilisateur['adresse']; ?></p>
    <a href="/modifier">Modifier mes informations</a>
    <a href="/deconnexion">Se déconnecter</a>

    <h2>Mes annonces ajoutées au panier</h2>
    <ul>
        <?php
        $annoncesPanier = Annonce::toutesParAcheteur($utilisateur['id']);
        foreach ($annoncesPanier as $annonce): ?>
            <li>
                <a href="/annonce/detail?id=<?php echo $annonce['id']; ?>">
                    <?php echo $annonce['titre']; ?> - <?php echo $annonce['prix']; ?> €
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Mes annonces publiées</h2>
    <ul>
        <?php
        $annoncesPubliees = Annonce::toutesParVendeur($utilisateur['id']);
        foreach ($annoncesPubliees as $annonce): ?>
            <li>
                <a href="/annonce/detail?id=<?php echo $annonce['id']; ?>">
                    <?php echo $annonce['titre']; ?> - <?php echo $annonce['prix']; ?> €
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>