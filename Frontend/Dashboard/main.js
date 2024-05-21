// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.focus("hovered")

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

const downBtn = document.getElementById('down_btn');
const dropdownMenu = document.querySelector('.dropdown-menu');

downBtn.addEventListener('click', function() {
  const dropdown = this.closest('.dropdown'); // Find closest dropdown container
  dropdown.classList.toggle('show');
});







