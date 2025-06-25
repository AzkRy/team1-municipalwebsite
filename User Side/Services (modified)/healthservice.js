function showSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "flex";
}

function hideSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "none";
}

const inputs = document.querySelectorAll('input[type="file"]');
inputs.forEach((input) => {
  input.addEventListener("change", function () {
    const fileName = this.files[0] ? this.files[0].name : "No file selected";
    this.nextElementSibling.nextElementSibling.textContent = fileName;
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("appointmentForm");
  const appointmentTimeSelect = document.getElementById("appointment-time");
  const serviceType = document.getElementById("service-type");
  const note = document.getElementById("service-note");

  const facilityMap = {
    general: "LUCENA MMG GENERAL HOSPITAL @ BRGY IBABANG DUPAY",
    dental: "BEYOND SMILES DENTAL CENTER @ BRGY IBABANG IYAM",
    prenatal:
      "LUCENA UNITED DOCTORS HOSPITALS AND MEDICAL CENTER @ BRGY ISABANG",
    pediatrics:
      "LUCENA UNITED DOCTORS HOSPITALS AND MEDICAL CENTER @ BRGY ISABANG",
    mental: "LUCENA UNITED DOCTORS HOSPITALS AND MEDICAL CENTER @ BRGY ISABANG",
  };

  const dateInputs = document.querySelectorAll('input[type="date"]:not(.no-min-date)');

  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, "0");
  const dd = String(today.getDate()).padStart(2, "0");
  const todayString = `${yyyy}-${mm}-${dd}`;

  dateInputs.forEach((input) => {
    input.min = todayString;
  });

  // ✅ 2. Time dropdown (30-minute intervals)
  const startHour = 9;
  const endHour = 16;

  for (let hour = startHour; hour <= endHour; hour++) {
    for (let minute of [0, 30]) {
      const h = String(hour).padStart(2, "0");
      const m = String(minute).padStart(2, "0");
      const timeVal = `${h}:${m}`;
      const option = document.createElement("option");
      option.value = timeVal;
      option.textContent = formatAMPM(hour, minute);
      appointmentTimeSelect.appendChild(option);
    }
  }

  function formatAMPM(hour, minute) {
    const suffix = hour >= 12 ? "PM" : "AM";
    const h = hour % 12 || 12;
    const m = String(minute).padStart(2, "0");
    return `${h}:${m} ${suffix}`;
  }

  serviceType.addEventListener("change", () => {
    const value = serviceType.value;
    note.innerHTML = value
      ? `👉 Your appointment will be directed to: <strong>${facilityMap[value]}</strong>.`
      : "";
  });

      form.addEventListener("submit", function (e) {
        const confirmed = confirm(
      "Please double-check your information. Is everything correct? (OK to proceed)"
    );
    if (!confirmed) {
      e.preventDefault(); // stop if cancelled
    }
  });
});