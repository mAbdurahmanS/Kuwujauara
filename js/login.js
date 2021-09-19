const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    // get the values from the inputs

    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    if(usernameValue === ''){
        //show error
        //add error class
        setErrorFor(username, 'Username tidak boleh kosong');
    }else{
        // add success class
        setSuccessFor(username);
    }

    if(passwordValue === ''){
        setErrorFor(password, 'Password tidak boleh kosong');
    }else{
        setSuccessFor(password)
    }
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');

    // add error message inside small
    small .innerText = message;

    // add error class
    formControl.className = 'form-control error';
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success'
}

function isEmail (email){
    return
}