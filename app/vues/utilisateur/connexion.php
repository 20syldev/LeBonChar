<?php
if (isset($_SESSION['utilisateur_id'])) {
    unset($_SESSION['utilisateur_id']);
}
?>
<!DOCTYPE html>
<html lang="fr" data-theme="light" data-mode="auto">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Connexion - LeBonChar</title>
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
                <h1 class="auth-title">Connexion</h1>
                <p class="auth-subtitle">Bienvenue sur LeBonChar, votre plateforme de vente automobile</p>
            </div>

            <?php require_once '../app/vues/composants/messages.php'; ?>

            <form action="/connexion" method="POST" class="auth-form">
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
                            autofocus
                            value="<?= isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>"
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
                            placeholder="Votre mot de passe"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('mot_de_passe')">
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

                <div class="form-options">
                    <!-- <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember" value="1">
                        <label for="remember">Se souvenir de moi</label>
                    </div> -->
                    <!-- <a href="/mot-de-passe-oublie" class="forgot-password">Mot de passe oublié ?</a> -->
                </div>

                <button type="submit" class="btn btn-primary btn-block">
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
                </button>
            </form>

            <div class="auth-footer">
                <p>Vous n'avez pas de compte ?</p>
                <a href="/inscription" class="btn btn-secondary btn-block">
                    <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path
                            d="M15 19C15 16.7909 12.3137 15 9 15C5.68629 15 3 16.7909 3 19M19 16V13M19 13V10M19 13H16M19 13H22M9 12C6.79086 12 5 10.2091 5 8C5 5.79086 6.79086 4 9 4C11.2091 4 13 5.79086 13 8C13 10.2091 11.2091 12 9 12Z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    Créer un compte
                </a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/utils.js"></script>
</body>
</html>