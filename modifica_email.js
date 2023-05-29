
function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
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

    }
}

const formStatus = {};
document.querySelector('#nuovo').addEventListener('blur', checkEmail);


