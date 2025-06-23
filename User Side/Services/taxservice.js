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

  const isTaxpayer = document.getElementById("is-taxpayer");
  const relationshipGroup = document.getElementById("relationship-group");
  const authUploadGroup = document.getElementById("auth-upload-group");

  isTaxpayer.addEventListener("change", () => {
    if (isTaxpayer.value === "No") {
      relationshipGroup.classList.remove("hidden");
      authUploadGroup.classList.remove("hidden");
    } else {
      relationshipGroup.classList.add("hidden");
      authUploadGroup.classList.add("hidden");
    }
  });
});