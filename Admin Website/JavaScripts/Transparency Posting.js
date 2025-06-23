
document.addEventListener('DOMContentLoaded', function () {
    window.outsideClick = function (e) {
        document.querySelectorAll('.modal-container-delete').forEach(modal => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    };

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-btn')) {
            const modal = document.getElementById(`modal_announcement`);
            if (modal) modal.style.display = 'flex';
        }
    });

    document.querySelectorAll('.cancelBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            const modal = btn.closest('.modal-container-delete');
            if (modal) modal.style.display = 'none';
        });
    });

    document.querySelectorAll('button[id^="delete"]').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            console.log(`${btn.id} clicked - delete logic here`);
            const modal = btn.closest('.modal-container-delete');
            if (modal) modal.style.display = 'none';
        });
    });
});