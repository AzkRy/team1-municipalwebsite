<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lucena Tax Clearance | Services</title>
    <link rel="stylesheet" href="taxservice.css" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400&family=Roboto:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
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

    <div class="instructions">
        <h2>INSTRUCTIONS</h2>

        <ol>
            <li>Step 1: Fill up form</li>
            <li>Step 2: Provide needed files</li>
            <li>Step 3: Submit the form</li>
            <li>Step 4: Confirm if details are correct</li>
            <li>Step 5: Wait for approval</li>
        </ol>
    </div>

    <!--TAX FORM-->
    <form id="taxForm" class="permit-form">
        <h2 class="form-title">Tax Clearance Request Form</h2>

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

        <h4>Taxpayer Details</h4>
        <div class="form-grid">
            <div class="form-group">
                <label for="tax-type">Type of Tax Clearance</label>
                <select id="tax-type" required>
                    <option value="">-- Please select --</option>
                    <option value="Real Property">Real Property</option>
                    <option value="Business">Business</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tax-id">Taxpayer Identification Number (TIN)</label>
                <input
                    type="text"
                    id="tax-id"
                    required
                    pattern="^\d{9}$"
                    maxlength="9"
                    placeholder="9-digit TIN" />
            </div>

            <div class="form-group">
                <label for="registered-name">Registered Taxpayer Name</label>
                <input
                    type="text"
                    id="registered-name"
                    required
                    placeholder="As listed in BIR or City records" />
            </div>

            <div class="form-group">
                <label for="business-name">Business Name (if applicable)</label>
                <input
                    type="text"
                    id="business-name"
                    placeholder="Leave blank if not applicable" />
            </div>

            <div class="form-group">
                <label for="tax-address">Property/Business Address</label>
                <input
                    type="text"
                    id="tax-address"
                    required
                    placeholder="Full address of the business or property" />
            </div>

            <div class="form-group">
                <label for="barangay">Barangay</label>
                <input type="text" id="barangay" name="barangay" pattern="^[A-Za-zÑñ0-9\s\-']+$" required />
            </div>

            <div class="form-group">
                <label for="is-taxpayer">Are you the taxpayer?</label>
                <select id="is-taxpayer" required>
                    <option value="">-- Select --</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group hidden" id="relationship-group">
                <label for="relationship">Relationship to Taxpayer</label>
                <input
                    type="text"
                    id="relationship"
                    placeholder="e.g. Family Member, Employee, Administrator" />
            </div>

            <div class="form-group hidden" id="auth-upload-group">
                <label>Upload Authorization Letter / Document</label>
                <div class="custom-upload">
                    <input
                        type="file"
                        name="authorization-letter"
                        id="authorization-letter"
                        class="file-hidden"
                        accept=".pdf,.jpg,.png" />
                    <label for="authorization-letter" class="file-button">Upload File</label>
                    <span class="file-name">No file selected</span>
                </div>
            </div>
        </div>

        <h4>Request Details</h4>
        <div class="form-grid">
            <!-- Purpose -->
            <div class="form-group full-width">
                <label for="purpose">Purpose of Request</label>
                <textarea
                    id="purpose"
                    rows="3"
                    required
                    placeholder="e.g. Business Permit Renewal, Loan Application, Land Title Transfer"></textarea>
            </div>

            <!-- Tax Year(s) Covered -->
            <div class="form-group">
                <label for="years-covered">Tax Year(s) Covered</label>
                <input
                    type="text"
                    id="years-covered"
                    placeholder="e.g. 2022, 2023"
                    required
                    pattern="^\d{4}(,\s*\d{4})*$"
                    title="Enter one or more years, separated by commas (e.g. 2023, 2024)" />
            </div>

            <div class="form-group full-width">
                <label for="additional-notes">Additional Notes (Optional)</label>
                <textarea
                    id="additional-notes"
                    rows="2"
                    placeholder="e.g. Requested on behalf of deceased taxpayer, etc."></textarea>
            </div>

            <div class="form-group">
                <label>Upload Valid Government ID</label>
                <div class="custom-upload">
                    <input
                        type="file"
                        name="valid-id"
                        id="valid-id"
                        class="file-hidden"
                        accept=".pdf,.jpg,.jpeg,.png"
                        required />
                    <label for="valid-id" class="file-button">Upload File</label>
                    <span class="file-name">No file selected</span>
                </div>
            </div>

            <!-- Optional Proof of Payment -->
            <div class="form-group">
                <label>Upload Proof of Payment (Optional)</label>
                <div class="custom-upload">
                    <input
                        type="file"
                        name="proof-of-pay"
                        id="proof-of-pay"
                        class="file-hidden"
                        accept=".pdf,.jpg,.jpeg,.png" />
                    <label for="proof-of-pay" class="file-button">Upload File</label>
                    <span class="file-name">No file selected</span>
                </div>
            </div>
        </div>

        <h4>Delivery & Submission</h4>
        <div class="form-grid">
            <!-- Contact Info -->
            <div class="form-group">
                <label for="contact">Contact Email or Phone</label>
                <input
                    type="text"
                    id="contact"
                    required
                    placeholder="e.g. 09123456789 or your@email.com"
                    pattern="^(09|\+639)\d{9}$|^[^\s@]+@[^\s@]+\.[^\s@]+$"
                    title="Enter a valid PH mobile number or email address" />
            </div>

            <!-- Delivery Method -->
            <div class="form-group">
                <label for="delivery">Delivery Method</label>
                <select id="delivery" required>
                    <option value="">-- Choose delivery option --</option>
                    <option value="Pickup at Office">Pickup at Office</option>
                    <option value="Email">Send via Email</option>
                </select>
            </div>
        </div>
        <button type="submit" class="submit-btn">Submit Request</button>
    </form>

    <script src="taxservice.js" defer></script>
    <script src="../Navigation Bar/navigation.js"></script>

    <?php 
    include '../Footer/Footer.php';
    ?> 