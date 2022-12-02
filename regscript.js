// written by Kyle Ryc
// for CST8285
//modified by Renato Simoes

//define a global variables
let thisForm = document.forms[0];
let defaultMessage="";
let emailErrorMessage="🗙 Please submit a valid email";
let firstnameErrorMessage="🗙 Please submit a valid first name";
let lastnameErrorMessage="🗙 Please submit a valid last name";
let passwordErrorMessag="🗙 Please submit a password that is at least 6 characters long, and contains at least 1 uppercase letter and 1 lowercase letter";
let password2ErrorMessage="🗙 Please submit the same password twice";
// regex string from https://emailregex.com/
let emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let firstnameRegex = /^[a-z ,.'-]+$/i;
let lastnameRegex = /^[a-z ,.'-]+$/i;
let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/;


//get all the form inputs
let emailInput = document.querySelector('#username');
let firstnameInput = document.querySelector('#firstname');
let lastnameInput = document.querySelector('#lastname');
let passwordInput = document.querySelector('#password');
let password2Input = document.querySelector('#password2');

let emailInputValue = emailInput.value;
const inputList = [emailInput, firstnameInput, lastnameInput, passwordInput, password2Input];

//create some variables for error paragraphs
let emailError = document.createElement('p');
let firstnameError = document.createElement('p');
let lastnameError = document.createElement('p');
let passwordError = document.createElement('p');
let password2Error = document.createElement('p');
let termsError = document.createElement('p');
const errorList = [emailError, firstnameError, lastnameError, passwordError, password2Error, termsError];
const tagList = ['#username', '#firstname', '#lastname', '#password', '#password2'];


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

//  should validate if the first name passed regex check
function validateFirstname(){
    let firstname = firstnameInput.value;
    let firError;
    if(firstnameRegex.test(firstname)){
    firError = defaultMessage;
    }
    else {
    firError = firstnameErrorMessage;
    }
    return firError;
}

//  should validate if the first name passed regex check
function validateLastname(){
    let lastname = lastnameInput.value;
    let lasError;
    if(lastnameRegex.test(lastname)){
    lasError = defaultMessage;
    }
    else {
    lasError = lastnameErrorMessage;
    }
    return lasError;
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
    let firstnameValidation=validateFirstname();
    let lastnameValidation=validateLastname();
    let passwordValidation=validatePassword();
    let secondPasswordValidation=validatePassword2();
    
    if(emailValidation !==defaultMessage) {
        emailError.textContent = emailValidation;
        borderChange(emailInput,emailError);
        validated = false;
    }

    if (firstnameValidation !==defaultMessage) {
        firstnameError.textContent = firstnameValidation;
        borderChange(firstnameInput, firstnameError);
        validated = false;
    }

    if (lastnameValidation !==defaultMessage) {
        lastnameError.textContent = lastnameValidation;
        borderChange(lastnameInput, lastnameError);
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
        emailInputValue = emailInput.value.toLowerCase();
    }
    return validated;
}

// Event Listeners

//This group of listeners updates the inputs while the user enages with the form
emailInput.addEventListener("blur", ()=>{
    let checkEmail=validateEmail();
    if(checkEmail == defaultMessage){
        emailError.textContent = defaultMessage;
        borderChange(emailInput,emailError);
    }
});

firstnameInput.addEventListener("blur", ()=>{
    let checkFirstname=validateFirstname();
    if(checkFirstname == defaultMessage){
        firstnameError.textContent = defaultMessage;
        borderChange(firstnameInput,firstnameError);
    }
});

lastnameInput.addEventListener("blur", ()=>{
    let checkLastname=validateLastname();
    if(checkLastname == defaultMessage){
        lastnameError.textContent = defaultMessage;
        borderChange(lastnameInput,lastnameError);
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
