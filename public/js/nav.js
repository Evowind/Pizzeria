/******/
(() => { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!*****************************!*\
      !*** ./resources/js/nav.js ***!
      \*****************************/
    var body = document.querySelector('body');
    var sidebar = body.querySelector('nav');
    var toggle = body.querySelector(".toggle");
    var modeSwitch = body.querySelector(".toggle-switch");
    var modeText = body.querySelector(".mode-text");
    var header = document.querySelector('header');
    var change = false;
    toggle.addEventListener("click", function () {
        sidebar.classList.toggle("close");

        if (change) {
            header.style.backgroundColor = "var(--header-bg)";
            change = !change;
        } else {
            header.style.backgroundColor = "";
            change = !change;
        }
    });
    modeSwitch.addEventListener("click", function () {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";
        }
    });
    var activePage = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
    var prev = document.querySelector('.active');
    prev.classList.remove('active');
    document.getElementById(activePage).classList.add('active');
    /******/
})()
;
