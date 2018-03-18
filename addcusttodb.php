<?php
include('includes/database.php');
include('addcusttodatabase.php');

if ($_POST) {
    //to check if form is submitted
    date_default_timezone_set('Asia/Kolkata');
    if (isset($_POST['first_name']) && isset($_POST["last_name"]) && isset($_POST["gender"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zip"]) && isset($_POST["bloodGroup"]) && isset($_POST['bloodSign']) && isset($_POST['status1']) && isset($_POST['designation']) && isset($_POST['statuschange']) && isset($_POST['bankname']) && isset($_POST['ac']) && isset($_POST['bbranch']) && isset($_POST['ifsc']) && isset($_POST['micr'])) {


        // $result = ($a > $b ) ? $a :$b;

        //(mysqli_real_escape_string($mysqli, $_POST["first_name"]) == "") ? "NULL":mysqli_real_escape_string($mysqli, $_POST["first_name"]);
        $first_name = mysqli_real_escape_string($mysqli, $_POST["first_name"]);
        $last_name = mysqli_real_escape_string($mysqli, $_POST["last_name"]);
        $gender = mysqli_real_escape_string($mysqli, $_POST["gender"]);
        $address = mysqli_real_escape_string($mysqli, $_POST["address"]);
        $city = mysqli_real_escape_string($mysqli, $_POST["city"]);
        $phoneno = mysqli_real_escape_string($mysqli, $_POST["phoneno"]);
        $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
        $state = mysqli_real_escape_string($mysqli, $_POST["state"]);
        $zipcode = mysqli_real_escape_string($mysqli, $_POST["zip"]);
        $doj = mysqli_real_escape_string($mysqli, $_POST["doj"]);
        $bloodGrp = $_POST['bloodGroup'] . $_POST['bloodSign'];
        $bloodGroup = mysqli_real_escape_string($mysqli, $bloodGrp);
        $empstatus = (mysqli_real_escape_string($mysqli, $_POST["status1"])) == " " ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["status1"]);
        $designat = (mysqli_real_escape_string($mysqli, $_POST["designation"])) == "" ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["designation"]);
        $statuschange = (mysqli_real_escape_string($mysqli, $_POST["statuschange"])) == "" ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["statuschange"]);
        $banknaam = (mysqli_real_escape_string($mysqli, $_POST["bankname"])) == "" ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["bankname"]);
        $accno = (mysqli_real_escape_string($mysqli, $_POST["ac"])) == "" ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["ac"]);
        $bbranch = (mysqli_real_escape_string($mysqli, $_POST["bbranch"])) == "" ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["bbranch"]);
        $ifsc = (mysqli_real_escape_string($mysqli, $_POST["ifsc"])) == "" ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["ifsc"]);
        $micr = (mysqli_real_escape_string($mysqli, $_POST["micr"]))=="" ? "NULL" : mysqli_real_escape_string($mysqli, $_POST["micr"]);

        $conn = connect();
        echo $micr;
        if (!($conn)) {
            echo "Connection could not be established";
        } else {

            add($conn, $first_name, $last_name, $gender, $address, $city, $state, $zipcode, $phoneno, $dob, $doj, $bloodGroup, $empstatus, $designat, $statuschange, $banknaam, $accno, $bbranch, $ifsc, $micr);
            header("Location: employee_manager.php");
        }
        exit;

    } else {
        echo "Fill all fields";
    }
}
