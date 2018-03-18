<?php
include('includes/database.php');
if (isset($_COOKIE["logged_in"])) {
    $isSuperAdmin = $_COOKIE["logged_in"];
}


if (!(isset($_COOKIE["logged_in"]))) {
    header("Location:index.php");
}

if (isset($_GET['logout'])) {
    setcookie("logged_in", '', time() - (86400 * 30), "/");
    header("Location:index.php");
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Employee Attendance Manager</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <script type="text/javascript"
            src="https://gc.kis.v2.scr.kaspersky-labs.com/67704677-3063-5142-AA2E-39311A24A375/main.js"
            charset="UTF-8"></script>
    <style>
        #month {
            border: none;
            color: blue;
        }
    </style>
</head>
<body>
<form name="myform" action="attendance_manager_monthwise.php" method="get">

    <div style="max-width: 71rem;" class="container">
        <header class="header clearfix">
            <nav>
                <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color:#673ab7;">Home <span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <?php if ($isSuperAdmin == 1)
                        echo "<li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"admin_manager.php\"  style=\"color:#673ab7;\">Admin Manager <span class=\"sr-only\">(current)</span></a>
                                    </li>";
                    ?>


                    <li class="nav-item">
                        <a class="nav-link" href="employee_manager.php" style="color:#673ab7;">Employee Manager
                            <span
                                    class="sr-only">(current)</span></a>
                    </li>

                    <li class="show1">
                        <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout">
                    </li>
                </ul>
            </nav>
            <h3 class="text-muted">Employee Attendance Manager</h3>
        </header>
        <!--
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Month <span class="glyphicon glyphicon-user pull-right"></span></a>

                                <?php
        /*                                include('includes/database.php');
                                        //echo date('Y-m-d', strtotime("last day of -1 month"));

                                        for ($i = 12; $i >= 0; $i--) {
                                            $mon = date('M Y', strtotime("-$i month"));
                                            $mm = date('m Y', strtotime("-$i month"));
                                            echo "<ul class='dropdown-menu'> <li value='$mm'>  $mon  </li></ul>";

                                        }
                                        */ ?>
                </li>
            </ul>-->
</form>
</body>


</html>


<?php


date_default_timezone_set('Asia/Kolkata');
echo "<table style=\"overflow-x:auto; display: block; white-space: nowrap;\"
                       class=\"table table-striped\" >";
echo "<th>ID</th>";
echo "<th>Name</th>";
$today = date('d-m-Y');

$date = date('Y-m-d');
echo "<th>$today</th>";
echo "<th>Total Working Hours</th>";
$query = "SELECT details.id, fname, lname, check_in,DAY(check_in) ,check_out, TIME_FORMAT(attendance.check_in, '%H:%i'), TIME_FORMAT(attendance.check_out, '%H:%i') FROM details, attendance 
                  WHERE details.id = attendance.id AND attendance.id IS NOT NULL AND DATE(check_in) = '$date' ORDER BY id, check_in";

$result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at


if (mysqli_num_rows($result) == 0) {
    echo "<h2 style='text-align: center; color: red'>No rows found</h2>";
    exit(0);
}
while ($row = mysqli_fetch_array($result)) {
    $date = $row["DAY(check_in)"];


    echo "<tr><td> $row[id]</td><td> $row[fname] $row[lname] </td>";

    echo "<td>";
    echo $row["TIME_FORMAT(attendance.check_in, '%H:%i')"] . " - " . $row["TIME_FORMAT(attendance.check_out, '%H:%i')"];
    echo "</td>";

    if($row['check_out'] == null)
        echo "<td>Not checked-out</td>";

    else{
        $to_time = strtotime($row['check_out']);
        $from_time = strtotime($row['check_in']);
        $total_mins = ceil(abs($to_time - $from_time) / 60);

        $hrs = floor($total_mins/60);
        $mins = $total_mins%60;


        echo "<td>$hrs hrs   $mins mins</td>";

    }

}

echo "</table";


?>

