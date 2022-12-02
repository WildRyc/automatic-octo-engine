// written by Kyle Ryc
// for CST8285

//define a global variables
let thisForm = document.forms[0];
let defaultMessage="";
let termsErrorMessage= "🗙 Please submit to the terms and conditions to continue";
let loginErrorMessage="🗙 Please submit a valid login (only numbers, UPPERCASE letters, or lowercase letters";
let passwordErrorMessag="🗙 Please submit a password that is at least 6 characters long, and contains at least 1 uppercase letter and 1 lowercase letter";
let secondPasswordErrorMessage="🗙 Please submit the same password twice";
let emailErrorMessage="🗙 Please submit a valid email";
// regex string from https://emailregex.com/
let emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let loginRegex = /^[a-zA-Z0-9]{1,19}$/;
// regex based on https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

//get all the form inputs
let emailInput = document.querySelector('#email');
let loginInput = document.querySelector('#login');
let passwordInput = document.querySelector('#pass');
let password2Input = document.querySelector('#pass2');
let newsletterInput = document.querySelector('#newsletter');
let termsInput = document.querySelector('#terms');

let loginInputValue = loginInput.value;
const inputList = [emailInput,loginInput,passwordInput, password2Input, termsInput, newsletterInput];

//create some variables for error paragraphs
let emailError = document.createElement('p');
let loginError = document.createElement('p');
let passwordError = document.createElement('p');
let password2Error = document.createElement('p');
let termsError = document.createElement('p');
const errorList = [emailError, loginError, passwordError, password2Error, termsError];
const tagList = ['#email', '#login', '#pass', '#pass2', '#terms'];


for (i = 0; i < errorList.length; i++) {
    thisError = errorList[i];
    thisTag = tagList[i];
    thisError.setAttribute('class', 'incomplete');
    document.querySelector(thisTag).parentElement.append(thisError);
}

//this function should validate an email to xyz@abc.def
function validateEmail(){
    let email = emailInput.value; // access the value of the email
    let emaError;
    if(emailRegex.test(email)){ //test is predefiend method to check if the entered email matches the regexp
    emaError = defaultMessage;}
    else {
    emaError = emailErrorMessage;}
    return emaError;
}



//  should validate if the login passed regex check
function validateLogin(){
    let login = loginInput.value;
    let logError;
    if(loginRegex.test(login)){
    logError = defaultMessage;
    }
    else {
    logError = loginErrorMessage;
    }
    return logError;
}

// should validate if password passes regex check
function validatePassword(){
    let password = passwordInput.value;
    let passError;
    if (passwordRegex.test(password)){
    passError = defaultMessage;
    }
    else {
    passError = passwordErrorMessag;
    }
    return passError;
}
// should validate if the second password entry matches the first
function validatePassword2(){
    let password2 = password2Input.value;
    let pass2Error;
    if (password2 == passwordInput.value && password2 != ""){
    pass2Error = defaultMessage;
    }
    else {
    pass2Error = secondPasswordErrorMessage;
    }
    return pass2Error;
}
// this function should validate if the terms box has been checked
function validateTerms(){
    if (termsInput.checked)
    return defaultMessage;
    else
    return termsErrorMessage;
}

// change the border of the element if there is an issue with it's content
function borderChange (elementInput, elementError) {
    if (elementError.textContent != defaultMessage) {
        elementInput.style.borderColor = "red";
    }
    else {
        elementInput.style.borderColor = null;
    }
}

// runs when the the form is submitted
function validate() {
    let validated = true;
    let emailValidation=validateEmail();
    let loginValidation=validateLogin();
    let passwordValidation=validatePassword();
    let secondPasswordValidation=validatePassword2();
    let termsValidation=validateTerms();
    
    if(emailValidation !==defaultMessage) {
        emailError.textContent = emailValidation;
        borderChange(emailInput,emailError);
        validated = false;
    }

    if(termsValidation !==defaultMessage) {
        termsError.textContent=termsValidation;
        borderChange(termsInput, termsError);
        validated = false;
    }

    if (loginValidation !==defaultMessage) {
        loginError.textContent = loginValidation;
        borderChange(loginInput, loginError);
        validated = false;
    }

    if (passwordValidation !==defaultMessage){
        passwordError.textContent=passwordValidation;
        borderChange(passwordInput, passwordError);
        validated = false;
    }

    if (secondPasswordValidation !== defaultMessage){
        password2Error.textContent = secondPasswordValidation;
        borderChange(password2Input, password2Error);
        validated = false;
    }

    if (validated) {
        loginInputValue = loginInput.value.toLowerCase();
    }
    return validated;
}

// event listener to empty the text inside each paragraph when reset, and change border
function resetFormError() {
    for (i = 0; i < errorList.length; i++) {
            thisError = errorList[i];
            thisInput = inputList[i];
            thisError.textContent = defaultMessage;
            borderChange(thisInput, thisError);
        }
    }


// Event Listeners

// triggers on form reset, clears all the fields
thisForm.addEventListener('reset',resetFormError);

//This group of listeners updates the inputs while the user enages with the form
emailInput.addEventListener("blur", ()=>{
    let checkEmail=validateEmail();
    if(checkEmail == defaultMessage){
        emailError.textContent = defaultMessage;
        borderChange(emailInput,emailError);
    }
});

loginInput.addEventListener("blur", ()=>{
    let checkLogin=validateLogin();
    if(checkLogin == defaultMessage){
        loginError.textContent = defaultMessage;
        borderChange(loginInput,loginError);
    }
});

passwordInput.addEventListener("blur", ()=>{
    let checkPass=validatePassword();
    if(checkPass == defaultMessage){
        passwordError.textContent = defaultMessage;
        borderChange(passwordInput,passwordError);
    }
});

password2Input.addEventListener("blur", ()=>{
    let checkPass2=validatePassword2();
    if(checkPass2 == defaultMessage){
        password2Error.textContent = defaultMessage;
        borderChange(password2Input,password2Error);
    }
});

termsInput.addEventListener("change", (newsletterAccepted)=>{
    if(newsletterAccepted.target.checked){
        termsError.textContent=defaultMessage;
        borderChange(termsInput, termsError);
    }
});

// brief warning about spam
newsletterInput.addEventListener('change', (newsletterAccepted)=>{
    if(newsletterAccepted.target.checked)
    {
    alert("Make sure you add newsletter@kittensubsription.com to your email whitelist ");
    }
});





