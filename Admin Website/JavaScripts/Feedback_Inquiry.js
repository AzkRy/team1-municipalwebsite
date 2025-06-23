const modal_Container_delete= document.getElementById('modal_Container_delete');

function openDelete() {
    const openDelete = document.getElementById('deleteFeedback');
    modal_Container_delete.style.display = 'flex';
    modal_Container_delete.style.pointerEvents = 'auto';
}

function cancel() {
    const cancel = document.getElementById('cancelDelete');
    modal_Container_delete.style.display = 'none';
    modal_Container_delete.style.pointerEvents = 'none';
}