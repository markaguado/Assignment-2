
/* ------------------------------------
Keite Gularte                   
-------------------------------------*/


// -------------- Error message and new element declaration -------------/
let userErrorMsg = "Username should be non - empty, and within 20 characters long.";
let newElementUser = document.createElement('p');
newElementUser.setAttribute("class", "error");
newElementUser.innerText = userErrorMsg;

let emailErrorMsg = "Email should be non-empty with the format xyz@xyz.com";
let newElementEmail = document.createElement('p');
newElementEmail.setAttribute("class", "error");
newElementEmail.innerText = emailErrorMsg;

let passErrorMsg = "Password should be at least 6 characters; 1 uppercase, 1 lowercase";
let newElementPass = document.createElement('p');
newElementPass.setAttribute("class", "error");
newElementPass.innerText = passErrorMsg;

let conpassErrorMsg = "Please retype password.";
let newElementConPass = document.createElement('p');
newElementConPass.setAttribute("class", "error");
newElementConPass.innerText = conpassErrorMsg;

let fname = "Please fill this out";
let newElementFname = document.createElement('p');
newElementFname.setAttribute("class", "error");
newElementFname.innerText = fname;

let lname = "Please fill this out";
let newElementLname = document.createElement('p');
newElementLname.setAttribute("class", "error");
newElementLname.innerText = lname;

let pnumber = "Please enter a valid phone number";
let newElementPhoneNumber = document.createElement('p');
newElementPhoneNumber.setAttribute("class", "error");
newElementPhoneNumber.innerText = pnumber;


let bdate = "Please enter your birthday YEAR/MM/DD";
let newElementBirthDate = document.createElement('p');
newElementBirthDate.setAttribute("class", "error");
newElementBirthDate.innerText = bdate;


//----------- function that validates all the fields and checkbox -----------/

function validate() {

    // -------- runs all the function 
    emailVal();
    // usernameVal();
    passwordVal();
    firstName();
    lastName();
    phoneNumber();
    birthDate();
    // confirmPassVal();
    // termsVal();

    // ---------- if all fields and check boxes returns true this resets the form
    if (emailVal() == true && passwordVal() == true && firstName() == true && lastName() == true && phoneNumber() == true && birthDate() == true) {
        document.getElementById("signup-form").submit();
        document.getElementById("signup-form").reset();
        return true;
    }


}

//----------------------- email ----------------------------/
function emailVal() {

    let regexp = /\S+@\S+\.\S+/;
    let email = document.getElementById("email").value;

    if (!regexp.test(email)) {
        this.email.classList.add("warning");
        this.email.classList.remove("match");
        document.querySelectorAll(".input-group")[0].append(newElementEmail);
        return false;
    }
    else {
        this.email.classList.add("match");
        newElementEmail.remove();
        return true;
    }
}

//----------------------- password ----------------------------/
function passwordVal() {
    let reg = /(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    let pass = document.getElementById("pass").value;
    if (pass == "" || reg.test(pass) != true) {
        this.pass.classList.add("warning");
        this.pass.classList.remove("match");
        document.querySelectorAll(".input-group")[1].append(newElementPass);
        return false;
    }
    else {
        this.pass.classList.add("match");
        newElementPass.remove();
        return true;
    }
}




// -----------------------------firstname----------------------
function firstName() {
    let firstname = document.getElementById("firstname").value;

    if (firstname == "") {
        this.firstname.classList.add("warning");
        this.firstname.classList.remove("match");
        document.querySelectorAll(".input-group")[2].append(newElementFname);
        return false;
    }
    else {
        this.firstname.classList.add("match");
        newElementFname.remove();
        return true;
    }

}

// -----------------------------lastname----------------------
function lastName() {
    let lastname = document.getElementById("lastname").value;

    if (lastname == "") {
        this.lastname.classList.add("warning");
        this.lastname.classList.remove("match");
        document.querySelectorAll(".input-group")[3].append(newElementLname);
        return false;
    }
    else {
        this.lastname.classList.add("match");
        newElementLname.remove();
        return true;
    }

}

//----------------phone number ----------------------------
function phoneNumber() {
    let phonenumber = document.getElementById("phonenumber").value;
    let mobilePattern = /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;


    if (mobilePattern.test(phonenumber) != true || phonenumber == "") {
        this.phonenumber.classList.add("warning");
        this.phonenumber.classList.remove("match");
        document.querySelectorAll(".input-group")[4].append(newElementPhoneNumber);
        return false;
    } else {
        this.phonenumber.classList.add("match");
        newElementPhoneNumber.remove();
        return true;
    }

}


//----------------birthdate ----------------------------
function birthDate() {
    let birthdate = document.getElementById("birthdate").value;

    if (birthdate == "") {
        this.birthdate.classList.add("warning");
        this.birthdate.classList.remove("match");
        document.querySelectorAll(".input-group")[5].append(newElementBirthDate);
        return false;
    } else {
        this.birthdate.classList.add("match");
        newElementBirthDate.remove();
        return true;
    }

}