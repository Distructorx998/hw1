function checkName(event) {
    const input = event.currentTarget;
    
    if (input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
    

}

function checkSurname(event) {
    const input = event.currentTarget;
    
    if (input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
    

}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}


function checkUsername(event) {
    const input = document.querySelector('.username input');
    const usernameError = document.querySelector('.username span');

    if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        usernameError.textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        usernameError.parentNode.classList.add('errorj');
        formStatus.username = false;
    } else {
        usernameError.textContent = ""; // Rimuove il messaggio di errore
        usernameError.parentNode.classList.remove('errorj');
        formStatus.username = true; // Imposta lo stato dell'username a valido
        fetch("check_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }
}

function jsonCheckEmail(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }

}

function jsonCheckUsername(json) {
    const input = document.querySelector('.username input');
    const usernameError = document.querySelector('.username span');
    if (!json.exists) {
        document.querySelector('#username').classList.remove('errorj');
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
    }

}


function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    const emailError = document.querySelector('.email span');
    
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        emailError.textContent = "Email non valida";
        emailError.parentNode.classList.add('errorj');
        formStatus.email = false;
    } else {
        emailError.textContent = ""; // Rimuove il messaggio di errore
        emailError.parentNode.classList.remove('errorj');
        formStatus.email = true; // Imposta lo stato dell'email a valido
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);

    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }

}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
    }
}

const formStatus = {};
document.querySelector('#name_campo').addEventListener('blur', checkName);
document.querySelector('#surname_campo').addEventListener('blur', checkSurname);
document.querySelector('#username_campo').addEventListener('blur', checkUsername);
document.querySelector('#email_campo').addEventListener('blur', checkEmail);
document.querySelector('#password_campo').addEventListener('blur', checkPassword);
document.querySelector('#confirm_password_campo').addEventListener('blur', checkConfirmPassword);

