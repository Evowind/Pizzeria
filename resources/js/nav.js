const body = document.querySelector('body');
const sidebar = body.querySelector('nav');
const toggle = body.querySelector(".toggle");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText = body.querySelector(".mode-text");
const header = document.querySelector('header');

let change = false;

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");

    if (change) {
        header.style.backgroundColor = "var(--header-bg)";
        change = !change;
    } else {
        header.style.backgroundColor = "";
        change = !change;
    }

})

let activePage = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
let prev = document.querySelector('.active');

prev.classList.remove('active');
document.getElementById(activePage).classList.add('active');
