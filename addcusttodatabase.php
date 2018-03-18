<?php
function add($conn, $first_name, $last_name, $gender, $address, $city, $state, $zipcode, $phoneno, $dob, $doj, $bloodGroup, $empstatus, $designat, $statuschange, $banknaam, $accno, $bbranch, $ifsc, $micr)
{

    echo $empstatus;
    $w = "Insert into details(fname,lname,gender,address,zip,city,state,phone_number,date_of_birth ,date_of_join, blood_group,employee_status,designation,employee_status_change,bank_name,bank_accno,bank_branch,ifsc_code,micr_code) values ('$first_name','$last_name','$gender','$address',$zipcode, '$city','$state','$phoneno', '$dob','$doj', '$bloodGroup','$empstatus', '$designat', '$statuschange', '$banknaam', $accno, '$bbranch', '$ifsc', $micr);";
    $r = mysqli_query($conn, $w) or die(mysqli_errno($conn) . " at line " . __LINE__ . " aa" . mysqli_error($conn));
    if (!$r) {
        return 0;
    }
    $query = "SELECT id FROM details WHERE fname = '$first_name' and lname = '$last_name';";
    $mysqli = new mysqli("taramobilecrechespune.org", "httptara_ngouser", "ngouser", "httptara_employee");
    $result = $mysqli->query($query) or die($mysqli->error . " 111" . __LINE__ . "<br>dddd");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row["id"];
    }
    $attendanceID = $first_name . $last_name . $id;
    $query = "UPDATE details SET attendanceID =  '$attendanceID' WHERE id = $id;";
    $r = mysqli_query($conn, $query) or die(mysqli_errno($conn) . "222 " . mysqli_error($conn));

    if (!$r) {
        return 0;
    } else {
        return 1;
    }
}

function connect()
{
    $conn = mysqli_connect("taramobilecrechespune.org", "httptara_ngouser", "ngouser", "httptara_employee");
    if (!$conn) {
        return 0;
    } else {
        return $conn;
    }
}

