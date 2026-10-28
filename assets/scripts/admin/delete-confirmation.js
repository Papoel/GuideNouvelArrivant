/**
 * Confirmation de suppression des utilisateurs (EasyAdmin + Turbo).
 *
 * Les liens d'action portent `data-action` (cf. UserCrudController).
 * Délégation sur `document` : fonctionne après les navigations Turbo
 * qui remplacent le <body> sans recharger la page.
 * La modale est créée à la demande — le <body> Turbo la jetterait sinon.
 */
(function () {
    const MESSAGES = {
        deleteUserOnly: 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?',
        deleteAll: 'Êtes-vous sûr de vouloir supprimer cet utilisateur et tous ses carnets ?',
        deleteLogbooksOnly: 'Êtes-vous sûr de vouloir supprimer tous les carnets de cet utilisateur ?',
    };

    let modal = null;
    let deleteUrl = '';

    function ensureModal() {
        if (modal) {
            return;
        }

        document.body.insertAdjacentHTML('beforeend', `
            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation de suppression</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <p id="deleteConfirmationMessage"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-danger" id="confirmDelete">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>
        `);

        const modalEl = document.getElementById('deleteConfirmationModal');
        modal = new bootstrap.Modal(modalEl);

        modalEl.querySelector('#confirmDelete').addEventListener('click', submitDelete);
        // Le DOM de la modale est recréé à chaque clic (Turbo) : cleanup au hide.
        modalEl.addEventListener('hidden.bs.modal', () => {
            modalEl.remove();
            modal = null;
        });
    }

    function submitDelete() {
        if (!deleteUrl) {
            return;
        }

        // Actions destructives : POST + jeton CSRF obligatoires.
        // Le jeton voyage dans l'URL (cf. generateDeleteUrl) ; on le reposte en body.
        const url = new URL(deleteUrl, window.location.origin);
        const token = url.searchParams.get('token');
        url.searchParams.delete('token');

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url.toString();
        form.style.display = 'none';

        if (token) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'token';
            input.value = token;
            form.appendChild(input);
        }

        document.body.appendChild(form);
        form.submit();
    }

    document.addEventListener('click', function (e) {
        const link = e.target.closest('[data-action="deleteUserOnly"], [data-action="deleteAll"], [data-action="deleteLogbooksOnly"]');
        if (!link) {
            return;
        }

        e.preventDefault();

        deleteUrl = link.getAttribute('href');
        if (!deleteUrl) {
            return;
        }

        ensureModal();
        document.getElementById('deleteConfirmationMessage').textContent =
            MESSAGES[link.dataset.action] ?? 'Confirmer la suppression ?';
        modal.show();
    });
})();
