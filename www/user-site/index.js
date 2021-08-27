//modal js
const loginButton = document.querySelector('#login1');
const loginBg = document.querySelector('#loginbg');
const loginmodal = document.querySelector('#loginm');

loginButton.addEventListener('click', () => {
    loginmodal.classList.add('is-active');
});
loginBg.addEventListener('click', () => {
    loginmodal.classList.remove('is-active');
});

const goToRegister = document.querySelector('#goToRegister');
const registerBg = document.querySelector('#registerbg');
const registermodal = document.querySelector('#registerm');

goToRegister.addEventListener('click', () => {
    loginmodal.classList.remove('is-active');
    registermodal.classList.add('is-active');
});

registerBg.addEventListener('click', () => {
    registermodal.classList.remove('is-active');
});