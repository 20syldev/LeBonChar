<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
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
            const nouvMarque = document.getElementById('nouvelle_marque_container');
            if (marqueSelect.value === 'autre') nouvMarque.style.display = 'block';
            else nouvMarque.style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Créer une nouvelle annonce</h1>
        <form action="/annonce/nouveau" method="POST" class="form" enctype="multipart/form-data">
            <h2 class="form-title">Détails de l'annonce</h2>
            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="annee">Année :</label>
                <input type="number" id="annee" name="annee" min="1900" max="<?php echo date('Y'); ?>" required>
            </div>
            <div class="form-group">
                <label for="kilometrage">Kilométrage :</label>
                <input type="number" id="kilometrage" name="kilometrage" required>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie :</label>
                <select id="categorie" name="categorie">
                    <option value="Berline">Berline</option>
                    <option value="SUV">SUV</option>
                    <option value="Utilitaire">Utilitaire</option>
                    <option value="Sport">Sport</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="couleur">Couleur :</label>
                <input type="text" id="couleur" name="couleur" required>
            </div>
            <div class="form-group">
                <label for="marque_id">Marque :</label>
                <select id="marque_id" name="marque_id" onchange="nouvelleMarque()">
                    <option value="">Sélectionnez une marque</option>
                    <?php foreach (Marque::toutes() as $marque): ?>
                        <option value="<?php echo $marque['id']; ?>"><?php echo $marque['nom']; ?></option>
                    <?php endforeach; ?>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div id="nouvelle_marque_container" class="form-group" style="display: none;">
                <label for="nouvelle_marque">Nouvelle marque :</label>
                <input type="text" id="nouvelle_marque" name="nouvelle_marque" placeholder="Saisissez une nouvelle marque">
            </div>
            <div class="form-group">
                <label for="modele">Modèle :</label>
                <input type="text" id="modele" name="modele" placeholder="Saisissez le modèle" required>
            </div>
            <div class="form-group">
                <label for="type">Type :</label>
                <select id="type" name="type" required>
                    <option value="Manuelle">Manuelle</option>
                    <option value="Séquentielle">Séquentielle</option>
                    <option value="Automatique">Automatique</option>
                </select>
            </div>
            <div class="form-group">
                <label for="energie">Énergie :</label>
                <input type="text" id="energie" name="energie" placeholder="Exemple : Essence, Diesel" required>
            </div>
            <div class="form-group">
                <label for="provenance">Provenance :</label>
                <input type="text" id="provenance" name="provenance" placeholder="Exemple : France" required>
            </div>
            <div class="form-group">
                <label for="mise_en_circulation">Mise en circulation :</label>
                <input type="date" id="mise_en_circulation" name="mise_en_circulation" required>
            </div>
            <div class="form-group">
                <label for="premiere_main">Première main :</label>
                <select id="premiere_main" name="premiere_main" required>
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nombre_portes">Nombre de portes :</label>
                <input type="number" id="nombre_portes" name="nombre_portes" required>
            </div>
            <div class="form-group">
                <label for="nombre_places">Nombre de places :</label>
                <input type="number" id="nombre_places" name="nombre_places" required>
            </div>
            <div class="form-group">
                <label for="sellerie">Sellerie :</label>
                <input type="text" id="sellerie" name="sellerie" placeholder="Exemple : Cuir, Tissu" required>
            </div>
            <div class="form-group">
                <label for="consommation">Consommation (L/100km) :</label>
                <input type="number" id="consommation" name="consommation" step="0.1" required>
            </div>
            <div class="form-group">
                <label for="image_voiture">Images de la voiture (1 à 3 images) :</label>
                <input type="file" id="image_voiture" name="image_voiture[]" accept="image/*" multiple required>
                <small>Vous pouvez ajouter jusqu'à 3 images.</small>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
</body>
</html>