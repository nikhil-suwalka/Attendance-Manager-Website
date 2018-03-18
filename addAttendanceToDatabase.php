<?php
function checkin($conn, $id, $checkin)
{

    $w = "Insert into attendance(id,check_in,is_present, isAdmin) values ($id, '$checkin', 'y', 0);";
    $r = mysqli_query($conn, $w) or die(mysqli_error($conn) . mysqli_errno($conn));
    if (!$r) {
        return 0;
    } else {

        return 1;

    }
}

function checkin1($conn, $id, $checkin)
{


//    echo "In checkin1";
    $w = "Insert into attendance(username,check_in,is_present, isAdmin) values ('$id', '$checkin', 'y', 1);";
    $r = mysqli_query($conn, $w) or die(mysqli_error($conn) . mysqli_errno($conn));
    if (!$r) {
        return 0;
    } else {

        return 1;

    }
}

function checkout($conn, $id, $checkout)
{

    $w = "update attendance set check_out = '$checkout' WHERE id = $id AND DATE(check_in) ='" . date('Y-m-d') . "';";
    $r = mysqli_query($conn, $w) or die(mysqli_error($conn) . mysqli_errno($conn));
    if (!$r) {
        return 0;
    } else {

        return 1;

    }
}

function checkout1($conn, $id, $checkout)
{

//    echo "In checkout1";
    $w = "update attendance set check_out = '$checkout' WHERE username = '$id' AND DATE(check_in) ='" . date('Y-m-d') . "';";
    $r = mysqli_query($conn, $w) or die(mysqli_error($conn) . mysqli_errno($conn));
    if (!$r) {
        return 0;
    } else {

        return 1;

    }
}

function connect()
{
    $conn = mysqli_connect("taramobilecrechespune.org", "httptara_ngouser", "ngouser", "httptara_employee");    if (!$conn) {
        return 0;
    } else {
        return $conn;
    }
}

