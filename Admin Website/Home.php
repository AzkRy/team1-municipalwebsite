<?php
include '../User Side/database/database.php';
session_start();

if (!isset($_SESSION['um_id']) || !isset($_SESSION['role'])) {
  header("Location: ../Admin Website/Log In.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Home.css">

    <link rel="stylesheet" href="../Admin Website/CSS/Navigation Bar.css">
</head>
<body>
    <?php include '../Admin Website/Navigation Bar.php';  ?>
    <main class="container">
        <section class="card dashboard-card">
            <h2>SERVICES ONLINE APPLICATIONS</h2>
            <div id="chart-area" class="chart-container">
            </div>
        </section>

        <section class="card">
            <h2>FEEDBACK & INQUIRIES</h2>
            <div>
                <div class="feedback-item">
                    <p>Ganda po ng site, Bongga!</p>
                </div>
                <div class="feedback-item">
                    <p>Paano po mag apply for business permit?</p>
                </div>
                <div class="feedback-item">
                    <p>May available schedule po ba for vaccination para sa small pox?</p>
                </div>
                <div class="feedback-item">
                    <p>Saan mo naka locate ang bagong city hall?</p>
                </div>
            </div>
        </section>

        <section class="card">
            <h2>Recent Activity</h2>
            <ul class="activity-list">
                <li class="activity-item"><span>New Announcement Posted</span></li>
                <li class="activity-item"><span>News Updated</span></li>
                <li class="activity-item"><span>Back-Up Successful!</span></li>
                <li class="activity-item"><span>Security Updated</span></li>
                <li class="activity-item"><span>New News uploaded</span></li>
                <li class="activity-item"><span>Document Uploaded Successfully.</span></li>
                <li class="activity-item"><span>Building Permit Form Updated.</span></li>
                <li class="activity-item"><span>New form permit uploaded</span></li>
                <li class="activity-item"><span>Financial Report posted</span></li>
                <li class="activity-item"><span>News Updated</span></li>
                <li class="activity-item"><span>Image in events album added</span></li>
                <li class="activity-item"><span>Event created!</span></li>
            </ul>
        </section>
    </main>

    <!-- Link to your external JavaScript file -->
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="../Admin Website/JavaScripts/Home.js"></script>
</body>
</html>
