function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
    });

    document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('active');
    });
    
    document.getElementById(tabId).classList.add('active');

    if (tabId === 'permits') {
        document.querySelectorAll('.tab-button')[0].classList.add('active');
    } else {
        document.querySelectorAll('.tab-button')[1].classList.add('active');
    }
}

document.querySelectorAll('select[name="status"]').forEach(function(select) {
    function setColor() {
        switch (select.value) {
            case 'Approved':
                select.style.backgroundColor = '#27ae60'; // light green
                select.style.color = '#FCF7F8';
                break;
            case 'Pending':
                select.style.backgroundColor = '#f39c12'; // light yellow
                select.style.color = '#FCF7F8';
                break;
            case 'Rejected':
                select.style.backgroundColor = '#c0392b'; // light red
                select.style.color = '#FCF7F8';
                break;
            default:
                select.style.backgroundColor = '';
                select.style.color = '';
        }
    }
    select.addEventListener('change', setColor);
    setColor(); // Set initial color
});