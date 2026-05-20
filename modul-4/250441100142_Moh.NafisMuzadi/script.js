let body = document.getElementById('body')
let warna = document.getElementById('warna')

warna.addEventListener('change', function() {
    if (warna.value === "black") {
        body.classList.add("dark")
    } else {
        body.classList.remove("dark")
    }
});


const signupBtn = document.getElementById('signupBtn');
const dropdown = document.getElementById('dropdownMenu');
const btnDaftar = document.getElementById('btnDaftar');

const modal = document.getElementById('modalDaftar');
const closeModal = document.getElementById('closeModal');

signupBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    dropdown.classList.toggle('hidden');
});

document.addEventListener('click', function () {
    dropdown.classList.add('hidden');
});

btnDaftar.addEventListener('click', function (e) {
    e.stopPropagation();

    dropdown.classList.add('hidden');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
});

closeModal.addEventListener('click', function () {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
});

modal.addEventListener('click', function (e) {
    if (e.target === modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
});



const nama = document.getElementById('nama');
const email = document.getElementById('email');
const password = document.getElementById('password');

const errorNama = document.getElementById('errorNama');
const errorEmail = document.getElementById('errorEmail');
const errorPassword = document.getElementById('errorPassword');

const submitBtn = document.getElementById('submitBtn');

function isValidEmail (email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

submitBtn.addEventListener('click', function () {
    let valid = true;

    errorNama.classList.add('hidden');
    errorEmail.classList.add('hidden');
    errorPassword.classList.add('hidden');

    if (nama.value.trim() === "") {
        errorNama.textContent = 'nama tidak boleh kosong'
        errorNama.classList.remove('hidden');
        valid = false;
    }
    if (!isValidEmail(email.value)) {
        errorEmail.textContent = 'Email tidak valid';
        errorEmail.classList.remove('hidden');
        valid = false;
    }
    if (valid) {
        alert('Berhasil Mendaftar!!');

        nama.value = '';
        email.value = '';
        password.value = '';
    }
});
