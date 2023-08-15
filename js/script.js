document.addEventListener("DOMContentLoaded", function () {
    const nameInput = document.getElementById("nom");
    const firstNameInput = document.getElementById("prenom");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("numTel");
    nameInput.addEventListener("blur", validateNameInput);
    firstNameInput.addEventListener("blur", validateFirstNameInput);
    emailInput.addEventListener("blur", validateEmailInput);
    phoneInput.addEventListener("blur", validatePhoneInput);
     const form = document.getElementById("myForm"); // Change to the actual ID of your form
    form.addEventListener("submit", function (event) {
        if (!validateNameInput(nameInput) || 
            !validateFirstNameInput(firstNameInput) ||
            !validateEmailInput(emailInput) ||
            !validatePhoneInput(phoneInput)) {
            event.preventDefault(); 
            console.log("ftzkjtkot")
        }
    });
});
// const myform=document.getElementById('myForm');
// myform.addEventListener('submit',validateForm);

function validateNameInput(event) {
    const input = event.target;
    const indicator = document.getElementById("nomIndicator");
    
    if (!validateName(input.value)) {
        indicator.textContent = "Veuillez entrer un nom valide.";
        event.target.value='';
        return false;
    } else {
        indicator.textContent = "";
        return true;
    }
}

function validateFirstNameInput(event) {
    const input = event.target;
    const indicator = document.getElementById("prenomIndicator");
    
    if (!validateName(input.value)) {
        indicator.textContent = "Veuillez entrer un prénom valide.";
        event.target.value='';
        return false;
    } else {
        indicator.textContent = "";
        return true;
    }
}

function validateEmailInput(event) {
    const input = event.target;
    const indicator = document.getElementById("emailIndicator");
    
    if (!validateEmail(input.value)) {
        indicator.textContent = "Veuillez entrer une adresse e-mail valide(email@example.com).";
        event.target.value='';
        return false;
    } else {
        indicator.textContent = "";
        return true;
    }
}

function validatePhoneInput(event) {
    const input = event.target;
    const indicator = document.getElementById("numTelIndicator");
    
    if (!validatePhoneNumber(input.value)) {
        indicator.textContent = "Veuillez entrer un numéro de téléphone valide(XX.XX.XX.XX.XX).";
        event.target.value='';
        return false;
    } else {
        indicator.textContent = "";
        return true;
    }
}


function validatePhoneNumber(phoneNumber) {
    // Regular expression to validate a phone number (10 digits, allowing spaces and hyphens)
    const phoneRegex = /^[0-9]{10}$/;
    return phoneRegex.test(phoneNumber);
}

function validateEmail(email) {
    // Regular expression to validate an email address
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailRegex.test(email);
}

function validateName(name) {
    // Regular expression to validate a name (letters and spaces)
    const nameRegex = /^[a-zA-Z\s]+$/;
    return nameRegex.test(name);
}

