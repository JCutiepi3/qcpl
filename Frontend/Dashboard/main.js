// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

document.addEventListener("DOMContentLoaded", function() {
  table = document.querySelector(".box"); // Assuming the table has the class "box table"
  const rows = table.querySelectorAll("tr"); // Get all table rows
  
  for (const row of rows) {
    const trackNumberCell = row.querySelector("th"); // Assuming track number is in the first cell (<th>)
    const statusSpan = row.querySelector("span.status"); // Assuming status is in a span with class "status"
  
    // Access track number and status values
    const trackNumber = trackNumberCell.textContent.trim();
    const status = statusSpan.textContent.trim();
  
    console.log(`Track Number: ${trackNumber}, Status: ${status}`);
  
    
  }
});


