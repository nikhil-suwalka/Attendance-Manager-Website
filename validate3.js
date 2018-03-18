function fun() {
    flag = 0;
    var fname = document.data.first_name.value;
    if (fname == '') {
        document.data.fname.value = "First name field cannot be empty";
        document.data.first_name.style.borderColor = "#FF0000";
    }

    else if (fname.match(/[^a-zA-Z ]/)) {
        document.data.fname.value = "Only Alphabets ";
        document.data.first_name.style.borderColor = "#FF0000";
    }

    else {
        flag = 1;
        document.data.fname.value = "  ";
        document.data.first_name.style.borderColor = "green";
    }


}

//Last name validation
function fun2() {
    flag1 = 0;
    var lname = document.data.last_name.value;
    if (lname == '') {

        document.data.lname.value = "Last name field cannot be empty";
        document.data.last_name.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z]/)) {
        document.data.lname.value = "Only Alphabets ";
        document.data.last_name.style.borderColor = "#FF0000";
    }

    else {
        flag1 = 1;
        document.data.lname.value = "  ";
        document.data.last_name.style.borderColor = "green";
    }

}


//Phone Number validation
function fun3() {
    flag3 = 0;
    var ph = document.data.phoneno.value;
    if (ph == '') {

        document.data.phno.value = "Phone number field cannot be empty";
        document.data.phoneno.style.borderColor = "#FF0000";
    }

    else if (ph.length < 10) {
        document.data.phno.value = "Invalid Phone Number";
        document.data.phoneno.style.borderColor = "#FF0000";
    }

    else if (ph.match(/[^0-9]/)) {
        document.data.phno.value = "Only numbers ";
        document.data.phoneno.style.borderColor = "#FF0000";
    }

    else {
        flag3 = 1;
        document.data.phno.value = "  ";
        document.data.phoneno.style.borderColor = "green";
    }


}

//City validation
function fun4() {
    flag4 = 0;
    var lname = document.data.city.value;
    if (lname == '') {

        document.data.cityval.value = "City field cannot be empty";
        document.data.city.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z ]/)) {
        document.data.cityval.value = "Only alphabets are allowed";
        document.data.city.style.borderColor = "#FF0000";
    }

    else {
        flag4 = 1;
        document.data.cityval.value = "  ";
        document.data.city.style.borderColor = "green";
    }
}

//State validation
function fun5() {
    flag5 = 0;
    var lname = document.data.state.value;
    if (lname == '') {

        document.data.stateval.value = "State field cannot be empty";
        document.data.state.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z ]/)) {
        document.data.stateval.value = "Only Alphabets ";
        document.data.state.style.borderColor = "#FF0000";
    }

    else {
        flag5 = 1;
        document.data.stateval.value = "  ";
        document.data.state.style.borderColor = "green";
    }


}

//Zip Code validation		
function fun6() {
    flag6 = 0;
    var ph = document.data.zip.value;
    if (ph == '') {

        document.data.zipval.value = "Zip field cannot be empty";
        document.data.zip.style.borderColor = "#FF0000";
    }

    else if (ph.length < 6) {
        document.data.zipval.value = "Invalid Zip Number";
        document.data.zip.style.borderColor = "#FF0000";
    }

    else if (ph.match(/[^0-9]/)) {
        document.data.zipval.value = "Only Numbers ";
        document.data.zip.style.borderColor = "#FF0000";
    }

    else {
        flag6 = 1;
        document.data.zipval.value = "  ";
        document.data.zip.style.borderColor = "green";
    }

}

// gender validation
function fun7() {

    flag2 = 1;
}


// date validation
function fun8() {

    flag7 = 0;
    var date = document.data.doj.value;
    if (date == '') {


        document.data.dateval.value = "Select a date";
        document.data.doj.style.borderColor = "#FF0000";

    }

    else {
        flag7 = 1;
        document.data.dateval.value = " ";
        document.data.doj.style.borderColor = "green";
    }
}

//address validation
function fun11() {
    flag11 = 0;
    var fname = document.data.address.value;
    if (fname == '') {
        document.data.addressval.value = "Address field cannot be empty";
        document.data.address.style.borderColor = "#FF0000";
    }

    else {
        flag11 = 1;
        document.data.addressval.value = "  ";
        document.data.address.style.borderColor = "green";
    }
}

//further validation according to excel sheet columns
//birth date validation
function fun101() {
    flag101 = 0;
    var date = document.data.dob.value;
    if (date == '') {


        document.data.dateval1.value = "Select a date";
        document.data.dob.style.borderColor = "#FF0000";

    }

    else {
        flag101 = 1;
        document.data.dateval1.value = " ";
        document.data.dob.style.borderColor = "green";
    }

    submit1();
}


//employee status validation
function fun102() {
    flag102 = 0;
    var lname = document.data.status1.value;
    if (lname == '') {

        document.data.statusval1.value = "Status field cannot be empty";
        document.data.status1.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z ]/)) {
        document.data.statusval1.value = "Only Alphabets ";
        document.data.status1.style.borderColor = "#FF0000";
    }

    else {
        flag102 = 1;
        document.data.statusval1.value = "  ";
        document.data.status1.style.borderColor = "green";
    }


    submit1();
}

//employee designation
function fun103() {
    flag103 = 0;
    var lname = document.data.designation.value;
    if (lname == '') {

        document.data.designationval1.value = "Designation field cannot be empty";
        document.data.designation.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z ]/)) {
        document.data.designationval1.value = "Only Alphabets ";
        document.data.designation.style.borderColor = "#FF0000";
    }

    else {
        flag103 = 1;
        document.data.designationval1.value = "  ";
        document.data.designation.style.borderColor = "green";
    }


    submit1();
}


//employee status change validation
function fun104() {
    flag104 = 0;
    var lname = document.data.statuschange.value;
    if (lname.match(/[^a-zA-Z ]/)) {
        document.data.statuschangeval.value = "Only Alphabets ";
        document.data.statuschange.style.borderColor = "#FF0000";
    }

    else {
        flag104 = 1;
        document.data.statuschangeval.value = "  ";
        document.data.statuschange.style.borderColor = "green";
    }


    submit1();
}


//Bank Details validation
//Bank Name
function fun105() {
    flag105 = 0;
    var lname = document.data.bankname.value;
    if (lname == '') {

        document.data.banknameval.value = "Bank Name field cannot be empty";
        document.data.bankname.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z ]/)) {
        document.data.banknameval.value = "Only Alphabets ";
        document.data.bankname.style.borderColor = "#FF0000";
    }

    else {
        flag105 = 1;
        document.data.banknameval.value = "  ";
        document.data.bankname.style.borderColor = "green";
    }

    submit1();
}

//Account Number
function fun106() {
    flag106 = 0;
    var ph = document.data.ac.value;
    if (ph == '') {

        document.data.acval.value = "Account number field cannot be empty";
        document.data.ac.style.borderColor = "#FF0000";
    }

    else if (ph.length < 10 || ph.length > 20) {
        document.data.acval.value = "Invalid Account Number";
        document.data.ac.style.borderColor = "#FF0000";
    }

    else if (ph.match(/[^0-9]/)) {
        document.data.acval.value = "Only numbers ";
        document.data.ac.style.borderColor = "#FF0000";
    }

    else {
        flag106 = 1;
        document.data.acval.value = "  ";
        document.data.ac.style.borderColor = "green";
    }

    submit1();

}

//Bank Branch
function fun107() {
    flag107 = 0;
    var lname = document.data.bbranch.value;
    if (lname == '') {

        document.data.bbranchval.value = "Bank Branch Name field cannot be empty";
        document.data.bbranch.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z ]/)) {
        document.data.bbranchval.value = "Only Alphabets ";
        document.data.bbranch.style.borderColor = "#FF0000";
    }

    else {
        flag107 = 1;
        document.data.bbranchval.value = "  ";
        document.data.bbranch.style.borderColor = "green";
    }

    submit1();
}

//IFSC Code
function fun108() {
    flag108 = 0;
    var lname = document.data.ifsc.value;
    if (lname == '') {

        document.data.ifscval.value = "IFSC field cannot be empty";
        document.data.ifsc.style.borderColor = "#FF0000";
    }

    else {
        flag108 = 1;
        document.data.ifscval.value = "  ";
        document.data.ifsc.style.borderColor = "green";
    }

    submit1();
}


//MICR code
function fun109() {
    flag109 = 0;
    var ph = document.data.micr.value;
    if (ph == '') {

        document.data.micrval.value = "MICR field cannot be empty";
        document.data.micr.style.borderColor = "#FF0000";
    }

    else if (ph.length < 5) {
        document.data.micrval.value = "Invalid MICR Number";
        document.data.micr.style.borderColor = "#FF0000";
    }

    else if (ph.match(/[^0-9]/)) {
        document.data.micrval.value = "Only numbers ";
        document.data.micr.style.borderColor = "#FF0000";
    }

    else {
        flag109 = 1;
        document.data.micrval.value = "  ";
        document.data.micr.style.borderColor = "green";
    }

    submit1();

}