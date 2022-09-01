const alertLogin = document.getElementById('alert-login');

const hideAlert = () => {
    setTimeout(() => {
        alertLogin.classList.add('animate__fadeOutDown');
    }, 6000);
    setTimeout(() => {
        alertLogin.remove();
    }, 7000);
}

if(alertLogin) {
    window.onload = hideAlert();
}
