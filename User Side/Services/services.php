<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400&family=Roboto:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../Services/services.css">
    
    <link rel="stylesheet" href="../Navigation Bar/navigation.css">
    <link rel="stylesheet" href="../Footer/footer_styles.css">
</head>

<body>
    <header>
        <div id="divLogo">
            <img src="../Navigation Bar/img/lucena_city.png" class="logo" />
            <h1 id="cityName">CITY OF LUCENA</h1>
        </div>
        <div class="tagline">
            <img src="../Navigation Bar/img/boom-lucena.PNG" class="boomLucena" />
        </div>
    </header>

<?php
include '../Navigation Bar/Navigation.php';
?>
        
    <div class="sub-headercontainer">
        <div class="sub-header">
            <h1>SERVICES</h1>
            <p class="breadcrumbs">
                <a href="../User Side/Home/index.php">Home</a> &gt; <span><a href="../Services/services.php">Services</a></span>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <img class="image-placeholder" src="../Services/img/permitsimg.jpg">
            <a href="../Services/permit.php"><h2>Permit Applications</h2></a>
            <p>Submit requests for building, event, business, and transport permits quickly and easily.</p>
        </div>

        <div class="card">
            <img class="image-placeholder" src="../Services/img/healthservicesimg.jpg">
            <a href="../Services/healthservice.php"><h2>Health Appointments</h2></a>
            <p>Schedule a medical consultation or request healthcare services with our local clinics.</p>
        </div>

        <div class="card">
            <img class="image-placeholder" src="../Services/img/taxservicesimg.jpg">
            <a href="../Services/taxservice.php"><h2>Tax Clearance Requests</h2></a>
            <p>Apply for official tax clearance for business, property, or financial transactions.</p>
        </div>
    </div>

    <script src="../Navigation Bar/navigation.js"></script>

    <?php 
    include '../Footer/Footer.php';
    ?> 