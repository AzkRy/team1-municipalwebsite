<?php 
include '../User Side/database/database.php';
session_start();

if (!isset($_SESSION['um_id']) || !isset($_SESSION['role'])) {
    header("Location: ../Admin Website/Log In.php");
    exit();
}

$isSuperAdmin = ($_SESSION['role'] === 'Super Admin');
$isMediaOfficer = ($_SESSION['role'] === 'Media Officer');
$canEditMedia = $isSuperAdmin || $isMediaOfficer;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Media Management</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="../Admin Website/CSS/Media Management.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <link rel="stylesheet" href="../Admin Website/CSS/Navigation Bar.css">
</head>

<body>
  <?php include '../Admin Website/Navigation Bar.php'; ?>
  <div class="container">
    
    <section class="form_area">
      <h2>MEDIA CONTENT UPLOAD</h2>
      <?php if ($canEditMedia): ?>
        <select id="formToggle">
          <option value="" disabled selected hidden>Media Content Type</option>
          <option value="headline_form">Headline News</option>
          <option value="latest_form">Latest News</option>
          <option value="event_form">Events</option>
          <option value="announcement_form">Announcements</option>
        </select>

        <div class="form-container">
          <div class="form-box" id="headline_form_box">
            <form id="headline_form">
              <label for="headline_image">Attach News Image</label>
              <input type="file" id="headline_image" accept=".jpg, .jpeg, .png" required>

              <label for="headline_title">News Title</label>
              <input type="text" id="headline_title" required>

              <label for="headline_date">Date</label>
              <div class="calendar-wrapper">
                <input type="text" id="headline_date" class="flat-calendar" placeholder="mm-dd-yyyy" required>
              </div>

              <label for="headline_link">Source Link</label>
              <input type="url" id="headline_link" required>

              <label for="headline_description">News Description</label>
              <textarea id="headline_description" required></textarea>
              <?php if ($canEditMedia): ?>
              <button type="submit" class="upload_button">Upload</button>
              <?php endif; ?>
            </form>
          </div>

          <div class="form-box" id="latest_form_box">
            <form id="latest_form">
              <label for="latest_image">Attach News Image</label>
              <input type="file" id="latest_image" accept=".jpg, .jpeg, .png" required>

              <label for="latest_title">News Title</label>
              <input type="text" id="latest_title" required>

              <label for="latest_date">Date</label>
              <div class="calendar-wrapper">
                <input type="text" id="latest_date" class="flat-calendar" placeholder="mm-dd-yyyy" required>
              </div>

              <label for="latest_link">Source Link</label>
              <input type="url" id="latest_link" required>

              <label for="latest_description">News Description</label>
              <textarea id="latest_description" required></textarea>

              <button type="submit" class="upload_button">Upload</button>
            </form>
          </div>

          <div class="form-box" id="event_form_box">
            <form id="event_form">
              <label for="event_date">Date</label>
              <div class="calendar-wrapper">
                <input type="text" id="event_date" class="flat-calendar" placeholder="mm-dd-yyyy" required>
              </div>

              <label for="event_title">Event Name</label>
              <input type="text" id="event_title" required>

              <button type="submit" class="upload_button">Upload</button>
            </form>
          </div>

          <div class="form-box" id="announcement_form_box">
            <form id="announcement_form">
              <label for="announcement_image">Attach Announcement Image</label>
              <input type="file" id="announcement_image" accept=".jpg, .jpeg, .png" required>

              <label for="announcement_link">Source Link</label>
              <input type="url" id="announcement_link" required>

              <button type="submit" class="upload_button">Upload</button>
            </form>
          </div>
        </div>
      <?php endif; ?>
    </section>

    <section class="media_gallery" id="media_gallery">
      <h2 id="mediaGalleryTitle">MEDIA CONTENT GALLERY</h2>

      <div id="headlineGallery" style="display: none;">
        <div class="headline_section">
          <img class="headline-img" src="img/headline.jpg" alt="Headline Image">
          <div class="headline_content">
            <div class="headline-header">
              <h3 class="news-title">
                <span class="title-text">News Title</span>
                <span class="date">2025-06-20</span>
              </h3>
              <?php if ($canEditMedia): ?>
                <button class="edit-btn" aria-label="Edit News">&#9998;</button>
              <?php endif; ?>
            </div>
            <p class="summary">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
            <a class="readmore_link" href="#" target="_blank">Source Link</a>
          </div>
        </div>
      </div>

      <div id="latestGallery" style="display: none;">
        <div class="news-scroll-wrapper">
          <article class="news-article">
            <img src="#" alt="News image">
            <div class="news-content">
              <div class="news-title">
                <span class="title-text">News Title</span>
                <span class="date">June 22, 2025</span>
              </div>
              <p class="summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <a href="#" class="readmore_link">Read more</a>
            </div>
            <?php if ($canEditMedia): ?>
              <button class="delete-btn" data-type="latest" aria-label="Delete News">&times;</button>
            <?php endif; ?>  
          </article>
        </div>
      </div>

      <div id="announcementGallery" style="display: none;">
        <div class="announcement-slider-wrapper">
          <button class="arrow arrow-left" id="prevBtn" aria-label="Previous slide">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="42" fill="none">
              <path d="M18.75 31.5L11.25 21L18.75 10.5" stroke="#B3B3B3" stroke-width="4" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>

          <div class="announcement-slider">
            <div class="slides-container" id="announcementSlides"></div>
          </div>

          <button class="arrow arrow-right" id="nextBtn" aria-label="Next slide">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="42" fill="none">
              <path d="M11.25 31.5L18.75 21L11.25 10.5" stroke="#B3B3B3" stroke-width="4" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
        </div>

        <div class="dots" id="announcementDots" role="tablist" aria-label="Slide navigation"></div>
      </div>

      <div class="events-scroll-wrapper">
        <div id="eventGallery" style="display: none;">
          <div class="events_schedule">
            <span class="event-title">SMB NIGHT</span>
            <span class="event-date">| May 29–31</span>
            <?php if ($canEditMedia): ?>
              <button class="delete-btn" data-type="latest" aria-label="Delete News">&times;</button>
            <?php endif; ?>
          </div>
        </div>
      </div>
      
    </section>
  </div>

 <!-- Modal for Latest News -->
<div class="modal-container-delete" id="modal_latest" onclick="outsideClick(event)" style="display: none;">
  <div class="modal-delete" onclick="event.stopPropagation()">
    <form>
      <h2>Delete Latest News</h2>
      <p>Are you sure you want to <strong style="color: var(--important-section);">Delete</strong> this Latest News item?</p>
      <div class="modal-buttons">
        <button type="submit" id="deleteLatest">Delete</button>
        <button type="button" class="cancelBtn">Cancel</button>
      </div>
    </form>
  </div>
</div>

<?php if ($canEditMedia): ?>
<!-- Modal for Event -->
<div class="modal-container-delete" id="modal_event" onclick="outsideClick(event)" style="display: none;">
  <div class="modal-delete" onclick="event.stopPropagation()">
    <form>
      <h2>Delete Event</h2>
      <p>Are you sure you want to <strong style="color: var(--important-section);">Delete</strong> this Event?</p>
      <div class="modal-buttons">
        <button type="submit" id="deleteEvent">Delete</button>
        <button type="button" class="cancelBtn">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal for Announcement -->
<div class="modal-container-delete" id="modal_announcement" onclick="outsideClick(event)" style="display: none;">
  <div class="modal-delete" onclick="event.stopPropagation()">
    <form>
      <h2>Delete Announcement</h2>
      <p>Are you sure you want to <strong style="color: var(--important-section);">Delete</strong> this Announcement?</p>
      <div class="modal-buttons">
        <button type="submit" id="deleteAnnouncement">Delete</button>
        <button type="button" class="cancelBtn">Cancel</button>
      </div>
    </form>
  </div>
</div>
<?php endif; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../Admin Website/JavaScripts/Media Management.js"></script>

</html>