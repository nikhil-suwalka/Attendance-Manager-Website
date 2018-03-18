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

if(!isset($_GET['user'])){
    echo "<center><h1>ID not found</h1></center>";
    exit(0);
}


//Assign get variable
$usr = $_GET['user']; //get user id form url

//Create customer select query

$query = "SELECT * FROM persons
              WHERE Username = '$usr'";

$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);

if ($result = $mysqli->query($query)) {
    //Fetch object arrauy
    while ($row = $result->fetch_assoc()) {
        $username = $row['Username'];
        $first_name = $row['fname'];
        $last_name = $row['lname'];
        $address = $row['address'];
        $email = $row['Email_id'];
        $zipcode = $row['zip'];
        $gender = $row["gender"];
        $city = $row['city'];
        $state = $row['state'];
        $phone_number = $row['phone_number'];
        $dob = $row['date_of_birth'];
        $doj = $row['date_of_join'];
        $emp_status = $row['employee_status'];
        $designation = $row['designation'];
        $emp_status_change = $row['employee_status_change'];
        $bank_name = $row['bank_name'];
        $bank_accno = $row['bank_accno'];
        $bank_branch = $row['bank_branch'];
        $ifsc = $row['ifsc_code'];
        $micr = $row['micr_code'];
        $isSuperadmin = $row['super_admin'];
    }
    //Free Result set
    $result->close();
}
?>
<?php
if ($_POST) { //to check if form is submitted
//Assign get variable
    $pFlag = 0;
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $first_name = mysqli_real_escape_string($mysqli, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($mysqli, $_POST["last_name"]);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $pwd = mysqli_real_escape_string($mysqli, $_POST['password']);
    if ($pwd == "")
        $pFlag = 0;
    else {
        $pwd = md5($pwd);
        $pFlag = 1;
    }
    $gender = mysqli_real_escape_string($mysqli, $_POST["gender"]);
    $zipcode = mysqli_real_escape_string($mysqli, $_POST["zip"]);
    $address = mysqli_real_escape_string($mysqli, $_POST["address"]);
    $city = mysqli_real_escape_string($mysqli, $_POST["city"]);
    $state = mysqli_real_escape_string($mysqli, $_POST["state"]);
    $phone_number = mysqli_real_escape_string($mysqli, $_POST["phoneno"]);
    $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
    $doj = mysqli_real_escape_string($mysqli, $_POST["doj"]);
    $emp_status = mysqli_real_escape_string($mysqli, $_POST['status1']);
    $designation = mysqli_real_escape_string($mysqli, $_POST['designation']);
    $emp_status_change = mysqli_real_escape_string($mysqli, $_POST['statuschange']);
    $bank_name = mysqli_real_escape_string($mysqli, $_POST['bankname']);
    $bank_accno = mysqli_real_escape_string($mysqli, $_POST['ac']);
    $bank_branch = mysqli_real_escape_string($mysqli, $_POST['bbranch']);
    $ifsc = mysqli_real_escape_string($mysqli, $_POST['ifsc']);
    $micr = mysqli_real_escape_string($mysqli, $_POST['micr']);
    $isSuperadmin = mysqli_real_escape_string($mysqli, $_POST['superadmin']);




    //Create employee update

    $query = "UPDATE persons
              SET
              
              Username = '$username',
              fname = '$first_name',
              lname = '$last_name',
              gender = '$gender',
              Email_id = '$email',
              address = '$address',
              date_of_birth = '$dob',
              zip = $zipcode,
              city = '$city',
              state = '$state',
              phone_number = '$phone_number',
              date_of_join = '$doj',
              employee_status = '$emp_status',
              designation = '$designation',
              employee_status_change = '$emp_status_change',
              bank_name = '$bank_name',
              bank_accno = $bank_accno,
              bank_branch = '$bank_branch',
              ifsc_code = '$ifsc',
              micr_code = '$micr',
              super_admin = $isSuperadmin WHERE Username='$usr';
              ";
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    if($pFlag == 1){
        $query = "UPDATE persons
        SET Password = '$pwd' WHERE Username = '$usr'";
        $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    }

    $msg = "Admin Updated";
    header("Location:admin_manager.php?msg=" . urlencode($msg) . "");
    exit;


}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Edit Admin</title>

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
<form method="get" action="edit_admin.php">
<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">

                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color:#673ab7">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_manager.php" style="color:#673ab7">Manager <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="" style="background-color:#673ab7">Edit Admin</a>
                </li>
                <li class="show1" style="padding-left: 10px;">
                    <input type="submit" value="Logout" class="btn btn-default navbar-btn" name="logout" >
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
    </header>
</form>
    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Edit Admin </h2>

                <form method="post" name="data" action="edit_admin.php?user=<?php echo $username; ?>">

                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Enter  Username"
                               onblur="fun0();"value="<?php echo $username?>">
                        <input name="uname" type="text" class="form-control" disabled>
                    </div>

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
                        <label>Email-ID</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter Email-ID"
                               onblur="fun111();" value="<?php echo $email?>">
                        <input name="emailval" type="text" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter new password or leave empty for no change"
                               onblur="fun111();">
                        <input name="emailval" type="text" class="form-control" disabled>
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
                               onkeyup="fun106();" value="<?php echo $bank_accno ?>">
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
                               onkeyup="fun109();" value="<?php echo $micr ?>">
                        <input name="micrval" type="text" class="form-control" disabled>
                    </div>


                    <div class="form-group">
                        <label>Super Admin</label>
                        <div class="radio">
                            <input name="superadmin" type="radio" class="radio" value="1" onclick="fun7()"
                                <?php $a = ($isSuperadmin == 1) ? 'checked' : ' ';
                                echo $a; ?>>
                            &nbsp
                            <label class="radio-inline">Yes</label>&nbsp


                            <input name="superadmin" type="radio" class="radio" value="0" onclick="fun7()"
                                <?php $a = ($isSuperadmin == 0) ? 'checked' : ' ';
                                echo $a; ?> >&nbsp
                            <label class="radio-inline">No</label>&nbsp

                        </div>
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
