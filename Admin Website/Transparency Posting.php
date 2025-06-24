<?php 
include '../User Side/database/database.php';
session_start();

if (!isset($_SESSION['um_id']) || !isset($_SESSION['role'])) {
    header("Location: ../Admin Website/Log In.php");
    exit();
}

$isSuperAdmin = ($_SESSION['role'] === 'Super Admin');
$isTransparencyOfficer = ($_SESSION['role'] === 'Transparency Officer');
$canEditMedia = $isSuperAdmin || $isTransparencyOfficer;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transparency Posting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Transparency Posting.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Navigation Bar.css">
</head>


<body>
    <?php include '../Admin Website/Navigation Bar.php'; ?>
    <div class="container">

        <!-- Upload Section -->
        <?php if ($canEditMedia): ?>
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
        <?php endif; ?>

        <!-- Document Gallery -->
        <section class="media_gallery">
            <h2>DOCUMENTS</h2>
            <div class="document-scroll-wrapper">
                <div class="document_area">
                    <a class="document_title" href="../Admin Website/Files/2022 Annual Report.pdf" target="_blank" style="color: black; text-decoration: underline;">2022 Annual Audit Report</a>
                    <?php if ($canEditMedia): ?>
                    <button class="edit-btn">&#9998;</button>
                    <button class="delete-btn" data-type="announcement">&times;</button>
                    <?php endif; ?>
                </div>
                <div class="document_area">
                    <a class="document_title" href="../Admin Website/Files/PMR June 2023.pdf" target="_blank" style="color: black; text-decoration: underline;">Procurement Monitoring Report 2023</a>
                   <?php if ($canEditMedia): ?>
                    <button class="edit-btn">&#9998;</button>
                    <button class="delete-btn" data-type="announcement">&times;</button>
                    <?php endif; ?>
                </div>
                <div class="document_area">
                    <a class="document_title" href="../Admin Website/Files/PMR June 2024.pdf" target="_blank" style="color: black; text-decoration: underline;">Procurement Monitoring Report 2024</a>
                    <?php if ($canEditMedia): ?>
                    <button class="edit-btn">&#9998;</button>
                    <button class="delete-btn" data-type="announcement">&times;</button>
                    <?php endif; ?>
                <div class="document_area">
                    <a class="document_title" href="../Admin Website/Files/PMR June 2025.pdf" target="_blank" style="color: black; text-decoration: underline;">Procurement Monitoring Report 2025</a>
                    <?php if ($canEditMedia): ?>
                    <button class="edit-btn">&#9998;</button>
                    <button class="delete-btn" data-type="announcement">&times;</button>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Delete Modal -->
        <?php if ($canEditMedia): ?>
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
        <?php endif; ?>
    </div>
</body>
<script src="../Admin Website/JavaScripts/Transparency Posting.js"></script>

</html>