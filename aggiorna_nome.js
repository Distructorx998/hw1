
function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('.nuovo input');
    const usernameError = document.querySelector('.nuovo span');

    if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        usernameError.textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        usernameError.parentNode.classList.add('errorj');
        formStatus.username = false;
    } else {
        usernameError.textContent = ""; 
        usernameError.parentNode.classList.remove('errorj');
        formStatus.username = true; 
    }

}

const formStatus = {};
document.querySelector('#nuovo').addEventListener('blur', checkUsername);


