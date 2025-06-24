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

  flatpickr("#headline_date", { dateFormat: "m-d-Y", allowInput: true, maxDate: "today" });
  flatpickr("#latest_date", { dateFormat: "m-d-Y", allowInput: true, maxDate: "today" });
  flatpickr("#event_date", { dateFormat: "m-d-Y", allowInput: true, minDate: "today" });

  const announcementData = [
    { image: 'User Side/Img/anc1.jpg', source: 'https://www.facebook.com/share/p/16UAAuzLS7/' },
    { image: 'User Side/Img/anc2.jpg', source: 'https://www.facebook.com/share/1CAzvjwXAf/' },
    { image: 'User Side/Img/anc3.jpg', source: 'https://www.facebook.com/share/p/16pCK3yrxK/' },
    { image: 'User Side/Img/anc4.jpg', source: 'https://www.facebook.com/share/p/1BtPDJnNx7/' }
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
      circle.setAttribute('cx', '7');
      circle.setAttribute('cy', '7');
      circle.setAttribute('r', '6');
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

  window.outsideClick = function (e) {
    document.querySelectorAll('.modal-container-delete').forEach(modal => {
      if (e.target === modal) modal.style.display = 'none';
    });
  };

  document.querySelectorAll('.cancelBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = btn.closest('.modal-container-delete');
      if (modal) modal.style.display = 'none';
    });
  });

  document.addEventListener('click', function (event) {
    const btn = event.target.closest('.delete-btn');
    if (!btn) return;

    const type = btn.getAttribute('data-type');
    const modal = document.getElementById(`modal_${type}`);
    if (!modal) return;

    modal.style.display = 'flex';
    modal._elementToDelete = btn.closest('.announcement-item, .headline_section, .news-article, .events_schedule');

    if (type === 'announcement') {
      const index = Array.from(slidesContainer.children).indexOf(modal._elementToDelete);
      modal._announcementIndex = index;
    }
  });

  document.getElementById('deleteLatest').addEventListener('click', function (e) {
    e.preventDefault();
    const modal = document.getElementById('modal_latest');
    if (modal._elementToDelete) {
      modal._elementToDelete.remove();
    }
    modal.style.display = 'none';
  });

  document.getElementById('deleteEvent').addEventListener('click', function (e) {
    e.preventDefault();
    const modal = document.getElementById('modal_event');
    if (modal._elementToDelete) {
      modal._elementToDelete.remove();
    }
    modal.style.display = 'none';
  });

  document.getElementById('deleteAnnouncement').addEventListener('click', function (e) {
    e.preventDefault();
    const modal = document.getElementById('modal_announcement');
    if (modal._announcementIndex !== -1) {
      announcementData.splice(modal._announcementIndex, 1);
      if (currentIndex >= announcementData.length) currentIndex = 0;
      renderSlides();
    }
    modal.style.display = 'none';
  });

  function formatDate(inputDate) {
    const date = new Date(inputDate);
    return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
  }

  document.getElementById('headline_form').addEventListener('submit', function (e) {
    e.preventDefault();

    const title = document.getElementById('headline_title').value;
    const date = document.getElementById('headline_date').value;
    const link = document.getElementById('headline_link').value;
    const description = document.getElementById('headline_description').value;
    const imageInput = document.getElementById('headline_image');

    const headlineSection = document.querySelector('#headlineGallery .headline_section');
    if (!headlineSection) return;

    if (imageInput.files.length > 0) {
      const imageURL = URL.createObjectURL(imageInput.files[0]);
      headlineSection.querySelector('img.headline-img').src = imageURL;
    }

    headlineSection.querySelector('.title-text').textContent = title;
    headlineSection.querySelector('.date').textContent = formatDate(date);
    headlineSection.querySelector('.summary').textContent = description;
    headlineSection.querySelector('.readmore_link').href = link;

    this.reset();
  });

  document.querySelector('.edit-btn').addEventListener('click', function () {
    const headlineSection = document.querySelector('#headlineGallery .headline_section');
    if (!headlineSection) return;

    document.getElementById('formToggle').value = 'headline_form';
    formToggle.dispatchEvent(new Event('change'));

    document.getElementById('headline_title').value = headlineSection.querySelector('.title-text').textContent;
    document.getElementById('headline_date').value = headlineSection.querySelector('.date').textContent;
    document.getElementById('headline_link').value = headlineSection.querySelector('.readmore_link').href;
    document.getElementById('headline_description').value = headlineSection.querySelector('.summary').textContent;
  });

  document.getElementById('latest_form').addEventListener('submit', function (e) {
    e.preventDefault();

    const title = document.getElementById('latest_title').value;
    const date = document.getElementById('latest_date').value;
    const link = document.getElementById('latest_link').value;
    const description = document.getElementById('latest_description').value;
    const imageInput = document.getElementById('latest_image');
    const imageURL = URL.createObjectURL(imageInput.files[0]);

    const article = document.createElement('article');
    article.className = 'news-article';
    article.innerHTML = `
      <img src="${imageURL}" alt="News image">
      <div class="news-content">
        <div class="news-title">
          <span class="title-text">${title}</span>
          <span class="date">${formatDate(date)}</span>
        </div>
        <p class="summary">${description}</p>
        <a href="${link}" class="readmore_link" target="_blank">Source Link</a>
      </div>
      <button class="delete-btn" data-type="latest" aria-label="Delete News">&times;</button>
    `;
    document.querySelector('#latestGallery .news-scroll-wrapper').prepend(article);

    this.reset();
  });

  document.getElementById('event_form').addEventListener('submit', function (e) {
    e.preventDefault();
    const title = document.getElementById('event_title').value;
    const date = document.getElementById('event_date').value;

    const div = document.createElement('div');
    div.className = 'events_schedule';
    div.innerHTML = `
      <span class="event-title">${title}</span>
      <span class="event-date">| ${formatDate(date)}</span>
      <button class="delete-btn" data-type="event" aria-label="Delete Event">&times;</button>
    `;
    document.getElementById('eventGallery').appendChild(div);
    this.reset();
  });

  document.getElementById('announcement_form').addEventListener('submit', function (e) {
    e.preventDefault();

    const link = document.getElementById('announcement_link').value;
    const imageInput = document.getElementById('announcement_image');
    const imageURL = URL.createObjectURL(imageInput.files[0]);

    announcementData.push({ image: imageURL, source: link });
    renderSlides();
    this.reset();
  });

  document.querySelectorAll('.modal-delete form').forEach(form => {
    form.addEventListener('submit', e => e.preventDefault());
  });
});
