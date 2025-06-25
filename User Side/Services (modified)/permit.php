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
        $mail->Subject = 'Your Permit Request is being Processed';
        $mail->Body = "Hello <strong>$name</strong>,<br><br>
                Thank you for submitting your permit request. It is currently being reviewed.<br>
                We'll notify you once there's an update regarding your request.<br><br>
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
    <title>Permit Application | Services</title>
    <link rel="stylesheet" href="permits.css" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400&family=Roboto:wght@500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../Navigation Bar/navigation.css">
    <link rel="stylesheet" href="../Footer/footer_styles.css">
    <script src="modalpopup.js" defer></script>
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
        <li>Step 1: Choose the type of permit</li>
        <li>Step 2: Fill up form</li>
        <li>Step 3: Submit the form</li>
        <li>Step 4: Confirm if details are correct</li>
        <li>Step 5: Wait for approval</li>
      </ol>
    </div>

    <div class="permit-type">
      <select
        id="permitType"
        name="permitType"
        onchange="showPermitForm()"
        required
      >
        <option value="" disabled selected hidden>PERMIT TYPE</option>
        <option value="building">Building Permit</option>
        <option value="event">Event Permit</option>
        <option value="business">Business Permit</option>
        <option value="transport">Transportation Permit</option>
      </select>
    </div>

    <div id="placeholder-form">
      <h2>Please select a permit type to continue.</h2>
    </div>

    <!--BUILDING PERMIT-->

    <form
      id="buildingForm"
      class="permit-form"
      method="POST"
      action=""
      style="display: none"
    >
      <h2 class="form-title">Building Permit</h2>

      <div class="form-grid">
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input
            type="text"
            id="last-name"
            name="last-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="first-name">First Name</label>
          <input
            type="text"
            id="first-name"
            name="first-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="middle-name"
            >Middle Name <small>(enter N/A if none)</small></label
          >
          <input
            type="text"
            id="middle-name"
            name="middle-name"
            pattern="^(N\/A|[A-Za-zñÑ\s\-']+)$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>

        <div class="form-group">
          <label for="email-address">Email</label>
          <input
            type="email"
            id="email-address"
            name="email-address"
            required
          />
        </div>
        <div class="form-group">
          <label for="contact-num">Contact Number</label>
          <input
            type="tel"
            id="contact-num"
            name="contact-num"
            maxlength="11"
            required
          />
        </div>

        <div class="form-group">
          <label for="tin-num">Taxpayer Identification Number (TIN)</label>
          <input
            type="text"
            id="tin-num"
            name="tin-num"
            pattern="^\d{9}$"
            maxlength="9"
            inputmode="numeric"
            required
            oninvalid="this.setCustomValidity('Please enter a 9-digit TIN number')"
            oninput="this.setCustomValidity('')"
          />
        </div>

        <div class="form-group">
          <label for="city-municipal">City / Municipality</label>
          <input
            type="text"
            id="city-municipal"
            name="city-municipal"
            pattern="^[A-Za-zÑñ0-9\s\-']+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" id="barangay" name="barangay" pattern="^[A-Za-zÑñ0-9\s\-']+$" required />
        </div>

        <div class="form-group">
          <label for="zip-code">Zip Code</label>
          <input
            type="text"
            id="zip-code"
            name="zip-code"
            pattern="^\d{4}$"
            maxlength="4"
            oninvalid="this.setCustomValidity('Please enter a 4-digit Zip code')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>

        <div class="form-group full-width">
          <label for="houseno-unitfloor-buildingname"
            >House No., Unit Floor, Street / Building Name</label
          >
          <input
            type="text"
            id="houseno-unitfloor-buildingname"
            name="houseno-unitfloor-buildingname"
            required
          />
        </div>
      </div>

      <h4>LOCATION OF CONSTRUCTION</h4>
      <div class="form-grid">
        <div class="form-group">
          <label for="lot-num">Lot No.</label>
          <input
            type="text"
            id="lot-num"
            name="lot-num"
            pattern="^[0-9]+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="blk-num">Blk No.</label>
          <input
            type="text"
            id="blk-num"
            name="blk-num"
            pattern="^[0-9]+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="interior">Int.</label>
          <input
            type="text"
            id="interior"
            name="interior"
            pattern="^[0-9]+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="street">Street</label>
          <input type="text" id="street" name="street" required />
        </div>
        <div class="form-group">
          <label for="locOfconstruct-barangay">Barangay</label>
          <input
            type="text"
            id="locOfconstruct-barangay"
            name="locOfconstruct-barangay"
            pattern="^[A-Za-zÑñ0-9\s\-']+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="locOfconsturct-city-municipal">City / Municipality</label>
          <input
            type="text"
            id="locOfconsturct-city-municipal"
            name="locOfconsturct-city-municipal"
            pattern="^[A-Za-zÑñ0-9\s\-']+$"
            required
          />
        </div>
      </div>

      <h4>PROJECT DETAILS</h4>
      <div class="form-grid">
        <div class="form-group">
          <label for="floor-area">Total Floor Area (in sq.m)</label>
          <input
            type="number"
            id="floor-area"
            name="floor-area"
            min="1"
            step="0.01"
            required
            title="Please enter a floor area greater than 0"
          />
        </div>

        <div class="form-group">
          <label for="estimated-cost">Estimated Cost of Construction (₱)</label>
          <input
            type="number"
            id="estimated-cost"
            name="estimated-cost"
            min="1"
            step="0.01"
            required
            title="Please enter a valid estimated cost"
          />
        </div>

        <div class="form-group">
          <label for="expected-duration">Expected Duration (in days)</label>
          <input
            type="number"
            id="expected-duration"
            name="expected-duration"
            min="1"
            step="1"
            required
            title="Expected duration must be at least 1 day"
          />
        </div>

        <div class="form-group">
          <label for="start-date">Start Date of Construction</label>
          <input type="date" id="start-date" name="start-date" required />
        </div>
      </div>

      <h4>LICENSED PROFESSIONALS INVOLVED</h4>
      <div class="form-grid">
        <!-- Architect / Designer -->
        <div class="form-group">
          <label for="architect-name">Architect / Designer Name</label>
          <input
            type="text"
            id="architect-name"
            name="architect-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="architect-prc">PRC Number (Architect)</label>
          <input
            type="text"
            id="architect-prc"
            name="architect-prc"
            maxlength="8"
            pattern="^\d{6,8}$"
            oninvalid="this.setCustomValidity('Please enter a valid PRC number')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>
        <div class="form-group">
          <label for="architect-ptr">PTR Number (Architect)</label>
          <input
            type="text"
            id="architect-ptr"
            name="architect-ptr"
            maxlength="12"
            pattern="^\d{6,12}$"
            oninvalid="this.setCustomValidity('Please enter a valid PTR number')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>

        <!-- Civil / Structural Engineer -->
        <div class="form-group">
          <label for="civil-eng-name">Civil / Structural Engineer Name</label>
          <input
            type="text"
            id="civil-eng-name"
            name="civil-eng-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="civil-eng-prc">PRC Number (Civil Engineer)</label>
          <input
            type="text"
            id="civil-eng-prc"
            name="civil-eng-prc"
            maxlength="8"
            pattern="^\d{6,8}$"
            oninvalid="this.setCustomValidity('Please enter a valid PRC number')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>
        <div class="form-group">
          <label for="civil-eng-ptr">PTR Number (Civil Engineer)</label>
          <input
            type="text"
            id="civil-eng-ptr"
            name="civil-eng-ptr"
            maxlength="12"
            pattern="^\d{6,12}$"
            oninvalid="this.setCustomValidity('Please enter a valid PTR number')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>

        <!-- Electrical Engineer -->
        <div class="form-group">
          <label for="electrical-eng-name">Electrical Engineer Name</label>
          <input
            type="text"
            id="electrical-eng-name"
            name="electrical-eng-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="electrical-eng-prc"
            >PRC Number (Electrical Engineer)</label
          >
          <input
            type="text"
            id="electrical-eng-prc"
            name="electrical-eng-prc"
            maxlength="8"
            pattern="^\d{6,8}$"
            oninvalid="this.setCustomValidity('Please enter a valid PRC number')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>
        <div class="form-group">
          <label for="electrical-eng-ptr"
            >PTR Number (Electrical Engineer)</label
          >
          <input
            type="text"
            id="electrical-eng-ptr"
            name="electrical-eng-ptr"
            maxlength="12"
            pattern="^\d{6,12}$"
            oninvalid="this.setCustomValidity('Please enter a valid PTR number')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>

        <!-- Other Professionals -->
        <div class="form-group full-width">
          <label for="other-professionals"
            >Other Professionals (Specify Name, PRC, PTR)</label
          >
          <textarea
            id="other-professionals"
            name="other-professionals"
            rows="4"
            placeholder="e.g. Sanitary Engineer: Juan Dela Cruz, PRC 123456, PTR 78910"
          ></textarea>
        </div>
      </div>

      <h4>SCOPE OF WORK</h4>
      <div class="form-grid">
        <div class="form-group">
          <label
            ><input
              type="checkbox"
              name="scope-work"
              value="new-construction"
            />
            New Construction</label
          >
          <label
            ><input type="checkbox" name="scope-work" value="renovation" />
            Renovation</label
          >
          <label
            ><input type="checkbox" name="scope-work" value="repair" />
            Repair</label
          >
          <label
            ><input type="checkbox" name="scope-work" value="moving" />
            Moving</label
          >
          <label
            ><input type="checkbox" name="scope-work" value="addition" />
            Addition</label
          >
          <label
            ><input type="checkbox" name="scope-work" value="alteration" />
            Alteration</label
          >
          <label
            ><input type="checkbox" name="scope-work" value="demolition" />
            Demolition</label
          >
          <label
            ><input type="checkbox" name="scope-work" value="others" /> Others
            (specify below)</label
          >
        </div>

        <div class="form-group full-width">
          <textarea
            id="scope-other-specify"
            name="scope-other-specify"
            rows="4"
            placeholder="Specify other scope of work..."
          ></textarea>
        </div>
      </div>

      <h4>REQUIREMENTS*</h4>
      <div class="form-grid">
        <!-- Barangay Clearance -->
        <div class="form-group">
          <label>Barangay Clearance</label>
          <div class="custom-upload">
            <input
              type="file"
              name="barangay-clearance"
              id="barangay-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="barangay-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Certified True Copy of Title / Tax Declaration -->
        <div class="form-group">
          <label>Certified True Copy of Title / Tax Declaration</label>
          <div class="custom-upload">
            <input
              type="file"
              name="title-tax-declaration"
              id="title-tax-declaration"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="title-tax-declaration" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Latest Tax Receipt or Clearance -->
        <div class="form-group">
          <label>Latest Tax Receipt or Tax Clearance</label>
          <div class="custom-upload">
            <input
              type="file"
              name="tax-clearance"
              id="tax-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="tax-clearance" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Fire Safety Evaluation Clearance -->
        <div class="form-group">
          <label>Fire Safety Evaluation Clearance (from BFP)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="fire-safety-clearance"
              id="fire-safety-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="fire-safety-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Building Plans and Specifications -->
        <div class="form-group">
          <label>Building Plans and Specifications (signed and sealed)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="building-plans"
              id="building-plans"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="building-plans" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Bill of Materials and Cost Estimates -->
        <div class="form-group">
          <label>Bill of Materials and Cost Estimates</label>
          <div class="custom-upload">
            <input
              type="file"
              name="bill-of-materials"
              id="bill-of-materials"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="bill-of-materials" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Photocopy of PRC IDs and PTRs -->
        <div class="form-group">
          <label>Photocopy of PRC IDs and PTRs of professionals</label>
          <div class="custom-upload">
            <input
              type="file"
              name="prc-ids-ptrs"
              id="prc-ids-ptrs"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="prc-ids-ptrs" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Zoning Clearance -->
        <div class="form-group">
          <label>Zoning Clearance (from CPDO)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="zoning-clearance"
              id="zoning-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="zoning-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Locational Clearance -->
        <div class="form-group">
          <label>Locational Clearance</label>
          <div class="custom-upload">
            <input
              type="file"
              name="locational-clearance"
              id="locational-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="locational-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- DOLE-Site Safety Compliance -->
        <div class="form-group">
          <label>DOLE-Site Safety Compliance (for commercial/industrial)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="dole-safety-compliance"
              id="dole-safety-compliance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="dole-safety-compliance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Environmental Compliance Certificate -->
        <div class="form-group">
          <label>Environmental Compliance Certificate (if required)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="environmental-certificate"
              id="environmental-certificate"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="environmental-certificate" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>
      </div>

      <button type="submit" class="submit-btn" id="building-submit">
        Submit
      </button>
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

    <!--EVENT PERMIT-->

    <form
      id="eventForm"
      class="permit-form"
      method = "POST"
      action=""
      style="display: none"
    >
      <h2 class="form-title">Event Permit</h2>

      <div class="form-grid">
        <div class="form-group">
          <label for="event-name">Event Name</label>
          <input
            type="text"
            id="event-name"
            name="event-name"
            pattern="^[A-Za-z0-9 ]+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="event-loc">Event Location</label>
          <input
            type="text"
            id="event-loc"
            name="event-loc"
            pattern="^[A-Za-z0-9 ]+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="event-date-start">Event Date (From)</label>
          <input
            type="date"
            id="event-date-start"
            name="event-date-start"
            required
          />
        </div>
        <div class="form-group">
          <label for="event-date-end">Event Date (To)</label>
          <input
            type="date"
            id="event-date-end"
            name="event-date-end"
            required
          />
        </div>
        <div class="form-group">
          <label for="event-time-start">Event Time (From)</label>
          <input
            type="time"
            id="event-time-start"
            name="event-time-start"
            required
          />
        </div>
        <div class="form-group">
          <label for="event-time-end">Event Time (To)</label>
          <input
            type="time"
            id="event-time-end"
            name="event-time-end"
            required
          />
        </div>
        <div class="form-group">
          <label for="num-of-attend">Expected Number of Attendees</label>
          <input
            type="number"
            id="num-of-attend"
            name="num-of-attend"
            min="1"
            required
          />
        </div>

        <div class="form-group">
          <label for="num-of-attend">Will the event use public roads?</label>
          <label
            ><input type="radio" name="pub-road" value="yes" required />
            Yes</label
          >
          <label
            ><input type="radio" name="pub-road" value="no" required />
            No</label
          >
        </div>
      </div>

      <h4>TYPE OF EVENT</h4>
      <div class="radio-group">
        <label
          ><input type="radio" name="event-type" value="parade" required />
          Parade</label
        >
        <label
          ><input type="radio" name="event-type" value="concert" required />
          Concert</label
        >
        <label
          ><input type="radio" name="event-type" value="exhibit" required />
          Fair / Exhibit</label
        >
        <label
          ><input type="radio" name="event-type" value="sport-event" required />
          Sporting Event</label
        >
        <label
          ><input type="radio" name="event-type" value="rally" required /> Rally
          / Demonstration</label
        >
        <label
          ><input type="radio" name="event-type" value="priv-party" required />
          Private Party (Public Venue)</label
        >
        <label
          ><input type="radio" name="event-type" value="others" required />
          Others (Specify)</label
        >
      </div>

      <div class="form-group full-width">
        <textarea
          id="event-type-other"
          name="event-type-other"
          rows="4"
          placeholder="Specify other event type..."
          required
        ></textarea>
      </div>

      <h4>ORGANIZER INFORMATION</h4>
      <div class="form-grid">
        <div class="form-group">
          <label for="org-name">Name of Organizer/Organization</label>
          <input type="text" id="org-name" name="org-name" required />
        </div>
        
        <div class="form-group">
          <label for="last-name">Last Name of Representative</label>
          <input
            type="text"
            id="last-name"
            name="last-name"
            placeholder="Person-in-charge on the event day"
            pattern="^(N\/A|[A-Za-zñÑ\s\-']+)$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="first-name">First Name of Representative</label>
          <input
            type="text"
            id="first-name"
            name="first-name"
            pattern="^(N\/A|[A-Za-zñÑ\s\-']+)$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="middle-name">Middle Name of Representative <small>(enter N/A if none)</small></label>
          <input
            type="text"
            id="middle-name"
            name="middle-name"
            pattern="^(N\/A|[A-Za-zñÑ\s\-']+)$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="org-position"
            >Position in Organization (if applicable)</label
          >
          <input type="text" id="position-org" name="position-org" required />
        </div>
        <div class="form-group">
          <label for="org-num">Contact Number</label>
          <input type="tel" id="org-num" name="org-num" max="11" required />
        </div>
        <div class="form-group">
          <label for="email-address">Email Address</label>
          <input type="email" id="email-address" name="email-address" required />
        </div>
        <div class="form-group">
          <label for="org-address">Address</label>
          <input type="text" id="org-address" name="org-address" required />
        </div>
      </div>

      <h4>EVENT ACTIVITIES</h4>
      <div class="form-grid">
        <!-- Live Music or Sound System -->
        <div class="form-group">
          <label>Live Music or Sound System?</label>
          <label
            ><input type="radio" name="live-music" value="yes" required />
            Yes</label
          >
          <label
            ><input type="radio" name="live-music" value="no" required />
            No</label
          >
        </div>

        <!-- Fireworks or Pyrotechnics -->
        <div class="form-group">
          <label
            >Fireworks or Pyrotechnics?
            <span style="font-size: 0.85em; color: gray"
              >(requires BFP coordination)</span
            ></label
          >
          <label
            ><input type="radio" name="fireworks" value="yes" required />
            Yes</label
          >
          <label
            ><input type="radio" name="fireworks" value="no" required />
            No</label
          >
        </div>

        <!-- Food Stalls/Vendors -->
        <div class="form-group">
          <label>Food Stalls/Vendors?</label>
          <label
            ><input type="radio" name="food-stalls" value="yes" required />
            Yes</label
          >
          <label
            ><input type="radio" name="food-stalls" value="no" required />
            No</label
          >
        </div>

        <!-- Security Personnel -->
        <div class="form-group">
          <label
            >Security Personnel?
            <span style="font-size: 0.85em; color: gray"
              >(List agency if applicable)</span
            ></label
          >
          <label
            ><input type="radio" name="security" value="yes" required />
            Yes</label
          >
          <label
            ><input type="radio" name="security" value="no" required />
            No</label
          >
          <input
            type="text"
            name="security-agency"
            placeholder="Security Agency (if yes)"
            pattern="^[A-Za-z0-9 ]+$"
          />
        </div>

        <!-- Alcohol Served -->
        <div class="form-group">
          <label
            >Alcohol Served?
            <span style="font-size: 0.85em; color: gray"
              >(If yes, attach Liquor Permit)</span
            ></label
          >
          <label
            ><input type="radio" name="alcohol" value="yes" required />
            Yes</label
          >
          <label
            ><input type="radio" name="alcohol" value="no" required /> No</label
          >
        </div>

        <!-- Additional Notes -->
        <div class="form-group" style="grid-column: span 2">
          <label for="additional-notes"
            >Additional Notes or Special Requests:</label
          >
          <textarea
            id="additional-notes"
            name="additional-notes"
            rows="4"
            placeholder="Write here..."
          ></textarea>
        </div>
      </div>

      <h4>REQUIREMENTS*</h4>
      <div class="form-grid">
        <div class="form-group">
          <label>Barangay Clearance</label>

          <div class="custom-upload">
            <input
              type="file"
              name="event-barangay-clearance"
              id="event-barangay-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="event-barangay-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Letter of Intent addressed to the Mayor</label>

          <div class="custom-upload">
            <input
              type="file"
              name="letter-of-intent-mayor"
              id="letter-of-intent-mayor"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="letter-of-intent-mayor" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Event Program/Itinerary</label>

          <div class="custom-upload">
            <input
              type="file"
              name="event-program-itinerary"
              id="event-program-itinerary"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="event-program-itinerary" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Vicinity Map of the Event Area</label>

          <div class="custom-upload">
            <input
              type="file"
              name="event-vicinity-map"
              id="event-vicinity-map"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="event-vicinity-map" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Sketch/Plan for Crowd Control and Emergency Access</label>

          <div class="custom-upload">
            <input
              type="file"
              name="sketchplan-cc-emergency"
              id="sketchplan-cc-emergency"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="sketchplan-cc-emergency" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Proof of coordination with PNP, BFP, CENRO (if needed)</label>

          <div class="custom-upload">
            <input
              type="file"
              name="proof-of-coord"
              id="proof-of-coord"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="proof-of-coord" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Fire Safety and Security Plan (for large gatherings)</label>

          <div class="custom-upload">
            <input
              type="file"
              name="fire-security-plan"
              id="fire-security-plan"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="fire-security-plan" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Noise Permit (if applicable)</label>

          <div class="custom-upload">
            <input
              type="file"
              name="noise-permit"
              id="noise-permit"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="noise-permit" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Business Permit for commercial stalls</label>

          <div class="custom-upload">
            <input
              type="file"
              name="commercial-business-permit"
              id="commercial-business-permit"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="commercial-business-permit" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Additional Permits (if required)</label>

          <div class="custom-upload">
            <input
              type="file"
              name="event-additional-permit"
              id="event-additional-permit"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="event-additional-permit" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>
      </div>
      <button type="submit" class="submit-btn" id="event-submit">Submit</button>
    </form>

    <!--BUSINESS PERMIT-->

    <form
      id="businessForm"
      class="permit-form"
      method ="POST"
      action=""
      style="display: none"
    >
      <h2 class="form-title">Business Permit</h2>

      <div class="form-grid">
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input
            type="text"
            id="last-name"
            name="last-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="first-name">First Name</label>
          <input
            type="text"
            id="first-name"
            name="first-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="middle-name"
            >Middle Name<small> (enter N/A if none)</small></label
          >
          <input
            type="text"
            id="middle-name"
            name="middle-name"
            pattern="^(N\/A|[A-Za-zñÑ\s\-']+)$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>

        <div class="form-group">
          <label for="email-address">Email</label>
          <input
            type="email"
            id="email-address"
            name="email-address"
            required
          />
        </div>
        <div class="form-group">
          <label for="contact-num">Contact Number</label>
          <input
            type="tel"
            id="contact-num"
            name="contact-num"
            maxlength="11"
            required
          />
        </div>

        <div class="form-group">
          <label for="tin-num">Taxpayer Identification Number (TIN)</label>
          <input
            type="text"
            id="tin-num"
            name="tin-num"
            pattern="^\d{9}$"
            maxlength="9"
            inputmode="numeric"
            required
            oninvalid="this.setCustomValidity('Please enter a 9-digit TIN number')"
            oninput="this.setCustomValidity('')"
          />
        </div>

        <div class="form-group">
          <label for="city-municipal">City / Municipality</label>
          <input
            type="text"
            id="city-municipal"
            name="city-municipal"
            pattern="^[A-Za-zÑñ0-9\s\-']+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" id="barangay" name="barangay" pattern="^[A-Za-zÑñ0-9\s\-']+$" required />
        </div>

        <div class="form-group">
          <label for="zip-code">Zip Code</label>
          <input
            type="text"
            id="zip-code"
            name="zip-code"
            pattern="^\d{4}$"
            maxlength="4"
            oninvalid="this.setCustomValidity('Please enter a 4-digit Zip code')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>

        <div class="form-group full-width">
          <label for="houseno-unitfloor-buildingname"
            >House No., Unit Floor, Street / Building Name</label
          >
          <input
            type="text"
            id="houseno-unitfloor-buildingname"
            name="houseno-unitfloor-buildingname"
            required
          />
        </div>
      </div>

      <h4>BUSINESS INFORMATION</h4>
      <div class="form-grid">
        <div class="form-group">
          <label for="business-name">Business Name (as registered)</label>
          <input type="text" id="business-name" name="business-name" required />
        </div>

        <div class="form-group">
          <label for="business-address">Business Address</label>
          <input
            type="text"
            id="business-address"
            name="business-address"
            required
          />
        </div>

        <div class="form-group">
          <label for="nature-of-business">Nature of Business</label>
          <input
            type="text"
            id="nature-of-business"
            name="nature-of-business"
            required
          />
        </div>

        <div class="form-group">
          <label for="registration-number"
            >DTI / SEC / CDA Registration No.</label
          >
          <input
            type="text"
            id="registration-number"
            name="registration-number"
            pattern="[A-Za-z0-9/-]{9,}"
            maxlength="14"
            required
            title="Minimum of 9 characters. Only letters, numbers, slashes (/) and dashes (-) are allowed."
          />
        </div>

        <div class="form-group">
          <label for="registration-date">Date of Registration</label>
          <input
            type="date"
            id="registration-date"
            name="registration-date"
            class="no-min-date"
            required
          />
        </div>

        <div class="form-group">
          <label for="organization-type">Type of Organization</label>
          <select id="organization-type" name="organization-type" required>
            <option value="" disabled selected>Select type</option>
            <option value="single-proprietorship">Single Proprietorship</option>
            <option value="partnership">Partnership</option>
            <option value="corporation">Corporation</option>
            <option value="cooperative">Cooperative</option>
          </select>
        </div>

        <div class="form-group">
          <label for="business-category">Business Category</label>
          <select id="business-category" name="business-category" required>
            <option value="" disabled selected>Select category</option>
            <option value="new">New</option>
            <option value="renewal">Renewal</option>
            <option value="temporary">Temporary</option>
            <option value="home-based">Home-Based</option>
            <option value="online">Online</option>
          </select>
        </div>
      </div>

      <h4>BUSINESS OPERATIONS</h4>
      <div class="form-grid">
        <div class="form-group">
          <label for="num-employees">Number of Employees</label>
          <input
            type="number"
            id="num-employees"
            name="num-employees"
            min="1"
            required
          />
        </div>

        <div class="form-group">
          <label for="num-branches">Number of Branches (if any)</label>
          <input type="number" id="num-branches" name="num-branches" min="1" />
        </div>

        <div class="form-group">
          <label for="operation-start-date">Start of Business Operation</label>
          <input
            type="date"
            id="operation-start-date"
            name="operation-start-date"
            required
          />
        </div>

        <div class="form-group">
          <label for="business-hours">Business Hours</label>
          <input
            type="text"
            id="business-hours"
            name="business-hours"
            placeholder="e.g. 8:00 AM - 5:00 PM"
            required
            pattern="^(0?[1-9]|1[0-2]):[0-5][0-9]\s?(AM|PM)\s?-\s?(0?[1-9]|1[0-2]):[0-5][0-9]\s?(AM|PM)$"
            title="Please follow the format: HH:MM AM - HH:MM PM (e.g. 8:00 AM - 5:00 PM)"
          />
        </div>

        <div class="form-group full-width">
          <label for="products-services">Products / Services Offered</label>
          <textarea
            id="products-services"
            name="products-services"
            rows="4"
            placeholder="List the main goods or services provided..."
            required
          ></textarea>
        </div>
      </div>

      <h4>REQUIREMENTS*</h4>
      <div class="form-grid">
        <!-- Barangay Business Clearance -->
        <div class="form-group">
          <label>Barangay Business Clearance</label>
          <div class="custom-upload">
            <input
              type="file"
              name="barangay-business-clearance"
              id="barangay-business-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="barangay-business-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- DTI/SEC/CDA Registration -->
        <div class="form-group">
          <label>DTI/SEC/CDA Registration Certificate</label>
          <div class="custom-upload">
            <input
              type="file"
              name="business-registration"
              id="business-registration"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="business-registration" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Valid ID of Owner -->
        <div class="form-group">
          <label>Valid ID of Business Owner</label>
          <div class="custom-upload">
            <input
              type="file"
              name="owner-valid-id"
              id="owner-valid-id"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="owner-valid-id" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Lease Contract / Land Title -->
        <div class="form-group">
          <label>Lease Contract / Land Title (Proof of Business Address)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="proof-business-address"
              id="proof-business-address"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="proof-business-address" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Zoning Clearance -->
        <div class="form-group">
          <label>Zoning Clearance</label>
          <div class="custom-upload">
            <input
              type="file"
              name="business-zoning-clearance"
              id="business-zoning-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="business-zoning-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Sanitary Permit -->
        <div class="form-group">
          <label>Sanitary Permit (from City Health Office)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="sanitary-permit"
              id="sanitary-permit"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="sanitary-permit" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Fire Safety Inspection -->
        <div class="form-group">
          <label>Fire Safety Inspection Certificate (from BFP)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="fire-inspection-cert"
              id="fire-inspection-cert"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="fire-inspection-cert" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Business Location Sketch -->
        <div class="form-group">
          <label>Sketch of Business Location</label>
          <div class="custom-upload">
            <input
              type="file"
              name="location-sketch"
              id="location-sketch"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="location-sketch" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Cedula -->
        <div class="form-group">
          <label>Community Tax Certificate (Cedula)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="cedula"
              id="cedula"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="cedula" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Environmental Certificate -->
        <div class="form-group">
          <label>Environmental Compliance Certificate (if applicable)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="environmental-cert"
              id="environmental-cert"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="environmental-cert" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Other Licenses -->
        <div class="form-group">
          <label>Other Permits or Licenses (e.g. FDA, LTFRB, etc.)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="other-permits"
              id="other-permits"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="other-permits" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>
      </div>

      <button type="submit" class="submit-btn" id="business-submit">
        Submit
      </button>
    </form>

    <!--TRANSPORT PERMIT-->

    <form
      id="transportForm"
      class="permit-form"
      method="POST"
      action=""
      style="display: none"
    >
      <h2 class="form-title">Transportation Permit</h2>

      <div class="form-grid">
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input
            type="text"
            id="last-name"
            name="last-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="first-name">First Name</label>
          <input
            type="text"
            id="first-name"
            name="first-name"
            pattern="^[A-Za-z\s\-']+$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>
        <div class="form-group">
          <label for="middle-name"
            >Middle Name <small>(enter N/A if none)</small></label
          >
          <input
            type="text"
            id="middle-name"
            name="middle-name"
            pattern="^(N\/A|[A-Za-zñÑ\s\-']+)$"
            title="Name must only contain letters, spaces, hyphens, or apostrophes"
            required
          />
        </div>

        <div class="form-group">
          <label for="email-address">Email</label>
          <input
            type="email"
            id="email-address"
            name="email-address"
            required
          />
        </div>
        <div class="form-group">
          <label for="contact-num">Contact Number</label>
          <input
            type="tel"
            id="contact-num"
            name="contact-num"
            maxlength="11"
            required
          />
        </div>

        <div class="form-group">
          <label for="company-name"
            >Company/Organization Name (if applicable)</label
          >
          <input type="text" id="company-name" name="company-name" required />
        </div>

        <div class="form-group">
          <label for="city-municipal">City / Municipality</label>
          <input
            type="text"
            id="city-municipal"
            name="city-municipal"
            pattern="^[A-Za-zÑñ0-9\s\-']+$"
            required
          />
        </div>
        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" id="barangay" name="barangay" pattern="^[A-Za-zÑñ0-9\s\-']+$" required />
        </div>

        <div class="form-group">
          <label for="zip-code">Zip Code</label>
          <input
            type="text"
            id="zip-code"
            name="zip-code"
            pattern="^\d{4}$"
            maxlength="4"
            oninvalid="this.setCustomValidity('Please enter a 4-digit Zip code')"
            oninput="this.setCustomValidity('')"
            required
          />
        </div>

        <div class="form-group full-width">
          <label for="houseno-unitfloor-buildingname"
            >House No., Unit Floor, Street / Building Name</label
          >
          <input
            type="text"
            id="houseno-unitfloor-buildingname"
            name="houseno-unitfloor-buildingname"
            required
          />
        </div>
      </div>

      <h4>VEHICLE INFORMATION</h4>
      <div class="form-grid">
        <!-- Vehicle Type -->
        <div class="form-group">
          <label for="vehicle-type">Type of Vehicle(s)</label>
          <input
            type="text"
            id="vehicle-type"
            name="vehicle-type"
            pattern="^[A-Za-z0-9\s,/-]+$"
            title="Only letters, numbers, spaces, commas, slashes (/) and dashes (-) are allowed"
            required
          />
        </div>

        <!-- Plate Numbers -->
        <div class="form-group">
          <label for="plate-numbers">Plate Number(s)</label>
          <input
            type="text"
            id="plate-numbers"
            name="plate-numbers"
            pattern="^[A-Z0-9,\s-]+$"
            title="Only uppercase letters, numbers, dashes (-), commas, and spaces allowed"
            required
          />
        </div>

        <!-- No. of Units -->
        <div class="form-group">
          <label for="num-units">No. of Units</label>
          <input
            type="number"
            id="num-units"
            name="num-units"
            min="1"
            max="100"
            title="Enter a valid number of units (1-100)"
            required
          />
        </div>

        <!-- Drivers' Names -->
        <div class="form-group">
          <label for="drivers-names">Driver(s) Name(s)</label>
          <input
            type="text"
            id="drivers-names"
            name="drivers-names"
            pattern="^[A-Za-z\s,.-]+$"
            title="Only letters, spaces, commas, periods, and hyphens are allowed"
            required
          />
        </div>

        <!-- License Numbers -->
        <div class="form-group">
          <label for="license-numbers">Driver(s) License No(s)</label>
          <input
            type="text"
            id="license-numbers"
            name="license-numbers"
            pattern="^[A-Za-z0-9,\s-]{8,}$"
            minlength="8"
            title="Must be at least 8 characters. Letters, numbers, dashes, commas and spaces allowed."
            required
          />
        </div>
      </div>

      <h4>TRANSPORT ACTIVITY DETAILS</h4>
      <div class="form-grid">
        <div class="form-group full-width">
          <label for="transport-purpose">Purpose of Transport</label>
          <input
            type="text"
            id="transport-purpose"
            name="transport-purpose"
            placeholder="e.g. parade, hauling, delivery"
            required
          />
        </div>

        <div class="form-group">
          <label for="transport-start-date">Start Date</label>
          <input
            type="date"
            id="transport-start-date"
            name="transport-start-date"
            required
          />
        </div>

        <div class="form-group">
          <label for="transport-end-date">End Date</label>
          <input
            type="date"
            id="transport-end-date"
            name="transport-end-date"
            required
          />
        </div>

        <div class="form-group">
          <label for="transport-start-time">Start Time</label>
          <input
            type="time"
            id="transport-start-time"
            name="transport-start-time"
            required
          />
        </div>

        <div class="form-group">
          <label for="transport-end-time">End Time</label>
          <input
            type="time"
            id="transport-end-time"
            name="transport-end-time"
            required
          />
        </div>

        <div class="form-group full-width">
          <label for="route-destination">Route / Destination(s)</label>
          <input
            type="text"
            id="route-destination"
            name="route-destination"
            required
          />
        </div>

        <div class="form-group full-width">
          <label
            >Will the activity involve public road closures or rerouting?</label
          >
          <label
            ><input type="radio" name="road-closure" value="yes" required />
            Yes</label
          >
          <label
            ><input type="radio" name="road-closure" value="no" required />
            No</label
          >
        </div>
      </div>

      <div class="form-group full-width">
        <label for="notes"
          >Additional Notes (e.g. PNP/TMO coordination, attached TMP)</label
        >
        <textarea
          id="notes"
          name="notes"
          rows="4"
          placeholder="If Yes, please attach traffic management plan and coordination letter."
        ></textarea>
      </div>

      <h4>REQUIREMENTS*</h4>
      <div class="form-grid">
        <!-- Barangay Endorsement or Clearance -->
        <div class="form-group">
          <label>Barangay Endorsement or Clearance</label>
          <div class="custom-upload">
            <input
              type="file"
              name="transport-barangay-clearance"
              id="transport-barangay-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="transport-barangay-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Vehicle Registration -->
        <div class="form-group">
          <label>Vehicle Registration (OR/CR)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="vehicle-registration"
              id="vehicle-registration"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="vehicle-registration" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Driver’s License -->
        <div class="form-group">
          <label>Driver’s License Photocopy</label>
          <div class="custom-upload">
            <input
              type="file"
              name="drivers-license"
              id="drivers-license"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="drivers-license" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Letter of Intent -->
        <div class="form-group">
          <label>Letter of Intent</label>
          <div class="custom-upload">
            <input
              type="file"
              name="letter-of-intent"
              id="letter-of-intent"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="letter-of-intent" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Zoning Clearance -->
        <div class="form-group">
          <label>Zoning Clearance</label>
          <div class="custom-upload">
            <input
              type="file"
              name="transport-zoning-clearance"
              id="transport-zoning-clearance"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="transport-zoning-clearance" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Traffic Management Plan -->
        <div class="form-group">
          <label>Traffic Management Plan (for road closures)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="traffic-plan"
              id="traffic-plan"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="traffic-plan" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Sketch or Map of Route -->
        <div class="form-group">
          <label>Sketch or Map of Route</label>
          <div class="custom-upload">
            <input
              type="file"
              name="route-map"
              id="route-map"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="route-map" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Coordination Letter -->
        <div class="form-group">
          <label>Coordination Letter with TMO/PNP</label>
          <div class="custom-upload">
            <input
              type="file"
              name="coordination-letter"
              id="coordination-letter"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="coordination-letter" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <!-- Business Permit -->
        <div class="form-group">
          <label>Business Permit (if commercial transport)</label>
          <div class="custom-upload">
            <input
              type="file"
              name="business-permit"
              id="business-permit"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="business-permit" class="file-button">Upload File</label>
            <span class="file-name">No file selected</span>
          </div>
        </div>

        <div class="form-group">
          <label>Additional Permits (if required)</label>
          <div class="custom-upload">
            <input
              type="file"
              id="transport-additional-permit"
              name="transport-additional-permit"
              class="file-hidden"
              accept=".pdf,.jpg,.png"
              required
            />
            <label for="transport-additional-permit" class="file-button"
              >Upload File</label
            >
            <span class="file-name">No file selected</span>
          </div>
        </div>
      </div>

      <button type="submit" class="submit-btn" id="transport-submit">
        Submit
      </button>
    </form>

    <script src="permit.js" defer></script>
    <script src="../Navigation Bar/navigation.js"></script>

    <?php 
    include '../Footer/Footer.php';
    ?> 