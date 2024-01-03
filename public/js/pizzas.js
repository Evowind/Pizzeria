/******/
(() => { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!********************************!*\
      !*** ./resources/js/pizzas.js ***!
      \********************************/
// MODAL FORM LOGIC
    var open_edit = document.getElementById('open_edit');
    var close_edit = document.getElementById('close_edit');
    var modal_container_edit = document.getElementById('modal_container_edit');
    var open_add = document.getElementById('open_add');
    var close_add = document.getElementById('close_add');
    var modal_container_add = document.getElementById('modal_container_add');
    var id_submit = document.getElementById('id');
    var form = document.getElementById('form');
    document.querySelectorAll("#open_edit").forEach(function (el) {
        el.addEventListener('click', function () {
            modal_container_edit.classList.add('show');
            modal_container_edit.querySelector('#id').value = el.value;
        });
    });
    document.querySelectorAll('#close_edit').forEach(function (el) {
        el.addEventListener('click', function () {
            modal_container_edit.classList.remove('show');
            form.reset();
        });
    });
    open_add.addEventListener('click', function () {
        modal_container_add.classList.add('show');
    });
    close_add.addEventListener('click', function () {
        modal_container_add.classList.remove('show');
        form.reset();
    });
    /******/
})()
;
