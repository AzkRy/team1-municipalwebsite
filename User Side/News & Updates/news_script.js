const newsData = [
  {
    img: "../Img/news7.jpg",
    title: "Proclamation of Officials",
    date: "May 13, 2025",
    summary: "Opisyal nang naiproklama ng COMELEC Lucena sina Mayor Mark Don Victor Alcala at Vice Mayor Roderick Alcala bilang mga halal na Mayor at Vice Mayor ng lungsod ng Lucena.",
    link: "https://www.facebook.com/share/p/199cSTst7P/"
  },
  {
    img: "../Img/news8.jpg",
    title: "Smile, DLL Grads!",
    date: "May 8, 2025",
    summary: "Free graduation pictorial for our DLL graduating students",
    link: "https://www.facebook.com/share/p/16CkuibqBS/"
  },
  {
    img: "../Img/news9.jpg",
    title: "Grand Central Terminal",
    date: "April 16, 2025",
    summary: "TINGNAN: Ang kasalukuyang sitwasyon sa Lucena Grand Central Terminal ngayong alas 9 ng umaga, Miyerkules, Abril 16.",
    link: "https://quezon.gov.ph/ang-kasalukuyang-sitwasyon-sa-lucena-grand-central-terminal-april-16-2025/"
  },
  {
    img: "../Img/news10.jpg",
    title: "Fire Olympics 2025",
    date: "March 14, 2025",
    summary: "Nagpasiklaban ang mga kalahok na Barangay at Industrial Community Fire Auxiliary Group (CFAG) sa idinaos na 3rd Kuya Mark Alcala Fire Olympics 2025 sa Lucena City Government Complex Grounds, March 14.",
    link: "https://www.facebook.com/share/p/18os65K6Fi/"
  }
];

const newsContainer = document.getElementById("news_container");
const loadMoreBtn = document.getElementById("loadMoreLink");

let currentIndex = 0;
const articlesPerClick = 2;

function loadArticles() {
  const nextIndex = currentIndex + articlesPerClick;
  const articlesToLoad = newsData.slice(currentIndex, nextIndex);

  articlesToLoad.forEach(article => {
    const articleElem = document.createElement("article");
    articleElem.classList.add("news-article");
    articleElem.innerHTML = `
      <img src="${article.img}" alt="news">
      <div class="news-content">
      <h3 class="news-title">
              <span class="title-text">${article.title}</span>
              <span class="date">| ${article.date}</span>
            </h3>
        <p class="summary">${article.summary}</p>
        <a href="${article.link}" target="_blank">Read more</a>
      </div>
    `;
    newsContainer.appendChild(articleElem);
  });

  if (!document.querySelector(".news-scroll-wrapper")) {
    const wrapper = document.createElement("div");
    wrapper.classList.add("news-scroll-wrapper");
    newsContainer.parentNode.insertBefore(wrapper, newsContainer);
    wrapper.appendChild(newsContainer);
  }

  currentIndex = nextIndex;

  if (currentIndex >= newsData.length) {
    loadMoreBtn.style.display = "none";
  }
}

loadMoreBtn.addEventListener("click", (e) => {
  e.preventDefault();
  loadArticles();
});



const announcements = [
  {
    img: "../Img/anc1.jpg",
    title: "",
    content: ""
  },
  {
    img: "../Img/anc2.jpg",
    title: "",
    content: ""
  },
  {
    img: "../Img/anc3.jpg",
    title: "",
    content: ""
  },
  {
    img: "../Img/anc4.jpg",
    title: "",
    content: ""
  },
  {
    img: "../Img/anc5.jpg",
    title: "",
    content: ""
  }
];

const slidesContainer = document.querySelector('#announcement_section .slides-container');
const dotsContainer = document.querySelector('#announcement_section .dots');
const arrowLeft = document.getElementById('prevBtn');
const arrowRight = document.getElementById('nextBtn');

let currentSlide = 0;

slidesContainer.innerHTML = "";
dotsContainer.innerHTML = "";

announcements.forEach((announcement, index) => {
  const slide = document.createElement("div");
  slide.classList.add("slide");
  slide.style.backgroundImage = `url('${announcement.img}')`;
  slide.innerHTML = `
    <div class="slide-text">
      <h3>${announcement.title}</h3>
      <p>${announcement.content}</p>
    </div>
  `;
  slidesContainer.appendChild(slide);

  const dot = document.createElement("button");
  dot.classList.add("dot-svg");
  if (index === 0) dot.classList.add("active");
  dot.innerHTML = `<svg><circle cx="7" cy="7" r="6" /></svg>`;
  dot.addEventListener('click', () => {
    currentSlide = index;
    updateAnnouncementSlider();
  });
  dotsContainer.appendChild(dot);
});

const totalSlides = announcements.length;

function updateAnnouncementSlider() {
  const container = document.querySelector('.announcement-slider');
  const containerWidth = container.offsetWidth;
  slidesContainer.style.transform = `translateX(-${containerWidth * currentSlide}px)`;

  const dots = dotsContainer.querySelectorAll('.dot-svg');
  dots.forEach((dot, idx) => {
    dot.classList.toggle('active', idx === currentSlide);
  });
}

function goToNextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
  updateAnnouncementSlider();
}

function goToPrevSlide() {
  currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
  updateAnnouncementSlider();
}

arrowRight.addEventListener('click', goToPrevSlide);
arrowLeft.addEventListener('click', goToNextSlide);

window.addEventListener('load', () => {
  updateAnnouncementSlider();
  window.addEventListener('resize', updateAnnouncementSlider);
});