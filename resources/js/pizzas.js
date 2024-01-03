// MODAL FORM LOGIC

const open_edit = document.getElementById('open_edit');
const close_edit = document.getElementById('close_edit');
const modal_container_edit = document.getElementById('modal_container_edit');

const open_add = document.getElementById('open_add');
const close_add = document.getElementById('close_add');
const modal_container_add = document.getElementById('modal_container_add');

const id_submit = document.getElementById('id');
const form = document.getElementById('form');


document.querySelectorAll("#open_edit").forEach(el => {
    el.addEventListener('click', () => {
        modal_container_edit.classList.add('show');
        modal_container_edit.querySelector('#id').value = el.value;
    });
});

document.querySelectorAll('#close_edit').forEach(el => {
    el.addEventListener('click', () => {
        modal_container_edit.classList.remove('show');
        form.reset();
    });
});


open_add.addEventListener('click', () => {
    modal_container_add.classList.add('show');
});

close_add.addEventListener('click', () => {
    modal_container_add.classList.remove('show');
    form.reset();
});
