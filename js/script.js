document.addEventListener("DOMContentLoaded", function () {
  const expanders = document.querySelectorAll(".expander");

  expanders.forEach((expander) => {
    expander.addEventListener("click", function (e) {
      e.stopPropagation();
      if (expander.classList.contains("active")) {
        expander.classList.remove("active");
      } else {
        closeExpanders(expanders);
        expander.classList.add("active");
      }
    });
  });

  document.addEventListener("click", function () {
    closeExpanders(expanders);
  });

  function closeExpanders(expanders) {
    expanders.forEach((expander) => {
      expander.classList.remove("active");
    });
  }
});

document
  .querySelector(".mobile-menu-button")
  .addEventListener("click", function () {
    this.classList.toggle("active");
    const navList = document.querySelector(".nav-list");
    navList.style.display =
      navList.style.display === "block" ? "none" : "block";
  });

// Attach click event to the Table export button
document.getElementById("exportButton").addEventListener("click", function () {
  // Use TableExport to export the table to Excel
  $("#dataTableHover").tableExport({
    type: "excel",
    escape: "false",
  });
});
