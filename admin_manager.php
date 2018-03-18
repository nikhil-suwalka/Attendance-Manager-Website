<?php include('includes/database.php'); ?>
<?php

if (isset($_COOKIE["logged_in"])) {
    $isSuperAdmin = $_COOKIE["logged_in"];
}


if (!(isset($_COOKIE["logged_in"])) || $isSuperAdmin==0) {
    header("Location:index.php");
}

if (isset($_GET['logout'])) {
    setcookie("logged_in", '', time() - (86400 * 30), "/");
    header("Location:index.php");
}

//Create the select query
$query = "SELECT *
              FROM persons
              ORDER BY date_of_join DESC ";

//Get result
$result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Dashboard</title>
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
</head>

<body>
<form method="get" action="admin_manager.php">
    <div style="max-width: 71rem;" class="container">
        <header class="header clearfix">
            <nav>
                <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"  style="color:#673ab7;">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_manager.php"  style="background-color:#673ab7;">Admin Manager <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="employee_manager.php"  style="color:#673ab7;">Employee Manager <span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_admin.php"  style="color:#673ab7;">Add Admin</a>
                    </li>
                    <li class="show1">
                        <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout" >
                    </li>
                </ul>
            </nav>
            <h3 class="text-muted">TMC CManager</h3>
        </header>
</form>
<main role="main">

    <div class="container1">
        <div class="row marketing">
            <div class="col-lg-12">
                <?php
                if (isset($_GET["msg"]))
                    echo "<div class = msg>" . $_GET["msg"] . "</div>";
                ?>
                <h2> Admins </h2>
                <table style="overflow-x: auto; display: block; white-space: nowrap; max-height: 450px"
                       class="table table-striped">
                    <tr>

                        <th>Userame</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>Date of join</th>
                        <th>Employee Status</th>
                        <th>Designation</th>
                        <th>Employee Status Change</th>
                        <th>Bank Name</th>
                        <th>Account Number</th>
                        <th>Bank Branch</th>
                        <th>IFSC Code</th>
                        <th>MICR Code</th>
                        <th>Super Admin</th>
                        <th colspan="2">Edit/Remove</th>
                    </tr>
                    <?php

                    //Check if at least 1 row is found
                    $finalResult = array();
                    if ($result->num_rows > 0) {
                        //Loop through results
                        //while ($row = $result->fetch_assoc()){
                        // OR
                        //while ($row = mysqli_fetch_assoc($result)){
                        // OR
                        while ($row = mysqli_fetch_array($result)) {
                            //Display customer info
                            $output = "<tr>";
                            $output = "<td>" . $row['Username'] . "</td>";
                            $output .= "<td>" . $row["fname"] . " " . $row["lname"] . " </td>";
                            $output .= "<td>" . $row["Email_id"] . "</td>";
                            $output .= "<td>" . $row["date_of_birth"] . "</td>";
                            $output .= "<td>" . $row["gender"] . "</td>";
                            $output .= "<td >" . $row["address"] . "<br>" . $row["zip"] . "<br>" . $row["city"] . ", " . $row["state"] . "</td>";
                            $output .= "<td>" . $row["phone_number"] . " </td>";
                            $output .= "<td width='106'>" . $row["date_of_join"] . " </td>";
                            $output .= "<td>" . $row['employee_status'] . "  </td>";
                            $output .= "<td>" . $row['designation'] . "  </td>";
                            $output .= "<td>" . $row['employee_status_change'] . "  </td>";
                            $output .= "<td>" . $row['bank_name'] . "  </td>";
                            $output .= "<td>" . $row['bank_accno'] . "  </td>";
                            $output .= "<td>" . $row['bank_branch'] . "  </td>";
                            $output .= "<td>" . $row['ifsc_code'] . "  </td>";
                            $output .= "<td>" . $row['micr_code'] . "  </td>";
                            if ($row['super_admin'] == 1) $sa = 'Yes';
                            else $sa = 'No';
                            $output .= "<td>" . $sa . "  </td>";
                            $output .= "<td><a  href='edit_admin.php?user=" . $row['Username'] . "' class='btn btn-primary btn-sm'  style=\"background-color:#673ab7;border:none;\">Edit </a></td>";
                            $output .= "<td><a href='delete_admin.php?user=" . $row['Username'] . "' class='btn btn-primary btn-sm'  style=\"background-color:#673ab7;border:none;\">Remove </a></td>"; // TODO: delete admin page

                            $output .= "</tr>";


                            /*
                           echo '<tr>
                           <td>'.$row["first_name"].' '.$row["last_name"]. ' </td>
                           <td>'.$row["email"].'</td>
                           <td>'.$row["address"]. ' '. $row["city"]. ' '.$row["state"].'</td>
                           <td><a href=\"edit_customer.php?id="'.$row["id"].'class="btn btn - primary btn - sm\">Edit </a></td>
                           </tr>

                           ';

                            */


                            //Echo output
                            echo $output;
                        }

                    } else
                        echo "Sorry, no admins were found";

                    ?>

                </table>
            </div>


        </div>

</main>

<footer class="footer">
    <p>&copy; Company 2017</p>
</footer>

</div> <!-- /container -->
</body>
</html>
