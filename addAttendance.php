<?php include('includes/database.php');
include('addAttendanceToDatabase.php');

if (isset($_COOKIE["logged_in"])) {
    $isSuperAdmin = $_COOKIE["logged_in"];
}


if (!(isset($_COOKIE["logged_in"]))) {
    header("Location:index.php");
    exit(0);
}

if (isset($_GET['logout'])) {
    setcookie("logged_in", '', time() - (86400 * 30), "/");
    header("Location:index.php");
    exit(0);
}

?>


<?php

function redirect($str){

    $count = 0;
    echo "<div class='bg-info text-center' style='font-size: large;'><strong>$str</strong></div>";
    echo "<div class='text-center' style='padding-top:120px;'><strong style='color:#673AB7;font-size:20px;'>Redirecting in 5 seconds</strong></div>";
    echo "<div id=\"loader\"></div>";
    header( "refresh:5;url=index1.php" );


}

if (isset($_GET["id"])) {
    //TODO: Attendance
    $att = $_GET["id"];
    date_default_timezone_set('Asia/Kolkata');
    $conn = connect();
    $attID = substr($att, 3);


    if (!($conn)) {
        echo "Connection could not be established";

    } else {
        $mysqli = new mysqli("taramobilecrechespune.org", "httptara_ngouser", "ngouser", "httptara_employee");

        if (substr($att, 0, 3) == "emp") {
//to check if form is submitted


            $query = "SELECT id FROM details WHERE attendanceID = '$attID' LIMIT 1";
             $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__ . "<br>");


            if ($result = mysqli_query($conn, $query)) {
                $rowCount = mysqli_num_rows($result);
            }
            if ($rowCount == 0) {     //ID Not Found
                echo "ID Not Found<br>";
            } else {


                while ($row = mysqli_fetch_array($result))
                    $id = $row["id"];

                $todaysDate = date("Y-m-d");

//        $query = "SELECT check_in FROM attendance WHERE check_in ='2018-02-09'";
                $query = "SELECT DATE(check_in) FROM attendance WHERE DATE(check_in) = '$todaysDate' AND id = $id;";


                $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__ . "<br>");
//        echo date("Y-m-d") . "<br>";

                while ($row = mysqli_fetch_array($result))
//                    print_r($row["DATE(check_in)"]);

                echo "<br>";
                echo "<div class='bg-info text-center' style='font-size: large'><strong>ID : $id<strong></div><br>";
                if ($result = mysqli_query($conn, $query)) {
                    $rowCount = mysqli_num_rows($result);
//                echo "Rows = $rowCount<br>";

                }

                if ($rowCount == 0) { // Scanned First time for today
                    $timestamp = date('Y-m-d H:i:s');
                    if (checkin($conn, $id, $timestamp)) {
                        redirect("Checked-in");
                    }
                } else {

                    $query = "SELECT DATE(check_out) FROM attendance WHERE DATE(check_out) = '$todaysDate' AND id = $id;";
                    $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__ . "<br>");
                    if ($result = mysqli_query($conn, $query)) {
                        $rowCount = mysqli_num_rows($result);
//                    echo "Rows = $rowCount<br>";

                        if ($rowCount > 0) {  // Scanning again after checking out

                            $timestamp = date('Y-m-d H:i:s');
                            if (checkout($conn, $id, $timestamp)) {
                                redirect("Check-out time updated");
                            }


                        } else { // Checking out the first time

                            $timestamp = date('Y-m-d H:i:s');
                            if (checkout($conn, $id, $timestamp)) {

                                redirect("Checked-out");
                            }
                        }
                    }
                }
            }
        } else if (substr($att, 0, 3) == "adm") {


            $query = "SELECT Username FROM persons WHERE attendanceID = '$attID' LIMIT 1";
            $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__ . "<br>");
            if ($result = mysqli_query($conn, $query)) {
                $rowCount = mysqli_num_rows($result);
            }
            if ($rowCount == 0) {     //Username Not Found
                echo "ID Not Found<br>";
            } else {
                while ($row = mysqli_fetch_array($result))
                    $id = $row["Username"];
                $todaysDate = date("Y-m-d");
                $query = "SELECT DATE(check_in) FROM attendance WHERE DATE(check_in) = '$todaysDate' AND username = '$id';";
                $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__ . "<br>");
                while ($row = mysqli_fetch_array($result))
//                    print_r($row["DATE(check_in)"]);

                echo "<br>";
                echo "<div class='bg-info text-center' style='font-size: large'><strong>Username : $id<strong></div><br>";
                if ($result = mysqli_query($conn, $query)) {
                    $rowCount = mysqli_num_rows($result);
                }
//                echo $rowCount;

                if ($rowCount == 0) { // Scanned First time for today

                    $timestamp = date('Y-m-d H:i:s');

                    if (checkin1($conn, $id, $timestamp)) {
                        redirect("checked-in for admin");
                    }
                } else {

                    $query = "SELECT DATE(check_out) FROM attendance WHERE DATE(check_out) = '$todaysDate' AND username = '$id';";

                    $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__ . "<br>");
                    if ($result = mysqli_query($conn, $query)) {
                        $rowCount = mysqli_num_rows($result);

                        if ($rowCount > 0) {  // Scanning again after checking out


                            $timestamp = date('Y-m-d H:i:s');
                            if (checkout1($conn, $id, $timestamp)) {
                                redirect("checked-out time Updated for admin");
                            }
                        } else { // Checking out the first time
                            $timestamp = date('Y-m-d H:i:s');
                            if (checkout1($conn, $id, $timestamp)) { // TODO function for admin
                                redirect("checked-out for admin");
                            }
                        }

                    }

                }
            }
        }
        else
            header("Location: index1.php");


    }
} else
    header("Location: index1.php");


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min1.css">
    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #673AB7;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        </style>
        </head>

</html>