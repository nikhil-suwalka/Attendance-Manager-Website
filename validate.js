var flag = 0, flag1 = 0, flag2 = 0, flag3 = 0, flag4 = 0, flag5 = 0, flag6 = 0, flag7 = 0, flag11 = 0;


// To hide or show button
function submit1() {
    var x = document.getElementById("sub");
    if (flag == 1 && flag1 == 1 && flag3 == 1 && flag4 == 1 && flag5 == 1 && flag6 == 1 && flag11 == 1 && flag2 == 1 && flag7 == 1) {

        x.style.display = "block";
    }

    else {
        x.style.display = "none";
    }
}

//first name validation
function fun() {
    flag = 0;
    var fname = document.data.first_name.value;
    if (fname == '') {
        document.data.fname.value = "First name field cannot be empty";
        document.data.first_name.style.borderColor = "#FF0000";

    }

    else if (fname.match(/[^a-zA-Z]/)) {
        document.data.fname.value = "Only Alphabets ";
        document.data.first_name.style.borderColor = "#FF0000";

    }

    else {
        flag = 1;
        document.data.fname.value = "  ";
        document.data.first_name.style.borderColor = "green";
    }


    submit1();
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


    submit1();
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

    submit1();

}

//City validation
function fun4() {
    flag4 = 0;
    var lname = document.data.city.value;
    if (lname == '') {

        document.data.cityval.value = "City field cannot be empty";
        document.data.city.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z]/)) {
        document.data.cityval.value = "Only alphabets are allowed";
        document.data.city.style.borderColor = "#FF0000";
    }

    else {
        flag4 = 1;
        document.data.cityval.value = "  ";
        document.data.city.style.borderColor = "green";
    }

    submit1();
}

//State validation
function fun5() {
    flag5 = 0;
    var lname = document.data.state.value;
    if (lname == '') {

        document.data.stateval.value = "State field cannot be empty";
        document.data.state.style.borderColor = "#FF0000";
    }

    else if (lname.match(/[^a-zA-Z]/)) {
        document.data.stateval.value = "Only Alphabets ";
        document.data.state.style.borderColor = "#FF0000";
    }

    else {
        flag5 = 1;
        document.data.stateval.value = "  ";
        document.data.state.style.borderColor = "green";
    }


    submit1();
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

    submit1();
}

// gender validation
function fun7() {

    flag2 = 1;
    submit1();
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
    submit1()

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


    submit1();
}

		
		
