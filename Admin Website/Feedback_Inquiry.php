<?php 
include '../User Side/database/database.php';
session_start();

if (!isset($_SESSION['um_id']) || !isset($_SESSION['role'])) {
    header("Location: ../Admin Website/Log In.php");
    exit();
}

$isSuperAdmin = ($_SESSION['role'] === 'Super Admin');
$isFeedbackOfficer = ($_SESSION['role'] === 'Feedback Officer');
$canEditMedia = $isSuperAdmin || $isFeedbackOfficer;


// Fetch feedback and inquiries from database
$feedbacks = [];
$inquiries = [];
$feedbackCount = 0;
$inquiryCount = 0;

$sql_feedback = "SELECT * FROM feedback_inquiries WHERE type = 'Feedback'";
$sql_inquiry = "SELECT * FROM feedback_inquiries WHERE type = 'Inquiry'";

if ($result = $conn->query($sql_feedback)) {
    $feedbacks = $result->fetch_all(MYSQLI_ASSOC);
    $feedbackCount = count($feedbacks);
}

if ($result = $conn->query($sql_inquiry)) {
    $inquiries = $result->fetch_all(MYSQLI_ASSOC);
    $inquiryCount = count($inquiries);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback & Inquiry</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Feedback_Inquiry.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Navigation Bar.css">
</head>
<body>
    <?php include '../Admin Website/Navigation Bar.php'; ?>
    <section>
        <div class="top-part">
            <div class="card-container">
                <div class="card feedback-card">
                    <div class="card-title">FEEDBACK</div>
                    <div class="card-count"><?php echo $feedbackCount; ?></div>
                </div>
                <div class="card inquiry-card">
                    <div class="card-title">INQUIRIES</div>
                    <div class="card-count"><?php echo $inquiryCount; ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="feedback-section"> 
        <div class="feedback">
            <div class="feedback-header">
                <span class="feedback-title">FEEDBACK</span>
                <div class="feedback-controls">
                    <span>Sort</span>
                    <select>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>
            </div>
            <div class="feedback-list">
                <?php if (count($feedbacks) > 0): ?>
                    <?php foreach ($feedbacks as $fb): ?>
                        <div class="feedback-item" id="feedback-item-<?php echo $fb['fi_id']; ?>">
                            <span class="feedback-user">
                                <?php echo (empty($fb['name']) ? 'Anonymous' : htmlspecialchars($fb['name'])); ?>
                            </span>
                            <span class="feedback-message"><?php echo htmlspecialchars($fb['message']); ?></span>
                            <?php if ($canEditMedia): ?>
                            <button class="delete-btn deleteFeedback" onclick="openDelete(<?php echo $fb['fi_id']; ?>)"><i class="fas fa-trash"></i></button>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="feedback-item">No feedback found.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="feedback-section"> 
        <div class="inquiry">
            <div class="inquiry-header">
                <span class="inquiry-title">INQUIRIES</span>
                <div class="feedback-controls">
                    <span>Sort</span>
                    <select>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>
            </div>
            <div class="feedback-list">
                <?php if (count($inquiries) > 0): ?>
                    <?php foreach ($inquiries as $inq): ?>
                        <div class="feedback-item" id="feedback-item-<?php echo $inq['fi_id']; ?>">
                            <span class="feedback-user">
                                <?php echo (empty($inq['name']) ? 'Anonymous' : htmlspecialchars($inq['name'])); ?>
                            </span>
                            <span class="feedback-message"><?php echo htmlspecialchars($inq['message']); ?></span>
                            <?php if ($canEditMedia): ?>
                            <button class="delete-btn deleteFeedback" onclick="openDelete(<?php echo $inq['fi_id']; ?>)"><i class="fas fa-trash"></i></button>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="feedback-item">No inquiries found.</div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="modal-container-delete" id="modal_Container_delete">
        <div class="modal-delete">
            <form action="Feedback_Inquiry.php">
                <h2>Delete Message</h2>
                <p>Are you sure you want to <strong style="color: var(--important-section);">Delete</strong> this message?</p>
                <div class="button">
                    <button type="submit" id="deleteUser">Delete</button>
                    <button id="cancelDelete" onclick=cancel()>Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../Admin Website/JavaScripts/Feedback_Inquiry.js"></script>
</body>
</html>