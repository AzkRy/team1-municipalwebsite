<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$emailSent = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['first-name'] ?? 'Citizen';
    $email = $_POST['email-address'] ?? '';
    $reqType = $_POST['service-type'] ?? '';
    $time = $_POST['appointment-time'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Mailtrap SMTP for now
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'faecb2f6d52292';
        $mail->Password = '31f3d890d977cf';
        $mail->Port = 587;

        $mail->setFrom('no-reply@lucena.gov', 'Lucena Services Office');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Your Appointment Request is being Processed';
        $mail->Body = "Hello <strong>$name</strong>,<br><br>
                Thank you for submitting your appointment request. It is currently being reviewed.<br>
                We'll notify you once there's an available slot for your selected time: <strong>$time</strong>.<br><br>
                Regards,<br>
                Lucena City Services";

        $mail->send();

        // 🔁 Redirect after successful submission
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit;

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lucena Health Appointment | Services</title>
    <link rel="stylesheet" href="../Services (modified)/healthservice.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400&family=Roboto:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../Navigation Bar/navigation.css">
    <link rel="stylesheet" href="../Footer/footer_styles.css">
    <script src="../Services (modified)/modalpopup.js" defer></script>
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
    <div class="instructions">
        <h2>INSTRUCTIONS</h2>

        <ol>
            <li>Step 1: Fill up form</li>
            <li>Step 2: Select type of service</li>
            <li>Step 3: Note down the location shown</li>
            <li>Step 4: Confirm if details are correct</li>
            <li>Step 5: Wait for updates for the appointment</li>
        </ol>
    </div>

    <!--HEALTH FORM-->
    <form id="appointmentForm" method="POST" action="" class="permit-form">
        <h2 class="form-title">Health Appointment Request</h2>
        <!-- Personal Info -->
        <div class="form-grid">
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input
                    type="text"
                    id="last-name"
                    name="last-name"
                    required
                    pattern="^[A-Za-zÑñ\s\-']+$" />
            </div>

            <div class="form-group">
                <label for="first-name">First Name</label>
                <input
                    type="text"
                    id="first-name"
                    name="first-name"
                    required
                    pattern="^[A-Za-zÑñ\s\-']+$" />
            </div>

            <div class="form-group">
                <label for="middle-name">Middle Name <small>(N/A if none)</small></label>
                <input
                    type="text"
                    id="middle-name"
                    name="middle-name"
                    required
                    pattern="^[A-Za-zÑñ\s\-']+$" />
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="no-min-date" required />
            </div>

            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input
                    type="tel"
                    id="contact"
                    name="contact"
                    required
                    pattern="^[0-9]{11}$"
                    maxlength="11" />
            </div>

            <div class="form-group">
                <label>Sex</label>
                <label><input type="radio" name="sex" value="male" required /> Male</label>
                <label><input type="radio" name="sex" value="female" required />
                    Female</label>
                <label><input type="radio" name="sex" value="other" required /> Prefer not
                    to say</label>
            </div>

            <div class="form-group">
                <label for="email-address">Email</label>
                <input
                    type="email"
                    id="email-address"
                    name="email-address"
                    required />
            </div>

            <div class="form-group full-width">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required />
            </div>
        </div>

        <!-- Appointment Info -->
        <h4>APPOINTMENT DETAILS</h4>
        <div class="form-grid">
            <div class="form-group">
                <label for="appointment-date">Preferred Appointment Date</label>
                <input
                    type="date"
                    id="appointment-date"
                    name="appointment-date"
                    required />
            </div>
            <div class="form-group">
                <label for="appointment-time">Appointment Time</label>
                <select id="appointment-time" name="appointment-time" required>
                    <option value="" selected hidden>Select a time</option>
                </select>
            </div>
            <div class="form-group">
                <label for="service-type">Type of Service</label>
                <select id="service-type">
                    <option value="" selected hidden>-- Select --</option>
                    <option value="general">General Checkup</option>
                    <option value="dental">Dental</option>
                    <option value="prenatal">Prenatal</option>
                    <option value="pediatrics">Pediatrics</option>
                    <option value="mental">Mental</option>
                </select>
                <div
                    id="service-note"
                    style="margin-top: 10px; font-size: 14px; color: #333"></div>
            </div>
            <div class="form-group full-width">
                <label for="reason">Reason for Appointment</label>
                <textarea id="reason" name="reason" rows="4" required></textarea>
            </div>
        </div>

        <!-- Health Info -->
        <h4>HEALTH DETAILS</h4>
        <div class="form-grid">
            <div class="form-group full-width">
                <label for="medical-history">Medical History</label>
                <textarea
                    id="medical-history"
                    name="medical-history"
                    rows="3"
                    required></textarea>
            </div>
            <div class="form-group full-width">
                <label for="allergies">Allergies</label>
                <textarea id="allergies" name="allergies" rows="2"></textarea>
            </div>
        </div>

        <!-- Emergency Contact -->
        <h4>EMERGENCY CONTACT</h4>
        <div class="form-grid">
            <div class="form-group">
                <label for="emergency-name">Name</label>
                <input
                    type="text"
                    id="emergency-name"
                    name="emergency-name"
                    required
                    pattern="^[A-Za-zÑñ\s\-']+$" />
            </div>
            <div class="form-group">
                <label for="emergency-contact">Contact Number</label>
                <input
                    type="tel"
                    id="emergency-contact"
                    name="emergency-contact"
                    required
                    pattern="^[0-9]{11}$"
                    maxlength="11" />
            </div>
        </div>

        <!-- File Upload -->
        <h4>ATTACHMENTS (Optional)</h4>
        <div class="form-group">
            <label>Relevant Medical Records</label>
            <div class="custom-upload">
                <input
                    type="file"
                    name="relevant-med-records"
                    id="relevant-med-records"
                    class="file-hidden"
                    accept=".pdf,.jpg,.png"
                    />
                <label for="relevant-med-records" class="file-button">Upload File</label>
                <span class="file-name">No file selected</span>
            </div>
        </div>
        <button type="submit" id="submit" class="submit-btn">Submit Request</button>
    </form>

        <!-- Thank You Modal -->
    <div id="thankYouModal" class="modal">
        <div class="modal-content">
        <h2>Thank You!</h2>
        <p>Your form has been successfully submitted. A confirmation email has been sent to you.</p>
        <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <!-- Only trigger modal if redirected after success -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <script>
        window.onload = function () {
            showThankYouModal();
            // Clear the success flag from URL (optional, JS only)
            history.replaceState(null, "", location.pathname);
        };
        </script>
    <?php endif; ?>

    <script src="../Services (modified)/healthservice.js" defer></script>
    <script src="../Navigation Bar/navigation.js"></script>

    <?php 
    include '../Footer/Footer.php';
    ?> 