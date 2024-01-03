document.querySelectorAll('#inc').forEach(el => {
    el.addEventListener('click', () => {
        let qtVal = el.parentElement.querySelector('#qt-val');
        let tmp = parseInt(qtVal.value);
        qtVal.value = tmp + 1;
    });
});

document.querySelectorAll('#dec').forEach(el => {
    el.addEventListener('click', () => {
        let qtVal = el.parentElement.querySelector('#qt-val');
        let tmp = parseInt(qtVal.value);
        if (tmp > 0) {
            qtVal.value = tmp - 1;
        }
    });
});