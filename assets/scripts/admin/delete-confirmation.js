// public/js/admin/delete-confirmation.js
document.addEventListener('DOMContentLoaded', function() {
    console.log('Script de confirmation de suppression chargé');

    // Créer et ajouter le modal au DOM
    const modalHTML = `
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    `;

    document.body.insertAdjacentHTML('beforeend', modalHTML);

    const modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
    let deleteUrl = '';

    const buttons = document.querySelectorAll('[data-action="deleteUserOnly"], [data-action="deleteAll"], [data-action="deleteLogbooksOnly"]');

    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const action = this.dataset.action;
            deleteUrl = this.getAttribute('href');

            let message;
            switch(action) {
                case 'deleteUserOnly':
                    message = 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?';
                    break;
                case 'deleteAll':
                    message = 'Êtes-vous sûr de vouloir supprimer cet utilisateur et tous ses carnets ?';
                    break;
                case 'deleteLogbooksOnly':
                    message = 'Êtes-vous sûr de vouloir supprimer tous les carnets de cet utilisateur ?';
                    break;
            }

            document.getElementById('deleteConfirmationMessage').textContent = message;
            modal.show();
        });
    });

    document.getElementById('confirmDelete').addEventListener('click', function() {
        if (deleteUrl) {
            window.location.href = deleteUrl;
        }
    });
});
