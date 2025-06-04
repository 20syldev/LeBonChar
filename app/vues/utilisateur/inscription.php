<?php
if (isset($_SESSION['utilisateur_id'])) {
    header('Location: /compte');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Inscription - LeBonChar</title>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="icon shortcut" href="/images/logo.png"/>
</head>
<body>
    <div class="container auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <a href="/" class="logo-link">
                    <img src="/images/logo.png" alt="LeBonChar" class="auth-logo">
                    <span class="auth-site-name">LeBonChar</span>
                </a>
                <h1 class="auth-title">Créer un compte</h1>
                <p class="auth-subtitle">Rejoignez notre communauté automobile</p>
            </div>

            <?php require_once '../app/vues/composants/messages.php'; ?>

            <form action="/inscription" method="POST" class="auth-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input
                                type="text"
                                id="prenom"
                                name="prenom"
                                placeholder="Votre prénom"
                                required
                                autofocus
                                value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input
                                type="text"
                                id="nom"
                                name="nom"
                                placeholder="Votre nom"
                                required
                                value="<?= isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>"
                            >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Votre adresse email"
                            required
                            value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M12 17V21M8 21H16M16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11M7 11H17C18.1046 11 19 11.8954 19 13V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V13C5 11.8954 5.89543 11 7 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <input
                            type="password"
                            id="mot_de_passe"
                            name="mot_de_passe"
                            placeholder="Choisissez un mot de passe sécurisé"
                            minlength="8"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M12 5C8.24261 5 5.43602 7.4404 3.76737 9.43934C2.51635 10.9394 2.51635 13.0606 3.76737 14.5607C5.43602 16.5596 8.24261 19 12 19C15.7574 19 18.564 16.5596 20.2326 14.5607C21.4837 13.0606 21.4837 10.9394 20.2326 9.43934C18.564 7.4404 15.7574 5 12 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg class="eye-slash-icon hidden" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M10.7302 5.07319C11.1448 5.02485 11.5684 5 12 5C15.7574 5 18.564 7.4404 20.2326 9.43934C21.4837 10.9394 21.4837 13.0606 20.2326 14.5607C19.6081 15.3138 18.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M3.5 3L20.5 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M7.36209 7.55738C5.68702 8.76738 4.32481 10.5321 3.76747 11.4393C2.51645 12.9394 2.51645 15.0606 3.76747 16.5607C5.43612 18.5596 8.24271 21 12 21C13.6569 21 15.1687 20.5217 16.4966 19.8915" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M12.5 9.04148C13.7563 9.25675 14.7437 10.2441 14.959 11.5004" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="section-divider">
                    <span>Informations de localisation</span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M12 12.75C13.6569 12.75 15 11.4069 15 9.75C15 8.09315 13.6569 6.75 12 6.75C10.3431 6.75 9 8.09315 9 9.75C9 11.4069 10.3431 12.75 12 12.75Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M19.5 9.75C19.5 16.5 12 21.75 12 21.75C12 21.75 4.5 16.5 4.5 9.75C4.5 7.76088 5.29018 5.85322 6.6967 4.4467C8.10322 3.04018 10.0109 2.25 12 2.25C13.9891 2.25 15.8968 3.04018 17.3033 4.4467C18.7098 5.85322 19.5 7.76088 19.5 9.75V9.75Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input
                                type="text"
                                id="ville"
                                name="ville"
                                placeholder="Votre ville"
                                value="<?= isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : ''; ?>"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="code_postal">Code postal</label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <path
                                    d="M9 10L9 16M15 8L15 16M5 8H19M5 8C4.44772 8 4 7.55228 4 7V5C4 4.44772 4.44772 4 5 4H19C19.5523 4 20 4.44772 20 5V7C20 7.55228 19.5523 8 19 8M5 8L5 19C5 19.5523 5.44772 20 6 20H18C18.5523 20 19 19.5523 19 19V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input
                                type="text"
                                id="code_postal"
                                name="code_postal"
                                placeholder="Votre code postal"
                                value="<?= isset($_POST['code_postal']) ? htmlspecialchars($_POST['code_postal']) : ''; ?>"
                            >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path
                                d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <textarea
                            id="adresse"
                            name="adresse"
                            placeholder="Votre adresse complète"
                            rows="2"
                            data-auto-resize
                        ><?= isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : ''; ?></textarea>
                    </div>
                </div>

                <div class="form-options">
                    <!-- <div class="checkbox-group">
                        <input type="checkbox" id="conditions" name="conditions" required>
                        <label for="conditions">J'accepte les <a href="/conditions" target="_blank">conditions d'utilisation</a> et la <a href="/confidentialite" target="_blank">politique de confidentialité</a></label>
                    </div> -->
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path
                            d="M15 19C15 16.7909 12.3137 15 9 15C5.68629 15 3 16.7909 3 19M19 16V13M19 13V10M19 13H16M19 13H22M9 12C6.79086 12 5 10.2091 5 8C5 5.79086 6.79086 4 9 4C11.2091 4 13 5.79086 13 8C13 10.2091 11.2091 12 9 12Z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Créer mon compte
                </button>
            </form>

            <div class="auth-footer">
                <p>Vous avez déjà un compte ?</p>
                <a href="/connexion" class="btn btn-secondary btn-block">
                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path
                            d="M15 19C15 16.7909 12.3137 15 9 15C5.68629 15 3 16.7909 3 19M21 10L17 14L15 12M9 12C6.79086 12 5 10.2091 5 8C5 5.79086 6.79086 4 9 4C11.2091 4 13 5.79086 13 8C13 10.2091 11.2091 12 9 12Z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Se connecter
                </a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/utils.js"></script>
</body>
</html>