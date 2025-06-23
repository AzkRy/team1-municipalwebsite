<?php
include '../database/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO feedback_inquiries (name, type, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $type, $subject, $message);
    $stmt->execute();
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Lucena</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../Contact Page/Contact Page style.css">
    <link rel="stylesheet" href="../Navigation Bar/navigation.css">
    <link rel="stylesheet" href="../Footer/footer_styles.css">

</head>
<body>
     <header>
        <div id="divLogo">
            <img src="../Navigation Bar/img/lucena_city.png" class="logo"> 
            <h1 id="cityName"> CITY OF LUCENA </h1>
        </div>
        <div class="tagline">
                <img src="../Navigation Bar/img/boom-lucena.PNG" class="boomLucena">
        </div>
    </header>
    
 <?php
include '../Navigation Bar/Navigation.php';
?>
    
    <section class="hero_section">
        <div class="container">
            <h1>CONTACT US</h1>
            <p class="message">We value your Feedback and Inquiries. Please fill out the form below to get in touch.</p>
            <a href="../Home/index.php" class="home-link">Home</a> <span>&gt;</span> <a class="contact-link" href="../Contact Page/Contact Page.php">Contact Us</a>
        </div>   
    </section>
    <section class="contacts_section">
        <div class="container">
            <div class="logo-name">
                <img src="../Contact Page/lucena_city.png" alt="Lucena City Logo">
                <h2>LUCENA CITY GOVERNMENT</h2>
            </div>
            <div class="contact_details">
                <div class="detail">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Lucena Diversion Road, Brgy. Mayao Kanluran, Lucena City, 4301 Quezon, Philippines</p>
                </div>
                
                <div class="detail">
                    <i class="fas fa-clock"></i>
                    <p>Monday to Friday: 8:00 AM - 5:00 PM</p>
                </div>
                
                <div class="detail">
                    <i class="fas fa-envelope"></i>
                    <p>CMOLucena@gmail.com</p>
                </div>
                
                <div class="detail">
                    <i class="fas fa-envelope"></i>
                    <p>CMOLucenaCity@yahoo.com</p>
                </div>

                <div class="detail">
                    <i class="fas fa-phone"></i>
                    <p>(042) 788-2298</p>
                </div>
                
                <div class="detail">
                    <i class="fas fa-phone"></i>
                    <p>(042) 788-2320 loc. 174</p>
                </div>
                
                <div class="detail">
                    <i class="fa-brands fa-facebook-f"></i>
                    <p>Facebook: <a href="https://web.facebook.com/lucenalguofficial">City Government of Lucena</a></p>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="contact_form">
                <h2>CONTACT FORM</h2>
                <form action="Contact Page.php" method="post">

                    <div class="name-type">
                        <input class="name" type="text" name="name" placeholder="Name*" required>
                        <select name="type" required>
                            <option value="">Select Type</option>
                            <option value="Feedback">Feedback</option>
                            <option value="Inquiry">Inquiry</option>
                        </select>
                    </div>
                    <input class="subject" type="text" name="subject" placeholder="Subject*" required> <br>
                    <textarea name="message" placeholder="Write your message*..." required></textarea> <br>
                    <button type="submit" name="submit">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <script src="../Navigation Bar/navigation.js"></script>

    <?php 
    include '../Footer/Footer.php';
    ?>