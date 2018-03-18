<?php


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
$file = fopen('php://memory', "w");
$arr = array();


include('includes/database.php');
////echo date('Y-m-d', strtotime("last day of -1 month"));


if ($_GET) {
    if (isset($_GET['mm'])) {
        $get_value = $_GET['month'];
        date_default_timezone_set('Asia/Kolkata');

        $mon = substr($get_value, 0, 2); // month selected
        $yr = substr($get_value, 3, 4); // year selected

        $monthNum  = $mon;
        $monthName = date('M', mktime(0, 0, 0, $monthNum, 10)); // March
        $fileName = "Admin attd ".$monthName." ".$yr.".csv";

        //echo "<table style=\"overflow-x:auto; display: block; white-space: nowrap;\"
//                       class=\"table table-striped\" >";
        //echo "<th>ID</th>";
        //echo "<th>Name</th>";

        array_push($arr, "I.D.", "NAME");
        $curmonth = date('m');
//        //echo $curmonth;
//        //echo $mon;
        $a_date = "$yr-$mon-01";
        $totalDays = date("t", strtotime($a_date));

        for ($i = 1; $i <= $totalDays; $i++) {
            //echo "<th>$i</th>";
            array_push($arr, $i);
        }
        //echo "<th>Total Working Hours</th>";
        //echo "<th>Total Days Present</th>";

        array_push($arr, "TOTAL WORKING HOURS");
        array_push($arr, "TOTAL DAYS PRESENT");
        fputcsv($file, $arr);
        $arr = array();
        fputcsv($file, $arr);


        $query = "SELECT persons.Username, fname, lname, check_in,DAY(check_in) ,check_out, TIME_FORMAT(attendance.check_in, '%H:%i'), TIME_FORMAT(attendance.check_out, '%H:%i') FROM persons, attendance 
                  WHERE persons.Username = attendance.username AND attendance.username IS NOT NULL AND MONTH(check_in) = '$mon' AND YEAR(check_in) = '$yr' ORDER BY attendance.username, check_in";
        $result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
        $i = 1;

        if (mysqli_num_rows($result) == 0) {
            $arr = array("No records Found");
            fputcsv($file, $arr);
            array_to_csv_download($file, $fileName);
            exit(0);
        }
        while ($row = mysqli_fetch_array($result)) {

            $date = $row["DAY(check_in)"];

            if ($i == 1) {
                //echo "<tr><td> $row[id]</td><td> $row[fname] $row[lname] </td>";

                array_push($arr, $row['Username'], $row['fname'] . " " . $row['lname']);
                $name = $row['fname'];
                $workingmins = 0;
                $daysPresent = 0;
                $mins = 0;

            } else if ($name != $row['fname']) {

                if (date("m") == $mon) {
                    while ($i <= $totalDays) {
                        if ($i <= date("d")) {

                            array_push($arr, "AB");
                        } else array_push($arr, "-");;
                        $i++;
                    }
                } else {

                    while ($i <= $totalDays) {
                        array_push($arr, "AB");
                        $i++;
                    }

                }

                $hrs = floor($workingmins / 60);
                $mins = $workingmins % 60;

                array_push($arr, "$hrs hrs $mins mins");
                array_push($arr, $daysPresent);
                fputcsv($file, $arr);
                $arr = array();
                array_push($arr, $row['Username'], $row['fname'] . " " . $row['lname']);

                $name = $row['fname'];
                $i = 1;
                $workingmins = 0;
                $mins = 0;
                $daysPresent = 0;
            }
            if ($row['check_out'] != null) {

                $to_time = strtotime($row['check_out']);
                $from_time = strtotime($row['check_in']);
                $total_mins = ceil(abs($to_time - $from_time) / 60);
                $workingmins += $total_mins;

            }
            $daysPresent += 1;


            while ($i < $date) {
                //echo "<td>AB</td>";
                array_push($arr, "AB");
                $i++;
            }
            //echo "<td>";
            //echo $row["TIME_FORMAT(attendance.check_in, '%H:%i')"] . " - " . $row["TIME_FORMAT(attendance.check_out, '%H:%i')"];
            //echo "</td>";
            array_push($arr, $row["TIME_FORMAT(attendance.check_in, '%H:%i')"] . " - " . $row["TIME_FORMAT(attendance.check_out, '%H:%i')"]);

            $i++;
        }
        if (date("m") == $mon) {
            while ($i <= $totalDays) {
                if ($i <= date("d")) {
                    array_push($arr, "AB");
                } else array_push($arr, "-");;
                $i++;
            }
        } else {

            while ($i <= $totalDays) {
                array_push($arr, "AB");
                $i++;
            }

        }

        $hrs = floor($workingmins / 60);
        $mins = $workingmins % 60;
        array_push($arr, "$hrs hrs $mins mins");
        array_push($arr, $daysPresent);
        fputcsv($file, $arr);
        $arr = array();
        //echo "</table>";
    }


}
//fclose($file);
array_to_csv_download($file, $fileName);

function array_to_csv_download($file, $filename = "export.csv", $delimiter = ";")
{
// reset the file pointer to the start of the file
    fseek($file, 0);
// tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
// tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="' . $filename . '";');
// make php send the generated csv lines to the browser
    fpassthru($file);


}


?>


