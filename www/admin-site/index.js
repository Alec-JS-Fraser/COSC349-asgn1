//modal js for admin site
const loginButton = document.querySelector('#login1');
const loginBg = document.querySelector('#loginbg');
const loginmodal = document.querySelector('#loginm');

loginButton.addEventListener('click', () => {
    loginmodal.classList.add('is-active');
});
loginBg.addEventListener('click', () => {
    loginmodal.classList.remove('is-active');
});
