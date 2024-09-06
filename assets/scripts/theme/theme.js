/*----------------------------------------------
# 1. Sidebar TOGGLE
----------------------------------------------*/

let sidebarToggle = document.querySelector('.toggle-sidebar-btn');

if (sidebarToggle) {
    sidebarToggle.addEventListener('click', function() {
        document.body.classList.toggle('toggle-sidebar');
    });
}

/*----------------------------------------------
# 2. Menu dans Aside
----------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    const collapsibleLinks = document.querySelectorAll('.custom-link');

    collapsibleLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = link.getAttribute('href').substring(1);
            const target = document.getElementById(targetId);

            if (target.classList.contains('show')) {
                target.classList.remove('show');
                link.setAttribute('aria-expanded', 'false');
            } else {
                document.querySelectorAll('.collapse.show').forEach(function(openMenu) {
                    openMenu.classList.remove('show');
                    const correspondingLink = document.querySelector(`a[href="#${openMenu.id}"]`);
                    if (correspondingLink) {
                        correspondingLink.setAttribute('aria-expanded', 'false');
                    }
                });

                target.classList.add('show');
                link.setAttribute('aria-expanded', 'true');
            }
        });
    });
});

/*----------------------------------------------
# 3. Dropdown
----------------------------------------------*/

// Sélectionne tous les boutons de dropdown
const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

// Ajoute un écouteur d'événement à chaque bouton de dropdown
dropdownToggles.forEach(function(toggle) {
    toggle.addEventListener('click', function(e) {
        // Empêche la propagation de l'événement de clic
        e.stopPropagation();

        // Ferme tous les autres dropdowns ouverts
        closeAllDropdowns();

        // Bascule (ouvre/ferme) le dropdown associé
        const dropdownMenu = toggle.nextElementSibling;
        dropdownMenu.classList.toggle('show');
    });
});

// Ferme les dropdowns lorsqu'on clique en dehors d'eux
document.addEventListener('click', function() {
    closeAllDropdowns();
});

// Fonction pour fermer tous les dropdowns
function closeAllDropdowns() {
    const dropdowns = document.querySelectorAll('.dropdown-menu');
    dropdowns.forEach(function(menu) {
        menu.classList.remove('show');
    });
}

function adjustDropdownPosition(menu) {
    const rect = menu.getBoundingClientRect();
    if (rect.right > window.innerWidth) {
        menu.style.left = 'auto';
        menu.style.right = '0'; // Réajuste à droite
    }
}

// Ajouter dans ton listener
dropdownToggles.forEach(function(toggle) {
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        closeAllDropdowns();
        const dropdownMenu = toggle.nextElementSibling;
        dropdownMenu.classList.toggle('show');
        adjustDropdownPosition(dropdownMenu); // Ajuste la position après l'affichage
    });
});

/*----------------------------------------------
# 4. Accordion
----------------------------------------------*/

/*document.addEventListener('DOMContentLoaded', function () {
    const cardThemes = document.querySelectorAll('.card-theme');

    cardThemes.forEach(function (card) {
        card.addEventListener('click', function () {
            const toggle = card.querySelector('.card-toggle');
            const targetId = toggle.getAttribute('data-target');
            const targetCollapse = document.querySelector(targetId);

            // Si le collapse est déjà ouvert, on le referme
            if (targetCollapse.classList.contains('show')) {
                targetCollapse.classList.remove('show');
                card.querySelector('.chevron-icon').classList.remove('rotate');
            } else {
                // Fermer tous les autres collapses ouverts
                document.querySelectorAll('.collapse.show').forEach(function (openCollapse) {
                    openCollapse.classList.remove('show');
                    const otherCard = document.querySelector(`[data-target="#${openCollapse.id}"]`).closest('.card-theme');
                    if (otherCard) {
                        otherCard.querySelector('.chevron-icon').classList.remove('rotate');
                    }
                });

                // Ouvrir le collapse sélectionné
                targetCollapse.classList.add('show');
                card.querySelector('.chevron-icon').classList.add('rotate');
            }
        });
    });
});*/


/*----------------------------------------------
# 5. Modal
----------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    // Fonction pour ouvrir un modal
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('show');
            modal.style.display = 'block';
            modal.setAttribute('aria-modal', 'true');
            document.body.style.overflow = 'hidden'; // Empêche le défilement de la page en arrière-plan
        }
    }

    // Fonction pour fermer un modal
    function closeModal(modal) {
        modal.classList.remove('show');
        modal.style.display = 'none';
        modal.removeAttribute('aria-modal');
        document.body.style.overflow = ''; // Restaure le défilement de la page
    }

    // Gestion des clics pour ouvrir les modals
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-bs-target').slice(1); // Enlève le #
            openModal(targetId);
        });
    });

    // Gestion des clics pour fermer les modals
    document.querySelectorAll('.modal').forEach(modal => {
        // Clic sur le fond pour fermer le modal
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal(modal);
            }
        });

        // Clic sur le bouton de fermeture pour fermer le modal
        modal.querySelector('[data-bs-dismiss="modal"]').addEventListener('click', function () {
            closeModal(modal);
        });
    });

    // Assurer que le clic sur le modal n'affecte pas la carte
    document.querySelectorAll('.modal, .modal-dialog').forEach(modalElement => {
        modalElement.addEventListener('click', function (e) {
            e.stopPropagation(); // Empêche la propagation du clic au parent
        });
    });

    // Clavier ESC pour fermer le modal
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal.show').forEach(modal => closeModal(modal));
        }
    });

    // Gestion des cartes avec le collapsible
    const cardThemes = document.querySelectorAll('.card-theme');

    cardThemes.forEach(function (card) {
        card.addEventListener('click', function (e) {
            // Si le clic est sur un élément du modal, ne pas replier la carte
            if (e.target.closest('.modal')) return;

            const toggle = card.querySelector('.card-toggle');
            const targetId = toggle.getAttribute('data-target');
            const targetCollapse = document.querySelector(targetId);

            // Si le collapse est déjà ouvert, on le referme
            if (targetCollapse.classList.contains('show')) {
                targetCollapse.classList.remove('show');
                card.querySelector('.chevron-icon').classList.remove('rotate');
            } else {
                // Fermer tous les autres collapses ouverts
                document.querySelectorAll('.collapse.show').forEach(function (openCollapse) {
                    openCollapse.classList.remove('show');
                    const otherCard = document.querySelector(`[data-target="#${openCollapse.id}"]`).closest('.card-theme');
                    if (otherCard) {
                        otherCard.querySelector('.chevron-icon').classList.remove('rotate');
                    }
                });

                // Ouvrir le collapse sélectionné
                targetCollapse.classList.add('show');
                card.querySelector('.chevron-icon').classList.add('rotate');
            }
        });
    });
});


let saveBtn = document.querySelector('#action_form_submit');

// Si le bouton de sauvegarde est cliqué
if (saveBtn) {
    saveBtn.addEventListener('click', function() {
        // Récupère le formulaire
        alert('Formulaire soumis');
    });
}
