const pass_password = document.querySelector("#pass-password");
let password;
password = document.querySelector("#password");
pass_password.addEventListener('click', () => {
    pass = password.value;
    PassWord = "jworg914"
    if (pass === PassWord) {
        window.location.href = 'editar.php';
    }else{
        alert("Contraseña incorrecta intente nuevamente");
    }
});