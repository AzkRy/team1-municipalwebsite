function switchSection(button, sectionId) {
    // Update active button
    const buttons = document.querySelectorAll('.nav-btn');
    buttons.forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    // Show corresponding section
    const sections = document.querySelectorAll('.section');
    sections.forEach(sec => sec.classList.add('hidden'));

    document.getElementById(sectionId).classList.remove('hidden');
}

function updateMap(newSrc) {
    document.getElementById('mapFrame').src = newSrc;
  }