<?php


function head($q)
{
    header("Location: $q");

}
include('includes/database.php');


if (!(isset($_COOKIE["logged_in"]))) {
//    header("Location:index.php");
    head("index.php");
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


?>


    <html>
    <head>

        <style type="text/css">


            .msg {
                padding: 3px;
                background: #f4f4f4;
                color: green;
                font-size: 16px;
            }





        </style>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/jumbotron-narrow.css" rel="stylesheet">
        <script type="text/javascript"
                src="https://gc.kis.v2.scr.kaspersky-labs.com/67704677-3063-5142-AA2E-39311A24A375/main.js"
                charset="UTF-8"></script>
        <script src="src/jquery.table2excel.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min1.css">
    </head>
    <body style="text-align: center">
    <form name="myform" method="get" action="qr.php">

        <!--<li class="show1">
            <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout">
        </li>-->


        <div class="container1">
            <h1 style="padding-right:350px;"><strong>Generate QR Code</strong></h1>
            <table><br>
                <th style="font-size:30px;padding-left:350px;color:#673AB7"> Employees</th>
                <th style="font-size: 30px;padding-left:50px;color:#673AB7"> Admins</th>


                <!--             Fetching Employees-->
                <tr>
                    <td style="padding-left:350px;padding-top:20px;"><select name="employee" class="custom-select"
                                                                             style="border-width: 1px;border-color:#673AB7;height:40px; background-color:transparent;color:#673AB7;">

                            <?php

                            $con = connect();
                            $query = "SELECT id, fname, lname FROM details ORDER BY fname";
                            $srno = 1;
                            $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                            $records = array();


                            while ($row = mysqli_fetch_array($result)) {
                                $emp = array();
                                $emp['no'] = $srno;
                                $emp['id'] = $row['id'];
                                $emp['fname'] = $row['fname'];
                                $emp['lname'] = $row['lname'];
                                array_push($records, $emp);


                                echo "<option value='$srno'>" . $row['fname'] . " " . $row['lname'] . "</option>";


                                $srno++;
                            }
                            ?>


                        </select>
                    </td>


                    <!--             Fetching Admins-->

                    <td style="padding-left:50px;padding-top:20px;"><select name="admin"
                                                                            style="border-color:#673AB7;border-width:1px;height:40px; background-color:transparent;color:#673AB7;">

                            <?php

                            $con = connect();
                            $query = "SELECT Username, fname, lname FROM persons ORDER BY fname";
                            $srno = 1;
                            $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                            $records1 = array();


                            while ($row = mysqli_fetch_array($result)) {
                                $emp = array();
                                $emp['no'] = $srno;
                                $emp['username'] = $row['Username'];
                                $emp['fname'] = $row['fname'];
                                $emp['lname'] = $row['lname'];
                                array_push($records1, $emp);


                                echo "<option value='$srno'>" . $row['fname'] . " " . $row['lname'] . "</option>";


                                $srno++;
                            }
                            ?>


                        </select>
                    </td>

                </tr>

                <tr>
                    <td style="padding-left:350px;padding-top:10px;">
                        <input type="submit" name="emp" class="btn btn-default btn-md">
                    </td>
                    <td style="padding-left:50px;padding-top:10px;">
                        <input type="submit" name="adm" class="btn btn-default btn-md">
                    </td>
                </tr>
            </table>
        </div>
    </form>
    </body>
    </html>

<?php
if ($_GET) {

    if (isset($_GET['logout'])) {
        setcookie("logged_in", '', time() - (86400 * 30), "/");
//        header("Location:index.php");
        head("index.php");
    } else {

        if (isset($_GET['emp'])) {
            @$no = $_GET['employee'];
            foreach ($records as $xy) {
                if ($xy['no'] == $no) {
                    $link = "emp" . $xy['fname'] . $xy['lname'] . $xy['id'];

                    $link = str_replace(' ', '', $link);

                }
            }
            $qr = "https://chart.googleapis.com/chart?cht=qr&chs=400x400&chl=http://taramobilecrechespune.org/ngo/addAttendance.php?id=" . $link;
//            header("Location:".$qr);
            head($qr);


        } else if (isset($_GET['adm'])) {
            $no = $_GET['admin'];

            foreach ($records1 as $xy) {
                if ($xy['no'] == $no) {
                    $link = "adm" . $xy['fname'] . $xy['lname'] . $xy['username'];

                    $link = str_replace(' ', '', $link);

                }
            }
            $qr = "https://chart.googleapis.com/chart?cht=qr&chs=400x400&chl=http://taramobilecrechespune.org/ngo/addAttendance.php?id=" . $link;

            head($qr);
        }
    }

}
//echo "</table>";
?>