const modal_Container = document.getElementById('modal_Container');
const modal_Container_edit= document.getElementById('modal_Container_edit');
const modal_Container_delete= document.getElementById('modal_Container_delete');


function openUser() {
    const openUser= document.getElementById('openUser');
    modal_Container.style.display = 'flex';
    modal_Container.style.pointerEvents = 'auto';
}

function cancel() {
    const cancelRegister = document.getElementById('cancelRegister');
    const cancelEdit = document.getElementById('cancelEdit');
    modal_Container_edit.style.display = 'none';
    modal_Container_edit.style.pointerEvents = 'none';
    modal_Container.style.display = 'none';
    modal_Container.style.pointerEvents = 'none';
}

    document.querySelectorAll('.openEditBtn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.getElementById('edit_um_id').value = this.dataset.um_id;
        document.getElementById('edit_last_name').value = this.dataset.last_name;
        document.getElementById('edit_first_name').value = this.dataset.first_name;
        document.getElementById('edit_email').value = this.dataset.email;
        document.getElementById('edit_employee_num').value = this.dataset.employee_num;
        document.getElementById('edit_roles').value = this.dataset.role;
        
        modal_Container_edit.style.display = 'flex';
        modal_Container_edit.style.pointerEvents = 'auto';
    });
});

document.getElementById('cancelEdit').onclick = function() {
    document.getElementById('modal_Container_edit').style.display = 'none';
    return false;
};


document.querySelectorAll('.openDeleteBtn').forEach(btn => {
    btn.addEventListener('click', function() {
        
        const userId = this.dataset.um_id;
        const lastName = this.dataset.last_name;
        const firstName = this.dataset.first_name;

        document.getElementById('delete_um_id').value = userId;
        document.getElementById('delete_user_name').textContent = `${lastName}, ${firstName}`;

        modal_Container_delete.style.display = 'flex';
        modal_Container_delete.style.pointerEvents = 'auto';
    });
});


document.getElementById('confirmDeleteBtn').onclick = function() {
    const userId = document.getElementById('delete_um_id').value;

    fetch('User Management.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `um_id=${encodeURIComponent(userId)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            
            location.reload();
        } else {
            alert('Failed to delete user.');
        }
    })
    .catch(() => alert('Error deleting user.'));

    modal_Container_delete.style.display = 'none';
    modal_Container_delete.style.pointerEvents = 'none';
};