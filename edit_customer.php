<?php include('includes/database.php'); ?>
<?php

if (!(isset($_COOKIE["logged_in"]))) {
    header("Location:index.php");
}

if (isset($_GET['logout'])) {
    setcookie("logged_in", '', time() - (86400 * 30), "/");
    header("Location:index.php");
}

if (!isset($_GET['id'])) {
    echo "<center><h1>ID not found</h1></center>";
    exit(0);
}

//Assign get variable
$id = $_GET['id']; //get user id form url

//Create customer select query

$query = "SELECT * FROM details
              WHERE id = $id";

$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);

if ($result = $mysqli->query($query)) {
    //Fetch object arrauy
    while ($row = $result->fetch_assoc()) {
        $first_name = $row['fname'];
        $last_name = $row['lname'];
        $address = $row['address'];
        $zipcode = $row['zip'];
        $gender = $row["gender"];
        $city = $row['city'];
        $state = $row['state'];
        $phone_number = $row['phone_number'];
        $dob = $row['date_of_birth'];
        $doj = $row['date_of_join'];
        $blood_grp = $row['blood_group'];
        $emp_status = $row['employee_status'];
        $designation = $row['designation'];
        $emp_status_change = $row['employee_status_change'];
        $bank_name = $row['bank_name'];
        $bank_accno = $row['bank_accno'];
        $bank_branch = $row['bank_branch'];
        $ifsc = $row['ifsc_code'];
        $micr = $row['micr_code'];

    }
    $blood_sign = substr($blood_grp, -1);
    $blood_grp = substr($blood_grp, 0, -1);


    //Free Result set
    $result->close();
}

?>
<?php
if ($_POST) { //to check if form is submitted
//Assign get variable
    $id = $_GET['id']; //get user id form url

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
    $empstatus = (mysqli_real_escape_string($mysqli, $_POST["status1"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["status1"]);
    $designat = (mysqli_real_escape_string($mysqli, $_POST["designation"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["designation"]);
    $statuschange = (mysqli_real_escape_string($mysqli, $_POST["statuschange"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["statuschange"]);
    $banknaam = (mysqli_real_escape_string($mysqli, $_POST["bankname"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["bankname"]);
    $accno = (mysqli_real_escape_string($mysqli, $_POST["ac"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["ac"]);
    $bbranch = (mysqli_real_escape_string($mysqli, $_POST["bbranch"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["bbranch"]);
    $ifsc = (mysqli_real_escape_string($mysqli, $_POST["ifsc"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["ifsc"]);
    $micr = (mysqli_real_escape_string($mysqli, $_POST["micr"]) == "") ? NULL : mysqli_real_escape_string($mysqli, $_POST["micr"]);


    $blood_group = $blood_grp . $blood_sign;
echo $bank_branch;
echo $accno;
    //Create employee update
    $query = "UPDATE details
              SET
              fname = '$first_name',
              lname = '$last_name',
              gender = '$gender',
              address = '$address',
              date_of_birth = '$dob',
              zip = $zipcode,
              city = '$city',
              state = '$state',
              phone_number = '$phone_number',
              date_of_join = '$doj',
              blood_group = '$blood_group',
              employee_status = '$empstatus',
              designation = '$designat',
              employee_status_change = '$statuschange',
              bank_name = '$banknaam',
              bank_accno = $accno,
              bank_branch = '$bbranch',
              ifsc_code = '$ifsc',
              micr_code = $micr WHERE id=$id;
              ";
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $msg = "Customer Updated";
    header("Location:employee_manager.php?msg=" . urlencode($msg) . "");
    exit;


}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Edit Customer</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <script type="text/javascript"
            src="https://gc.kis.v2.scr.kaspersky-labs.com/67704677-3063-5142-AA2E-39311A24A375/main.js"
            charset="UTF-8"></script>

    <script type="text/javascript" src="validate3.js"></script>
</head>

<body>
<form method="get" action="edit_customer.php">
    <div class="container">
        <header class="header clearfix">
            <nav>
                <ul class="nav nav-pills float-right">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee_manager.php">Manager <span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">Edit Employee</a>
                    </li>
                    <li class="show1">
                        <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout">
                    </li>
                </ul>
            </nav>
            <h3 class="text-muted">Store CManager</h3>
        </header>
</form>
<main role="main">


    <div class="row marketing">
        <div class="col-lg-12">
            <h2>Edit Employee </h2>

            <form method="post" name="data" action="edit_customer.php?id=<?php echo $id; ?>">
                <div class="form-group">
                    <label>First Name</label>
                    <input name="first_name" type="text" class="form-control" placeholder="Enter First Name"
                           onkeyup="fun();" value="<?php echo $first_name; ?>">
                    <input name="fname" type="text" class="form-control" disabled>
                </div>


                <div class="form-group">
                    <label>Last Name</label>
                    <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name"
                           onkeyup="fun2();" value="<?php echo $last_name; ?>">
                    <input name="lname" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio">
                        <input name="gender" type="radio" class="radio" value="Male" onclick="fun7()"
                            <?php $a = ($gender == 'Male') ? 'checked' : ' ';
                            echo $a; ?>>
                        &nbsp
                        <label class="radio-inline">Male</label>&nbsp
                        <input name="gender" type="radio" class="radio" value="Female" onclick="fun7()"
                            <?php $a = ($gender == 'Female') ? 'checked' : ' ';
                            echo $a; ?>>&nbsp
                        <label class="radio-inline">Female</label>&nbsp
                        <input name="gender" type="radio" class="radio" value="Other" onclick="fun7()"
                            <?php $a = ($gender == 'Other') ? 'checked' : ' ';
                            echo $a; ?>>&nbsp
                        <label class="radio-inline">Other</label>&nbsp
                    </div>
                </div>


                <div class="form-group">
                    <label>Phone Number</label>
                    <input name="phoneno" maxlength="10" type="text" class="form-control"
                           placeholder="Enter Phone Number" onkeyup="fun3();" value="<?php echo $phone_number; ?>">
                    <input name="phno" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input name="dob" type="date" class="form-control" placeholder="Enter Date of Birth"
                           max="<?php echo date("Y-m-d"); ?>" onblur="fun101()" value="<?php echo $dob ?>">
                    <input name="dateval1" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Blood Group</label>
                    <select name="bloodGroup">
                        <option value="A" <?php if ($blood_grp == 'A') echo 'selected' ?>>A</option>
                        <option value="B" <?php if ($blood_grp == 'B') echo 'Selected' ?>>B</option>
                        <option value="O" <?php if ($blood_grp == 'O') echo 'Selected' ?>>O</option>
                        <option value="AB" <?php if ($blood_grp == 'AB') echo 'Selected' ?> >AB</option>
                    </select>

                    <select name="bloodSign">
                        <option value="+" <?php if ($blood_sign == '+') echo 'Selected' ?>>+</option>
                        <option value="-" <?php if ($blood_sign == '-') echo 'Selected' ?>>-</option>
                    </select>

                </div>


                <div class="form-group">
                    <label>Date of Joining</label>
                    <input name="doj" type="date" class="form-control" placeholder="Enter Date of Joining"
                           max="<?php echo date("Y-m-d"); ?>" onblur="fun8()" value="<?php echo $doj; ?>">
                    <input name="dateval" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter Address"
                              onkeyup="fun11();"> <?php echo $address; ?></textarea>
                    <input name="addressval" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>City</label>
                    <input name="city" type="text" class="form-control" placeholder="Enter City" onkeyup="fun4();"
                           value="<?php echo $city; ?>">
                    <input name="cityval" type="text" class="form-control" disabled>
                </div>


                <div class="form-group">
                    <label>State</label>
                    <input name="state" type="text" class="form-control" placeholder="Enter State" onkeyup="fun5();"
                           value="<?php echo $state; ?>">
                    <input name="stateval" type="text" class="form-control" disabled>
                </div>


                <div class="form-group">
                    <label>Zip Code</label>
                    <input name="zip" maxlength="6" type="text" class="form-control" placeholder="Enter Zip Code"
                           onkeyup="fun6();" value="<?php echo $zipcode; ?>">
                    <input name="zipval" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Employee Status</label>
                    <input name="status1" type="text" class="form-control" placeholder="Enter Employee Status"
                           onkeyup="fun102();" value="<?php echo $emp_status ?>">
                    <input name="statusval1" type="text" class="form-control" disabled>
                </div>


                <div class="form-group">
                    <label>Designation</label>
                    <input name="designation" type="text" class="form-control" placeholder="Enter Designation"
                           onkeyup="fun103();" value="<?php echo $designation ?>">
                    <input name="designationval1" type="text" class="form-control" disabled>
                </div>


                <div class="form-group">
                    <label>Employee Status Change</label>
                    <input name="statuschange" type="text" class="form-control"
                           placeholder="Enter Employee Status Change"
                           onkeyup="fun104();" value="<?php echo $emp_status_change ?>">
                    <input name="statuschangeval" type="text" class="form-control" disabled>
                </div>

                <!--
               Bank Details
               -->
                <div class="form-group">
                    <label>Bank Name</label>
                    <input name="bankname" type="text" class="form-control" placeholder="Enter Bank Name"
                           onkeyup="fun105();" value="<?php echo $bank_name ?>">
                    <input name="banknameval" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">

                    <label>Account Number</label>
                    <input name="ac" type="text" class="form-control" placeholder="Enter Account Number"
                           onkeyup="fun106();" value="<?php if ($bank_accno==""){echo "NULL";} else {echo $bank_accno;} ?>">
                    <input name="acval" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Bank Branch</label>
                    <input name="bbranch" type="text" class="form-control" placeholder="Enter Bank Branch"
                           onkeyup="fun107();" value="<?php echo $bank_branch ?>">
                    <input name="bbranchval" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>IFSC Code</label>
                    <input name="ifsc" type="text" class="form-control" placeholder="Enter IFSC Code"
                           onkeyup="fun108();" value="<?php echo $ifsc ?>">
                    <input name="ifscval" type="text" class="form-control" disabled>
                </div>


                <div class="form-group">
                    <label>MICR Code</label>
                    <input name="micr" type="text" class="form-control" placeholder="Enter MICR Code"
                           onkeyup="fun109();" value="<?php if ($micr==""){echo "NULL";} else {echo $micr;}?>">
                    <input name="micrval" type="text" class="form-control" disabled>
                </div>


                <input type="submit" id="sub" class="btn btn-default" value="Update Customer"/>


            </form>


        </div>

    </div>

</main>

<footer class="footer">
    <p>&copy; Company 2017</p>
</footer>

</div> <!-- /container -->
</body>
</html>
