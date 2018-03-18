<?php
function add($conn, $username, $first_name, $last_name, $gender, $address, $city, $state, $zipcode, $phoneno, $dob, $doj, $email, $password, $bloodGroup, $empstatus, $designat, $statuschange, $banknaam, $accno, $bbranch, $ifsc, $micr, $superadmin)
{


    echo $accno . "<br>";
    $attid = $first_name.$last_name.$username;
    $w = "Insert into persons(Username, fname,lname,gender,address,zip,city,state,phone_number, date_of_birth,date_of_join, Email_id, Password, employee_status,designation,employee_status_change,bank_name,bank_accno,bank_branch,ifsc_code,micr_code, super_admin, attendanceID) values ('$username', '$first_name','$last_name','$gender','$address',$zipcode, '$city','$state','$phoneno', '$dob' ,'$doj', '$email' ,'$password','$empstatus', '$designat', '$statuschange', '$banknaam', $accno, '$bbranch', '$ifsc', $micr, $superadmin, '$attid');";
    $r = mysqli_query($conn, $w) or die(mysqli_errno($conn) . " at line " . __LINE__ . " aa" . mysqli_error($conn));
    if (!$r) {
        return 0;
    }
    return 1;
}

function connect()
{
    $conn = mysqli_connect("taramobilecrechespune.org", "httptara_ngouser", "ngouser", "httptara_employee");    if (!$conn) {
        return 0;
    } else {
        return $conn;
    }
}

