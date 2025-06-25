// Show the delete modal and store the id to delete
let deleteId = null;

function openDelete(id) {
    deleteId = id;
    document.getElementById('modal_Container_delete').style.display = 'flex';
}

// Hide the delete modal
function cancel() {
    document.getElementById('modal_Container_delete').style.display = 'none';
    deleteId = null;
    return false; // Prevent form submission
}

// Handle delete button in modal
document.addEventListener('DOMContentLoaded', function () {
    const deleteBtn = document.getElementById('deleteUser');
    const form = document.querySelector('.modal-delete form');
    if (deleteBtn && form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (deleteId) {
                // Send AJAX request to delete the entry
                fetch('delete_feedback_inquiry.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'id=' + encodeURIComponent(deleteId)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the deleted item from the DOM
                        const btn = document.querySelector(`button[onclick="openDelete(${deleteId})"]`);
                        if (btn) {
                            btn.closest('.feedback-item').remove();
                        }
                        const item = document.getElementById('feedback-item-' + deleteId);
                        if (item) item.remove();
                    } else {
                        alert('Failed to delete.');
                    }
                    cancel();
                })
                .catch(() => {
                    alert('Error deleting.');
                    cancel();
                });
            }
        });
    }
});