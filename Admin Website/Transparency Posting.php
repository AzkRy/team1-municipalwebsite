
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transparency Posting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="Transparency Posting.css">
</head>

<body>
    <div class="container">

        <!-- Upload Section -->
        <section class="upload_area">
            <h2>UPLOAD DOCUMENT</h2>
            <form id="Transparency_Form">
                <div>
                    <label for="Transparency_File">Attach File</label>
                    <input type="file" id="Transparency_File" accept=".pdf" required>
                </div>
                <div>
                    <label for="Transparency_Name">Document Name</label>
                    <input type="text" id="Transparency_Name" required>
                </div>
                <button type="submit" class="upload_button">Upload</button>
            </form>
        </section>

        <!-- Document Gallery -->
        <section class="media_gallery">
            <h2>DOCUMENTS</h2>
            <div class="document-scroll-wrapper">
                <div class="document_area">
                    <span class="document_title">2025 Financial Report</span>
                    <button class="edit-btn">&#9998;</button>
                    <button class="delete-btn" data-type="announcement">&times;</button>
                </div>
                <div class="document_area">
                    <span class="document_title">2025 Budget Report</span>
                    <button class="edit-btn">&#9998;</button>
                    <button class="delete-btn" data-type="announcement">&times;</button>
                </div>
                <div class="document_area">
                    <span class="document_title">2024 Financial Report</span>
                    <button class="edit-btn">&#9998;</button>
                    <button class="delete-btn" data-type="announcement">&times;</button>
                </div>
            </div>
        </section>

        <!-- Delete Modal -->
        <div class="modal-container-delete" id="modal_announcement" onclick="outsideClick(event)"
            style="display: none;">
            <div class="modal-delete" onclick="event.stopPropagation()">
                <form>
                    <h2>Delete Document</h2>
                    <p>Are you sure you want to <strong style="color: var(--important-section);">Delete</strong> this
                        document?</p>
                    <div class="modal-buttons">
                        <button type="submit" id="deleteAnnouncement">Delete</button>
                        <button type="button" class="cancelBtn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="Transparency Posting.js"></script>

</html>