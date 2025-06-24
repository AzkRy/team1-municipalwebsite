document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('Transparency_Form');
    const fileInput = document.getElementById('Transparency_File');
    const nameInput = document.getElementById('Transparency_Name');
    const gallery = document.querySelector('.document-scroll-wrapper');
    const modal = document.getElementById('modal_announcement');
    const uploadBtn = form.querySelector('button[type="submit"]');

    let toDelete = null;
    let toEdit = null;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const name = nameInput.value;

        if (toEdit) {
            const link = toEdit.querySelector('a.document_title');

            if (fileInput.files.length > 0) {
                const fileURL = URL.createObjectURL(fileInput.files[0]);
                link.href = fileURL;
            }

            link.textContent = name;
            toEdit = null;
            uploadBtn.textContent = 'Upload';
        } else {
            if (fileInput.files.length === 0) return;
            const file = fileInput.files[0];
            const fileURL = URL.createObjectURL(file);

            const doc = document.createElement('div');
            doc.className = 'document_area';
            doc.innerHTML = `
                <a class="document_title" href="${fileURL}" target="_blank" style="color: black; text-decoration: underline;">${name}</a>
                <button class="edit-btn" aria-label="Edit">&#9998;</button>
                <button class="delete-btn" data-type="announcement" aria-label="Delete">&times;</button>
            `;
            gallery.appendChild(doc);
        }

        form.reset();
    });

    document.addEventListener('click', function (event) {
        const btn = event.target;
        if (btn.classList.contains('delete-btn')) {
            toDelete = btn.closest('.document_area');
            modal.style.display = 'flex';
        }
    });

    document.getElementById('deleteAnnouncement').addEventListener('click', function (e) {
        e.preventDefault();
        if (toDelete) {
            toDelete.remove();
            toDelete = null;
        }
        modal.style.display = 'none';
    });

    document.querySelectorAll('.cancelBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            modal.style.display = 'none';
            toDelete = null;
        });
    });

    window.outsideClick = function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            toDelete = null;
        }
    };

    document.addEventListener('click', function (event) {
        const btn = event.target;
        if (btn.classList.contains('edit-btn')) {
            const item = btn.closest('.document_area');
            const link = item.querySelector('a.document_title');
            nameInput.value = link.textContent;
            fileInput.value = ''; 
            uploadBtn.textContent = 'Update';
            toEdit = item;
        }
    });
});
