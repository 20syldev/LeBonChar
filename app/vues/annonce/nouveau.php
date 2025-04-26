<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Nouvelle annonce</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
    <script>
        function nouvelleMarque() {
            const marqueSelect = document.getElementById('marque_id');
            const nouvelleMarqueContainer = document.getElementById('nouvelle_marque_container');
            if (marqueSelect.value === 'autre') {
                nouvelleMarqueContainer.style.display = 'block';
            } else {
                nouvelleMarqueContainer.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <h1>Créer une nouvelle annonce</h1>
    <form action="/annonce/nouveau" method="POST">
        <h2>Détails de l'annonce</h2>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" step="0.01" required>

        <h2>Détails de la voiture</h2>
        <label for="annee">Année :</label>
        <input type="number" id="annee" name="annee" required>

        <label for="kilometrage">Kilométrage :</label>
        <input type="number" id="kilometrage" name="kilometrage" required>

        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie">
            <option value="berline">Berline</option>
            <option value="SUV">SUV</option>
            <option value="utilitaire">Utilitaire</option>
            <option value="sport">Sport</option>
            <option value="autre">Autre</option>
        </select>

        <label for="couleur">Couleur :</label>
        <input type="text" id="couleur" name="couleur" required>

        <label for="marque_id">Marque :</label>
        <select id="marque_id" name="marque_id" onchange="nouvelleMarque()">
            <option value="">Sélectionnez une marque</option>
            <?php foreach (Marque::toutes() as $marque): ?>
                <option value="<?php echo $marque['id']; ?>"><?php echo $marque['nom']; ?></option>
            <?php endforeach; ?>
            <option value="autre">Autre</option>
        </select>

        <div id="nouvelle_marque_container" style="display: none;">
            <label for="nouvelle_marque">Nouvelle marque :</label>
            <input type="text" id="nouvelle_marque" name="nouvelle_marque" placeholder="Saisissez une nouvelle marque">
        </div>

        <label for="modele">Modèle :</label>
        <input type="text" id="modele" name="modele" required placeholder="Saisissez le modèle">

        <button type="submit">Créer</button>
    </form>
</body>
</html>