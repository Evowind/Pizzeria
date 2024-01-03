/******/
(() => { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!*******************************!*\
      !*** ./resources/js/order.js ***!
      \*******************************/
    document.querySelectorAll('#inc').forEach(function (el) {
        el.addEventListener('click', function () {
            var qtVal = el.parentElement.querySelector('#qt-val');
            var tmp = parseInt(qtVal.value);
            qtVal.value = tmp + 1;
        });
    });
    document.querySelectorAll('#dec').forEach(function (el) {
        el.addEventListener('click', function () {
            var qtVal = el.parentElement.querySelector('#qt-val');
            var tmp = parseInt(qtVal.value);

            if (tmp > 0) {
                qtVal.value = tmp - 1;
            }
        });
    });
    /******/
})()
;
