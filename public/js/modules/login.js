const showPassBtn = document.getElementById('show-password');
const eyeIcon = document.getElementById('eye-icon');
const loginBtn = document.getElementById('login-btn');

const usernameVal = document.getElementById('username');
const passwordVal = document.getElementById('password');

let passShow = false;

showPassBtn.addEventListener('click', function () {
    passShow = !passShow;

    if(passShow) {
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
        passwordVal.setAttribute('type', 'text');
    } else {
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
        passwordVal.setAttribute('type', 'password');
    }
});

loginBtn.addEventListener('click', function (e) {
    e.preventDefault();

    let users = [
        ['Janin', 'Rightech'],
        ['RightApps', 'Rightech777']
    ];

    if(!usernameVal.value.trim() || !passwordVal.value.trim()) {
        alert('Please write your credentials to continue');
        return;
    }
    
    if(users.some(([u,p]) => u === usernameVal.value.trim() && p === passwordVal.value.trim())) {
        window.location.href = `/app/home`;
    } else {
        alert('Wrong Credentials');
        return;
    }
});