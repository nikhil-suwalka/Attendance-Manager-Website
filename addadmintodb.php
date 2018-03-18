<?php
include('includes/database.php');
include('addadmintodatabase.php');


if ($_POST) {
    //to check if form is submitted
    date_default_timezone_set('Asia/Kolkata');


        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $first_name = mysqli_real_escape_string($mysqli, $_POST["first_name"]);
        $last_name = mysqli_real_escape_string($mysqli, $_POST["last_name"]);
        $gender = mysqli_real_escape_string($mysqli, $_POST["gender"]);
        $address = mysqli_real_escape_string($mysqli, $_POST["address"]);
        $city = mysqli_real_escape_string($mysqli, $_POST["city"]);
        $phoneno = mysqli_real_escape_string($mysqli, $_POST["phoneno"]);
        $state = mysqli_real_escape_string($mysqli, $_POST["state"]);
        $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
        $zipcode = mysqli_real_escape_string($mysqli, $_POST["zip"]);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $password = md5(mysqli_real_escape_string($mysqli, $_POST['password1']));
        $doj = mysqli_real_escape_string($mysqli, $_POST["doj"]);
        $bloodGrp = $_POST['bloodGroup'] . $_POST['bloodSign'];
        $bloodGroup = mysqli_real_escape_string($mysqli, $bloodGrp);
        $empstatus = mysqli_real_escape_string($mysqli, $_POST["status1"]);
        $designat = mysqli_real_escape_string($mysqli, $_POST["designation"]);
        $statuschange = mysqli_real_escape_string($mysqli, $_POST["statuschange"]);
        $banknaam = mysqli_real_escape_string($mysqli, $_POST["bankname"]);
        $accno = mysqli_real_escape_string($mysqli, $_POST["ac"]);
        $bbranch = mysqli_real_escape_string($mysqli, $_POST["bbranch"]);
        $ifsc = mysqli_real_escape_string($mysqli, $_POST["ifsc"]);
        $micr = mysqli_real_escape_string($mysqli, $_POST["micr"]);
        $superadmin = mysqli_real_escape_string($mysqli, $_POST['superadmin']);


        $conn = connect();
        if (!($conn)) {
            echo "Connection could not be established";
        } else {
            add($conn, $username, $first_name, $last_name, $gender, $address, $city, $state, $zipcode, $phoneno, $dob, $doj, $email, $password, $bloodGroup, $empstatus, $designat, $statuschange, $banknaam, $accno, $bbranch, $ifsc, $micr, $superadmin);
            header("Location: index.php");
        }
        exit;


}