const menu = document.querySelector(".menu-bar");
fetch("../Views/navbar.php")
  .then((res) => res.text())
  .then((data) => (menu.innerHTML = data));
