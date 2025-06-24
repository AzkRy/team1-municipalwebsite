<!-- Terms Modal -->
<div id="termsModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('termsModal')">&times;</span>
    <h2>Terms & Conditions</h2>
    <p>
      By using this system, you agree to follow government policies and internal rules.
      Unauthorized use may lead to disciplinary action.
    </p>
    <div style="margin-top: 20px;">
      <input type="checkbox" id="termsCheck">
      <label for="termsCheck">I have read and agree to the Terms & Conditions.</label>
    </div>
    <div style="margin-top: 15px; text-align: right;">
      <button onclick="confirmTerms()" class="modal-confirm">Confirm</button>
    </div>
  </div>
</div>

<!-- Privacy Modal -->
<div id="privacyModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('privacyModal')">&times;</span>
    <h2>Data Privacy</h2>
    <p>
      Your personal data is collected for legitimate purposes under the Data Privacy Act of 2012.
      It will not be shared without your consent.
    </p>
    <div style="margin-top: 20px;">
      <input type="checkbox" id="privacyCheck">
      <label for="privacyCheck">I have read and agree to the Data Privacy Policy.</label>
    </div>
    <div style="margin-top: 15px; text-align: right;">
      <button onclick="confirmPrivacy()" class="modal-confirm">Confirm</button>
    </div>
  </div>
</div>

<!-- Modal CSS --><style>
:root {
    --bg-color: #ffffff; 
    --section-color: #f4f4f4;
    --accent-color: #ffffff; 
    --sub-color: #F35B04;
    --important-section: #9A031E;
    --button-color: #006494; 
    --text-color: #000000; 
    --footer-bg: #D9D9D9;
    --icon-color: #F35B04;
    --box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    --Main-font: 'Roboto', sans-serif;
    --text-font: 'Archivo', sans-serif;
    --border-radius: 6px;
    --H1-font-size: 64px;
    --H2-font-size: 32px;
    --Title-font-size: 24px;
    --text-font-size: 16px;
    --icon-size: 24px;
    --button-font-size: 18px;
}

.modal {
    display: none;
    position: fixed;
    z-index: 100;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    font-family: var(--Main-font);
    /* CENTER THE MODAL WHEN SHOWN */
    justify-content: center;
    align-items: center;
    /* Ensure it covers the entire viewport */
    position: fixed !important;
    margin: 0;
    padding: 0;
}

.modal.show {
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: var(--section-color);
    color: var(--text-color);
    padding: 40px;
    border-radius: var(--border-radius);
    border: 3px solid #006494;
    width: 90%;
    max-width: 500px;
    box-shadow: var(--box-shadow);
    text-align: center;
    position: relative;
    transition: all 0.3s ease;
    /* Perfect centering */
    margin: 12% auto;
    transform: translate(0, 0);
}


.modal-content h2 {
    font-size: var(--H2-font-size);
    margin-bottom: 20px;
}

.modal-content p {
    font-size: var(--text-font-size);
    margin-bottom: 20px;
    line-height: 1.6;
}

.modal-content input[type="checkbox"] {
    transform: scale(1.2);
    margin-right: 8px;
}

.modal-content button {
    background-color: var(--button-color);
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: var(--border-radius);
    font-size: var(--button-font-size);
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 15px;
}

.modal-content button:hover {
    filter: brightness(90%);
}

.close {
    color: #888;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    position: absolute;
    top: 15px;
    right: 20px;
}

.close:hover {
    color: #333;
    filter: brightness(120%);
}
</style>

<!-- Terms-Privacy JS -->
<script>
function openModal(id) {
    document.getElementById(id).style.display = "flex";
}

function closeModal(id) {
    document.getElementById(id).style.display = "none";
}

window.onclick = function(event) {
    const terms = document.getElementById("termsModal");
    const privacy = document.getElementById("privacyModal");
    if (event.target === terms) {
        closeModal('termsModal');
    } else if (event.target === privacy) {
        closeModal('privacyModal');
    }
};
</script>

<script>
let termsConfirmed = false;
let privacyConfirmed = false;

function openModal(id) {
    document.getElementById(id).style.display = "block";
}

function closeModal(id) {
    document.getElementById(id).style.display = "none";
}

function confirmTerms() {
    const checkbox = document.getElementById("termsCheck");
    if (checkbox.checked) {
        termsConfirmed = true;
        closeModal("termsModal");
        enableLoginIfReady();
    } else {
        alert("Please check the box to confirm.");
    }
}

function confirmPrivacy() {
    const checkbox = document.getElementById("privacyCheck");
    if (checkbox.checked) {
        privacyConfirmed = true;
        closeModal("privacyModal");
        enableLoginIfReady();
    } else {
        alert("Please check the box to confirm.");
    }
}

function enableLoginIfReady() {
    const loginBtn = document.getElementById("loginBtn");
    if (termsConfirmed && privacyConfirmed) {
        loginBtn.disabled = false;
    }
}

window.onclick = function(event) {
    const modals = ["termsModal", "privacyModal"];
    modals.forEach(id => {
        const modal = document.getElementById(id);
        if (event.target === modal) {
            closeModal(id);
        }
    });
};
</script>