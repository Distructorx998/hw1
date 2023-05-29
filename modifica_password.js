
function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkPassword(event) {
    const input = document.querySelector('.nuovo input');
    const usernameError = document.querySelector('.nuovo span');

    if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        usernameError.textContent = "Inserisci almeno 8 caratteri";
        usernameError.parentNode.classList.add('errorj');
        formStatus.username = false;
    } else {
        usernameError.textContent = ""; // Rimuove il messaggio di errore
        usernameError.parentNode.classList.remove('errorj');
        formStatus.username = true; // Imposta lo stato dell'username a valido

    }
}

const formStatus = {};
document.querySelector('#nuovo').addEventListener('blur', checkPassword);
document.querySelector('#password').addEventListener('blur', checkUsername);


