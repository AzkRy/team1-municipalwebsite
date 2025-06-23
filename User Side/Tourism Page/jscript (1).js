function setActive(button, content) {
  // Remove 'active' from all buttons
  const buttons = document.querySelectorAll('.nav-btn');
  buttons.forEach(btn => btn.classList.remove('active'));

  // Add 'active' to the clicked button
  button.classList.add('active');

  // Change content of the box
  const contentBox = document.getElementById('contentBox');
  contentBox.textContent = content;
}