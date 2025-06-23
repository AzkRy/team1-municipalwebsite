const modal_Container = document.getElementById('modal_Container');
const modal_Container_edit= document.getElementById('modal_Container_edit');
const modal_Container_delete= document.getElementById('modal_Container_delete');


function openUser() {
    const openUser= document.getElementById('openUser');
    modal_Container.style.display = 'flex';
    modal_Container.style.pointerEvents = 'auto';
}

function openEdit() {
    const openEdit= document.getElementById('openEdit');
    modal_Container_edit.style.display = 'flex';
    modal_Container_edit.style.pointerEvents = 'auto';
}

function openDelete() {
    const openDelete= document.getElementById('delete');
    modal_Container_delete.style.display = 'flex';
    modal_Container_delete.style.pointerEvents = 'auto';
}

function cancel() {
    const cancelRegister = document.getElementById('cancelRegister');
    const cancelEdit = document.getElementById('cancelEdit');
    modal_Container_edit.style.display = 'none';
    modal_Container_edit.style.pointerEvents = 'none';
    modal_Container.style.display = 'none';
    modal_Container.style.pointerEvents = 'none';
    modal_Container_delete.style.display = 'none';
    modal_Container_delete.style.pointerEvents = 'none';
}