document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const body = document.body;
    const liveTimeSpan = document.getElementById('live-time');

    // Function to update live time
    function updateLiveTime() {
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; 
        const strMinutes = minutes < 10 ? '0' + minutes : minutes;
        liveTimeSpan.textContent = `${hours}:${strMinutes} ${ampm}`;
    }

    // Update time every second
    setInterval(updateLiveTime, 1000);
    // Initial call to display time immediately
    updateLiveTime();

    menuToggle.addEventListener('click', (event) => {
        event.preventDefault(); 
        sidebar.classList.toggle('collapsed');
        body.classList.toggle('sidebar-open');
        overlay.classList.toggle('active'); 
    });

    // Close sidebar when clicking outside on the overlay
    overlay.addEventListener('click', () => {
        sidebar.classList.add('collapsed');
        body.classList.remove('sidebar-open');
        overlay.classList.remove('active');
    });

    // Optional: Close sidebar if a nav item is clicked (useful for mobile)
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.addEventListener('click', () => {
            if (!sidebar.classList.contains('collapsed')) {
                sidebar.classList.add('collapsed');
                body.classList.remove('sidebar-open');
                overlay.classList.remove('active');
            }
        });
    });
});