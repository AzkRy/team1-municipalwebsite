function showSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "flex";
}

function hideSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "none";
}

function showPermitForm() {
  const selected = document.getElementById("permitType").value;

  document.querySelectorAll(".permit-form").forEach((form) => {
    form.style.display = "none";
  });

  const placeholder = document.getElementById("placeholder-form");
  if (placeholder) {
    placeholder.style.display = selected ? "none" : "block";
  }

  if (selected) {
    const selectedForm = document.getElementById(`${selected}Form`);
    if (selectedForm) {
      selectedForm.style.display = "block";
    }
  }
}

const inputs = document.querySelectorAll('input[type="file"]');
inputs.forEach((input) => {
  input.addEventListener("change", function () {
    const fileName = this.files[0] ? this.files[0].name : "No file selected";
    this.nextElementSibling.nextElementSibling.textContent = fileName;
  });
});

//BUILDING PERMIT
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("buildingForm");
  const startDateInput = document.getElementById("start-date");
  const othersCheckbox = document.querySelector('input[value="others"]');
  const othersTextarea = document.getElementById("scope-other-specify");

  // Error display helpers
  function showDateError(message) {
    clearDateError();
    const error = document.createElement("p");
    error.className = "error-message";
    error.style.color = "red";
    error.style.marginTop = "5px";
    error.textContent = message;
    startDateInput.parentElement.appendChild(error);
  }

  function clearDateError() {
    const existingError =
      startDateInput.parentElement.querySelector(".error-message");
    if (existingError) {
      existingError.remove();
    }
  }

  // Form submission
  form.addEventListener("submit", function (e) {
    const startDateValue = new Date(startDateInput.value);
    const today = new Date();

    // Normalize both to midnight
    startDateValue.setHours(0, 0, 0, 0);
    today.setHours(0, 0, 0, 0);

    clearDateError();

    // Date check
    if (!startDateInput.value || startDateValue <= today) {
      e.preventDefault();
      showDateError("Start date must be a future date.");
      startDateInput.focus();
      return;
    }

    // Final confirmation dialog
    const confirmed = confirm(
      "Please double-check your information. Is everything correct? (OK to proceed)"
    );
    if (!confirmed) {
      e.preventDefault(); // stop if cancelled
    }
  });

  // Scope of work toggle
  othersTextarea.disabled = true;
  othersTextarea.style.opacity = "0.5";
  othersTextarea.placeholder = "Disabled unless 'Others' is selected";

  othersCheckbox.addEventListener("change", () => {
    if (othersCheckbox.checked) {
      othersTextarea.disabled = false;
      othersTextarea.style.opacity = "1";
      othersTextarea.placeholder = "Specify other scope of work...";
    } else {
      othersTextarea.disabled = true;
      othersTextarea.value = "";
      othersTextarea.style.opacity = "0.5";
      othersTextarea.placeholder = "Disabled unless 'Others' is checked";
    }
  });
});

//EVENT PERMIT
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("eventForm");
  const otherRadio = document.querySelector(
    'input[name="event-type"][value="others"]'
  );
  const othersTextArea = document.getElementById("event-type-other");
  const allEventRadios = document.querySelectorAll('input[name="event-type"]');
  const dateInputs = document.querySelectorAll(
    'input[type="date"]:not(.no-min-date)'
  );

  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, "0");
  const dd = String(today.getDate()).padStart(2, "0");
  const todayString = `${yyyy}-${mm}-${dd}`;

  dateInputs.forEach((input) => {
    input.min = todayString;
  });

  // NEW: Security and Alcohol
  const securityRadios = document.querySelectorAll('input[name="security"]');
  const alcoholRadios = document.querySelectorAll('input[name="alcohol"]');
  const fireworksRadios = document.querySelectorAll('input[name="fireworks"]');
  const securityAgencyInput = document.querySelector(
    'input[name="security-agency"]'
  );
  const liquorPermitInput = document.getElementById("event-additional-permit");
  const fireworksPermitInput = document.getElementById("proof-of-coord");

  form.addEventListener("submit", function (e) {
    let valid = true;

    // Clear old errors
    const oldErrors = document.querySelectorAll(".field-error");
    oldErrors.forEach((el) => el.remove());

    // Date Validation (end date can't be before start date)
    const dateStartInput = document.getElementById("event-date-start");
    const dateEndInput = document.getElementById("event-date-end");

    const startDate = new Date(dateStartInput.value);
    const endDate = new Date(dateEndInput.value);

    if (dateStartInput.value && dateEndInput.value && endDate < startDate) {
      const err = document.createElement("div");
      err.className = "field-error";
      err.style.color = "red";
      err.style.fontSize = "14px";
      err.style.marginTop = "5px";
      err.textContent = "Event end date cannot be earlier than start date.";
      dateEndInput.parentNode.appendChild(err);
      dateEndInput.scrollIntoView({ behavior: "smooth", block: "center" });
      dateEndInput.focus();
      valid = false;
    }

    // Time Validation (max 8 hours, allow overnight)
    const startTimeInput = document.getElementById("event-time-start");
    const endTimeInput = document.getElementById("event-time-end");

    const startTime = startTimeInput.value;
    const endTime = endTimeInput.value;

    if (startTime && endTime) {
      const [startH, startM] = startTime.split(":").map(Number);
      const [endH, endM] = endTime.split(":").map(Number);

      const start = new Date();
      const end = new Date();

      start.setHours(startH, startM, 0);
      end.setHours(endH, endM, 0);

      if (end <= start) {
        end.setDate(end.getDate() + 1); // Allow overnight
      }

      const diffMs = end - start;
      const diffHours = diffMs / (1000 * 60 * 60);

      if (diffHours > 8) {
        const err = document.createElement("div");
        err.className = "field-error";
        err.style.color = "red";
        err.style.fontSize = "14px";
        err.style.marginTop = "5px";
        err.textContent = "Event duration cannot exceed 8 hours.";
        endTimeInput.parentNode.appendChild(err);
        endTimeInput.scrollIntoView({ behavior: "smooth", block: "center" });
        endTimeInput.focus();
        valid = false;
      }
    }

    // NEW: Security validation
    const selectedSecurity = [...securityRadios].find((r) => r.checked)?.value;
    if (selectedSecurity === "yes" && securityAgencyInput.value.trim() === "") {
      const err = document.createElement("div");
      err.className = "field-error";
      err.style.color = "red";
      err.style.fontSize = "14px";
      err.style.marginTop = "5px";
      err.textContent = "Please specify the security agency.";
      securityAgencyInput.parentNode.appendChild(err);
      securityAgencyInput.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });
      securityAgencyInput.focus();
      valid = false;
    }

    // NEW: Alcohol + file validation
    const selectedAlcohol = [...alcoholRadios].find((r) => r.checked)?.value;
    if (
      selectedAlcohol === "yes" &&
      (!liquorPermitInput || !liquorPermitInput.files.length)
    ) {
      const err = document.createElement("div");
      err.className = "field-error";
      err.style.color = "red";
      err.style.fontSize = "14px";
      err.style.marginTop = "5px";
      err.textContent = "Liquor Permit must be uploaded if alcohol is served.";
      liquorPermitInput?.parentNode.appendChild(err);
      liquorPermitInput?.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });
      liquorPermitInput?.focus();
      valid = false;
    }

    const selectedFireworks = [...fireworksRadios].find(
      (r) => r.checked
    )?.value;
    if (
      selectedFireworks === "yes" &&
      (!fireworksPermitInput || !fireworksPermitInput.files.length)
    ) {
      const err = document.createElement("div");
      err.className = "field-error";
      err.style.color = "red";
      err.style.fontSize = "14px";
      err.style.marginTop = "5px";
      err.textContent =
        "PNP, BFP, CENRO Coordination must be uploaded if fireworks is present.";
      fireworksPermitInput?.parentNode.appendChild(err);
      fireworksPermitInput?.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });
      fireworksPermitInput?.focus();
      valid = false;
    }

    if (!valid) e.preventDefault();

    const confirmed = confirm(
      "Please double-check your information. Is everything correct? (OK to proceed)"
    );
    if (!confirmed) {
      e.preventDefault(); // stop if cancelled
    }
  });

  // Disable "Others" textarea initially
  othersTextArea.disabled = true;
  othersTextArea.style.opacity = "0.5";
  othersTextArea.placeholder = "Disabled unless 'Others' is selected";

  allEventRadios.forEach((radio) => {
    radio.addEventListener("change", () => {
      if (otherRadio.checked) {
        othersTextArea.disabled = false;
        othersTextArea.style.opacity = "1";
        othersTextArea.placeholder = "Specify other event type...";
      } else {
        othersTextArea.disabled = true;
        othersTextArea.value = "";
        othersTextArea.style.opacity = "0.5";
        othersTextArea.placeholder = "Disabled unless 'Others' is selected";
      }
    });
  });
});

//BUSINESS PERMIT
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("businessForm");
  const startDateInput = document.getElementById("operation-start-date");

  function showDateError(message) {
    // Remove any previous error
    clearDateError();

    const error = document.createElement("p");
    error.className = "error-message";
    error.style.color = "red";
    error.style.marginTop = "5px";
    error.textContent = message;

    // Append the error message below the input
    startDateInput.parentElement.appendChild(error);
  }

  function clearDateError() {
    const existingError =
      startDateInput.parentElement.querySelector(".error-message");
    if (existingError) {
      existingError.remove();
    }
  }

  form.addEventListener("submit", function (e) {
    const startDateValue = new Date(startDateInput.value);
    const today = new Date();

    // Normalize both dates to midnight
    startDateValue.setHours(0, 0, 0, 0);
    today.setHours(0, 0, 0, 0);

    clearDateError();

    if (!startDateInput.value || startDateValue <= today) {
      e.preventDefault(); // prevent submission
      showDateError("Start date must be a future date.");

      // Optionally focus the field
      startDateInput.focus();
    }

    const confirmed = confirm(
      "Please double-check your information. Is everything correct? (OK to proceed)"
    );
    if (!confirmed) {
      e.preventDefault(); // stop if cancelled
    }
  });
});

document
  .getElementById("registration-number")
  .addEventListener("input", function () {
    const value = this.value;
    const pattern = /^[A-Za-z0-9/-]{9,}$/;

    if (!pattern.test(value)) {
      this.setCustomValidity(
        "Minimum of 9 characters. Only letters, numbers, / and - allowed."
      );
    } else {
      this.setCustomValidity("");
    }
  });

//TRANSPORT PERMIT
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("transportForm");

  form.addEventListener("submit", function (e) {
    let valid = true;

    // Clear previous errors
    document.querySelectorAll(".field-error").forEach((el) => el.remove());

    // Time Validation (max 8 hours, allow overnight)
    const startTimeInput = document.getElementById("transport-start-time");
    const endTimeInput = document.getElementById("transport-end-time");
    const startTime = startTimeInput.value;
    const endTime = endTimeInput.value;

    if (startTime && endTime) {
      const [startH, startM] = startTime.split(":").map(Number);
      const [endH, endM] = endTime.split(":").map(Number);

      const start = new Date();
      const end = new Date();

      start.setHours(startH, startM);
      end.setHours(endH, endM);

      if (end <= start) end.setDate(end.getDate() + 1); // Overnight allowed

      const diffHours = (end - start) / (1000 * 60 * 60);
      if (diffHours > 8) {
        const err = document.createElement("div");
        err.className = "field-error";
        err.style.color = "red";
        err.style.fontSize = "14px";
        err.style.marginTop = "5px";
        err.textContent = "Activity duration cannot exceed 8 hours.";
        endTimeInput.parentNode.appendChild(err);
        endTimeInput.scrollIntoView({ behavior: "smooth", block: "center" });
        endTimeInput.focus();
        valid = false;
      }
    }

    // Date Validation
    const dateStartInput = document.getElementById("transport-start-date");
    const dateEndInput = document.getElementById("transport-end-date");
    const startDate = new Date(dateStartInput.value);
    const endDate = new Date(dateEndInput.value);

    if (dateStartInput.value && dateEndInput.value && endDate < startDate) {
      const err = document.createElement("div");
      err.className = "field-error";
      err.style.color = "red";
      err.style.fontSize = "14px";
      err.style.marginTop = "5px";
      err.textContent = "Activity end date cannot be earlier than start date.";
      dateEndInput.parentNode.appendChild(err);
      dateEndInput.scrollIntoView({ behavior: "smooth", block: "center" });
      dateEndInput.focus();
      valid = false;
    }

    const roadClosureYes = document.querySelector(
      'input[name="road-closure"][value="yes"]:checked'
    );
    const notesTextarea = document.getElementById("notes");
    const additionalPermitFile = document.getElementById(
      "transport-additional-permit"
    ); // <-- Fix
    const uploadContainer = additionalPermitFile.closest(".form-group");

    if (roadClosureYes) {
      // 1. Notes must not be empty
      if (notesTextarea.value.trim() === "") {
        const err = document.createElement("div");
        err.className = "field-error";
        err.style.color = "red";
        err.style.fontSize = "14px";
        err.style.marginTop = "5px";
        err.textContent = "Please provide coordination notes for road closure.";
        notesTextarea.parentNode.appendChild(err);
        notesTextarea.scrollIntoView({ behavior: "smooth", block: "center" });
        notesTextarea.focus();
        valid = false;
      }

      // 2. File must be attached
      if (additionalPermitFile.files.length === 0) {
        const err = document.createElement("div");
        err.className = "field-error";
        err.style.color = "red";
        err.style.fontSize = "14px";
        err.style.marginTop = "5px";
        err.textContent = "Please attach a traffic management plan or permit.";

        uploadContainer.appendChild(err);
        uploadContainer.scrollIntoView({ behavior: "smooth", block: "center" });
        additionalPermitFile.focus();

        valid = false;
      }
    }

    if (!valid) {
      e.preventDefault(); // ✅ This will now work correctly
    }

    const confirmed = confirm(
      "Please double-check your information. Is everything correct? (OK to proceed)"
    );
    if (!confirmed) {
      e.preventDefault(); // stop if cancelled
    }
  });
});

/*
      document
        .getElementById("buildingForm")
        .addEventListener("submit", function (e) {
          const confirmed = confirm(
            "Please confirm that all your details are correct before submitting the form."
          );
          if (!confirmed) {
            e.preventDefault(); // Stops submission if they cancel
          }
        });

      document.querySelector("form").addEventListener("submit", function (e) {
        // Store basic fields to sessionStorage
        const fields = [
          "last-name",
          "first-name",
          "middle-name",
          "email-address",
          "phone-num",
          "tin-num",
          "city-municipal",
          "barangay",
          "zip-code",
          "houseno-unitfloor-buildingname",
          "lot-num",
          "blk-num",
          "interior",
          "street",
          "locOfconstruct-barangay",
          "locOfconstruct-city-municipal",
          "floor-area",
          "estimated-cost",
          "expected-duration",
          "start-date",
          "architect-name",
          "architect-prc",
          "architect-ptr",
          "civil-eng-name",
          "civil-eng-prc",
          "civil-eng-ptr",
          "electrical-eng-name",
          "electrical-eng-prc",
          "electrical-eng-ptr",
          "other-professionals",
          "scope-other-specify",
        ];

        fields.forEach((id) => {
          const el = document.getElementById(id);
          if (el) sessionStorage.setItem(id, el.value);
        });

        // Collect checkboxes into a comma-separated string
        const scopes = Array.from(
          document.querySelectorAll("input[name='scope-work']:checked")
        )
          .map((cb) => cb.value)
          .join(", ");
        sessionStorage.setItem("scope-work", scopes);

        // Store placeholders for uploaded file names (optional)
        const fileFields = [
          "barangay-clearance",
          "title-tax-declaration",
          "tax-clearance",
          "fire-safety-clearance",
          "building-plans",
          "bill-of-materials",
          "prc-ids-ptrs",
          "zoning-clearance",
          "locational-clearance",
          "dole-safety-compliance",
          "environmental-certificate",
        ];
        fileFields.forEach((id) => {
          const fileInput = document.getElementById(id);
          const fileName = fileInput?.files[0]?.name || "Not uploaded";
          sessionStorage.setItem(id, fileName);
        });
      });*/