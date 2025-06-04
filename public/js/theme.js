/**
 * Constantes pour le gestionnaire de thème
 */
const THEME_KEY = 'theme';
const MODE_KEY = 'theme_mode';
const MODE_AUTO = 'auto';
const MODE_MANUAL = 'manual';

/**
 * Récupère le thème sauvegardé dans le localStorage
 * @returns {string|null} Le thème sauvegardé ou null
 */
function getSavedTheme() {
    return localStorage.getItem(THEME_KEY);
}

/**
 * Récupère le mode de thème sauvegardé dans le localStorage
 * @returns {string} Le mode de thème ('auto' ou 'manual')
 */
function getSavedMode() {
    return localStorage.getItem(MODE_KEY) || MODE_AUTO;
}

/**
 * Récupère le thème préféré du système
 * @returns {string} 'dark' ou 'light'
 */
function getPreferredTheme() {
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

/**
 * Sauvegarde le thème dans le localStorage
 * @param {string} theme - Le thème à sauvegarder ('light' ou 'dark')
 * @param {string} mode - Le mode à sauvegarder ('auto' ou 'manual')
 */
function saveTheme(theme, mode = MODE_MANUAL) {
    localStorage.setItem(THEME_KEY, theme);
    localStorage.setItem(MODE_KEY, mode);
}

/**
 * Détermine le thème à utiliser en fonction du mode
 * @returns {string} Le thème actuel ('light' ou 'dark')
 */
function getCurrentTheme() {
    const mode = getSavedMode();
    if (mode === MODE_AUTO) {
        return getPreferredTheme();
    }
    return getSavedTheme() || getPreferredTheme();
}

/**
 * Met à jour l'état des boutons de bascule de thème
 */
function updateToggleButtons() {
    const currentTheme = getCurrentTheme();
    const currentMode = getSavedMode();
    const themeToggleButtons = document.querySelectorAll('.theme-toggle');

    themeToggleButtons.forEach(button => {
        const lightIcon = button.querySelector('.theme-light-icon');
        const darkIcon = button.querySelector('.theme-dark-icon');
        const autoIcon = button.querySelector('.theme-auto-icon');

        // Si les trois icônes sont présentes (pour le cycle complet)
        if (lightIcon && darkIcon && autoIcon) {
            lightIcon.classList.add('hidden');
            darkIcon.classList.add('hidden');
            autoIcon.classList.add('hidden');

            if (currentMode === MODE_AUTO) {
                autoIcon.classList.remove('hidden');
            } else if (currentTheme === 'light') {
                lightIcon.classList.remove('hidden');
            } else {
                darkIcon.classList.remove('hidden');
            }
        }
        // Si seulement les icônes clair/sombre sont présentes
        else if (lightIcon && darkIcon) {
            if (currentTheme === 'light') {
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            } else {
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        }

        // Met à jour l'attribut aria-pressed pour l'accessibilité
        button.setAttribute('aria-pressed', currentTheme === 'dark');

        // Attribution de data-mode
        button.setAttribute('data-mode', currentMode);
    });

    // Mettre à jour l'attribut data-mode de l'élément HTML
    document.documentElement.setAttribute('data-mode', currentMode);
}

/**
 * Applique le thème donné à la page
 * @param {string} theme - Le thème à appliquer ('light' ou 'dark')
 * @param {string} mode - Le mode à utiliser ('auto' ou 'manual')
 */
function applyTheme(theme, mode = MODE_MANUAL) {
    document.documentElement.setAttribute('data-theme', theme);
    window.leboncharTheme = theme;
    saveTheme(theme, mode);
    updateToggleButtons();
}

/**
 * Bascule entre les thèmes (clair, sombre, auto)
 */
function toggleTheme() {
    const currentMode = getSavedMode();
    const currentTheme = getCurrentTheme();

    // Vérifiez si le bouton a la capacité de basculer en mode auto
    const button = event.target.closest('.theme-toggle');
    const hasAutoIcon = button && button.querySelector('.theme-auto-icon');

    if (currentMode === MODE_AUTO && hasAutoIcon) {
        // Si en mode auto, passer au mode manuel avec lumière
        applyTheme('light', MODE_MANUAL);
    } else if (currentTheme === 'light') {
        // Si en mode clair, passer au mode sombre
        applyTheme('dark', MODE_MANUAL);
    } else if (hasAutoIcon) {
        // Si en mode sombre avec option auto, revenir au mode auto
        const systemTheme = getPreferredTheme();
        applyTheme(systemTheme, MODE_AUTO);
    } else {
        // Si en mode sombre sans option auto, revenir au mode clair
        applyTheme('light', MODE_MANUAL);
    }
}

/**
 * Initialise le gestionnaire de thème
 */
function initTheme() {
    // Appliquer le thème initial
    const mode = getSavedMode();
    const theme = getCurrentTheme();

    // Conserver le mode mais appliquer le thème actuel
    applyTheme(theme, mode);

    // Écouteur pour les changements de préférence système
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (getSavedMode() === MODE_AUTO) {
            const newTheme = e.matches ? 'dark' : 'light';
            applyTheme(newTheme, MODE_AUTO);
        }
    });

    // Écouteurs pour les boutons de bascule
    document.addEventListener('click', event => {
        const themeToggle = event.target.closest('.theme-toggle');
        if (themeToggle) {
            toggleTheme();
        }
    });

    // Initialiser dynamiquement les nouveaux boutons qui pourraient être ajoutés au DOM
    const observer = new MutationObserver(() => {
        const newButtons = document.querySelectorAll('.theme-toggle:not([data-theme-initialized])');
        newButtons.forEach(button => {
            button.setAttribute('data-theme-initialized', 'true');
            updateToggleButtons();
        });
    });

    observer.observe(document.body, { childList: true, subtree: true });
}

// Initialiser le gestionnaire de thème au chargement du document
document.addEventListener('DOMContentLoaded', initTheme);

// Exposer les fonctions utiles globalement
window.toggleTheme = toggleTheme;
window.getCurrentTheme = getCurrentTheme;
window.getSavedMode = getSavedMode;