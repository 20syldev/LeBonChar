/**
 * Affiche ou masque le champ de nouvelle marque en fonction de la valeur sélectionnée
 */
function nouvelleMarque() {
    const marqueSelect = document.getElementById('marque_id');
    const nouvMarque = document.getElementById('nouvelle_marque_container');
    const nouvMarqueInput = document.getElementById('nouvelle_marque');

    if (marqueSelect && nouvMarque) {
        if (marqueSelect.value === 'autre') {
            nouvMarque.style.display = 'block';
            if (nouvMarqueInput) nouvMarqueInput.required = true;
        } else {
            nouvMarque.style.display = 'none';
            if (nouvMarqueInput) nouvMarqueInput.required = false;
        }
    }
}

/**
 * Affiche ou masque le champ de nouveau modèle en fonction de la valeur sélectionnée
 */
function nouveauModele() {
    const modeleSelect = document.getElementById('modele_id');
    const nouveauModele = document.getElementById('nouveau_modele_container');
    if (modeleSelect && nouveauModele) {
        if (modeleSelect.value === 'autre') nouveauModele.style.display = 'block';
        else nouveauModele.style.display = 'none';
    }
}

/**
 * Ouvre un onglet spécifique et ferme les autres
 *
 * @param {Event} evt - L'événement de clic sur le bouton de l'onglet
 * @param {string} tabName - Le nom de l'onglet à ouvrir (ID de l'élément)
 */
function openTab(evt, tabName) {
    const tabContents = document.getElementsByClassName('tab-content');
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove('active');
    }

    const tabButtons = document.getElementsByClassName('tab-button');
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove('active');
    }

    document.getElementById(tabName).classList.add('active');
    evt.currentTarget.classList.add('active');
}

/**
 * Fonction qui bascule la visibilité d'un champ mot de passe
 * Si inputId est null, utilise le champ avec l'ID 'mot_de_passe'.
 *
 * @param {string|null} inputId - L'ID du champ mot de passe à basculer
 */
function togglePassword(inputId = null) {
    const passwordInput = inputId ?
        document.getElementById(inputId) :
        document.getElementById('mot_de_passe');

    if (!passwordInput) return;

    const container = passwordInput.nextElementSibling;
    const eyeIcon = container.querySelector('.eye-icon');
    const eyeSlashIcon = container.querySelector('.eye-slash-icon');

    if (!eyeIcon || !eyeSlashIcon) return;

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.add('hidden');
        eyeSlashIcon.classList.remove('hidden');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('hidden');
        eyeSlashIcon.classList.add('hidden');
    }
}

/**
 * Ajuste automatiquement la hauteur d'un textarea en fonction de son contenu
 *
 * @param {string} textareaId - L'ID du textarea à ajuster
 */
function descriptionResize(textareaId) {
    const textarea = document.getElementById(textareaId);
    if (!textarea) return;

    function adjustHeight() {
        textarea.style.height = '40px';
        textarea.style.height = textarea.scrollHeight + 'px';
    }

    // Ajuster au chargement
    adjustHeight();

    // Ajuster à chaque saisie
    textarea.addEventListener('input', adjustHeight);
}

/**
 * Initialise la gestion des aperçus d'images et du glisser-déposer
 *
 * @param {string} inputId - L'ID de l'input file
 * @param {string} previewId - L'ID de l'élément où afficher les aperçus
 * @param {string} dropzoneClass - Classe CSS de la zone de glisser-déposer
 */
function initUpload(inputId, previewId, dropzoneClass) {
    if (!inputId || !previewId || !dropzoneClass) return;

    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    let dropzone = document.querySelector('.' + dropzoneClass);

    if (!input || !preview) return;

    if (dropzone) {
        const newDropzone = dropzone.cloneNode(true);
        dropzone.parentNode.replaceChild(newDropzone, dropzone);
        dropzone = newDropzone;
    }

    input.addEventListener('change', function(e) {
        preview.innerHTML = '';

        if (this.files) {
            const maxFiles = 3;
            const fileCount = this.files.length > maxFiles ? maxFiles : this.files.length;

            for (let i = 0; i < fileCount; i++) {
                const file = this.files[i];
                if (!file.type.match('image.*')) continue;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgContainer = document.createElement('div');
                    imgContainer.style.position = 'relative';
                    imgContainer.style.borderRadius = 'var(--radius-md)';
                    imgContainer.style.overflow = 'hidden';
                    imgContainer.style.aspectRatio = '16/9';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = 'var(--radius-md)';

                    imgContainer.appendChild(img);
                    preview.appendChild(imgContainer);
                }
                reader.readAsDataURL(file);
            }

            if (this.files.length > 0) {
                preview.style.display = 'grid';
            } else {
                preview.style.display = 'none';
            }
        }
    });

    if (dropzone) {
        dropzone.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            input.click();
        });

        dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--secondary)';
            this.style.background = 'var(--bg-secondary)';
        });

        dropzone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--border-color)';
            this.style.background = 'transparent';
        });

        dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--border-color)';
            this.style.background = 'transparent';

            if (e.dataTransfer.files.length) {
                input.files = e.dataTransfer.files;
                const event = new Event('change', { bubbles: true });
                input.dispatchEvent(event);
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Auto-initialisation des textarea avec data-auto-resize
    const autoResizeTextareas = document.querySelectorAll('textarea[data-auto-resize]');
    autoResizeTextareas.forEach(textarea => {
        if (textarea.id) {
            descriptionResize(textarea.id);
        }
    });

    // Initialisation de l'upload d'image s'il existe sur la page
    if (document.getElementById('image_voiture') && document.getElementById('image-preview')) {
        initUpload('image_voiture', 'image-preview', 'car-image-dropzone');
    }

    nouvelleMarque();
    nouveauModele();
});