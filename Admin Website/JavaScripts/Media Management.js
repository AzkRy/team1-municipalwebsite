document.addEventListener('DOMContentLoaded', function () {

  const formToggle = document.getElementById('formToggle');
  const formBoxes = document.querySelectorAll('.form-box');
  const mediaGalleryTitle = document.getElementById('mediaGalleryTitle');
  const headlineGallery = document.getElementById('headlineGallery');
  const latestGallery = document.getElementById('latestGallery');
  const announcementGallery = document.getElementById('announcementGallery');
  const eventGallery = document.getElementById('eventGallery');

  function hideAllGalleries() {
    headlineGallery.style.display = 'none';
    latestGallery.style.display = 'none';
    announcementGallery.style.display = 'none';
    eventGallery.style.display = 'none';
  }

  formToggle.addEventListener('change', () => {
    formBoxes.forEach(box => box.classList.remove('active'));
    const selected = formToggle.value;
    const box = document.getElementById(`${selected}_box`);
    if (box) box.classList.add('active');

    hideAllGalleries();

    switch (selected) {
      case 'headline_form':
        mediaGalleryTitle.textContent = 'HEADLINE NEWS';
        headlineGallery.style.display = 'block';
        break;
      case 'latest_form':
        mediaGalleryTitle.textContent = 'LATEST NEWS GALLERY';
        latestGallery.style.display = 'block';
        break;
      case 'announcement_form':
        mediaGalleryTitle.textContent = 'ANNOUNCEMENT GALLERY';
        announcementGallery.style.display = 'block';
        break;
      case 'event_form':
        mediaGalleryTitle.textContent = 'EVENT SCHEDULE';
        eventGallery.style.display = 'block';
        break;
      default:
        mediaGalleryTitle.textContent = 'MEDIA CONTENT GALLERY';
    }
  });

  hideAllGalleries();

  flatpickr("#headline_date", { dateFormat: "m-d-Y", allowInput: true, maxDate: "today", position: "below" });
  flatpickr("#latest_date", { dateFormat: "m-d-Y", allowInput: true, maxDate: "today", position: "below" });
  flatpickr("#event_date", { dateFormat: "m-d-Y", allowInput: true, minDate: "today", position: "below" });

  const announcementData = [
    { image: 'img/anc1.jpg', source: 'https://example.com/1' },
    { image: 'img/anc2.jpg', source: 'https://example.com/2' },
    { image: 'img/anc3.jpg', source: 'https://example.com/3' },
    { image: 'img/anc4.jpg', source: 'https://example.com/4' }
  ];
  const slidesContainer = document.getElementById('announcementSlides');
  const dotsContainer = document.getElementById('announcementDots');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  let currentIndex = 0;

  function renderSlides() {
    slidesContainer.innerHTML = '';
    dotsContainer.innerHTML = '';
    announcementData.forEach((item, index) => {
      const slide = document.createElement('div');
      slide.className = 'announcement-item';
      slide.style.display = index === currentIndex ? 'block' : 'none';
      slide.innerHTML = `
        <img src="${item.image}" alt="Announcement Image" class="announcement-img" />
        <div class="announcement-text">
          <a class="readmore_link" href="${item.source}" target="_blank">Source Link</a>
          <button class="delete-btn" data-type="announcement" aria-label="Delete Announcement">&times;</button>
        </div>
      `;
      slidesContainer.appendChild(slide);

      const dot = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      dot.setAttribute('width', '14');
      dot.setAttribute('height', '14');
      dot.classList.add('dot-svg');
      if (index === currentIndex) dot.classList.add('active');
      const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
      circle.setAttribute('cx', '7'); circle.setAttribute('cy', '7'); circle.setAttribute('r', '6');
      dot.appendChild(circle);
      dot.addEventListener('click', () => {
        currentIndex = index;
        renderSlides();
      });
      dotsContainer.appendChild(dot);
    });
  }

  function showNextSlide() {
    currentIndex = (currentIndex + 1) % announcementData.length;
    renderSlides();
  }

  function showPrevSlide() {
    currentIndex = (currentIndex - 1 + announcementData.length) % announcementData.length;
    renderSlides();
  }

  if (nextBtn) nextBtn.addEventListener('click', showNextSlide);
  if (prevBtn) prevBtn.addEventListener('click', showPrevSlide);
  renderSlides();

  // Outside click handler for modals
  window.outsideClick = function (e) {
    document.querySelectorAll('.modal-container-delete').forEach(modal => {
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    });
  };

  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('delete-btn')) {
      const type = event.target.getAttribute('data-type');
      const modal = document.getElementById(`modal_${type}`);
      if (modal) {
        modal.style.display = 'flex';
      }
    }
  });

  document.querySelectorAll('.cancelBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = btn.closest('.modal-container-delete');
      if (modal) {
        modal.style.display = 'none';
      }
    });
  });

  document.querySelectorAll('button[id^="delete"]').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      console.log(`${btn.id} clicked - handle deletion logic here`);
      const modal = btn.closest('.modal-container-delete');
      if (modal) {
        modal.style.display = 'none';
      }
    });
  });
});
