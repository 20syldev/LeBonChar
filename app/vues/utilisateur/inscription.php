<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="/inscription" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville">

        <label for="code_postal">Code postal :</label>
        <input type="text" id="code_postal" name="code_postal">

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="adresse"></textarea>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>